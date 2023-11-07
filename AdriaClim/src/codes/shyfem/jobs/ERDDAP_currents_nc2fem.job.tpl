#!/bin/bash

# ******************************************************************************
#
#  DESCRIPTION:      this job template is aimed at post-processing ERDDAP's
#                    marine "currents" data files, in order to make them
#                    suitable for the SHYFEM model.
#
#  EXTERNAL CALLS:   none.
#
#  EXTERNAL FILES:   - U_FILE: ERDDAP AdriaClim's 3D zonal current file;
#                    - V_FILE: ERDDAP AdriaClim's 3D meridional current file.
#
#  DEVELOPER:        Alessandro Minigher (alessandro.minigher@arpa.fvg.it)
#                    ARPA FVG - S.O.C. Osmer e GRN - S.O.S. Qualità dell'aria
#
#  CREATION DATE:    2022-11-14.
#
#  MODIFICATIONS:    none.
#
#  VERSION:          0.1.
#
# ******************************************************************************

# ******************
#  JOB'S DIRECTIVES
# ******************

#PBS -P %%JOB_P%%
#PBS -W umask=%%JOB_W_umask%%
#PBS -W block=%%JOB_W_block%%
#PBS -N %%JOB_N%%
#PBS -o %%JOB_o%%
#PBS -e %%JOB_e%%
#PBS -k do
#PBS -q %%JOB_q%%
#PBS -l nodes=%%JOB_l_nodes%%:ppn=%%JOB_l_ppn%%
#PBS -l walltime=%%JOB_l_walltime%%
##PBS -m %%JOB_m%%
##PBS -M %%JOB_M%%


# **************
#  START OF JOB
# *************

#  --- START OF MAIN ---

# Move to the directory where the job was run, informing the user
echo -e "\n\tChange directory: moving to ${PBS_O_WORKDIR}...\n"; cd $PBS_O_WORKDIR
echo -e "\tCurrent directory: $(pwd).\n"

# Define the basename of two temporary files
TMP_FILE_U="uuu.nc"
TMP_FILE_V="vvv.nc"

# Set missing values, through CDO (template variables are employed)
module purge
module load "%%CDO_MOD%%"
cdo -O setmissval,0. "%%U_FILE%%" "$TMP_FILE_U"
cdo -O setmissval,0. "%%V_FILE%%" "$TMP_FILE_V"

# Merge meteorological "wind" data, through CDO (template variables are
# employed)
cdo merge "$TMP_FILE_U" "$TMP_FILE_V" "%%SHY_OUT_NC_FILE%%"

# Convert NetCDF (.nc) files to FEM (.fem) ones, though "nc2fem" SHYFEM's
# routine (template variables are employed)
module purge
module load "%%SHY_MOD%%"
nc2fem -unform -vars %%NC2FEM_VARS%% -descrp %%NC2FEM_DESCRP%% -regexpand 0 "%%SHY_OUT_NC_FILE%%"
mv out.fem "%%SHY_OUT_FILE%%"

# Remove all the NetCDF (.nc) files in the current directory
rm -f *.nc

#  --- END OF MAIN ---

# ************
#  END OF JOB
# ************
