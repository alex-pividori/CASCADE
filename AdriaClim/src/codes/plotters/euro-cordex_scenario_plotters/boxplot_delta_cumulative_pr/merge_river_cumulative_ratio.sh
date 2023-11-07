#!/bin/bash

in_dir="/lustre/arpa/AdriaClim/src/codes/plotters/euro-cordex_scenario_plotters/boxplot_delta_cumulative_pr/monthly_cumulative_pr_ratio"
out_dir="."

work_dir="."

if [ ! -f $work_dir/list_files.txt ]; then touch $work_dir/list_files.txt; else rm $work_dir/list_files.txt ; fi
if [ ! -f $work_dir/AdriaClim_GoT_allscenario_cumulative_pr_ratio.csv ]; then touch $work_dir/AdriaClim_GoT_allscenario_cumulative_pr_ratio.csv ; \
else  rm $work_dir/AdriaClim_GoT_allscenario_cumulative_pr_ratio.csv  ; fi

ls $in_dir > $work_dir/list_files.txt  || exit ;

echo "# Monthly cumulative precipitation ratio respect to 2010-2020 decade" >> $work_dir/AdriaClim_GoT_allscenario_cumulative_pr_ratio.csv
echo "# Point; month; Decade; RCP; ratio[1]"                                >> $work_dir/AdriaClim_GoT_allscenario_cumulative_pr_ratio.csv

#=====================================================================================
while read file_name
do

	tail  -n12  $in_dir/$file_name  >> $work_dir/AdriaClim_GoT_allscenario_cumulative_pr_ratio.csv

done < $work_dir/list_files.txt

rm $work_dir/list_files.txt
