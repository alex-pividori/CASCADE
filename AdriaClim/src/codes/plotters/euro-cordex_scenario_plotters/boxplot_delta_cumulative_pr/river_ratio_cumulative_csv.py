from netCDF4 import Dataset as NetCDFFile 
import matplotlib.pyplot as plt
import numpy as np
import bottleneck  
import sys
import os.path
import statistics as stat

point_name  = sys.argv[1]
lat_ref     = float(sys.argv[2])  
lon_ref     = float(sys.argv[3])
RCP         = sys.argv[4]
year_middle = int(sys.argv[5])

data_arc_dir='/lustre/arpa/AdriaClim/data/EURO-CORDEX/FVG' 
output_arc_dir="/lustre/arpa/AdriaClim/public_html/EURO_CORDEX_analysis/SCENARIO/boxplot_delta_cumulative_py"

#============= lat/lon indexes =============

f_nc        =  NetCDFFile( data_arc_dir+"/1_HadGEM2-ES_RACMO22E"+"/postproc/monthly/"+"pr_HadGEM2-ES_RACMO22E_rcp26_mon_future.nc" , mode='r')
lat_proof   =  f_nc.variables['lat'][:]
lon_proof   =  f_nc.variables['lon'][:]


for i in range( len(lat_proof) ):    # starts from 0
        if ( abs(lat_proof[i] - lat_ref ) < 0.01 ):
           lat_idx=i
           break

for i in range( len(lon_proof) ):
        if ( abs(lon_proof[i] - lon_ref ) < 0.01 ):
           lon_idx=i
           break

del lat_proof, lon_proof 
#===========================================

var_01 = []
var_02 = []
var_03 = []
var_04 = []
var_05 = []
var_06 = []
var_07 = []
var_08 = []
var_09 = []
var_10 = []
var_11 = []
var_12 = []

#===== ref =====

ref_01 = []
ref_02 = []
ref_03 = []
ref_04 = []
ref_05 = []
ref_06 = []
ref_07 = []
ref_08 = []
ref_09 = []
ref_10 = []
ref_11 = []
ref_12 = []

#============= Acquisition of variable data from all netCDF set ===============

year_in   = year_middle - 5
year_fin  = year_middle + 5

#============================== MOnthly reference ===============================

# The reference decade is 2010-2020, so the monthly t_start is (2010-2006)*12 = 48

t_start = 48

#================================================================================

i=1
for model in [ "HadGEM2-ES_RACMO22E", "MPI-ESM-LR_REMO2009", "EC-EARTH_CCLM4-8-17", "EC-EARTH_RACMO22E", "EC-EARTH_RCA4"]:

          #******* Reading netCDF file
                file_path=data_arc_dir+'/'+str(i)+"_"+model+"/postproc/monthly/"+"pr_"+model+"_rcp"+RCP+"_mon_future.nc"

                if ( not os.path.isfile( file_path ) ):
                        print("File"+file_path+" doesn't exists or is corrupted")
                        i+=1
                        continue

                f_nc     = NetCDFFile( file_path , mode='r')     # I have to insert the two subdirectories intermedian /postproc/monthly/
                var      = f_nc.variables['pr'][:,lat_idx,lon_idx]

                for j in range(0,11):                                                   # 11 year from 0 to 10 starting from year_in (not properly decade)
                                ref_01.append( var[t_start +      j*12 ] * 30.42 )      # total number of elements: 11*5 (11 years*number of models)
                                ref_02.append( var[t_start + 1  + j*12 ] * 30.42 )
                                ref_03.append( var[t_start + 2  + j*12 ] * 30.42 )
                                ref_04.append( var[t_start + 3  + j*12 ] * 30.42 )
                                ref_05.append( var[t_start + 4  + j*12 ] * 30.42 )
                                ref_06.append( var[t_start + 5  + j*12 ] * 30.42 )
                                ref_07.append( var[t_start + 6  + j*12 ] * 30.42 )
                                ref_08.append( var[t_start + 7  + j*12 ] * 30.42 )
                                ref_09.append( var[t_start + 8  + j*12 ] * 30.42 )
                                ref_10.append( var[t_start + 9  + j*12 ] * 30.42 )
                                ref_11.append( var[t_start + 10 + j*12 ] * 30.42 )
                                ref_12.append( var[t_start + 11 + j*12 ] * 30.42 )

                del var
                i+=1

#*************** t_start setting *******************

if   ( year_middle == 2015 ):     # indexes starts with 0, t_start is refered to January of year_in for that decade. The value is get by: 12*(year_in - 2006)
        t_start = 48
elif ( year_middle == 2030 ):
        t_start = 228
elif ( year_middle == 2040 ):
        t_start = 348
elif ( year_middle == 2050 ):
        t_start = 468
elif ( year_middle == 2060 ):
        t_start = 588
elif ( year_middle == 2070 ):
        t_start = 708
elif ( year_middle == 2080 ):
        t_start = 828
elif ( year_middle == 2090 ):
        t_start = 948
else:
        print("Year-middle not valid")
        exit(1)


#============= Cumulative Monthly values for scenario decade ====================

i=1
for model in [ "HadGEM2-ES_RACMO22E", "MPI-ESM-LR_REMO2009", "EC-EARTH_CCLM4-8-17", "EC-EARTH_RACMO22E", "EC-EARTH_RCA4"]:

		#******* Reading netCDF file
		file_path=data_arc_dir+'/'+str(i)+"_"+model+"/postproc/monthly/"+"pr_"+model+"_rcp"+RCP+"_mon_future.nc"
	
		if ( not os.path.isfile( file_path ) ):
			print("File"+file_path+" doesn't exists or is corrupted")
			i+=1
			continue

		f_nc     = NetCDFFile( file_path , mode='r')     # I have to insert the two subdirectories intermedian /postproc/monthly/
		var      = f_nc.variables['pr'][:,lat_idx,lon_idx]

		for j in range(0,11):                                                     # 11 year from 0 to 10 starting from year_in (not properly decade)
				var_01.append( var[t_start +      j*12 ] * 30.42 )      # total number of elements: 11*5 (11 years*number of models)
				var_02.append( var[t_start + 1  + j*12 ] * 30.42 )
				var_03.append( var[t_start + 2  + j*12 ] * 30.42 )
				var_04.append( var[t_start + 3  + j*12 ] * 30.42 )
				if ( ("pr_"+model+"_rcp"+RCP+"_mon_future.nc" == "pr_MPI-ESM-LR_REMO2009_rcp85_mon_future.nc") and ( j >= 9 ) and ( year_middle == 2090 ) ):
					break
				var_05.append( var[t_start + 4  + j*12 ] * 30.42 )
				var_06.append( var[t_start + 5  + j*12 ] * 30.42 )
				var_07.append( var[t_start + 6  + j*12 ] * 30.42 )
				var_08.append( var[t_start + 7  + j*12 ] * 30.42 )
				var_09.append( var[t_start + 8  + j*12 ] * 30.42 )
				var_10.append( var[t_start + 9  + j*12 ] * 30.42 )
				var_11.append( var[t_start + 10 + j*12 ] * 30.42 )
				var_12.append( var[t_start + 11 + j*12 ] * 30.42 )

		del var
		i+=1

#========= Delta =========

ratio_01 = format( sum(var_01) / sum(ref_01) , ".2f"  )
ratio_02 = format( sum(var_02) / sum(ref_02) , ".2f"  )
ratio_03 = format( sum(var_03) / sum(ref_03) , ".2f"  )
ratio_04 = format( sum(var_04) / sum(ref_04) , ".2f"  )
ratio_05 = format( sum(var_05) / sum(ref_05) , ".2f"  )
ratio_06 = format( sum(var_06) / sum(ref_06) , ".2f"  )
ratio_07 = format( sum(var_07) / sum(ref_07) , ".2f"  )
ratio_08 = format( sum(var_08) / sum(ref_08) , ".2f"  )
ratio_09 = format( sum(var_09) / sum(ref_09) , ".2f"  )
ratio_10 = format( sum(var_10) / sum(ref_10) , ".2f"  )
ratio_11 = format( sum(var_11) / sum(ref_11) , ".2f"  )
ratio_12 = format( sum(var_12) / sum(ref_12) , ".2f"  )

#=====================================================
#                 csv creation
#=====================================================

year_in  = str( year_in  )
year_fin = str( year_fin )

file_name = "monthly_cumulative_pr_ratio_"+point_name+"_"+RCP+"_"+year_in+"_"+year_fin+".csv"
if (not os.path.exists( file_name ) ):
	with open( file_name, 'w') as f_out:
		f_out.write("# Monthly cumulative precipitation ratio respect to 2010-2020 decade\n")
		f_out.write("# Variable= pr\n")
		f_out.write("# Point name= "+point_name+"\n")
		f_out.write("# RCP= "+RCP+"\n")
		f_out.write("# Decade= "+year_in+" - "+year_fin+"\n")
		f_out.write("# Point; month; Decade; RCP; ratio[1]\n")

with open( file_name, 'a') as f_out:
	f_out.write( point_name + ";01;" + year_in + "-" + year_fin + ";"+RCP+";" + ratio_01 +"\n" )
	f_out.write( point_name + ";02;" + year_in + "-" + year_fin + ";"+RCP+";" + ratio_02 +"\n" )
	f_out.write( point_name + ";03;" + year_in + "-" + year_fin + ";"+RCP+";" + ratio_03 +"\n" )
	f_out.write( point_name + ";04;" + year_in + "-" + year_fin + ";"+RCP+";" + ratio_04 +"\n" )
	f_out.write( point_name + ";05;" + year_in + "-" + year_fin + ";"+RCP+";" + ratio_05 +"\n" )
	f_out.write( point_name + ";06;" + year_in + "-" + year_fin + ";"+RCP+";" + ratio_06 +"\n" )
	f_out.write( point_name + ";07;" + year_in + "-" + year_fin + ";"+RCP+";" + ratio_07 +"\n" )
	f_out.write( point_name + ";08;" + year_in + "-" + year_fin + ";"+RCP+";" + ratio_08 +"\n" )
	f_out.write( point_name + ";09;" + year_in + "-" + year_fin + ";"+RCP+";" + ratio_09 +"\n" )
	f_out.write( point_name + ";10;" + year_in + "-" + year_fin + ";"+RCP+";" + ratio_10 +"\n" )
	f_out.write( point_name + ";11;" + year_in + "-" + year_fin + ";"+RCP+";" + ratio_11 +"\n" )
	f_out.write( point_name + ";12;" + year_in + "-" + year_fin + ";"+RCP+";" + ratio_12 +"\n" )	

f_out.close()
