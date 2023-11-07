# Sleep the desired number of seconds (suite/family variable)
sleep %SLEEP% 

# Get the ending time, in a suitable format to be useful for the computation of
# tasks' walltime
TASK_END_TIME="$(date -u +%%s)"

# Print some diagnostic at the end of the task
echo -e "\n\t-------------------------------------------------------------------------"
echo -e "\t|           Summary of information about the run of this task           |"
echo -e "\t-------------------------------------------------------------------------"
echo -e "\n\\tSTOP TIME: $(date -u +%%F' '%%T' UTC')"
echo -e "\tTASK WALL TIME: $((${TASK_END_TIME}-${TASK_START_TIME})) s\n"

# Wait for background processes to stop
wait
# Notify ECF that the task ends normally
ecflow_client --complete
# Remove all traps and exit
trap 0
exit 0
