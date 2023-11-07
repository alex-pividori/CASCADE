#!/bin/bash

# ******************************************************************************
#
#  DESCRIPTION:      this job template is aimed at post-processing ERDDAP's
#                    hydrological (rivers) data files, in order to make them
#                    suitable for the SHYFEM model.
#
#  EXTERNAL CALLS:   none.
#
#  EXTERNAL FILES:   - ERDDAP AdriaClim's hydrological (rivers) ASCII (.txt)
#                      file.
#
#  DEVELOPER:        Alessandro Minigher (alessandro.minigher@arpa.fvg.it)
#                    ARPA FVG - S.O.C. Osmer e GRN - S.O.S. Qualità dell'aria
#
#  CREATION DATE:    2022-11-11.
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

#  --- START OF FUNCTIONS ---

# Convert the given file (first input argument of the function), from CSV to
# DAT
csv2dat () {

    # Perform the conversion
    sed -i "1,2d" "$1"
    sed -i "s/T/::/" "$1"
    sed -i "s/Z,/ /" "$1"

}

#  --- END OF FUNCTIONS ---

#  --- START OF MAIN ---

# Move to the directory where the job was run, informing the user
echo -e "\n\tChange directory: moving to ${PBS_O_WORKDIR}...\n"; cd $PBS_O_WORKDIR
echo -e "\tCurrent directory: $(pwd).\n"

# For each DAT (.dat) file in the current directory
for f in ./*.dat; do

    # Function calling: convert the given file (first input argument of the
    # function), from CSV to DAT
    csv2dat "$f"

done

#  --- END OF MAIN ---

# ************
#  END OF JOB
# ************
