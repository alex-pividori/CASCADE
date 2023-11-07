# ******************************************************************************
#
#  DESCRIPTION:      this Python script is aimed at computing the difference
#                    between two time series, which are read from two input
#                    data files (see the EXTERNAL FILES comment section), and
#                    to provide the mean difference over the desired time
#                    period. This is performed for all the couples of files
#                    that are provided in an initialisation file (see
#                    the EXTERNAL FILES comment section). Each data file is
#                    related to a specific "extra" node of a SHYFEM's
#                    simulation, which is considered with all its vertical
#                    levels (layers).
#                    Moreover, the script draws the time series of the
#                    difference, with a horizontal dashed line representing the
#                    mean, for all the "extra" nodes and vertical levels.
#                    Furthermore, it computes the linear correlation parameters
#                    between the two time series, for all the "extra" nodes and
#                    vertical levels.
#
#  HOW TO USE:       This script can be run from the command line as follows:
#
#                     python PY_SCRIPT INI_FILE DT_START DT_END
#
#                    where PY_SCRIPT is the name (full path) of this script,
#                    INI_FILE is the name (full path) of the initialisation
#                    file (see the EXTERNAL FILES comment section), and
#                    DT_START and DT_END are the starting and ending date and
#                    time (in the format YYYY-MM-DD::hh:mm:ss) of the time
#                    period to consider, respectively.
#
#  EXTERNAL CALLS:   none.
#
#  EXTERNAL FILES:   - initialisation file: ASCII file containing the full
#                      paths of the couples of input data files to be compared,
#                      which are arranged as shown below
#
#                       file_1A;file_1B
#                       file_2A;file_2B
#                       ...
#                       file_nA;file_nB
#
#                    - input data file: ASCII file obtained by splitting a
#                      ".ext" file of a SHYFEM's simulation. This type of files
#                      are arranged in two or more columns, the first
#                      containing date and time (formatted as
#                      YYYY-MM-DD::hh:mm:ss), while the others containing
#                      actual oceanographic data, referred to a specific
#                      vertical layer (2nd column -> layer 1, 3rd column ->
#                      layer 2, etc.). Columns are separated by "white"
#                      spaces.
#                      It is worth noting that for 2D variables, there are
#                      only two columns and a reference layer can not be
#                      specified (for the water level, the reference is the
#                      sea surface).
#                      The basename of these files has to be of the following
#                      type:
#
#                       "what.dim.node", where
#
#                      -- "what" is the abbreviation of the variable (e.g.
#                         "temp", "salt", "velx", "vely", "zeta");
#                      -- "dim" is the dimensionality ("2d" or "3d");
#                      -- "node" is consecutive EXT node numbering (e.g. "1"
#                         for EXT node 1, "2" for EXT node 2, etc.). EXT nodes
#                         are those specified in the "$extra" section of the
#                         STR parameter input file of the SHYFEM model.
#
#  DEVELOPER:        Alessandro Minigher (alessandro.minigher@arpa.fvg.it)
#                    ARPA FVG - S.O.C. Stato dell'Ambiente - CRMA
#                    "AdriaClim" Interreg IT-HR project
#
#  SOFTWARE VERSION: Python 3.7.11.
#
#  CREATION DATE:    2022-08-18.
#
#  MODIFICATIONS:    none.
#
#  VERSION:          0.1.
#
# ******************************************************************************

#  --- START OF FUNCTIONS ---

# Get the number of columns in which the given CSV file is arranged (columns
# are separated by the ";" character)
def get_n_col(filename):

    # Open the file in reading mode
    f = open(filename, "r")

    # For each line in the file
    for line in f:

        # If the line starts with the "#" character (metadata), skip to the
        # next line
        tf = line.startswith("#")
        if ( tf == True ):
            continue

        # Remove the "new line" character
        line = line.rstrip("\n")
        break

    # Close the file
    f.close()

    # Get the number of columns and return it
    N = len(line.split())
    return N

# Get the desired data from a given file and in the given time range;
# specifically, get the time series of a certain variable at the given vertical
# level, from a file arranged in columns that are separated by "white" spaces
# (the first column is the date and time, while the others are the variable at
# different depths). "ith_col" is the index of the column to be considered
def get_data(filename, ith_col, dt_start, dt_end):

    # Define empty lists to be filled with the desired data
    dt_list = []    # date and time
    var_list = []   # variable

    # Open the file in reading mode
    f = open(filename, "r")

    # For each line in the file
    for line in f:

        # If the line starts with the "#" character (metadata), skip to the
        # next line
        tf = line.startswith("#")
        if ( tf == True ):
            continue

        # Remove the "new line" character
        line = line.rstrip("\n")

        # Split the line in columns
        data_line = line.split()

        # Get the desired data:
        #  - date and time (YYYY-MM-DD::hh:mm:ss)
        dt = data_line[0]
        dt = datetime.strptime(dt, "%Y-%m-%d::%H:%M:%S")
        #  - variable
        var = float(data_line[ith_col-1])

        # If the date and time read lies in the given time range
        if (dt >= dt_start and dt <= dt_end):

            # Append the data to the related lists
            dt_list.append(dt)     # date and time
            var_list.append(var)   # variable

    # Close the file
    f.close()

    # Define a list of lists, containing the desired data, and return it
    data = [dt_list, var_list]
    return data

# Compute the linear correlation between the given datasets
def mk_lin_corr(var_list_1, var_list_2):

    # Compute the linear correlation parameters between the given datasets
    slope, intercept, r, p, se = stats.linregress(var_list_1, var_list_2)

    # Define a list of lists containing the linear correlation parameters, and
    # return it
    out = [slope, intercept, r, p, se]
    return out

# Compute the difference between the two given datasets, for each time step
def mk_diff(dt_list_1, var_list_1, dt_list_2, var_list_2):

    # Define an empty list containing the desired data
    var_diff_list = []

    # If the number of time steps is not the same in the two datasets, inform
    # the user and exit with an error
    if (len(dt_list_1) != len(dt_list_2)):
        print("The number of time steps in the two datasets is not the same: %s vs. %s" % (str(len(dt_list_1)), str(len(dt_list_2))))
        exit(1)

    # For each time step
    for i in range(0, len(dt_list_1)):

        # Compute the difference of the variable at the current time step
        var_diff = var_list_1[i] - var_list_2[i]

        # Append the difference to the related list
        var_diff_list.append(var_diff)

    # Define a list of lists, containing the desired data, and return it
    data = [dt_list_1, var_diff_list]
    return data

# Define the name of the y-axis of the plot
def get_yaxis_name(filename_1, filename_2):

    # Get the abbreviation of the variable to be considered, from the basename
    # from the basename of input data file
    var_1 = os.path.basename(filename_1).split(".")[0]
    var_2 = os.path.basename(filename_2).split(".")[0]

    # If the variable to consider is not the same in the two datasets, inform
    # the user and exit with an error
    if (var_1 != var_2):
        print("The variable to consider is not the same in the two datasets: %s vs. %s" % (var_1, var_2))
        exit(1)

    # If the variable to consider is:
    #  - temperature
    if (var_1 == "temp"):
        # Define the name of the y-axis of the plot properly
        xaxis_name = "Delta temperature [°C]"
    #  - salinity
    if (var_1 == "salt"):
        # Define the name of the y-axis of the plot properly
        xaxis_name = "Delta salinity [PSU]"
    #  - water level
    if (var_1 == "zeta"):
        # Define the name of the y-axis of the plot properly
        xaxis_name = "Delta water level [m]"

    # Return the name of the y-axis of teh plot
    return xaxis_name

# Define the subtitle of the figure
def get_subtitle(EXT_node, level, filename_1, filename_2):

    # Get the abbreviation of the variable to be considered, from the basename
    # from the basename of input data file
    var_1 = os.path.basename(filename_1).split(".")[0]
    var_2 = os.path.basename(filename_2).split(".")[0]

    # If the variable to consider is not the same in the two datasets, inform
    # the user and exit with an error
    if (var_1 != var_2):
        print("The variable to consider is not the same in the two datasets: %s vs. %s" % (var_1, var_2))
        exit(1)

    # If the variable to consider is:
    #  - temperature
    if (var_1 == "temp"):
        # Define the subtitle of the plot properly
        subtitle = "EXT node " + EXT_node + ", level " + level + " (depth = " + str(depth) + " m)"
    #  - salinity
    if (var_1 == "salt"):
        # Define the subtitle of the plot properly
        subtitle = "EXT node " + EXT_node + ", level " + level + " (depth = " + str(depth) + " m)"
    #  - water level
    if (var_1 == "zeta"):
        # Define the subtitle of the plot properly
        subtitle = "EXT node " + EXT_node

    # Return the subtitle of the plot
    return subtitle

# Plot the desired time series
def plot_data(dt_list, var_diff_list, title, subtitle, figname):

    # Define the font size of the title and subtitle
    title_size = 13
    subtitle_size = 9
    # Define the name and font size of the axes (function calling for the name
    # of the y-axis)
    xaxis_name = "Time [UTC]"
    yaxis_name = get_yaxis_name(file_1, file_2)
    axes_name_size = 10
    # Define the size of ticks labels
    axes_labels_size = 9

    # Define the type and size of the points to be plotted
    point_size = 1.
    point_type = "."
    # Define the width of the line connecting points
    line_size = 2.
    # Define the size of the legend, its location and its marker scale
    legend_size = "x-small"
    legend_loc = "upper right"
    legend_markerscale = 4.

    # Draw a figure with the desired size
    fig_width = 11
    fig_height = 7
    fig, ax = plt.subplots(figsize=(fig_width,fig_height))

    # Set the title and subtitle
    mid = (fig.subplotpars.right + fig.subplotpars.left) / 2.0
    plt.suptitle(title, fontsize = title_size, x = mid)
    plt.title(subtitle, fontsize = subtitle_size)

    # Plot the data
    plt.plot(dt_list, diff_var_list, marker = point_type, markersize = point_size, linewidth = line_size)

    # Plot a horizontal dashed line (mean value of the time series)
    mean_diff_var = np.mean(diff_var_list)
    label_hline = "Mean = " + "%.2f" % mean_diff_var
    ax.axhline(mean_diff_var, linestyle = "--", color = "red", label = label_hline)

    # Set axes names
    plt.xlabel(xaxis_name, fontsize = axes_name_size)
    plt.ylabel(yaxis_name, fontsize = axes_name_size)
    # Set the x- and y-axis labels
    plt.setp(ax.get_xticklabels(), ha = "right", rotation = 45, fontsize = axes_labels_size)
    plt.setp(ax.get_yticklabels(), fontsize = axes_labels_size)
    # Set minor ticks on axes
    ax.xaxis.set_minor_locator(AutoMinorLocator())
    ax.yaxis.set_minor_locator(AutoMinorLocator())
    # Set the legend
    ax.legend(fontsize = legend_size, loc = legend_loc, markerscale = legend_markerscale)
    # Draw the grid
    ax.grid(linestyle = "--")

    # Save and close the figure
    plt.tight_layout()
    plt.savefig(figname)
    plt.close(fig)

    return

# Print the data to the standard output in CSV (.csv) format
def printer(sim_ID_1, sim_ID_2, EXT_node, level, depth, dt_start, dt_end, mean_diff, slope, intercept, r, p, se, filename_1, filename_2):

    # Get the abbreviation of the variable to be considered, from the basename
    # from the basename of input data file
    var_1 = os.path.basename(filename_1).split(".")[0]
    var_2 = os.path.basename(filename_2).split(".")[0]

    # If the variable to consider is not the same in the two datasets, inform
    # the user and exit with an error
    if (var_1 != var_2):
        print("The variable to consider is not the same in the two datasets: %s vs. %s" % (var_1, var_2))
        exit(1)

    # If the variable is the water level, set the depth to 0 m
    if (var_1 == "zeta"):
        depth = 0.0

    # Define the content to be printed and print it
    toprint = sim_ID_1 + ";" + sim_ID_2 + ";" + var_1 + ";" + EXT_node + ";" + str(level) + ";" + str(depth) + ";" + str(dt_start) + ";" + str(dt_end) + ";" + "%.2f" % mean_diff + ";" + "%.3f" % slope + ";" + "%.3f" % intercept + ";" + "%.2f" % r + ";" + "%.2f" % p + ";" + "%.3f" % se
    print(toprint)

    return

# Print metadata
def print_metadata(filename_1, filename_2):

    # Get the abbreviation of the variable to be considered, from the basename
    # from the basename of input data file
    var_1 = os.path.basename(filename_1).split(".")[0]
    var_2 = os.path.basename(filename_2).split(".")[0]

    # If the variable to consider is not the same in the two datasets, inform
    # the user and exit with an error
    if (var_1 != var_2):
        print("The variable to consider is not the same in the two datasets: %s vs. %s" % (var_1, var_2))
        exit(1)

    # If the variable to consider is:
    #  - temperature
    if (var_1 == "temp"):
        # Define the metadata properly
        toprint = "#sim_1_ID;sim_2_ID;variable;EXT_node;level;depth [m];date_time_start (YYYY-MM-DD hh:mm:ss);date_time_end (YYYY-MM-DD hh:mm:ss);mean_difference [degC]"
    #  - salinity
    if (var_1 == "salt"):
        # Define the metadata properly
        toprint = "#sim_1_ID;sim_2_ID;variable;EXT_node;level;depth [m];date_time_start (YYYY-MM-DD hh:mm:ss);date_time_end (YYYY-MM-DD hh:mm:ss);mean_difference [PSU]"
    #  - water level
    if (var_1 == "zeta"):
        # Define the metadata properly
        toprint = "#sim_1_ID;sim_2_ID;variable;EXT_node;level;depth [m];date_time_start (YYYY-MM-DD hh:mm:ss);date_time_end (YYYY-MM-DD hh:mm:ss);mean_difference [m]"

    # Print metadata
    print(toprint)
    return

#  --- END OF FUNCTIONS ---

#  --- START OF MAIN ---

# Import the desired modules
import os
import sys
import numpy as np
import scipy.stats as stats
from datetime import datetime
import matplotlib.pyplot as plt
from matplotlib.ticker import AutoMinorLocator

# Define the depths [m] corresponding to the columns (vertical levels)
depths = [0.6, 1.6, 2.5, 3.5, 4.5, 5.5, 6.5, 7.5, 8.5, 9.5, 10.5, 11, 13, 15, 17, 19, 21, 23, 25, 27, 29, 31, 33.5]

# Get the name (full path) of the initialisation file (first input argument
# read from the standard input)
ini_filename = sys.argv[1]

# Get the starting and ending date and time to consider (second and third
# arguments read from the standard input, respectively). Date and time are in
# the format YYYY-MM-DD::hh:mm:ss
dt_start = datetime.strptime(sys.argv[2], "%Y-%m-%d::%H:%M:%S")
dt_end = datetime.strptime(sys.argv[3], "%Y-%m-%d::%H:%M:%S")

# Open the initialisation file in reading mode
ini_file = open(ini_filename, "r")

# Define a flag to identify the first line of the initialisation file
line_count = 0

# For each line in the initialisation file
for line in ini_file:

    # Remove the "new line" character
    line = line.rstrip("\n")

    # Get the name of the input data files
    file_1 = line.split(";")[0]
    file_2 = line.split(";")[1]

    # Get the ID of the simulations to be considered
    sim_ID_1 = file_1.split("/")[-3]
    sim_ID_2 = file_2.split("/")[-3]

    # Get the basename of the input data files
    f_base_1 = os.path.basename(file_1)
    f_base_2 = os.path.basename(file_2)

    # Get the ID of the EXT node
    EXT_node_1 = f_base_1.split(".")[-1]
    EXT_node_2 = f_base_2.split(".")[-1]

    # If the EXT node read is not the same in the two datasets, inform the user
    # and exit with an error
    if (EXT_node_1 != EXT_node_2):
        print("The current EXT node is not the same in the two datasets: %s vs. %s" % (EXT_node_1, EXT_node_2))
        exit(1)

    # Set the current EXT node and basename
    EXT_node = EXT_node_1
    f_base = f_base_1

    # Function calling: get the number of columns in which the given CSV file
    # is arranged (columns are separated by the ";" character)
    N_1 = get_n_col(file_1)
    N_2 = get_n_col(file_2)

    # If the number of columns is not the same in the two datasets, inform the
    # user and exit with an error
    if (N_1 != N_2):
        print("The number of columns is not the same in the two datasets: %s vs. %s" % (str(N_1), str(N_2)))
        exit(1)

    # Set the number of columns
    N = N_1

    # If the line is the first
    if (line_count == 0):
        # Function calling: print metadata
        print_metadata(file_1, file_2)
        # Switch the flag
        line_count = 1

    # For each vertical level
    for i in range(1, N):

        # Get the corresponding depth [m]
        depth = depths[i-1]

        # Function calling: get the desired data from a given file and in the
        # given time range; specifically, get the time series of a certain
        # variable at the given vertical level, from a file arranged in columns
        # that are separated by "white" spaces (the first column is the date
        # and time, while the others are the variable at different depths).
        # "ith_col" is the index of the column to be considered
        #  - file 1
        data_1 = get_data(file_1, i+1, dt_start, dt_end)
        dt_list_1 = data_1[0]    # date and time
        var_list_1 = data_1[1]   # variable
        #  - file 2
        data_2 = get_data(file_2, i+1, dt_start, dt_end)
        dt_list_2 = data_2[0]    # date and time
        var_list_2 = data_2[1]   # variable

        # Function calling: compute the linear correlation between the given
        # datasets
        corr_par = mk_lin_corr(var_list_1, var_list_2)
        slope = corr_par[0]       # slope
        intercept = corr_par[1]   # intercept
        r = corr_par[2]           # Pearson Correlation Coefficient
        p = corr_par[3]           # p-value
        se = corr_par[4]          # standard error

        # Function calling: compute the difference between the two given
        # datasets, for each time step
        data = mk_diff(dt_list_1, var_list_1, dt_list_2, var_list_2)
        dt_list = data[0]
        diff_var_list = data[1]

        # Define the name of the figure
        figname = sim_ID_1 + "-" + sim_ID_2 + "-" + f_base.split(".")[0] + "-EXTnode" + f_base.split(".")[2] + "-lev" + str(i) + ".png"
        # Define the title of the figure
        title = sim_ID_1 + " - " + sim_ID_2
        # Function calling: define the subtitle of the figure
        subtitle = get_subtitle(EXT_node, str(i), file_1, file_2)

        # Function calling: plot the desired time series
        plot_data(dt_list, diff_var_list, title, subtitle, figname)

        # Function calling: print the data to the standard output in CSV (.csv)
        # format
        printer(sim_ID_1, sim_ID_2, EXT_node, i, depth, dt_start, dt_end, np.mean(diff_var_list), slope, intercept, r, p, se, file_1, file_2)

# Close the initialisation file
ini_file.close()

#  --- END OF MAIN ---
