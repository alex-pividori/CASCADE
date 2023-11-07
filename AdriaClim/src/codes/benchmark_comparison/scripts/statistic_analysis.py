import numpy  as np
import sys
import os.path

period         = sys.argv[1]
serial_code    = sys.argv[2]
node           = sys.argv[3]
RCP            = sys.argv[4]
year_in        = sys.argv[5]
year_fin       = sys.argv[6]
lat_n          = sys.argv[7]
lon_n          = sys.argv[8]
global_model   = sys.argv[9]
regional_model = sys.argv[10]
var            = sys.argv[11]

if   ( var == "temperature" ):
	var_label = "temp"
elif ( var == "salinity"    ):
	var_label = "sal"
elif ( var == "water_level" ):
	var_label = "zos"
else:
	print("\""+var+"\" string not allowed")
	exit(1)

#==============================================================================================

with open('data_tmp.txt') as f:
    lines = f.readlines()

data = []*len(lines)
for i in range(len(lines)):
	data.append( float(lines[i]) )

data_np       =         np.array(data)

data_mean     = format( np.mean(data_np) , '.2f' )
data_quantile =         np.quantile(data_np, q=[0.05,0.25,0.50,0.75,0.95] ) 
data_min      = format( np.min(data_np) , '.2f' )
data_max      = format( np.max(data_np) , '.2f' )

period_label = [ "year", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ]

file_name_csv="/lustre/arpa/AdriaClim/data/benchmark_comparison/simulation_indexes/"+\
               var_label+"_"+serial_code+"_rcp"+RCP+"_"+year_in+"_"+year_fin+"_"+node+"_"+global_model+"_"+regional_model+".csv"

if ( not os.path.exists( file_name_csv ) ):
	with open( file_name_csv , 'w') as f_out:
		f_out.write("Field; Period; Period-label; Decade; Serial-code; RCP; 5th; 25th; 50th; 75th; 95th; min; max; mean; node; lat; lon; global model; regional model\n")

f_out = open(      file_name_csv , 'a') 

f_out.write( var_label+";"+format( int(period), '02d' )+";"+period_label[int(period)]+";"+year_in+"-"+year_fin+";"+serial_code+";"+RCP+";"\
             +format( data_quantile[0], '.2f' )+";"+format( data_quantile[1], '.2f' )+";"\
             +format( data_quantile[2], '.2f' )+";"+format( data_quantile[3], '.2f' )+";"+format( data_quantile[4], '.2f' )+";"\
             +data_min+";"+data_max+";"+data_mean+";"+node+";"+lat_n+";"+lon_n+";"+global_model+";"+regional_model+"\n")

f_out.close()
