#!/bin/bash

program_n="pres_pdf_module-log_wrf-osmer.py"

for node in "W01" "W02" "W03" "W04"
do

case $node in 
"W01")
python  $program_n $node 45.703     13.148
;;
"W02")
python  $program_n $node 45.716     13.460
;;
"W03")
python  $program_n $node 45.617     13.567
;;
"W04")
python  $program_n $node 45.651     13.753
;;
*)
echo "$node node name not valid"
;;
esac

done
