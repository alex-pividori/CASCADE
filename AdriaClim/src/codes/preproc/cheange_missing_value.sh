#!/bin/bash

initial_value="1e+20"
final_value="NA"

while read file_name 
do

    file_name_alt=${file_name/'.csv'/}
    sed -i "s/${initial_value}/${final_value}/g" $file_name

    if [ -f $file_name_alt ]; then
        sed -i "s/${initial_value}/${final_value}/g" $file_name_alt
    fi

done < file_list_csv.txt 
