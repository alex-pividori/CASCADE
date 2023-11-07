import sys
import numpy             as np
import pandas            as pd
import matplotlib.pyplot as plt
from   scipy.fft         import  rfft, rfftfreq
from   datetime          import datetime
from   matplotlib.ticker import AutoMinorLocator


input_dir  = sys.argv[1]
file_name  = sys.argv[2]
output_dir = sys.argv[3]

#================================================================================

data_height              = pd.read_csv(  input_dir+"/"+file_name, sep="\s+", header=None, names=["Date-Time","water_height"] )
data_height["Date-Time"] = pd.Series( [ datetime.strptime( date_x, "%Y-%m-%d::%H:%M:%S" ) for date_x in data_height["Date-Time"] ] )
data_height_frame        = pd.DataFrame( data_height, columns=["Date-Time","water_height"] )

xf = rfftfreq(  len(data_height_frame["water_height"]) , 3600 )
yf = rfft(     list(data_height_frame["water_height"])        ) 

#=================================================================================
#===================================== PLOT ======================================
#=================================================================================

figname  = output_dir + "/" + file_name + ".png"
EXT_node = file_name.split(".")[2]


title    = "Power Spectrum of Sea Level Height (FFT)"
subtitle = "Node " + EXT_node + ", hourly data from: " + data_height["Date-Time"][0].strftime("%Y-%m-%d") + " to " + \
            data_height["Date-Time"][len(data_height["Date-Time"]) - 1].strftime("%Y-%m-%d")

title_size    = 13
subtitle_size = 9

# Define the name and font size of the axes
xaxis_name = "Frequency [Hz]"
#yaxis_name = "Log$_{10}$(power spectrum)"
yaxis_name = "Power Spectrum"
axes_name_size = 11
# Define the size of ticks labels
axes_labels_size = 9

# Define the type and size of the points to be plotted
point_size = 1.
point_type = "."
# Define the width of the line connecting points
line_size = 2.
# Define the size of the legend, its location and its marker scale
legend_size = "large"
legend_loc = "upper right"
legend_markerscale = 4.

# Draw a figure with the desired size
fig_width = 11
fig_height = 7
fig, ax = plt.subplots( figsize=(fig_width,fig_height) )

# Set the title and subtitle
mid = (fig.subplotpars.right + fig.subplotpars.left) / 2.0
plt.suptitle(title, fontsize = title_size, x = mid)
plt.title(subtitle, fontsize = subtitle_size)

# Plot the data
#yf = np.log10(yf)
plt.plot( xf, np.abs(yf), linewidth = line_size )
plt.xlim([0.0, 0.00005])
plt.ylim([0.0, 1000.0 ])
#plt.xlim([-1.0, 25.0])


T_12h   = 1.0 / ( 12   * 3600 )
T_12_4h = 1.0 / ( 12.4 * 3600 )
T_24h   = 1.0 / ( 24   * 3600 )
ax.axvline( T_12h,   linestyle = "--", color = "red",    label = "T = 12 h"  )
ax.axvline( T_12_4h, linestyle = "--", color = "yellow", label = "T = 12.4 h")
ax.axvline( T_24h,   linestyle = "--", color = "orange", label = "T = 24 h"  )

# Set axes names
plt.xlabel(xaxis_name, fontsize = axes_name_size)
plt.ylabel(yaxis_name, fontsize = axes_name_size)
# Set the x- and y-axis labels
plt.setp(ax.get_xticklabels(), ha = "right", fontsize = axes_labels_size)
plt.setp(ax.get_yticklabels(), fontsize = axes_labels_size)
# Set minor ticks on axes
ax.xaxis.set_minor_locator(AutoMinorLocator())
ax.yaxis.set_minor_locator(AutoMinorLocator())

ax.legend(fontsize = legend_size, loc = legend_loc, markerscale = legend_markerscale)
ax.grid()


plt.savefig(figname)
plt.close(fig)
