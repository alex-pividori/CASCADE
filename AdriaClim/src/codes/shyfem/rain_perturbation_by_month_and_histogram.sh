#!/bin/bash

# ******************************************************************************
#
#  DESCRIPTION:    this Bash script is aimed at processing a NetCDF file
#                  containing precipitations [mm day-1] (see the EXTERNAL
#                  FILES comment section), by summimng - for each month -
#                  an addend to the data, according to a given distribution
#                  (the distribution is provided through an histogram, which is
#                  month-specific; monthly histograms share the same bins; for
#                  each bin, a month- and bin- specific addend is provided).
#                  "Deltas" (addends) are retrieved in an ASCII file (see the
#                  EXTERNAL FILES comment section).
#
#  EXTERNAL CALLS: none.
#
#  EXTERNAL FILES: - NetCDF file, resulting from a run of the WRF model
#                    (implemented at CRMA - ARPA FVG), containing hourly
#                    precipitations (PREC_ACC_NC), but expressed in mm day-1
#                  - ASCII file in CSV format (.csv), containing "deltas",
#                    which is formatted as follows:
#
#                    # Some lines of metadata
#                    # month;bin-range [mm day-1];delta [mm day-1]
#                    month_01;bin-range_1 [mm day-1]; delta_01_1 [mm day-1]
#                    month_01;bin-range_2 [mm day-1]; delta_01_2 [mm day-1]
#                    ...
#                    month_02;bin-range_1 [mm day-1]; delta_02_1 [mm day-1]
#                    month_02;bin-range_2 [mm day-1]; delta_02_2 [mm day-1]
#                    ...
#                    ...
#                    month_12;bin-range_1 [mm day-1]; delta_12_1 [mm day-1]
#                    month_12;bin-range_2 [mm day-1]; delta_12_2 [mm day-1]
#                    ...
#
#  DEVELOPER:      Alessandro Minigher (alessandro.minigher@arpa.fvg.it)
#                  ARPA FVG - S.O.C. Stato dell'Ambiente - CRMA
#                  "AdriaClim" Interreg IT-HR project
#
#  CREATION DATE:  2022-03-31.
#
#  MODIFICATIONS:  none.
#
#  VERSION:        0.1.
#
# ******************************************************************************

#  --- START OF FUNCTIONS ---

# Check the outcome of the "grep" operation
check_grep () {

    # Get the status for the "grep" operation (first input argument)
    OKKO=$1
    # Get the name of the file on which the "grep" is performed (second input
    # argument)
    F=$2

    # Check the outcome of the "grep" operation:
    #  - if all went OK
    if [[ $OKKO -eq 0 ]]; then
        # Inform the user
        echo -e "\n\t'Grep' on ${F}: all went OK."
    #  - if something went KO
    else
        # Inform the user and exit with an error
        echo -e "\n\tERROR! 'Grep' on ${F}: something went KO. Please check. Exit..."
        EXIT_STATUS=1; exit $EXIT_STATUS
    fi

}

# Check the outcome of the creation of the directory
check_mkdir () {

    # Get the status for the creation of the directory (first input argument)
    OKKO=$1
    # Get the name of the directory to be checked (second input argument)
    DIR=$2

    # Check the outcome of the creation of the directory:
    #  - if all went OK
    if [[ $OKKO -eq 0 ]]; then
        # Inform the user
        echo -e "\n\tDirectory: ${DIR} successfully created."
    #  - if something went KO
    else
        # Inform the user and exit with an error
        echo -e "\n\tERROR! Directory: ${DIR} unsuccessfully created. Please check. Exit..."
        EXIT_STATUS=1; exit $EXIT_STATUS
    fi

}

# Define a file number's index properly (e.g. 01, 02, 03, ..., 10, 11, etc.)
def_file_index () {

    # Get the index in integer format (first input argument)
    integer_index=$1

    # If the integer index is smaller than 10
    if [[ integer_index -lt 10 ]]; then
        # Define the index properly
        index="0${integer_index}"
    # If the integer index is larger or equal than 10
    else
        # Define the index properly
        index="${integer_index}"
    fi

}

#  --- END OF FUNCTIONS ---

#  --- START OF MAIN ---

# Define the environmental modules to be considered (these will be dynamically
# loaded and purged in this script)
NCO_MOD="nco/4.7.9/intel/19.1.1.217-azxk4mh"   # NCO
CDO_MOD="cdo/1.9.8/intel/19.1.1.217-prtc7xl"   # CDO

# Define an array containing histogram bins' estrema
bins=(0 0.5 1 2.0 3 4.0 5 7.5 10 15.0 20 25.0 30 40.0 50 60.0 70 85.0 100 125.0 150)

# Define the default status (OKKO=0 -> all went OK; OKKO=1 -> something went
# KO) for:
#  - the creation of directories
OKKO_mkdir=0
#  - "grep" operations
OKKO_grep=0

# Get the name of the file to be processed from the standard input (first input
# argument)
FILE2PROC="$1"
# Get the name of the "deltas" file from the standard input (second input
# argument)
DELTAS_FILE="$2"

# Get the current directory
cur_dir=$(pwd)

# Define the name (full path) of a temporary file, where storing the content of
# the "deltas" file deprived of metadata (lines starting with the "#" character)
DELTAS_FILE_GREP=$(mktemp -u ${cur_dir}/deltas_grep.XXXXX)

# Define the name (full path) of a temporary file, where storing the list of
# time-splitted files
TIMEFILE_LIST=$(mktemp -u ${cur_dir}/timefiles_list.XXXXX)

# Define the suffix of the name of the output file:
#  - get the basename of the file to process
FILE2PROC_BASE="${FILE2PROC##*/}"
#  - get the basename of the file to process (without extension)
FILE2PROC_BASE_WE="${FILE2PROC_BASE%.*}"
#  - get the extension of the file to process
FILE2PROC_EXT="${FILE2PROC_BASE##*.}"
#  - get the basename of the "deltas" file
DELTAS_FILE_BASE="${DELTAS_FILE##*/}"
#  - get the basename of the "deltas" file (without extension)
DELTAS_FILE_BASE_WE="${DELTAS_FILE_BASE%.*}"
#  - define the suffix of the name of the output file
FILEOUT_SUFFIX="${FILE2PROC_BASE_WE}-${DELTAS_FILE_BASE_WE}.${FILE2PROC_EXT}"

# Define the name of a temporary working directory, where storing the
# time-splitted files
SPLIT_TMP_DIR=$(mktemp -u splityearmon.XXXXX)

# Get the content of the "deltas" file, but deprived of metadata
grep -v "^#" $DELTAS_FILE > $DELTAS_FILE_GREP || OKKO_grep=1
# Function calling: check the outcome of the "grep" operation
check_grep $OKKO_grep $DELTAS_FILE

# Create the temporary working directory, where storing the time-splitted
# files
mkdir $SPLIT_TMP_DIR || OKKO_mkdir=1
# Function calling: check the outcome of the creation of the directory
check_mkdir $OKKO_mkdir $SPLIT_TMP_DIR
# Move into the temporary working directory, informing the user
echo -e "\n\tChange directory: moving to ${SPLIT_TMP_DIR}."; cd $SPLIT_TMP_DIR
echo -e "\tCurrent directory: $(pwd).\n"

# Load the desired environmental modules
module purge
module load $CDO_MOD

# Split the file to be processed by year and month, through CDO
FILEOUT_SPLIT_BASE="rain-"
cdo --no_history splityearmon $FILE2PROC $FILEOUT_SPLIT_BASE

# List the content of the current directory in a temporary file (not lying in
# the current directory)
ls > $TIMEFILE_LIST

# Get the current directory
cur_dir=$(pwd)

# For each time-splitted file
while read f; do

    # Define the name (full path) of the time-splitted file
    f="${cur_dir}/${f}"
    # Get the basename of the file, without extension
    f_base="${f##*/}"
    f_base_we="${f_base%.*}"
    # Get the year and month, by knowing that the basename of the file (without
    # extension) ends with YYYYMM
    yearmonth=${f_base_we: -6}   # YYYYMM
    year=${yearmonth: 0:4}       # YYYY
    month=${yearmonth: -2}       # MM

    # Complete the basename of the time-splitted output file
    FILEOUT="${year}-${month}_${FILEOUT_SUFFIX}"

    # Define an empty array aimed at storing monthly "deltas"
    deltas=()

    # For each line of the "deltas" file deprived of metadata
    while read line; do

        # Read the line in CSV format
        IFS=';' read -ra line_array <<< "$line"
        # Get the desired information
        month_cur=${line_array[0]}   # month (MM)
        bin_range=${line_array[1]}   # bin range (bin_min-bin_max)
        delta=${line_array[2]}       # "delta"

        # If the month read is the same as that of the time-splitted file
        if [[ "${month_cur}" == "${month}" ]]; then
            # Append the "delta" read to the "deltas" array and skip to the
            # next line
            deltas+=($delta)
            continue
        fi

    done < $DELTAS_FILE_GREP

    # Define the name of a temporary working directory
    TMP_DIR=$(mktemp -u perturb_rain_tmp.XXXXX)
    # Create the temporary working directory
    mkdir $TMP_DIR || OKKO_mkdir=1
    # Function calling: check the outcome of the creation of the directory
    check_mkdir $OKKO_mkdir $TMP_DIR
    # Move into the temporary working directory, informing the user
    echo -e "\n\tChange directory: moving to ${TMP_DIR}."; cd $TMP_DIR
    echo -e "\tCurrent directory: $(pwd).\n"

    # Load the desired environmental modules
    module purge
    module load $NCO_MOD

    # Get the number of histogram bins, minus 1
    n_bins=${#deltas[@]}
    n_bins=$(($n_bins-1))

    # For each histogram bin
    for i in $(seq 0 $n_bins); do

        # Function calling: define a file number's index properly (e.g. 01, 02,
        # 03, ..., 10, 11, etc.)
        def_file_index $i

        # Define the basename of the specific "mask" file
        FILEOUT_MASK="${FILEOUT_SUFFIX}${index}"

        # Get the extrema of the i-th bin
        bin_min=${bins[i]}
        bin_max=${bins[$(($i+1))]}
        # Get the "delta" specific to the i-th bin
        delta_bin=${deltas[i]}

        # Create the specific "mask" file through NCO, for the given histogram bin
        ncap2 -h -s "where(PREC_ACC_NC < ${bin_max} && PREC_ACC_NC >= ${bin_min}) PREC_ACC_NC=PREC_ACC_NC+${delta_bin}; elsewhere PREC_ACC_NC=0" $f -O $FILEOUT_MASK

    done

    # Function calling: define a file number's index properly (e.g. 01, 02,
    # 03, ..., 10, 11, etc.)
    i=$(($i+1))
    def_file_index $i

    # Define the basename of the specific "mask" file
    FILEOUT_MASK="${FILEOUT_SUFFIX}${index}"

    # Create the specific "mask" file through NCO, for all the values larger or
    # equal than the rightmost extrema of the histogram
    ncap2 -h -s "where(PREC_ACC_NC >= ${bin_min}) PREC_ACC_NC=PREC_ACC_NC; elsewhere PREC_ACC_NC=0" $f -O $FILEOUT_MASK

    # Load the desired environmental modules
    module purge
    module load $CDO_MOD

    # Sum the "mask" files through CDO, and move the output file into the upper
    # directory
    cdo --no_history enssum $FILEOUT_SUFFIX* $FILEOUT
    mv $FILEOUT ../; echo -e "\n\tFile: ${FILEOUT} moved into the upper directory."

    # Move into the upper directory
    echo -e "\n\tChange directory: moving into the upper directory..."; cd ../
    echo -e "\tCurrent directory: $(pwd).\n"

    # Remove the temporary working directory, if existent
    if [[ -e $TMP_DIR ]]; then rm -r $TMP_DIR; fi

done < $TIMEFILE_LIST

# Remove time-splitted files
rm $FILEOUT_SPLIT_BASE*

# Merge in time the monthly files
cdo --no_history mergetime * $FILEOUT_SUFFIX

# Load the desired environmental modules
module purge
module load $NCO_MOD

# Rename the "time" dimension
ncrename -h -d XTIME,Time $FILEOUT_SUFFIX

# Move the output file to the upper directory
mv $FILEOUT_SUFFIX ../

# Move to the upper directory
echo -e "\n\tChange directory: moving into the upper directory..."; cd ../
echo -e "\tCurrent directory: $(pwd).\n"

# Remove the temporary working directory, if existent
if [[ -e $SPLIT_TMP_DIR ]]; then rm -r $SPLIT_TMP_DIR; fi

# Remove temporary files
rm $TIMEFILE_LIST
rm $DELTAS_FILE_GREP

#  --- END OF MAIN ---
