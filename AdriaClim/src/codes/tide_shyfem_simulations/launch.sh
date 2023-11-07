#!/bin/bash

# This simple bash script is used to launch python script
# for FFR power spectrum plot creation 

module load miniconda3 

input_dir="/lustre/arpa/scratch/AdriaClim/sea_level_height_unbiased"
ouput_dir="./"

ls $input_dir > file_list.txt

while read -r file_name;
do

    python tide_analysis1.py  $input_dir  $file_name $ouput_dir
    echo   "Plot created for $file_name file."

done < file_list.txt
