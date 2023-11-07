import matplotlib.pyplot as plt
import pandas as pd
import sys
from   datetime import datetime
from   datetime import timedelta

data_input_file = sys.argv[1]
output_dir      = sys.argv[2]
node_name       = sys.argv[3]
date_f          = sys.argv[4]
time_f          = sys.argv[5]
date_b          = sys.argv[6]
time_b          = sys.argv[7]
longitude       = sys.argv[8]
latitude        = sys.argv[9]
output_file     = sys.argv[10]

# date_f/date_b format is YYYYMMDD
# time_f/time_b format is hh:mm
date_time_f = datetime.strptime( date_f+"::"+time_f, '%Y%m%d::%H:%M' )
date_time_b = datetime.strptime( date_b+"::"+time_b, '%Y%m%d::%H:%M' )
delta_t     = date_time_f - date_time_b

hours_plus   =  "{:02}".format(   delta_t.days*24 + ( delta_t.seconds // 3600 ))
minutes_plus =  "{:02}".format( ( delta_t.seconds % 3600 ) // 60 )

row_data = pd.read_csv( data_input_file, sep=";", names=["Depth", "Temp", "Sal"] )

depth = row_data["Depth"]
temp  = row_data["Temp"]
salt  = row_data["Sal"]

#============================================================================

year_f  = date_f[0:4]
month_f = date_f[4:6]
day_f   = date_f[6:8]

year_b  = date_b[0:4]
month_b = date_b[4:6]
day_b   = date_b[6:8]

hour_f   = time_f.split(":")[0]
minute_f = time_f.split(":")[1]

date_f_plot = year_f+"-"+month_f+"-"+day_f
date_b_plot = year_b+"-"+month_b+"-"+day_b

temp_max = max(temp)
temp_min = min(temp)

salt_max  = max(salt)
salt_min  = min(salt)

depth_max = max(depth)
depth_min = min(depth)

#========================= Plot =====================================

fig = plt.figure( figsize=(12,10) )

ax1 = fig.add_subplot( 111, label="1")
ax2 = fig.add_subplot( 111, label="2", frame_on=False)

fig.suptitle( "SHYFEM forecast run: "+date_b_plot+" "+time_b+" UTC  +"+hours_plus+":"+minutes_plus+"h\n\n", fontsize=20 )

ax1.set_title( "Node: "+node_name+"  lat: "+latitude+"°N lon: "+longitude+"°E  Depth: "+str(depth_min)+"-"+str(depth_max)+" m", fontsize=12, color="black", loc="center", pad=38.0)
ax1.set_ylim( depth_max+1, 0.)
ax1.set_xlabel("Temperature [°C]", fontsize=15 )
ax1.set_ylabel("Depth [m]", fontsize=15 )
line1, = ax1.plot( temp , depth , 'r-', marker='o', markersize=7.0, markeredgewidth=0.5, markerfacecolor='red', markeredgecolor='black', label="Temperature" )
ax1.grid(True)

#======================================================================

ax2.set_ylim( depth_max+1, 0.)
ax2.set_xlabel("Salinity [PSU]", fontsize=15, labelpad=2 )
ax2.xaxis.tick_top()
ax2.xaxis.set_label_position('top') 
line2, = ax2.plot( salt , depth , "g-", linestyle='-', marker='^', markersize=7.0, markeredgewidth=0.5, markerfacecolor='green', markeredgecolor='black', label="Salinity" )
ax2.legend(handles=[line1, line2])

plt.savefig( output_dir+"/"+output_file )

plt.close(fig)
