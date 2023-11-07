from   netCDF4 import Dataset as NetCDFFile 
import matplotlib.pyplot as plt
import numpy as np
import datetime
import bottleneck  
import pandas as pd
import sys
import os.path
import calendar

data_arc_dir     = '/lustre/arpa/AdriaClim/data/ERDDAP'
data_arc_dir_txt = '/lustre/arpa/AdriaClim/data/measurements/meteo_arpafvg'
output_arc_dir   = '/lustre/arpa/AdriaClim/public_html/EURO_CORDEX_analysis/SCENARIO/wind'

mon_l       = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]
y_sup       = {"W01":20, "W02":20, "W03":20, "W04":20 }
point_label = {"W01":"Lignano", "W02":"Fossalon di Grado", "W03":"Paloma buoy", "W04":"Trieste" }
st_number   = { "W01":18, "W02":11, "W03":52, "W04":13 }
wdw_mm = 12

point_name = sys.argv[1]
lat_ref    = float(sys.argv[2])  # this is W01 45.703 13.148 
lon_ref    = float(sys.argv[3])

f1 = NetCDFFile( os.path.join( data_arc_dir, "uv_10m_gr-adriaclim_resm_wrf_hist-proj_near_surface_19920101_00-20501231_12.nc"), mode='r')
f_txt     =  os.path.join(  data_arc_dir_txt, "AdriaClim_meteo_4_ERDDAP.txt" )

#================== data extractions ==================

lat_v1   = f1.variables['latitude'][:] 
lon_v1   = f1.variables['longitude'][:] 
time_v1  = f1.variables['time'][:]
u_v1     = f1.variables['u_10m_gr'][:]
v_v1     = f1.variables['v_10m_gr'][:]

for i in range( len(lat_v1) ):
	if ( abs(lat_v1[i] - lat_ref ) < 0.062 ):
	   lat_idx=i
	   break

for i in range( len(lon_v1) ):
        if ( abs(lon_v1[i] - lon_ref ) < 0.062 ):
           lon_idx=i
           break

f_os = pd.read_csv( f_txt, sep="\s+", names=["indx_st","year","month","day","hour","hourly_pr","T2m","wind_dir_10m","wind_speed_10m","Pr","hourly_solar_rad"],\
                      index_col="indx_st", header=0, comment="#" )

f_os = f_os.loc[ st_number[point_name] ]

dateList1 = []
dateList2 = []
phase_os  = []
#===================== Datetime ERDDAP =======================

t_start1 = datetime.datetime.strptime( "1970-01-01T00:00:00" , "%Y-%m-%dT%H:%M:%S")

for i in range( len(time_v1) ):
	time_delta = datetime.timedelta( seconds = time_v1[i] )
	dateList1.append( t_start1 + time_delta )

#===================== Datetime and phase OSMER =======================

time_os = f_os[["year","month","day","hour","wind_dir_10m"]].reset_index()

def hour_format( hour ):
    if (hour == "24.0"):
        return "23.59"
    else:
        return str(hour)

for i in range( len(time_os) ):
    hour_m = hour_format( str(time_os.loc[ i, "hour"] ))
    year_m = "{:02}".format( time_os.loc[ i, "year"] )
    dateList2.append( datetime.datetime.strptime( year_m+"-"+str(time_os.loc[ i, "month"])+"-"+str(time_os.loc[ i, "day"])+"T"+hour_m, "%y-%m-%dT%H.%M" ) ) 
    phase_os.append(  time_os.loc[ i, "wind_dir_10m"] )

#==================== ERDDAP speed and phase ====================

u_mm = u_v1[:, lat_idx, lon_idx]
v_mm = v_v1[:, lat_idx, lon_idx]
#v1_mm = bottleneck.move_mean( prec_v1[:,lat_idx,lon_idx],  window=wdw_mm , min_count = None )

mod_v     = []
phase_erd = []

def arctan_a(x,y):
    if( np.around( np.arctan2(-y,-x)* 57.3, decimals=0) <= 90):
        return int( np.around( 90.  - (np.arctan2(-y,-x) * 57.3), decimals=0))
    else:
        return int( np.around( 450. - (np.arctan2(-y,-x) * 57.3), decimals=0))

for i in range( len( u_mm ) ):
    mod_v.append( np.sqrt( u_mm[i]**2 + v_mm[i]**2 ) ) 
    phase_erd.append( arctan_a( u_mm[i], v_mm[i] )) 


#=====================================================================================
#                                       Plot
#=====================================================================================


for j in range(2015,2022):
	for i in range(1,13):
	    last_day = str(calendar.monthrange(j, i)[1] )
	    date_in  = datetime.datetime.strptime( str(j)+"-"+"{:02}".format(i)+"-01::00:00:00", "%Y-%m-%d::%H:%M:%S")
	    date_fin = datetime.datetime.strptime( str(j)+"-"+"{:02}".format(i)+"-"+last_day+"::23:59:00", "%Y-%m-%d::%H:%M:%S")

	    fig , ax = plt.subplots( ncols=1, nrows=2, gridspec_kw={ 'height_ratios':[2,1] } , figsize=(20,15) )

	    plt.figure(1)
	    plt.subplot(2, 1, 1)

	    plt.title("Wind speed module and direction at point: "+point_name+" ("+point_label[point_name]+")" , fontsize=25, fontdict={'family':'serif'} )
	    #plt.xlabel("Date", fontsize=25 )
	    plt.ylabel("Wind speed [m/s]", fontsize=25 )
	    plt.xticks( fontsize=18 )
	    plt.yticks( fontsize=18 )

	    plt.plot( dateList1, mod_v,                  color="red"  , label='$WRF-model$', linewidth=1.8 )
	    plt.plot( dateList2, f_os["wind_speed_10m"], color="green", label='$OSMER$ $measures$', linewidth=1.8 )

	    plt.vlines( datetime.datetime.strptime( "2021-01-16::15:00:00" , "%Y-%m-%d::%H:%M:%S"), -3, +500, linestyle="--", label="hist-proj simulation" )
	    plt.legend( loc=2, fontsize="x-large" )

	    plt.text(  datetime.datetime.strptime( "2020-12-15::00:00:00" , "%Y-%m-%d::%H:%M:%S") , 5, "historical", fontsize=18, rotation="vertical" )
	    plt.text(  datetime.datetime.strptime( "2021-01-05::15:00:00" , "%Y-%m-%d::%H:%M:%S") , 5, "projection (RCP 8.5)", fontsize=18, rotation="vertical" )

	    plt.grid()

	    plt.axis([ date_in, date_fin, 0, 20 ])

#=========================================================

	    plt.subplot(2, 1, 2)

	    plt.plot( dateList1, phase_erd, color="red",   label='$WRF-model$',     linewidth=1.8 )
	    plt.plot( dateList2, phase_os,  color="green", label='$OSMER$ $measures$', linewidth=1.8 )

	    plt.xlabel("Date", fontsize=25 )
	    plt.ylabel("Wind Direction [°N]", fontsize=25 )
	    plt.xticks( fontsize=18 )
	    plt.yticks( fontsize=18 )

	    plt.vlines( datetime.datetime.strptime( "2021-01-16::15:00:00" , "%Y-%m-%d::%H:%M:%S"), -3, +500, linestyle="--", label="hist-proj simulation" )
	    plt.legend( loc=2, fontsize="x-large" )

	    plt.text(  datetime.datetime.strptime( "2019-12-01::00:00:00" , "%Y-%m-%d::%H:%M:%S") , 5, "historical", fontsize=18, rotation="vertical" )
	    plt.text(  datetime.datetime.strptime( "2021-02-20::15:00:00" , "%Y-%m-%d::%H:%M:%S") , 5, "projection (RCP 8.5)", fontsize=18, rotation="vertical" )

	    plt.axis([ date_in, date_fin, 0, 360 ])

	    plt.grid()

	    plt.savefig( output_arc_dir+"/wind_wrf-osmer_"+point_name+"_"+str(date_in.year)+"_"+"{:02}".format(date_in.month)+"_"+str(date_fin.year)+"_"+"{:02}".format(date_fin.month)+".png")

	    plt.close(fig)


