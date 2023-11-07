import matplotlib.pyplot as plt
import pandas as pd
import numpy  as np
import sys
from   datetime import datetime
import matplotlib.dates as mdates

data_input_file = sys.argv[1]
output_dir      = sys.argv[2]
node_name       = sys.argv[3]
date_f          = sys.argv[4]
time_in         = sys.argv[5]
time_fin        = sys.argv[6]
date_b          = sys.argv[7]
time_b          = sys.argv[8]
longitude       = sys.argv[9]
latitude        = sys.argv[10]
output_file     = sys.argv[11]
depths_file     = sys.argv[12]

depths_tot = pd.read_csv( depths_file, header=None )  

data       = pd.read_csv( data_input_file, sep='\s+', header=None, parse_dates=[0], date_parser=lambda x: datetime.strptime( x, "%Y-%m-%d::%H:%M:%S" ), index_col=0 )

n_lev = len(data.columns)
depths = depths_tot[0][0:n_lev]

delta_t    = datetime.strptime( date_f+"::"+time_in+":00", "%Y%m%d::%H:%M:%S") - datetime.strptime( date_b+"::"+time_b+":00", "%Y%m%d::%H:%M:%S") 

hours_plus   =  "{:02}".format(   delta_t.days*24 + ( delta_t.seconds // 3600 ))
minutes_plus =  "{:02}".format( ( delta_t.seconds % 3600 ) // 60 )

b = 0
for i in range(len(data.index)):
    if ( datetime.strptime( date_f+"::"+time_in+":00", "%Y%m%d::%H:%M:%S") <= data.index[i] <= datetime.strptime( date_f+"::"+time_fin+":00", "%Y%m%d::%H:%M:%S") ):
        i_max = i
        if (b == 0):
            Z = np.array(data.iloc[i])
            i_min = i
            b = 1
        else:
            Z = np.append(Z, data.iloc[i])
     
#==================== Season Check =========================

smaxcn = max(Z)
smincn = min(Z)

#=======================================================================================================================

Z = Z.reshape( (i_max - i_min) + 1, n_lev )

Z = np.transpose(Z)
X, Y = np.meshgrid( data.index[ i_min: i_max + 1 ], depths)

#========================================== Plot ===========================================
fig, ax = plt.subplots( figsize=(12,10) )

plt.suptitle("Time series forecast run: "+date_b[0:4]+"-"+date_b[4:6]+"-"+date_b[6:8]+"  "+time_b+" UTC   +"+hours_plus+":"+minutes_plus+"h", fontsize= 16 )
plt.title( "Node: "+node_name+"      lat:"+latitude+"°N  lon:"+longitude+"°E      Depth: "+str(min(depths))+" - "+str(max(depths))+" m\n", fontsize= 12  )

CS = plt.contour(  X, Y, Z, levels=np.arange(20,45,1), colors='black', linewidths=1.2, linestyles="dashed" )
plt.clabel(CS, CS.levels, colors="black", fmt='%1.1f' )

plt.contourf( X, Y, Z, 10, cmap='Greens')
ax.set_xlabel('UTC Time [hh:mm]', fontsize= 13 )
ax.set_ylabel('Depth [m]',    fontsize= 13 )
ax.set_ylim( max(depths), min(depths) )
plt.gca().xaxis.set_major_formatter(mdates.DateFormatter('%H:%M'))
ax.grid()
plt.colorbar( label="Salinity [PSU]" )

plt.savefig( output_dir+"/"+output_file )

plt.close(fig)
