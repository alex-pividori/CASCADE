from   netCDF4 import Dataset as NetCDFFile 
import matplotlib.pyplot as plt
import numpy as np
import datetime
import bottleneck  
import pandas as pd
import sys
import os.path


data_arc_dir     = '/lustre/arpa/AdriaClim/data/ERDDAP'
data_arc_dir_txt = '/lustre/arpa/AdriaClim/data/ERDDAP'
output_arc_dir   = '/lustre/arpa/AdriaClim/public_html/EURO_CORDEX_analysis/SCENARIO/precip_tot-adriaclim_resm_pr'

file_name_osmer  = {"E01":"osmer_pr_mon_cum_fossalon_1990-2022.txt", "E02":"osmer_pr_mon_cum_fagagna_1990-2022.txt", "E03":"osmer_pr_mon_cum_enemonzo_1994-2022.txt" }
mon_l            = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]
y_sup = {"E01":200, "E02":200, "E03":250, "E04":250 }
wdw_mm = 12

point_name = sys.argv[1]
lat_ref    = float(sys.argv[2])  # this is B02  45.2 13.04
lon_ref    = float(sys.argv[3])

f1 = NetCDFFile( data_arc_dir+'/'+'mon_precip_tot-adriaclim_resm_wrf_hist-proj_near_surface_20210101_12-20501231_12.nc', mode='r')
f_txt     =  os.path.join(  data_arc_dir_txt, file_name_osmer[point_name] )

#================== data extractions ==================

lat_v1   = f1.variables['latitude'][:] 
lon_v1   = f1.variables['longitude'][:] 
time_v1  = f1.variables['time'][:]
prec_v1  = f1.variables['precip_tot'][:]


for i in range( len(lat_v1) ):
	if ( abs(lat_v1[i] - lat_ref ) < 0.043 ) :
	   lat_idx=i
	   break

for i in range( len(lon_v1) ):
        if ( abs(lon_v1[i] - lon_ref ) < 0.062 ) :
           lon_idx=i
           break

f_os = pd.read_csv( f_txt, sep=";", names=["indx_anno","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec","year"], index_col="indx_anno", header=0 )

dateList1  = []
#===================== Creation of dates =======================

t_start1 = datetime.datetime.strptime( "1970-01-01T00:00:00" , "%Y-%m-%dT%H:%M:%S")

for i in range( len(time_v1) ):
	time_delta = datetime.timedelta( seconds = time_v1[i] )
	dateList1.append( t_start1 + time_delta )

v1_mm = bottleneck.move_mean( prec_v1[:,lat_idx,lon_idx],  window=wdw_mm , min_count = None )

for i in range( len( v1_mm ) ):
	if ( v1_mm[i] > 1e+10 ):
	     v1_mm[i] = np.nan

#============================ Plotted data creation ==================================

dateList2 = []
OSMER_d   = []
OSMER_d1  = []

for i in range(len(f_os.index)):
    for j in range(12):
        if ( not pd.isnull( f_os.loc[ f_os.index[i], mon_l[j] ] ) ):
            dateList2.append( datetime.datetime( year = f_os.index[i], month = (j+1), day = 15) )
            OSMER_d1.append( f_os.loc[ f_os.index[i], mon_l[j] ] )       

OSMER_d = bottleneck.move_mean( OSMER_d1,  window=wdw_mm , min_count = None )

for i in range( len(dateList1) ):
    year  = dateList1[i].year
    month = dateList1[i].month

    try:
        if ( not pd.isnull( f_os.loc[year, mon_l[month - 1] ]) ):
            try:
                year_in
            except:
                year_in  = year
                month_in = month

            year_fin  = year
            month_fin = month
    except:
        pass

#=====================================================================================
#                                       Plot
#=====================================================================================

fig, ax = plt.subplots(figsize=(20,15))

plt.title("Total wrf-model hist-proj monthly precipitations and OSMER in-situ measures from 1992 to 2022: "+point_name+"\n" , fontsize=25, fontdict={'family':'serif'} )
plt.xlabel("year", fontsize=25 )
plt.ylabel("Monthly cumulative total precipitation [mm/month]", fontsize=25 )
plt.xticks(fontsize=18 )
plt.yticks(fontsize=18 )

#plt.plot( dateList1 , prec_v1[:,lat_idx,lon_idx] , color="chartreuse", label='$...$ $...$' )
plt.plot( dateList1, v1_mm,   color="red",   label='$WRF$ $value$ $Moving$ $avrg$ $(12 months)$', linewidth=2.5 )
plt.plot( dateList2, OSMER_d, color="green", label='$OSMER$ $in-situ$ $measures$', linewidth=2.5 )

plt.vlines( datetime.datetime.strptime( "2021-01-16::15:00:00" , "%Y-%m-%d::%H:%M:%S"), -3, +500, linestyle="--", label="hist-proj simulation" )
plt.legend( loc=2, fontsize="xx-large" )

plt.text(  datetime.datetime.strptime( "2019-12-01::00:00:00" , "%Y-%m-%d::%H:%M:%S") , 5, "historical", fontsize=18, rotation="vertical" )
plt.text(  datetime.datetime.strptime( "2021-02-20::15:00:00" , "%Y-%m-%d::%H:%M:%S") , 5, "projection (RCP 8.5)", fontsize=18, rotation="vertical" )

plt.axis([ datetime.datetime.strptime( "1992-01-01::00:00:00" , "%Y-%m-%d::%H:%M:%S") , datetime.datetime.strptime( "2024-01-01::00:00:00" , "%Y-%m-%d::%H:%M:%S") , 0, y_sup[point_name] ])
plt.grid()


plt.savefig( output_arc_dir+"/cum_prec-tot_wrf-osmer_"+point_name+".png")

plt.close(fig)
