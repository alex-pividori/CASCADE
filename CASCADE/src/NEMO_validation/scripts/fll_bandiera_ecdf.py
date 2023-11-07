import numpy as np
import pandas as pd
import matplotlib.pyplot as plt

input_dir_m = "/lustre/arpa/CASCADE/data/ARPA-FVG_measures"
file_name_m = "TRI_h.txt"

input_dir_model   = "/lustre/arpa/AdriaClim/data/ERDDAP"
file_name_model   = "fll_bandiera.txt"
output_dir        = "/lustre/arpa/AdriaClim/public_html/Med_CORDEX_analysis/SCENARIO/NEMO_validation"

data_meas  = pd.read_csv( input_dir_m+"/"+file_name_m, sep="\s+", names=["st_n", "year","month","day","time","temp"], comment="#", na_values=-99.0 )
data_model = pd.read_csv( input_dir_model+"/"+file_name_model, sep="\s+" ) # name    lon    lat       date     time    value

#=========================================================================================

data_meas_t = data_meas[["st_n", "year","month","day","time","temp"]][ np.array( data_meas[["time"]][:] == 12.00 ) ]

#print(  (( data_meas_t[["year","month","day"]] == [ 94, 4, 1 ] ).all(axis=1) ).head(50) ) 


# 0 is jan-feb-mar, 1 is apr-may-jun, 2 is ...
# 4 is the total period (annual)

seas_mon_inf = { "season1":1, "season2":4, "season3":7, "season4":10, "tot":1 }
seas_mon_sup = { "season1":3, "season2":6, "season3":9, "season4":12, "tot":12 }


for period in ["tot"]:

    data_meas_plot = data_meas_t[["year","month","day","temp"]].iloc[ [ i for i in range( len(data_meas_t.index ) ) \
                             if ( seas_mon_inf[period] <= int(data_meas_t[["month"]].iloc[i]) <= seas_mon_sup[period] ) ] ] 

    data_model_plot = data_model[["date","value"]].iloc[ [ i for i in range( len(data_model.index) ) \
                             if ( seas_mon_inf[period] <= int(str(data_model[["date"]].iloc[i]).split("-")[1]) <= seas_mon_sup[period] ) ] ]


    data_meas  = []
    data_model = []
    season_label = { "season1":"Jan-Feb-Mar", "season2":"Apr-May-Jun","season3":"Jul-Aug-Sep","season4":"Oct-Nov-Dec", "tot":"Annual" }

    for i in range(0, len( data_model_plot.index ) ):

        date    = data_model_plot["date"].iloc[i]
        year_2d = int(date.split("-")[0][2:4])
        month   = int(date.split("-")[1])
        day     = int(date.split("-")[2])
     
        try:
            meas_val = float( data_meas_plot["temp"].iloc[ np.array( (data_meas_plot[["year","month","day"]] == [ year_2d, month, day ] ).all(axis=1) ) ] )
            if ( not np.isnan( meas_val )  ):
                data_model.append( float("{:.2f}".format( float(data_model_plot["value"].iloc[i])  ))  )
                data_meas.append( float( meas_val )) 
        except:
            pass

   
    n_mod = len( data_model )
    n_ref = len( data_meas  )

    
    data_model.sort()
    data_meas.sort()

    ECDF_y   = np.arange(1, n_mod + 1) / n_mod
    ECDF_ref = np.arange(1, n_ref + 1) / n_ref
                 
    season_lab = { "season1":"Jan-Feb-Mar", "season2":"Apr-May-Jun","season3":"Jul-Aug-Sep","season4":"Oct-Nov-Dec", "tot":"Annual" } 

    x_sup = max( max(data_meas), max(data_model) )
    x_inf = min( min(data_meas), min(data_model) )

    fig , ax = plt.subplots( figsize=(20,15) )

    plt.title("ECDFs for water temperature at: Molo fll. Bandiera in "+season_lab[period]+" period, depth: 0.5m\n", fontsize=28, fontdict={'family':'serif'} )
    plt.xlabel("Temperature [C]", fontsize=23 )
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

    plt.plot( data_model, ECDF_y  , linestyle='-', linewidth=2.5, color="red",   label="ECDF: NEMO model" )
    plt.plot( data_meas,  ECDF_ref, linestyle='-', linewidth=2.5, color="green", label="ECDF: in-situ measures" )

    plt.legend( loc='lower right', fontsize="xx-large", facecolor="white" , framealpha=1.0 )

    plt.savefig( output_dir+"/ecdf_temp_fll-bandiera_"+period+"_top.png" )
    plt.close(fig)

