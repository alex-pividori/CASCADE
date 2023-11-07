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
stat_index     = sys.argv[12]

# var and statistical index are saved in 'general.txt' and passed as sys.argv
#==============================================================================================

with open('temp_graph_tmp.txt') as f:
    lines = f.readlines()
f.close()


data = []*len(lines)
for i in range(len(lines)):
	data.append( float(lines[i]) )

data_np       =         np.array(data)    # transform the list into a numpy array

if ( stat_index == "mean" ):
	data_index     = format( np.mean(data_np)   , '.2f' )
elif (stat_index == "median" ):
	data_index     = format( np.median(data_np) , '.2f' )
else:
	print("stat_index not supported")
	exit(1)

#data_quantile =         np.quantile(data_np, q=[0.05,0.25,0.50,0.75,0.95] ) 
#data_min      = format( np.min(data_np) , '.2f' )
#data_max      = format( np.max(data_np) , '.2f' )

#period_label = [ "year", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ]

if ( var == "temperature" ):
	var_label = "temp"
elif( var == "salinity"):
	var_label = "sal"
elif( var == "water_level"):
	var_label = "zos"
else:
	print("Var label not correct")
	exit(1)

if ( serial_code == "BENCHMARK" ):
	file_name_csv="/lustre/arpa/scratch/benchmark_validation_tmp/"+var_label+"_"+node+"_benchmark.csv"
else:
	file_name_csv="/lustre/arpa/scratch/benchmark_validation_tmp/"+var_label+"_"+node+".csv"

# If the file dosn't exists, it will be created with the first line as header
if ( not os.path.exists( file_name_csv ) ):
	with open( file_name_csv , 'w') as f_out:
		f_out.write("Field; year; Period; Serial-code; RCP; "+stat_index+"; node\n")

# Every simulation with the same RCP and ran on the same decade adds a 12 lines: one for month
# period is a two digit integer number and indicates the month the data are related with
# period: 00 01 02 03 04 .. 12
f_out = open(      file_name_csv , 'a') 
f_out.write( var_label+";"+str( int(year_in) + 5 )+";"+period+";"+serial_code+";"+RCP+";"+data_index+";"+node+"\n" )
f_out.close()
