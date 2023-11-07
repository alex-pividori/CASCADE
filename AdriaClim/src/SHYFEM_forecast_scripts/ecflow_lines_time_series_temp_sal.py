import matplotlib.pyplot as plt
import pandas as pd
import numpy  as np
import sys
from   datetime import datetime
import matplotlib.dates as mdates

temp_input_file = sys.argv[1]
sal_input_file  = sys.argv[2]
output_dir      = sys.argv[3]
node_name       = sys.argv[4]
date_f          = sys.argv[5]
time_in         = sys.argv[6]
time_fin        = sys.argv[7]
date_b          = sys.argv[8]
time_b          = sys.argv[9]
longitude       = sys.argv[10]
latitude        = sys.argv[11]
output_file     = sys.argv[12]
depths_file     = sys.argv[13]

depths_tot = pd.read_csv( depths_file, header=None )  

data_temp    = pd.read_csv( temp_input_file, sep='\s+', header=None, parse_dates=[0], date_parser=lambda x: datetime.strptime( x, "%Y-%m-%d::%H:%M:%S" ), index_col=0 )
data_sal     = pd.read_csv(  sal_input_file, sep='\s+', header=None, parse_dates=[0], date_parser=lambda x: datetime.strptime( x, "%Y-%m-%d::%H:%M:%S" ), index_col=0 )

n_lev        = len(data_temp.columns)
depths       = depths_tot[0][0:n_lev]

delta_t      = datetime.strptime( date_f+"::"+time_in+":00", "%Y%m%d::%H:%M:%S") - datetime.strptime( date_b+"::"+time_b+":00", "%Y%m%d::%H:%M:%S") 

hours_plus   =  "{:02}".format(   delta_t.days*24 + ( delta_t.seconds // 3600 ))
minutes_plus =  "{:02}".format( ( delta_t.seconds % 3600 ) // 60 )

b = 0
for i in range(len(data_temp.index)):
    if ( datetime.strptime( date_f+"::"+time_in+":00", "%Y%m%d::%H:%M:%S") <= data_temp.index[i] <= datetime.strptime( date_f+"::"+time_fin+":00", "%Y%m%d::%H:%M:%S") ):
        i_max = i
        if (b == 0):
            i_min = i
            b = 1

#================================= Algorithm to find out the three depth levels used ===================================

# the top level always exists
n_top    = 1

# the bottom level is always the last one
n_bottom = n_lev 

# the middle bottom
n_middle = ( n_top + n_bottom ) // 2

#=======================================================================================================================

temp_top    = data_temp[ n_top  ][i_min:i_max+1]
temp_middle = data_temp[n_middle][i_min:i_max+1]
temp_bottom = data_temp[n_bottom][i_min:i_max+1]

sal_top     = data_sal[ n_top  ][i_min:i_max+1]
sal_middle  = data_sal[n_middle][i_min:i_max+1]
sal_bottom  = data_sal[n_bottom][i_min:i_max+1]

#========================================== Plot ===========================================

fig , ax = plt.subplots( ncols=1, nrows=2, gridspec_kw={ 'height_ratios':[2,1] } , figsize=(20,15) )

plt.figure(1)

# TEMPERATURE time-series
plt.subplot(2, 1, 1)

plt.suptitle("Temperature and salinity time series. SHYFEM forecast run: "+date_b[0:4]+"-"+date_b[4:6]+"-"+date_b[6:8]+"  "+time_b+" UTC   +"+hours_plus+":"+minutes_plus+"h\n" , fontsize=25, fontdict={'family':'serif'} )
plt.title( "Node: "+node_name+"         lat: "+latitude+"°N  lon: "+longitude+"°E         Depth: "+str(depths[0])+" - "+str(depths[n_lev-1])+" m" , fontsize=18 )
plt.ylabel( "Temperature [°C]", fontsize=20 )
plt.xticks(fontsize=18 )
plt.yticks(fontsize=18 )
plt.grid( linestyle='--')

# the top level is always present
plt.plot( data_temp.index[i_min:(i_max+1)],     temp_top,    linewidth=2, color="blue", label="Top level: "+str(depths[n_top-1])+" m" )

# the middle level is not always present
if ( n_middle != n_bottom and n_middle != n_top ):
    plt.plot( data_temp.index[i_min:(i_max+1)], temp_middle, linewidth=2, color="red", label="Middle level: "+str(depths[n_middle-1])+" m" )

# the bottom level is not always present
if ( n_top    != n_bottom ):
    plt.plot( data_temp.index[i_min:(i_max+1)], temp_bottom, linewidth=2, color="black", label="Bottom level: "+str(depths[n_bottom-1])+" m" )    

plt.gca().xaxis.set_major_formatter(mdates.DateFormatter('%H:%M'))
plt.legend( loc='best', fontsize="x-large", facecolor="white" , framealpha=0.5 )

#=================================================================================

plt.subplot(2, 1, 2)

plt.xlabel( "UTC Time [hh:mm]",   fontsize=20 )
plt.ylabel( "Salinity [PSU]", fontsize=20 )
plt.xticks(fontsize=18 )
plt.yticks(fontsize=18 )
plt.grid( linestyle='--')

#plt.axis([ -1 , 50 , -( max( np.abs(delta) ) + 0.002 ) , max( np.abs(delta)) + 0.002 ])

# the top level is always present
plt.plot(     data_sal.index[i_min:(i_max+1)], sal_top,    linewidth=2, color="blue", label="Top level: "+str(depths[n_top-1])+" m" )

# the middle level is not always present
if ( n_middle != n_bottom and n_middle != n_top ):
    plt.plot( data_sal.index[i_min:(i_max+1)], sal_middle, linewidth=2, color="red", label="Middle level: "+str(depths[n_middle-1])+" m" )

# the bottom level is not always present
if ( n_top    != n_bottom ):
    plt.plot( data_sal.index[i_min:(i_max+1)], sal_bottom, linewidth=2, color="black", label="Bottom level: "+str(depths[n_bottom-1])+" m" )

plt.gca().xaxis.set_major_formatter(mdates.DateFormatter('%H:%M'))
plt.legend( loc='best', fontsize="x-large", facecolor="white" , framealpha=0.5 )

plt.savefig( output_dir+"/"+output_file )
plt.close(fig)
