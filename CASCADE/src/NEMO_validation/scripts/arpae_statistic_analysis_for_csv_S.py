import numpy  as np
import sys
import os.path
import pandas as pd

point_name  = sys.argv[1]
season_lab  = sys.argv[2]     # Jan-Feb-Mar, Apr-May-Jun, ..., Annual
season_name = sys.argv[3]     # season1, season2, season3 ... tot
input_dir   = sys.argv[4]
output_dir  = sys.argv[5]

file_name_csv = output_dir+"/arpae_NEMO_validation_model_vs_measures.csv"

#==============================================================================================

info_file = pd.read_csv( input_dir+"/selected_S_files_bydepth.txt", sep=";", header=None )


for i in range(0, 5, 2):    # i values are 0, 2 and 4

    if ( i+1 > len(info_file[0]) or info_file[0][i] == "" ):
        continue

#************** file reading ****************
    data_values = pd.read_csv( input_dir + "/" + info_file[0][i], sep=";", header=None )

    measures    = np.array( data_values[6] )
    model_val   = np.array( data_values[7] )


    measures_mean     = format( np.mean( measures ), '.2f' )
    measures_quantile =         np.quantile( measures, q = [0.25,0.50,0.75] )

    model_mean        = format( np.mean(model_val), '.2f' )
    model_quantile =         np.quantile(model_val, q = [0.25,0.50,0.75] )

    lat = str(format( data_values[1][0], '.2f'))
    lon = str(format( data_values[2][0], '.2f'))

    if ( not os.path.exists( file_name_csv ) ):
        with open( file_name_csv , 'w') as f_out:
           f_out.write("Field; Point-name; lat; lon; Period; 25th_meas; 50th_meas; 75th_meas; Mean-meas; 25th_model; 50th_model; 75th_model; Mean-model; Delta-mean; Delta-median; level\n")

    with open( file_name_csv , 'a') as f_out1:
        f_out1.write( "sal"+";"+point_name+";"+lat+";"+lon+";"+season_lab+";"\
                 +str( format(measures_quantile[0], '.2f'))+";"+str( format(measures_quantile[1], '.2f'))+";"\
                 +str( format(measures_quantile[2], '.2f'))+";"+str( measures_mean )+";"+str( format(model_quantile[0], '.2f'))+";"+str( format(model_quantile[1], '.2f'))+";"\
                 +str( format(model_quantile[2],    '.2f'))+";"+str( model_mean    )+";"+str( format( float(model_mean) - float(measures_mean), '.2f') )+";"\
                 +str( format( float(model_quantile[1]) - float(measures_quantile[1]) , '.2f') )+";"+str(info_file[1][i])+"-"+str(info_file[2][i])+"\n" )
