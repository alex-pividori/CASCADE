import matplotlib.pyplot as plt
import pandas as pd
import numpy  as np
import sys
from   datetime import datetime
from   datetime import timedelta
import matplotlib.dates as mdates


zeta_input_file = sys.argv[1]
output_dir      = sys.argv[2]
node_name       = sys.argv[3]
day_in          = sys.argv[4]
day_fin         = sys.argv[5]
time_in         = sys.argv[6]
time_fin        = sys.argv[7]
date_b          = sys.argv[8]
time_b          = sys.argv[9]
longitude       = sys.argv[10]
latitude        = sys.argv[11]
output_file     = sys.argv[12]
Bathymetry      = sys.argv[13]

# ===============================================================================================

data_zeta  = pd.read_csv( zeta_input_file, sep='\s+', header=None, parse_dates=[0], comment='#', date_parser=lambda x: datetime.strptime( x, "%Y-%m-%d::%H:%M:%S" ), index_col=0 )


bulletin_date    = datetime.strptime( date_b+"::"+time_b+":00", "%Y%m%d::%H:%M:%S")
date_in          = datetime.strptime( date_b+"::"+time_in , "%Y%m%d::%H:%M" ) + timedelta( days=int(day_in)  )
date_fin         = datetime.strptime( date_b+"::"+time_fin, "%Y%m%d::%H:%M" ) + timedelta( days=int(day_fin) )

delta_t          = date_in - bulletin_date

hours_plus       =  "{:02}".format(   delta_t.days*24 + ( delta_t.seconds // 3600 ))
minutes_plus     =  "{:02}".format( ( delta_t.seconds % 3600 ) // 60 )

delta_t_fin      = date_fin - bulletin_date

hours_plus_fin   =  "{:02}".format(   delta_t_fin.days*24 + ( delta_t_fin.seconds // 3600 ))
minutes_plus_fin =  "{:02}".format( ( delta_t_fin.seconds % 3600 ) // 60 )

b = 0
for i in range(len(data_zeta.index)):
    if ( date_in <= data_zeta.index[i] <= date_fin ):
        i_max = i
        if (b == 0):
            i_min = i
            b = 1

# ========================================== Plot ===========================================

fig = plt.figure( figsize=(12,10) )

plt.suptitle( "Time series of Sea surface height compared to WGS 84 (EPSG:4326).\nSHYFEM forecast run: "+date_b[0:4]+"-"+date_b[4:6]+"-"+date_b[6:8]+"  "+time_b+" UTC   +"
+hours_plus+":"+minutes_plus+"h / +"+hours_plus_fin+":"+minutes_plus_fin+"h", fontsize = 19 )
plt.title( "Node: "+node_name+"         lat: "+latitude+"°N  lon: "+longitude+"°E         Bathymetry: "+Bathymetry+" m" , fontsize=13 )
plt.xlabel( "DateTime [MM-DD\n                  hh:mm]", fontsize=14 )
plt.ylabel( "Sea surface height [m]", fontsize=18 )
plt.xticks( pd.date_range( start=data_zeta.index[i_min].date() , end=data_zeta.index[i_max].date() + timedelta( days=1 ), freq="12H" ), fontsize=14 )
plt.yticks( np.arange( -5, +5, step=0.1), fontsize=16 )
plt.grid( linestyle='--')

plt.plot( data_zeta.index[i_min:(i_max+1)], data_zeta[1][i_min:i_max+1], linewidth=2, color="black", label="Sea surface height" )

#plt.hlines( 0., data_zeta.index[i_min], data_zeta.index[i_max], linestyle='--', linewidth=1.5 )
plt.gca().xaxis.set_major_formatter(mdates.DateFormatter('%m-%d\n%H:%M'))
plt.legend( loc='best', fontsize="x-large", facecolor="white" , framealpha=0.5 )

plt.savefig( output_dir+"/"+output_file )
plt.close(fig)
