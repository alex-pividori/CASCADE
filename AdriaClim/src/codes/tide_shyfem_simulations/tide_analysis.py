import sys
import numpy             as np
import pandas            as pd
from   datetime          import datetime

#================================================================================

input_dir  = sys.argv[1]
file_name  = sys.argv[2]
output_dir = sys.argv[3]

#================================================================================
data_height_frame        = pd.DataFrame( pd.read_csv(  input_dir+"/"+file_name, sep="\s+", header=None, names=["Date-Time","water_height"] ), columns=["Date-Time","water_height"] )

data_height_frame["water_height"] = ( data_height_frame["water_height"] - data_height_frame["water_height"].mean() ).map( '{:.3f}'.format )

data_height_frame.to_csv( output_dir+"/ub_"+file_name , sep=";", header=False, index=False )
