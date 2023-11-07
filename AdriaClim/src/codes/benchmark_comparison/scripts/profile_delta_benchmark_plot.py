import matplotlib.pyplot as plt
import sys
import os.path

node       = sys.argv[1]
period     = sys.argv[2]
stat_index = sys.argv[3]

data_arc_dir="/lustre/arpa/scratch/benchmark_validation_tmp"
output_arc_dir="/lustre/arpa/AdriaClim/data/benchmark_comparison/profile_delta"

#=============================================
#              Data extraction
#=============================================

temp_bm  = []
sal_bm   = []

temp_val = []
sal_val  = []

depth = [0]
depth_real = []

delta_temp = []
delta_sal  = []

#****************** Benchmark constant ****************

with open( data_arc_dir+"/temp-sal_"+node+"_"+period+"_benchmark.csv"   ) as f:
    lines_bm = f.readlines()

with open( data_arc_dir+"/temp-sal_"+node+"_"+period+".csv"  ) as f_val:
    lines_val = f_val.readlines()

for i in range(1, len(lines_bm) ):                           # the 0th line is the head of the file, so it doesn't contains data values. Dicember line correspond to the 13th line
	if ( float( lines_bm[i].split(";")[1] ) == 0.0 or float( lines_bm[i].split(";")[1] ) == -999 ):
		continue
	temp_bm.append( float( lines_bm[i].split(";")[1] ) ) # benchmark constant is a list with: annual, Jan, Feb, Mar ecc mean values
	sal_bm.append(  float( lines_bm[i].split(";")[2] ) )
	depth.append(   float( lines_bm[i].split(";")[0] ) )

for i in range( len(depth) - 1 ):                            # len(depth) is 23: 22 + the initial inserted before
                depth_real.append( ( float(depth[i]) + float(depth[i+1])) / 2.0 )

#================================================================================================================================================================================

for k in range(1,75):      # 100 is the maximum number of simulations

	temp_val = []
	sal_val  = []

	delta_temp = []
	delta_sal  = []

	last_serial_code = "1997F100D0_D1{:02}".format(k)
	print("I'm working with:", last_serial_code)

	for i in range(1, len(lines_val) ):       # the 0th line is the head of the file, so it doesn't contains data values. Dicember line correspond to the 13th line
		if ( (( float( lines_val[i].split(";")[1] ) == 0.0  or float( lines_val[i].split(";")[1] ) == -999) and (float( lines_val[i].split(";")[2] ) == 0.0 or float( lines_val[i].split(";")[2] ) == -999 )) and ( lines_val[i].split(";")[5] == last_serial_code )  ):
			break    # the condition lines_val[i].split(";")[5] == last_serial_code guarantee that the cycle doesn't break at a missing value of a 
                                 # serial_code simulation already analysed
		if ( lines_val[i].split(";")[5] == last_serial_code ):
			temp_val.append( float( lines_val[i].split(";")[1] ) )   # benchmark constant is a list with: annual, Jan, Feb, Mar ecc mean values
			sal_val.append(  float( lines_val[i].split(";")[2] ) )
		
	if ( len(temp_val) == 0 ):
		continue

#****************** Data reading **********************

	RCP_val     = lines_val[i].split(";")[6]
	year_val    = lines_val[i].split(";")[3]
	serial_code = last_serial_code

#=====================================================
#                 Plot creation
#=====================================================

#*************** y-axis range *******************

	temp_min = min( temp_bm + temp_val )
	temp_max = max( temp_bm + temp_val )

	sal_min = min( sal_bm + sal_val )
	sal_max = max( sal_bm + sal_val )

	if ( stat_index == "mean" ):
		stat_index_acr = "dmm"
	elif (stat_index == "median" ):
		stat_index_acr = "dme"
	else:
		print("stat_index not valid")
		exit(1)

	months = ["January","February","March","April","May","June","July","August","September","October","November","December"]

#************** Deltas ***************

	for i in range( len(temp_bm) ):
		delta_temp.append( temp_val[i] - temp_bm[i] )
		delta_sal.append( sal_val[i]  - sal_bm[i] )

	delta_temp_lim = max( [abs(ele) for ele in delta_temp] )
	delta_sal_lim  = max( [abs(ele) for ele in delta_sal ] )

#==========================================================
#fig , ax = plt.subplots(figsize=(20,15))

	fig=plt.figure(figsize=(18,16))
	ax=fig.add_subplot( 121, label="1")
	ax2=fig.add_subplot(121, label="2", frame_on=False)
	ax3=fig.add_subplot(121, label="3", frame_on=False)
	ax4=fig.add_subplot(121, label="4", frame_on=False)

	plt.suptitle( "Temperature and Salinity "+months[int(period)-1].capitalize()+" monthly "+stat_index.capitalize()+" profiles:\nBenchmark=2018, Point="+node+", Serial Code="+serial_code+", RCP="+RCP_val[0]+"."+RCP_val[1]+", Period="+str(int(year_val)-5)+"-"+str(int(year_val)+5)+"\n\n" , fontsize=23, fontdict={'family':'serif'} , y=0.995)

	ax.set_title("Absolute Temperature and Salinity profile\n\n", fontsize=20, color="blue")
	ax.set_xlabel("Temperature [°C]", fontsize=20 )
	ax.set_ylabel("Depth [m]"       , fontsize=20 )
	ax.tick_params(axis='x', labelsize=18 )
	ax.tick_params(axis='y', labelsize=18 )
	ax.set_ylim( bottom=max(depth_real)+1 , top=min(depth_real)-0.6 )
	ax.set_xlim( left=temp_min-0.3 , right=temp_max+0.3 )
	line1, = ax.plot( temp_val , depth_real , 'r-', linewidth=2.5 ,label="Temperature [°C]" )
	ax.plot( temp_val , depth_real , linestyle='', marker='o', markersize=8.0, markeredgewidth=0.5, markerfacecolor='red', markeredgecolor='black')

	ax2.set_xlabel("Salinity [PSU]", fontsize=20 )
	ax2.tick_params(axis='x', labelsize=18 )
	ax2.tick_params(axis='y', labelsize=18 )
	ax2.xaxis.set_label_position('top')
	ax2.set_xlim( left=sal_min-0.3 , right=sal_max+0.3 )
	ax2.set_ylim( bottom=max(depth_real)+1 , top=min(depth_real)-0.6 )
	ax2.xaxis.tick_top()
	ax2.grid(  linestyle="--" )
	line2, = ax2.plot( sal_val , depth_real , 'g-',linewidth=2.5 , label="Salinity [PSU]" )
	ax2.plot( sal_val , depth_real , linestyle='', marker='o', markersize=8.0, markeredgewidth=0.5, markerfacecolor='green', markeredgecolor='black')

	line3, = ax3.plot( temp_bm , depth_real , 'r--', linewidth=2.5 , label="Bench. Temp [°C]" )
	ax3.set_ylim( bottom=max(depth_real)+1 , top=min(depth_real)-0.6 )
	ax3.set_xlim( left=temp_min-0.3 , right=temp_max+0.3 )
	ax3.set_axis_off()

	line4, = ax4.plot( sal_bm , depth_real , 'g--', linewidth=2.5 ,label="Bench. Sal [PSU]" )
	ax4.set_ylim( bottom=max(depth_real)+1 , top=min(depth_real)-0.6 )
	ax4.set_xlim( left=sal_min-0.3 , right=sal_max+0.3 )
	ax4.set_axis_off()
	ax4.legend(handles=[line1,line3,line2,line4], fontsize="x-large", loc="best")

#========================== Second plot =============================

	ax5=fig.add_subplot(122, label="5")
	ax6=fig.add_subplot(122, label="6", frame_on=False )

	ax5.set_title("Scenario value - Benchmark value\n\n", fontsize=20, color="blue")
	ax5.set_xlabel("Delta Temperature [°C]", fontsize=20 )
	ax5.set_ylabel("Depth [m]"             , fontsize=20 )
	ax5.tick_params(axis='x', labelsize=18 )
	ax5.tick_params(axis='y', labelsize=18 )
	ax5.set_ylim( bottom=max(depth_real)+1 , top=min(depth_real)-0.6 )
	ax5.set_xlim( left=-delta_temp_lim-0.3 , right=delta_temp_lim+0.3 )
	line5, = ax5.plot( delta_temp , depth_real , 'r-', linewidth=2.5 ,label="Delta Temp [°C]" )
	ax5.plot( delta_temp , depth_real , linestyle='', marker='o', markersize=8.0, markeredgewidth=0.5, markerfacecolor='red', markeredgecolor='black')

	ax6.set_xlabel("Delta Salinity [PSU]", fontsize=20 )
	ax6.set_ylabel("Depth [m]"           , fontsize=20 )
	ax6.tick_params(axis='x', labelsize=18 )
	ax6.tick_params(axis='y', labelsize=18 )
	ax6.set_ylim( bottom=max(depth_real)+1 , top=min(depth_real)-0.6 )
	ax6.set_xlim( left=-delta_sal_lim-0.3 , right=delta_sal_lim+0.3 )
	ax6.xaxis.tick_top()
	ax6.xaxis.set_label_position('top')
	ax6.grid(  linestyle="--" )
	ax6.vlines(0.0, -10 , 100, linestyles="dashed", linewidth=2.5, color="black" )
	line6, = ax6.plot( delta_sal , depth_real , 'g-', linewidth=2.5 ,label="Delta Sal [PSU]" )
	ax6.plot( delta_sal , depth_real , linestyle='', marker='o', markersize=8.0, markeredgewidth=0.5, markerfacecolor='green', markeredgecolor='black')

	ax6.legend( handles=[line5,line6], fontsize="x-large", loc="best" )

	plt.savefig( output_arc_dir+"/"+stat_index_acr+"_profile_"+node+"_"+"{:02d}".format( int(period) )+"_"+serial_code+".png" )

	plt.close(fig)

	del temp_val 
	del sal_val 
	del delta_temp 
	del delta_sal
