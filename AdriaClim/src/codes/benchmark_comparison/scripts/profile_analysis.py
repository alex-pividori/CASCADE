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
var            = sys.argv[11]   # in this version code stat_index and var are useless
stat_index     = sys.argv[12]   # in this version code stat_index and var are used only in the head

# var and statistical index are saved in 'general.txt' and passed as sys.argv
#==============================================================================================

with open( 'profile_temp-sal_tmp.txt' ) as f:
    lines = f.readlines()

for i in range(len(lines)):
    lines[i] = lines[i].strip()   # remves the \n at the end of the strings

"""
if ( stat_index == "mean" ):
	data_index     = format( np.mean(data_np)   , '.2f' )
elif (stat_index == "median" ):
	data_index     = format( np.median(data_np) , '.2f' )
else:
	print("stat_index not supported")
	exit(1)
"""

if ( serial_code == "BENCHMARK" ):
	file_name_csv="/lustre/arpa/scratch/benchmark_validation_tmp/temp-sal_"+node+"_"+period+"_benchmark.csv"
else:
	file_name_csv="/lustre/arpa/scratch/benchmark_validation_tmp/temp-sal_"+node+"_"+period+".csv"

# If the file dosn't exists, it will be created with the first line as header
if ( not os.path.exists( file_name_csv ) ):
	with open( file_name_csv , 'w') as f_out:
		f_out.write("Level; "+stat_index+" Temp; "+stat_index+" Sal; year; Period; Serial-code; RCP; node\n")

# append data
with open( file_name_csv , 'a') as f_out:
        for j in range(0,22):   # depht levels are 22: from 0 to 21
              f_out.write( lines[j]+";"+str( int(year_in) + 5 )+";"+period+";"+serial_code+";"+RCP+";"+node+"\n" )

