#!/bin/bash

#****************************************************************************
#
# DEVELOPER:      Alex Pividori (alex.pividori@arpa.fvg.it)
#                 ARPA FVG - S.O.C. Stato dell'Ambiente
#                 "AdriaClim" Interreg IT-HR project
#
# CREATION DATE:  28/01/2022
#
#
# cdo Version:    1.9.8
# bash Version:   4.2.46(2)-release  
#
#*****************************************************************************
#                                 DESCRIPTION
#******************************************************************************
#
# This bash script is used to realize the delta field between two decades.
# The month mean of a multi year file is subtracted from another month multi year mean.
# 
#   output = decade(2025-2035) - decade(2010-2020)
#
# Where decade() are netCDF files obtained after a monhtly multiyear mean. For example:
# the january time step of decade() contains the result of the mean of all Januaries 
# months from 2010 to 2020 etc. The decade interval of the first file goes from -5 years 
# to +5 years of the year we are dealing with.
#
#
#  output= ( month mean 2025-2035 ) - ( month mean 2010-2020 ) 
#
# cdo realize these by the two operators: -ymonsub  and  -ymonmean 
#
#  output= ( -ymonmean file_2025-2035 ) - ( -ymonmean file_2010-2020 )
#
# Using cdo chaining sintax it becomes:
#
# cdo -ymonsub -ymonmean file_2025-2035 -ymonmean file_2010-2020  output 
#
# The files have to be selected from a starting year to an ending one with the command
# 
#      -selyear   and in our case it becomes -selyear,2010/2020   
#
#==================================================================================
#
# the resulting precess becomes:
#
#     cdo -ymonsub -ymonmean -selyear,2025/2035 input1 -ymonmean -selyear,2010/2020 input1 output
# 
# The same is realized with the median
#
#==================================================================================
#
# With cdo some important statistical values like: minimum, maximum, 25th and 75th percentile
# has been calculated and merged in a single .nc file indicated with the sdim prefix
# that mean 'statistical dimensions'.
#
#**********************************************************************************

module load cdo/1.9.8/intel/19.1.1.217-prtc7xl   &>/dev/null 

file_list_name="scenario_file_list.txt"

input_dir="/lustre/arpa/AdriaClim/data/ERDDAP"
output_dir="/lustre/arpa/AdriaClim/data/ERDDAP"

file_N=`sed '/^$/d' $file_list_name  | wc -l`  # eliminate void lines
i=1

#================================ Files cicle =====================================

while read scenario_file
do
     sub_scenario_file=${scenario_file%_????????_??-????????_??.nc}  # file name without starting and ending dates. The substring removed is: '_YYYYMM_YYYYMM.nc'
                                                           # scenario_file file name without prefix
     
     printf "File: ($i/$file_N)"

     #*************** Decades cycle ***************
     for year in 2025 2035        # inferior limits of the decades considered
     do
             year_fin=$(( year + 10 ))   # we take one decade in count to realize the mean
             year_middle=$(( year + 5 ))             
      
             field=`   cdo -showname    $input_dir/$scenario_file 2> /dev/null`
             field=${field#' '}                                                   # the returned word by cdo is prefixed by a space " "
             std_name=`cdo -showstdname $input_dir/$scenario_file 2> /dev/null`   # standard name will be modified. The stderr contains cdo informations             
             std_name=${std_name#' '}                                             # the returned word by cdo is prefixed by a space " "                              
             std_name=${std_name// /_}

             if [ -f ${input_dir}/$scenario_file ]; then
                     echo "The file \"$scenario_file\" exists and the process will be launched right now:"

#=========================================================================================================
#                          DELTA between scenario decade and 2010/2020 decade
#=========================================================================================================

                 echo "The field is $field"

                     #************** Mean ************
                 cdo -chname,${field},${field}_mean    -setattribute,$field@standard_name="difference_between_${std_name}_monthly_means"    -setyear,$year_middle      \
                     -ymonsub                                                                                                                                          \
                     -ymonmean     -selyear,${year}/${year_fin}    ${input_dir}/${scenario_file}                                                                       \
                     -ymonmean     -selyear,2010/2020              ${input_dir}/${scenario_file}                                                                       \
                      ${output_dir}/dmm_${sub_scenario_file}_${year}01_${year_fin}12.nc 2>/dev/null  ||                                                                \
                      { echo "WARNING: Something has gone wrong in the cdo mean operation process with ${scenario_file} in the period from $year to $year_fin."; continue; }
                 
                     #************* Median (50th percentile) ***********
                 cdo -chname,${field},${field}_med     -setattribute,$field@standard_name="difference_between_${std_name}_monthly_median"   -setyear,$year_middle        \
                     -ymonsub                                                                                                                                            \
                     -ymonpctl,50  -selyear,${year}/${year_fin}  ${input_dir}/${scenario_file} -ymonmin   -selyear,${year}/${year_fin}  ${input_dir}/${scenario_file}    \
                                                                                               -ymonmax   -selyear,${year}/${year_fin}  ${input_dir}/${scenario_file}    \
                     -ymonpctl,50  -selyear,2010/2020            ${input_dir}/${scenario_file} -ymonmin   -selyear,2010/2020            ${input_dir}/${scenario_file}    \
                                                                                               -ymonmax   -selyear,2010/2020            ${input_dir}/${scenario_file}    \
                     ${output_dir}/dme_${sub_scenario_file}_${year}01_${year_fin}12.nc  2>/dev/null ||                                                                   \
                     { echo "WARNING: Something has gone wrong with the cdo median operation processes with ${scenario_file} in the period from $year to $year_fin."; continue; }

#=================================================================================================================================================
#                                                   Merging statistical dimensions
#=================================================================================================================================================

                 cdo -merge     ${output_dir}/dmm_${sub_scenario_file}_${year}01_${year_fin}12.nc  ${output_dir}/dme_${sub_scenario_file}_${year}01_${year_fin}12.nc   \
                                ${output_dir}/sdim_${sub_scenario_file}_${year}01_${year_fin}12.nc   2>/dev/null  &&                                                   \
                                                                                                                                                                       \
                 rm             ${output_dir}/dmm_${sub_scenario_file}_${year}01_${year_fin}12.nc  ${output_dir}/dme_${sub_scenario_file}_${year}01_${year_fin}12.nc   \
                                || { echo "WARNING: Something has gone wrong in cdo merging process or remotion with ###_${sub_scenario_file}_${year}01_${year_fin}12.nc"; continue; }

#=================================================================================================================================================

	             echo -e "\tThe process ended correctly"
	             echo -e "\tThe output file si:  \"sdim_${sub_scenario_file}_${year}01_${year_fin}12.nc\""
             else
                     echo "The file \"$input_dir/$scenario_file\" doesn't exist"
             fi

     done
(( i++ ))
done < $file_list_name
