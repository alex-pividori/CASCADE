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

f1     = NetCDFFile( os.path.join( data_arc_dir,  "uv_10m_gr-adriaclim_resm_wrf_hist-proj_near_surface_19920101_00-20501231_12.nc"), mode='r')
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

phase_os  = []

#===================== Datetime and phase OSMER =======================

time_os = f_os[["year","month","day","hour","wind_dir_10m"]].reset_index()

for i in range( len(time_os) ):
    if ( not math.isnan( time_os.loc[ i, "wind_dir_10m"] ) ) and ( time_os.loc[ i, "wind_dir_10m"] < 360 ):
        phase_os.append(  time_os.loc[ i, "wind_dir_10m"] )

#==================== ERDDAP speed and phase ====================

u_mm = u_v1[:42382, lat_idx, lon_idx]
v_mm = v_v1[:42382, lat_idx, lon_idx]

phase_erd = []

for i in range( len( u_mm ) ):
    phase_erd.append( int( np.around( (270 - np.rad2deg( np.arctan2( v_mm[i], u_mm[i] )))%360, decimals=0)) ) 

#=====================================================================================

N = len(phase_erd)
N1= len(phase_os)
n_bin = 40

p, x   = np.histogram( phase_erd, bins=n_bin, range=(0, 359))
x      = x[:-1] + (x[1] - x[0])/2
f      = UnivariateSpline(x, p, k=3, s=10 )

p1, x1 = np.histogram( phase_os,  bins=n_bin, range=(0, 359))
x1     = x1[:-1] + (x1[1] - x1[0])/2
f1     = UnivariateSpline(x1, p1, k=3, s=10 )

#=====================================================================================
#                                       Plot
#=====================================================================================

fig , ax = plt.subplots( figsize=(20,15) )

plt.title("Historical Probability density function for wind direction at point: "+point_name+" ("+point_label[point_name]+")" , fontsize=25, fontdict={'family':'serif'} )
plt.xlabel("Direction [°N]", fontsize=25 )
plt.ylabel("Probability density function [grad-1]", fontsize=25 )
plt.xticks( fontsize=18 )
plt.yticks( fontsize=18 )

m = list(range(361))
plt.plot( m, f(m)/(  N  * (360/n_bin)),   color="red"  , label='$WRF-model$',      linewidth=3.)
plt.plot( m, f1(m)/( N1 * (360/n_bin)), color="green", label='$OSMER-measures$', linewidth=3.)

plt.legend( loc=2, fontsize="x-large" )

plt.grid()
plt.axis([ 0, 360, 0, max(max(f(m)/(  N  * (360/n_bin))), max(f1(m)/( N1 * (360/n_bin))))+0.001 ])

plt.savefig( output_arc_dir+"/wind_pdf_wrf-osmer_"+point_name+".png")

plt.close(fig)
