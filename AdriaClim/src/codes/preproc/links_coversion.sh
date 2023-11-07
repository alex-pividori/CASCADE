#!/bin/bash

dir_conv="/lustre/arpa/CASCADE/public_html"

# This script is used to substitute the links in a directory with the respective 
# file/directory who is linked to.

find $dir_conv -type l > ${dir_conv}/temp_list.txt

if [ ! -s ${dir_conv}/temp_list.txt ]; then
    echo "there are NO simbolyc links in ${dir_conv}/temp_list.txt"
    exit 0 
fi
#===============================================================================================

while IFS='\n' read link_name; do

    original_file=$( readlink ${link_name} )
    rm ${link_name} 
    cp ${original_file} ${link_name}

done  <  ${dir_conv}/temp_list.txt

rm  ${dir_conv}/temp_list.txt && echo "Temporary file ${dir_conv}/temp_list.txt has been removed."
