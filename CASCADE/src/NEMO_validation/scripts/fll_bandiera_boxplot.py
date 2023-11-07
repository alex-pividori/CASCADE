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


for period in ["season1","season2","season3","season4","tot"]:

    data_meas_plot = data_meas_t[["year","month","day","temp"]].iloc[ [ i for i in range( len(data_meas_t.index ) ) \
                             if ( seas_mon_inf[period] <= int(data_meas_t[["month"]].iloc[i]) <= seas_mon_sup[period] ) ] ] 

    data_model_plot = data_model[["date","value"]].iloc[ [ i for i in range( len(data_model.index) ) \
                             if ( seas_mon_inf[period] <= int(str(data_model[["date"]].iloc[i]).split("-")[1]) <= seas_mon_sup[period] ) ] ]


    delta = []
    season_label = { "season1":"Jan-Feb-Mar", "season2":"Apr-May-Jun","season3":"Jul-Aug-Sep","season4":"Oct-Nov-Dec", "tot":"Annual" }

    for i in range( len( data_model_plot.index ) ):

        date    = data_model_plot["date"].iloc[i]
        year_2d = int(date.split("-")[0][2:4])
        month   = int(date.split("-")[1])
        day     = int(date.split("-")[2])
     
        try:
            meas_val = float( data_meas_plot["temp"].iloc[ np.array( (data_meas_plot[["year","month","day"]] == [ year_2d, month, day ] ).all(axis=1) ) ] )
            if ( not np.isnan( meas_val )  ):
                delta.append( float("{:.2f}".format( float(data_model_plot["value"].iloc[i]) - meas_val ))  )
        except:
            pass


    fig , ax = plt.subplots(figsize=(20,15))

    plt.title("NEMO: T(model)-T(meas)\n Data: Molo fll. Bandiera Period: "+season_label[period]+" Depth= 0.5 m" , fontsize=30, fontdict={'family':'serif'} )
    plt.xlabel("Depth[m]", fontsize=25 )
    plt.ylabel("Th-Tm [C]", fontsize=25 )
    plt.xticks(fontsize=18 )
    plt.yticks(fontsize=18 )
    plt.grid( linestyle='--')
    plt.axis([ -6, 6, -10 , 10 ])
    plt.hlines( 0, -6, 6, linestyle="--", linewidth=1.8 )


    plt.boxplot( (delta), positions=[0.5],  widths=0.5, patch_artist=True, showmeans=True, showfliers=True, medianprops={"color": "black", "linewidth": 3. }, \
          boxprops={"facecolor": "r", "edgecolor": "black","linewidth": 0.5}, whiskerprops={"color": "black", "linewidth": 2. },\
               capprops={"color": "black", "linewidth": 2. }, meanprops={ "markerfacecolor": "blue", "marker":"o" , "markersize":10., "markeredgecolor":'black' },   \
                manage_ticks=False  )


    plt.savefig( output_dir+"/boxplot_delta_T_fll-bandiera_"+period+".png" )

    plt.close(fig)
