#!/bin/bash

program_n="cumulative_tot-adriaclim_pr_osmer.py"

for node in "E01" "E02" "E03" #"E04"
do

case $node in 
"E01")
python  $program_n $node 45.65 13.50
;;
"E02")
python  $program_n $node 46.05 13.10
;;
"E03")
python  $program_n $node 46.35 13.10
;;
"E04")
python  $program_n $node 46.25 13.80
;;
*)
echo "$node node name not valid"
;;
esac

done
