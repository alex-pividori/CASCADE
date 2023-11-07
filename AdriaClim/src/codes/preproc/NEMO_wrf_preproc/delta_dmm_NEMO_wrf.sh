#!/bin/bash

#******************************************************************************
#
# DESCRIPTION:       This bash script is used to create a CSV output file
#                    containing the delta sea surface temperature, salinity
#                    and height for future scenario decades. The files is used 
#                    by SHYFEM model to simulate the pilot area. Each line
#                    contains the value for one month: from January to December.
#
# EXTERNAL CALLS:   none.
#
# EXTERNAL FILES:   - input NetCDF downloaded from Med_CORDEX official site and 
#                     edited by cdo command line operators.
#                   - The initialization txt file contains the whole set of dmm or
#                     dme edited files only for Temperatures. The salinity and 
#                     zos ones will be obtained from the temperature ones
#
# DEVELOPER:         Alex Pividori (alex.pividori@arpa.fvg.it)
#                    ARPA FVG - S.O.C. Stato dell'Ambiente - CRMA
#                   "AdriaClim" Interreg IT-HR project
#
# SOFTWARE VERSION: Bash
#                   CDO version 1.9.8
#
# CREATION DATE:    11/03/2022
#
# MODIFICATIONS:    11/03/2022 --> Creation date 
#
# VERSION:          0.1.
#
#******************************************************************************

#=============================================================================
#                              MEAN VERSION
#=============================================================================

#****** Module loading ********

module load cdo/1.9.8/intel/19.1.1.217-prtc7xl

st_ind="mean"  # 'mean' or 'med'
year_inf=2025
year_sup=2035

# WARNING: The following lat/lon indexes starts from 0
# but the cdo -selindexbox operator instead starts from 1, so it is necessary
# to subtract 1 to have the corresponding index value

for point in B01 B02 B03
do

#    NEMO MODEL
#        i     j 
# B01    8     18
# B02    20    7
# B03    34    4

#    WRF MODEL
#        i     j
# B01    8     18
# B02    20    7
# B03    34    4

case $point in 
#=== B01 ===
B01)
point="B01"    # lon/lat indexes strarting from 0 (ncview convention)
ind_x=8        
ind_y=18
lat_p=45.44
lon_p=12.80
;;
#=== B02 ===
B02)
point="B02"
ind_x=20
ind_y=7
lat_p=45.20
lon_p=13.04
;;
#=== B03 ===
B03)
point="B03"
ind_x=34
ind_y=4
lat_p=45.14
lon_p=13.34
;;
*)
     echo "Desired point $point is not in the list. Please insert another point label."
     continue
;;
esac

#******* Root directory of the netCDF input files 
input_dir="/lustre/arpa/AdriaClim/data/ERDDAP"
output_dir="/lustre/arpa/AdriaClim/data/ERDDAP"

#==============================================================================
# the initialization file contains by default the names of the dme edited files
# so the files containing the median differences
#==============================================================================

#******** Months file *********

months_file="${output_dir}/months_file.txt"
if [[ ! -f $months_file ]]; then

cat << EOF > $months_file
01
02
03
04
05
06
07
08
09
10
11
12
EOF

fi

#********** Missing file *********

missing_file="${output_dir}/missing_file.txt"
if [[ ! -f $missing_file ]]; then

cat << EOF > $missing_file
1e+20
1e+20
1e+20
1e+20
1e+20
1e+20
1e+20
1e+20
1e+20
1e+20
1e+20
1e+20
EOF

fi

#******** Input files ( temp, sal and zos ) *******

file_t="${input_dir}/sdim_votemper-adriaclim_resm_nemo_hist-proj_day_T_depth_${year_inf}01_${year_sup}12.nc"
file_s="${input_dir}/sdim_vosaline-adriaclim_resm_nemo_hist-proj_day_T_depth_${year_inf}01_${year_sup}12.nc"
file_z="${input_dir}/sdim_SL_S_ster_avg-adriaclim_resm_nemo_hist-proj_3h_sl_calibrated_ster_avg_${year_inf}01_${year_sup}12.nc"

#file_t="${input_dir}/sdim_q_2m-adriaclim_resm_wrf_hist-proj_near_surface_${year_inf}01_${year_sup}12.nc"          # specific humidity
#file_s="${input_dir}/sdim_slp-adriaclim_resm_wrf_hist-proj_near_surface_${year_inf}01_${year_sup}12.nc"           # sea level pressure
#file_z="${input_dir}/sdim_T_2m-adriaclim_resm_wrf_hist-proj_near_surface_${year_inf}01_${year_sup}12.nc"          # air temperature at 2 m

#====== POINT is B01, B02 or B03

if   [[ $st_ind == "mean"   ]]; then
    var_pre="dmm"  
    label_ext="mean" 
elif [[ $st_ind == "med" ]]; then
    var_pre="dme"
    label_ext="median"
fi

file_out="${output_dir}/${var_pre}_${point}_NEMO_mon_${year_inf}01_${year_sup}12.csv" # for NEMO model
#file_out="${output_dir}/${var_pre}_${point}_wrf_mon_${year_inf}01_${year_sup}12.csv" # for WRF model

#******** Head CSV file creation **********

echo  "# grid point= $point ( $lat_p N, $lon_p E )"                             >  $file_out
echo  "# Simulation= NEMO-model"                                                >> $file_out
echo  "# Statistical Estimator= Delta $label_ext"                               >> $file_out
echo  "# Missing value= 1e+20"                                                  >> $file_out
echo  "# Decade= ${year_inf}-${year_sup}"                                       >> $file_out
echo  "# Month ; delta T [°C] ; delta S [PSU] ; delta z [m]"                    >> $file_out
#echo  "# Month ; delta Specific Humidity [1] ; delta SL Pressure [Pa] ; delta Air Temp [°C]"       >> $file_out

#******************************************

tmp_temp=$( mktemp ${output_dir}/temp.XXXXX )
tmp_sal=$(  mktemp ${output_dir}/sal.XXXXX  )
tmp_zos=$(  mktemp ${output_dir}/zos.XXXXX  )

#=============== Data extraction from netCDF files ========================

# Two models has to be excluded for sea surface level. The reason is that they 
# foresee a reduction of sea surface height.
# The models are: NEMO and WRF

#var=( q_2m slp T_2m  )                  # (wrf model)
var=( votemper vosaline SL_S_ster_avg ) # (NEMO model)

if [[ -f $file_t ]]; then
	cdo -outputf,%2.4g,1  -selindexbox,$(( ind_x + 1 )),$(( ind_x + 1 )),$(( ind_y + 1 )),$(( ind_y + 1 ))  -selname,${var[0]}_$st_ind -sellevidx,1  $file_t > $tmp_temp  
else
	cat $missing_file  > $tmp_temp
fi

if [[ -f $file_s ]]; then
	cdo -outputf,%2.4g,1  -selindexbox,$(( ind_x + 1 )),$(( ind_x + 1 )),$(( ind_y + 1 )),$(( ind_y + 1 ))  -selname,${var[1]}_$st_ind -sellevidx,1  $file_s > $tmp_sal  
else
	cat $missing_file  > $tmp_sal
fi

if [[ -f $file_z  ]]; then
	cdo -outputf,%2.4g,1  -selindexbox,$(( ind_x + 1 )),$(( ind_x + 1 )),$(( ind_y + 1 )),$(( ind_y + 1 ))  -selname,${var[2]}_$st_ind  $file_z > $tmp_zos   
else
	cat $missing_file  > $tmp_zos
fi

#==========================================================================

paste -d ";"  $months_file   $tmp_temp  $tmp_sal  $tmp_zos  >> $file_out   # output file already contains header

rm  $tmp_temp  $tmp_sal  $tmp_zos $months_file $missing_file

done    # end of loop on grid points (B01, B02 ecc)
