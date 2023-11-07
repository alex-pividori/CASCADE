from   netCDF4 import Dataset as NetCDFFile 
import matplotlib.pyplot as plt
import numpy as np
import math
import bottleneck  
import pandas as pd
import sys
import os.path
from scipy.interpolate import UnivariateSpline

data_arc_dir     = '/lustre/arpa/AdriaClim/data/ERDDAP'
data_arc_dir_txt = '/lustre/arpa/AdriaClim/data/measurements/meteo_arpafvg'
output_arc_dir   = '/lustre/arpa/AdriaClim/public_html/EURO_CORDEX_analysis/SCENARIO/wind'

point_label = {"W01":"Lignano", "W02":"Fossalon di Grado", "W03":"Paloma buoy", "W04":"Trieste" }
st_number   = { "W01":18, "W02":11, "W03":52, "W04":13 }

point_name = sys.argv[1]
lat_ref    = float(sys.argv[2])  # this is W01 45.703 13.148 
lon_ref    = float(sys.argv[3])

f1     = NetCDFFile( os.path.join( data_arc_dir,"uv_10m_gr-adriaclim_resm_wrf_hist-proj_near_surface_19920101_00-20501231_12.nc"), mode='r')
f_txt  =  os.path.join(  data_arc_dir_txt, "AdriaClim_meteo_4_ERDDAP.txt" )

#================== data extractions ==================

lat_v1   = f1.variables['latitude'][:] 
lon_v1   = f1.variables['longitude'][:] 
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
                      index_col="indx_st", header=0, comment="#", na_values=-99.0 )

f_os = f_os.loc[ st_number[point_name] ]

mod_os  = []

#===================== Datetime and phase OSMER =======================

time_os = f_os[["wind_speed_10m"]].reset_index()

for i in range( len(time_os) ):
    if ( not math.isnan( time_os.loc[ i, "wind_speed_10m"] ) ):
        mod_os.append(   time_os.loc[ i, "wind_speed_10m"] )

#==================== ERDDAP speed and phase ====================

u_mm = u_v1[:42382, lat_idx, lon_idx]
v_mm = v_v1[:42382, lat_idx, lon_idx]

mod_erd = []

for i in range( len( u_mm ) ):
    mod_erd.append(  np.around(  np.sqrt( (v_mm[i])**2 +  (u_mm[i])**2 ), decimals=2 ) ) 

#=====================================================================================
N  = len(mod_erd)
N1 = len(mod_os)
n_bin = 30

p, x   = np.histogram( mod_erd, bins=n_bin, range=(0,25) )
x      = x[:-1] + (x[1] - x[0])/2
f      = UnivariateSpline(x, p, k=3, s=10 )


p1, x1 = np.histogram( mod_os,  bins=n_bin, range=(0,25) )
x1     = x1[:-1] + (x1[1] - x1[0])/2
f1     = UnivariateSpline(x1, p1, k=3, s=10 )

#=====================================================================================
#                                       Plot
#=====================================================================================

fig , ax = plt.subplots( figsize=(20,15) )

plt.title("Historical Probability density function for wind speed at point: "+point_name+" ("+point_label[point_name]+")" , fontsize=25, fontdict={'family':'serif'} )
plt.xlabel("Wind Speed [m/s]", fontsize=25 )
plt.ylabel("Probability density function [(m/s)-1]", fontsize=25 )
plt.xticks( fontsize=18 )
plt.yticks( fontsize=18 )

max_val = 25
m = list(np.arange(0.2, max_val, 0.1))

plt.plot( m, f(m)/(  N  * ( max_val/n_bin) ),   color="red"  , label='$WRF-model$',      linewidth=3.)
plt.plot( m, f1(m)/( N1 * ( max_val/n_bin) ), color="green", label='$OSMER-measures$', linewidth=3.)
#* (360/n_bin)
plt.legend( loc=1, fontsize="xx-large" )
plt.yscale( "log")

plt.grid()
#plt.axis([ 0, max(m), 0, max(max(f(m)/( N * ( max_val/n_bin) )), max(f1(m)/( N1 * ( max_val/n_bin) )))+0.01 ])

plt.savefig( output_arc_dir+"/wind_pdf_module-log_wrf-osmer_"+point_name+".png")

plt.close(fig)
