#!/bin/bash

type="Projection"   # "Historical" or Projection

for node in "E01" "E02" "E03" 
do

case $node in 
"E01")
python  scatter_precip_tot-adriaclim_pr_osmer.py $node 45.65 13.50 $type
;;
"E02")
python  scatter_precip_tot-adriaclim_pr_osmer.py $node 46.05 13.10 $type
;;
"E03")
python  scatter_precip_tot-adriaclim_pr_osmer.py $node 46.35 13.10 $type
;;
*)
echo "$node node name not valid"
;;
esac

done
