import matplotlib.pyplot as plt
import numpy as np
import sys
import os.path
import pandas as pd

point_name  = sys.argv[1]
season_lab  = sys.argv[2]     # Jan-Feb-Mar, Apr-May-Jun, ..., Annual
season_name = sys.argv[3]     # season1, season2, season3 ... tot
input_dir   = sys.argv[4]
output_dir  = sys.argv[5]

#===============================================================================
#                                Data analysis
#===============================================================================

info_file = pd.read_csv( input_dir+"/selected_T_files_bydepth.txt", sep=";", header=None )
level     = { 0:"top", 2:"middle", 4:"bottom" }

for i in range(0, 5, 2):

    if ( i+1 > len(info_file[0]) or info_file[0][i] == "" ):
        continue   

    data_values = pd.read_csv( input_dir + "/" + info_file[0][i], sep=";", header=None )
    measures    = list( data_values[6] )
    model_val   = list( data_values[7] )

    n_mod = len( model_val )
    n_ref = len( measures )
   
    measures.sort()
    model_val.sort()

    ECDF_y   = np.arange(1, n_mod + 1) / n_mod
    ECDF_ref = np.arange(1, n_ref + 1) / n_ref

#====================================================
#                     Plot
#====================================================

    x_sup = max( max(measures), max(model_val) )
    x_inf = min( min(measures), min(model_val) )

    fig , ax = plt.subplots( figsize=(20,15) )

    plt.title("ECDFs for water temperature at: "+point_name+" in "+season_lab+" period, depth: "+str(info_file[1][i])+"÷"+str(info_file[2][i])+"m\n", fontsize=28, fontdict={'family':'serif'} )
    plt.xlabel("Temperature [°C]", fontsize=23 )
    plt.ylabel( "Empirical cumulative distribution function", fontsize=23 )
    plt.xticks(fontsize=18 )
    plt.yticks(fontsize=18 )
    plt.grid( linestyle='--')
    plt.hlines( 0.25 , -1. , +40 , linestyle="--", linewidth=1.5 , color="black" )
    plt.hlines( 0.50 , -1. , +40 , linestyle="--", linewidth=1.5 , color="black" )
    plt.hlines( 0.75 , -1. , +40 , linestyle="--", linewidth=1.5 , color="black" )
    plt.text( x_sup+1, 0.25, 'First quartile', fontsize="xx-large" , ha ='right', va ='bottom')
    plt.text( x_sup+1, 0.50, 'Median'        , fontsize="xx-large" , ha ='right', va ='bottom')
    plt.text( x_sup+1, 0.75, 'Third quartile', fontsize="xx-large" , ha ='right', va ='bottom')
    plt.axis( [ x_inf - 1, x_sup + 1, 0 , 1.0] )

    plt.plot( model_val, ECDF_y  , linestyle='-', linewidth=2.5, color="red",   label="ECDF: NEMO model" )
    plt.plot( measures,  ECDF_ref, linestyle='-', linewidth=2.5, color="green", label="ECDF: in-situ measures" )

    plt.legend( loc='lower right', fontsize="xx-large", facecolor="white" , framealpha=1.0 )

    plt.savefig( output_dir+"/ecdf_temp_"+point_name+"_"+season_name+"_"+level[i]+".png" )
    plt.close(fig)
