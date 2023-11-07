import matplotlib.pyplot as plt
import sys
import os.path

var        = sys.argv[1]
node       = sys.argv[2]
stat_index = sys.argv[3]

data_arc_dir="/lustre/arpa/scratch/benchmark_validation_tmp"
output_arc_dir="/lustre/arpa/AdriaClim/data/benchmark_comparison/boxplot_delta"

#____________________________________________________

if ( var == "temperature" ):
        var_label = "temp"
elif( var == "salinity"):
        var_label = "sal"
elif( var == "water_level"):
        var_label = "zos"
else:
        print("var label not correct")
        exit(1)

#=====================================================
#              Data extraction
#====================================================

var85_2030 = []
var85_2040 = [] 
var85_2050 = []
var85_2060 = []
var85_2070 = []
var85_2080 = []
var85_2090 = []

var45_2030 = []
var45_2040 = []
var45_2050 = []
var45_2060 = []
var45_2070 = []
var45_2080 = []
var45_2090 = []

var26_2030 = []
var26_2040 = []
var26_2050 = []
var26_2060 = []
var26_2070 = []
var26_2080 = []
var26_2090 = []

benchmark_constant = []

#****************** Benchmark constant ****************

with open( data_arc_dir+"/"+var_label+"_"+node+"_benchmark.csv"  ) as f:
    lines_bm = f.readlines()
f.close()

for i in range(1, len(lines_bm) ):                            # the 0th line is the head of the file, so it doesn't contains data values. Dicember line correspond to the 13th line
	benchmark_constant.append( lines_bm[i].split(";")[5] )   # benchmark constant is a list with: annual, Jan, Feb, Mar ecc mean values

#****************** Data reading **********************

with open( data_arc_dir+"/"+var_label+"_"+node+".csv"  ) as f:
    lines = f.readlines()
f.close()

for i in range(1, len(lines) ):
	RCP_val  = lines[i].split(";")[4]
	year_val = lines[i].split(";")[1]
	value    = lines[i].split(";")[5]
	period   = lines[i].split(";")[2]
	if ( value == "nan" ):
		continue
	bm_val = benchmark_constant[ int(period) - 1 ]
	eval( "var"+RCP_val+"_"+year_val+".append("+value+" - "+bm_val+" )" )

#=====================================================
#                 Boxplot creation
#=====================================================

#*************** y-axis range *******************

if   ( var_label == "temp" ):
	y_inf = -1
	y_sup =  3.5
	y_axis_label = "Delta sea surface temperature [$°C$]"
	title_label = "Temperature"
elif ( var_label == "sal" ):
	y_inf = -1
	y_sup =  2
	y_axis_label = "Delta sea surface salinity [$PSU$]"
	title_label = "Salinity"
elif ( var_label == "zos" ):
        y_inf = -0.15
        y_sup =  0.25
        y_axis_label = "Delta sea water height [$m$]"
        title_label = "sea level"
elif ( var_label == "tasmin" ):
        y_inf = -3
        y_sup =  6
        y_axis_label = "Daily Minimum Near-Surface Air Temperature [$°C$]"

if ( stat_index == "mean" ):
	stat_index_acr = "dmm"
elif (stat_index == "median" ):
	stat_index_acr = "dme"
else:
	print("stat_index not valid")
	exit(1)
#======================================================

Mod85_n = len(var85_2030) // ( len(lines_bm) - 1 )   # every 13 values (yearly + 12 months) there is one model 
Mod45_n = len(var45_2030) // ( len(lines_bm) - 1 )
Mod26_n = len(var26_2030) // ( len(lines_bm) - 1 )

if ( Mod85_n == 0 and Mod45_n == 0 and Mod26_n == 0  ):
        print("The values are all missing: the plot can't be done")
        exit(1)

#==========================================================

fig , ax = plt.subplots(figsize=(20,15))

plt.title( title_label.capitalize()+" monthly "+stat_index.capitalize()+" difference of all scenario respect to 2018 \n benchmark at point: "+node+"\n" , fontsize=30, fontdict={'family':'serif'} )
plt.xlabel("Decade", fontsize=25 )
plt.ylabel( y_axis_label, fontsize=25 )
plt.xticks(fontsize=18 )
plt.yticks(fontsize=18 )
plt.grid( linestyle='--')
plt.axis([ 0 , 22 , y_inf , y_sup ])
plt.hlines( 0. , -1. , +25. , linestyle="--", linewidth=1.8 )


bp85 = ax.boxplot( ( var85_2030 , var85_2040 , var85_2050 , var85_2060 , var85_2070 , var85_2080 , var85_2090 )  , 
                positions=[ 2.7, 5.7, 8.7, 11.7, 14.7, 17.7, 20.7], widths=0.5, patch_artist=True,
                showmeans=True, showfliers=True,
                medianprops={"color": "black", "linewidth": 3. },
                boxprops={"facecolor": "r", "edgecolor": "black",
                          "linewidth": 0.5},
                whiskerprops={"color": "black", "linewidth": 2. },
                capprops={"color": "black", "linewidth": 2. } ,
                meanprops={ "markerfacecolor": "blue", "marker":"o" , "markersize":10., "markeredgecolor":'black' } ,
                labels=("","","","","","","") , manage_ticks=False ) 


bp45  = ax.boxplot( ( var45_2030 , var45_2040 , var45_2050 , var45_2060 , var45_2070 , var45_2080 , var45_2090 )  ,
               positions=[ 2, 5, 8, 11, 14, 17, 20], widths=0.5, patch_artist=True,
                showmeans=True, showfliers=True,
                medianprops={"color": "black", "linewidth": 3. },
                boxprops={"facecolor": "yellow", "edgecolor": "black",
                          "linewidth": 0.5},
                whiskerprops={"color": "black", "linewidth": 2. },
                capprops={"color": "black", "linewidth": 2. } ,
                meanprops={"markerfacecolor": "blue", "marker":"o" , "markersize":10. , "markeredgecolor":'black' } ,
                labels=("2025-2035","2035-2045","2045-2055","2055-2065","2065-2075","2075-2085","2085-2095") )

bp26 = ax.boxplot( ( var26_2030 , var26_2040 , var26_2050 , var26_2060 , var26_2070 , var26_2080 , var26_2090 )  ,
                positions=[ 1.3, 4.3, 7.3, 10.3, 13.3, 16.3, 19.3], widths=0.5, patch_artist=True,
                showmeans=True, showfliers=True,
                medianprops={"color": "black", "linewidth": 3. },
                boxprops={"facecolor": "chartreuse", "edgecolor": "black",
                          "linewidth": 0.5},
                whiskerprops={"color": "black", "linewidth": 2. },
                capprops={"color": "black", "linewidth": 2. } ,
                meanprops={ "markerfacecolor": "blue", "marker":"o" , "markersize":10., "markeredgecolor":'black' } ,
                labels=("","","","","","","") , manage_ticks=False )

ax.legend( [ bp85["boxes"][0] , bp45["boxes"][0] , bp26["boxes"][0] , bp26["means"][0] ] , 
        ['Ensemble RCP 8.5 - N.sim='+str(Mod85_n), 'Ensemble RCP 4.5 - N.sim='+str(Mod45_n), 'Ensemble RCP 2.6 - N.sim='+str(Mod26_n), 'Ensemble mean' ],   loc=2 , fontsize="x-large" )


plt.savefig( output_arc_dir+"/"+stat_index_acr+"_boxplot_delta_"+var_label+"_"+node+".png" )

plt.close(fig)
