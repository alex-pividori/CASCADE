#!/bin/bash

# Stop the shell at the first error
set -e
# Fail when an undefined variable is used
set -u
# Print scripts' lines as they are executed
#set -x


# Define the variables that are needed for any communication with ECF:
#  - port number of the ECF server
export ECF_PORT=%ECF_PORT%
#  - name of the ECF host issuing this task
export ECF_HOST=%ECF_HOST%
#  - name of this task
export ECF_NAME=%ECF_NAME%
#  - unique password
export ECF_PASS=%ECF_PASS%
#  - try number of the task
export ECF_TRYNO=%ECF_TRYNO%
#  - record the process ID (it is also used for the detection of zombies)
export ECF_RID=$$


# Tell the ECF server that this task started
ecflow_client --init=$$
 

# Define an error handler
ERROR() {

   # Clear the "-e" flag
   set +e
   # Wait for background processes to stop
   wait
   # Notify ECF that something went wrong, using "trap" as reason
   ecflow_client --abort=trap
   # Remove all traps and exit
   trap 0
   exit 0

}
 

# Trap any call to the "exit" command and to errors caught by the "-e" flag
trap ERROR 0
 
# Trap any signal that may cause the script to fail
trap '{ echo "Killed by a signal"; ERROR ; }' 1 2 3 4 5 6 7 8 10 12 13 15

# Get the starting time, in a suitable format to be useful for the computation
# of tasks' walltime
TASK_START_TIME="$(date -u +%%s)"

# Print some diagnostic at the beginning of the task
echo -e "\n\t-------------------------------------------------------------------------"
echo -e "\t|          Preliminary information about the run of this task           |"
echo -e "\t-------------------------------------------------------------------------"
echo -e "\n\tSUITE NAME: %SUITE%\n\tTASK NAME: %TASK%\n\tTASK FULL NAME: %ECF_NAME%\n\tSTART TIME: $(date -u +%%F' '%%T' UTC')\n"
echo -e "\n\tSUITE DATE: %ECF_DATE%\n\tSUITE TIME: %ECF_TIME%\n\tSUITE CLOCK: %ECF_CLOCK%\n"
echo -e "\n\t-------------------------------------------------------------------------"
echo -e "\t|                  Here below the stdout of this task                   |"
echo -e "\t-------------------------------------------------------------------------\n"
