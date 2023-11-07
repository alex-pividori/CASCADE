#!/bin/bash

#===============================================================
#                       Monthly version 
#===============================================================

#==== Module laod ====
module purge
module load  cdo/1.9.8/intel/19.1.1.217-prtc7xl      &>/dev/null	
module load  python/3.8.1/gcc/8.2.0-mbzms7w          &>/dev/null
module load  miniconda3/4.7.12.1/gcc/8.2.0-5g55eu6   &>/dev/null

field="pr"

while IFS=";"  read   point_n   RCP  year_middle_in   month
do

case $point_n in
E01)
lat_eu_i=1
lon_eu_i=12
lat_wrf_i=49
lon_wrf_i=128
;;
E02)
lat_eu_i=5
lon_eu_i=8
lat_wrf_i=71
lon_wrf_i=112
;;
E03)
lat_eu_i=8
lon_eu_i=8
lat_wrf_i=88
lon_wrf_i=111
;;
E04)
lat_eu_i=7
lon_eu_i=15
lat_wrf_i=83
lon_wrf_i=138
;;
*)
echo -e "\tPoint not found"
exit
;;
esac


bin_range=( 0 1 3 5 10 20 30 50 70 100 150 200 250 )

n_bin=$(( ${#bin_range[@]} - 1 ))


declare -a hist_tot_count

input_arc_dir="/lustre/arpa/AdriaClim/data/EURO-CORDEX/FVG"
input_arc_dir_wrf="/lustre/arpa/AdriaClim/data/shyfem_inputs/WRF_CRMA/AlpeAdria/20170901-20180101"
output_arc_dir="/lustre/arpa/AdriaClim/src/codes/plotters/euro-cordex_scenario_plotters/WRF_df_ref"

#============== REF and EURO-CORDEX data file extraction =================

for year_middle in 2015     # the first cycle is necessary to extract the reference data decade, the second the future projection decade
do

year_in=$((  year_middle - 5 ))
year_fin=$(( year_middle - 5 ))

#============= Cycle on models ==============================
for model_dir in "1_HadGEM2-ES_RACMO22E" "2_MPI-ESM-LR_REMO2009" "3_EC-EARTH_CCLM4-8-17" "4_EC-EARTH_RACMO22E" "5_EC-EARTH_RCA4"
do

model_name="${model_dir#?_}"
file_name="pr_${model_name}_rcp${RCP}_future.nc"
input_file="$input_arc_dir/$model_dir/$file_name"

read -a hist_count <<< $( cdo  --no_history -outputf,%2.4g,1  -histcount$( printf ',%s' ${bin_range[@]} )  \
                -selmonth,$month   -selyear,${year_in}/${year_fin} -selindexbox,$(( lon_eu_i + 1 )),$(( lon_eu_i + 1 )),$(( lat_eu_i + 1 )),$(( lat_eu_i + 1 ))  $input_file || \
                                   { echo "WARNING: corrupted or inesistent file"; continue; } )


		for i in $( seq 0 $(( n_bin -1 )) ) 
		do
	      		let hist_tot_count[$i]+=${hist_count[$i]}
		done

done # end of model  cycle

	# data file name
	data_file_name="histogram_tmp_data_ref.txt" 

	printf "%s\n" ${bin_range[@]}      > ${output_arc_dir}/histogram_tmp_bins.txt
	printf "%s\n" ${hist_tot_count[@]} > ${output_arc_dir}/histogram_tmp_file.txt

	paste -d ";"  ${output_arc_dir}/histogram_tmp_bins.txt  ${output_arc_dir}/histogram_tmp_file.txt > ${output_arc_dir}/${data_file_name}

	rm   ${output_arc_dir}/histogram_tmp_file.txt 
	unset hist_tot_count
	unset hist_count
done # end of two decade cycles (2010/2020 and future decade)

#================================ WRF data file extraction ============================

data_file_name="histogram_wrf_tmp_data.txt"

#file_name=$( find  $input_arc_dir_wrf  -name "rain_WRF-CRMA_AlpeAdria_2017090100-2018010100-pr_delta_${point_n}_rcp${RCP}_${year_in}_${year_fin}.nc" ) 
if [[ $file_name == "" ]]; then exit; fi
input_file="$input_arc_dir_wrf/rain_WRF-CRMA_AlpeAdria_2017090100-2018010100.nc"  # the directory path is already included


year_in=2017
year_fin=2018

read -a hist_count <<< $( cdo  --no_history -outputf,%2.4g,1  -histcount$( printf ',%s' ${bin_range[@]} )  \
                -selmonth,$month   -selyear,${year_in}/${year_fin} -selindexbox,$(( lon_wrf_i + 1 )),$(( lon_wrf_i + 1 )),$(( lat_wrf_i + 1 )),$(( lat_wrf_i + 1 ))  $input_file || \
                                   { echo "WARNING: corrupted or inesistent file"; continue; } )

        printf "%s\n" ${hist_count[@]} > ${output_arc_dir}/histogram_wrf_tmp_file.txt

        paste -d ";"  ${output_arc_dir}/histogram_tmp_bins.txt  ${output_arc_dir}/histogram_wrf_tmp_file.txt > ${output_arc_dir}/${data_file_name}

        rm ${output_arc_dir}/histogram_tmp_bins.txt  ${output_arc_dir}/histogram_wrf_tmp_file.txt
        unset hist_tot_count

#========================================================================================

year_in=2017
year_fin=2017

python   comparison_month_diff_eu_wrf.py   $point_n  ${output_arc_dir}/histogram_wrf_tmp_data.txt  \
            ${output_arc_dir}/histogram_tmp_data_ref.txt    $RCP  $year_in  $year_fin $month $field

rm       ${output_arc_dir}/histogram_tmp_data_ref.txt   ${output_arc_dir}/histogram_wrf_tmp_data.txt


done < initialization_file.txt
