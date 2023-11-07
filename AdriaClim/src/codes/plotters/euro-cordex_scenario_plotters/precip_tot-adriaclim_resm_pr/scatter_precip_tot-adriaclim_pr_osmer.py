from netCDF4 import Dataset as NetCDFFile 
import matplotlib.pyplot as plt
import numpy as np
import datetime
import bottleneck  
import pandas as pd
import sys

data_arc_dir     = '/lustre/arpa/AdriaClim/data/ERDDAP'
data_arc_dir_txt = '/lustre/arpa/AdriaClim/data/ERDDAP' 
output_arc_dir   = '/lustre/arpa/AdriaClim/public_html/EURO_CORDEX_analysis/SCENARIO/precip_tot-adriaclim_resm_pr'

file_name_osmer = {"E01":"osmer_pr_mon_cum_fossalon_1990-2022.txt", "E02":"osmer_pr_mon_cum_fagagna_1990-2022.txt", "E03":"osmer_pr_mon_cum_enemonzo_1994-2022.txt" }
mon_l           = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]

point_name = sys.argv[1]
lat_ref    = float(sys.argv[2])  # this is B02  45.2 13.04
lon_ref    = float(sys.argv[3])
type_sim   = sys.argv[4]

f1 = NetCDFFile( data_arc_dir+'/'+'mon_precip_tot-adriaclim_resm_wrf_hist-proj_near_surface_20210101_12-20501231_12.nc', mode='r')
f_txt     =      data_arc_dir_txt+'/'+file_name_osmer[point_name]

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
#================== Creation of dates =======================

t_start1 = datetime.datetime.strptime( "1970-01-01T00:00:00" , "%Y-%m-%dT%H:%M:%S")

for i in range( len(time_v1) ):
	time_delta = datetime.timedelta( seconds = time_v1[i] )
	dateList1.append( t_start1 + time_delta )

v1_mm = prec_v1[:,lat_idx,lon_idx]

for i in range( len( v1_mm ) ):
	if ( v1_mm[i] >  1e+10  ):
	     v1_mm[i] = np.nan

#============================ Plotted data creation ==================================
x_v, y_v = [], []

for i in range( len(dateList1) ):
    year  = dateList1[i].year
    month = dateList1[i].month
    if ( type_sim == "Historical" ) and ( year >= 2021 ):     # from 2021 the simulation is projection and not historical anymore
        continue
    if ( type_sim == "Projection" ) and ( year <= 2020 ):     
        continue

    try:
        if ( not pd.isnull( f_os.loc[year, mon_l[month - 1] ]) ):
            try:
                year_in
            except:
                year_in  = year
                month_in = month

            year_fin  = year
            month_fin = month
            x_v.append( v1_mm[i] )                                         # WRF values
            y_v.append( f_os.loc[year,     mon_l[month - 1] ])             # OSMER in-situ measures
            #print(year, month, v1_mm[i], f_os.loc[year,     mon_l[month - 1] ]) 
    except:
        pass

#=====================================================================================
#                                       Plot
#=====================================================================================

fig, ax = plt.subplots(figsize=(20,15))
plt.title( type_sim+" scatter plot between WRF model and OSMER in-situ measures at point: "+point_name+"\n"+"from "+str(year_in)+"-"+str(month_in)+" to "+str(year_fin)+"-"+str(month_fin), fontsize=25, fontdict={'family':'serif'} )
plt.xlabel("WRF [mm/month]", fontsize=25 )
plt.ylabel("OSMER [mm/month]", fontsize=25 )
plt.xticks(fontsize=18 )
plt.yticks(fontsize=18 )

plt.scatter( x_v, y_v, color="red", label='$Scatter$ $Plot$')
plt.plot( [-10,500] , [-10,500], color="blue", linestyle="--", label="$Bisector$" )

plt.legend( loc=2, fontsize="xx-large" )

plt.axis([0, 400, 0, 400])
plt.grid()

plt.savefig( output_arc_dir+"/mon_prec-tot_wrf_scatter_"+type_sim+"_"+point_name+".png")

plt.close(fig)
