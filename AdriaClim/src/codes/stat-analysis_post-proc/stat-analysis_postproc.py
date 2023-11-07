import sys
import numpy    as np
import pandas   as pd

#================================================================================
# 
#    This Python script is used to create the second csv file present in 
#    http://interreg.c3hpc.exact-lab.it/AdriaClim/SHYFEM_benchmark_comparison/SHYFEM_benchmark_comparison.php
#    and denominated ad 'AdriaClim_SHYFEM_simulations_data_monthly_differences'
#
#================================================================================
input_dir  = "/lustre/arpa/AdriaClim/data/benchmark_comparison/simulation_indexes"
output_dir = ""

file_name = "AdriaClim_SHYFEM_scenario_vs_benchmark.csv"

pd.options.display.max_rows = 10000

#================================================================================

#  Header:
#  Field | Period | Period-label | Decade | Serial-code | RCP | 5th | 25th | 50th | 75th | 95th | min | max | mean | node | lat | lon | global_model | regional_model
#    0       1           2           3           4         5     6     7      8       9    10     11    12     13     14     15    16        17              18

#===============================================================================
#================================= Load Data ===================================
#===============================================================================

data_df  = pd.read_csv( input_dir+"/"+file_name, sep=";", low_memory=False, header=0 )

#================================= Cleaning ====================================
 
data_df["Period-label"] = data_df["Period-label"].replace("year", np.nan) #.dropna( inplace=True )
data_df.dropna( inplace=True )                                            # drop year labels
n_elem = len(data_df.index)
data_df.set_index( keys=np.array(range(0, n_elem)), inplace=True)

#--------------------------------------------------------------------------

fields      = list(set(data_df["Field"].values))
simulations = list(set(data_df["Serial-code"].values))
nodes       = list(set(data_df["node"].values))

#==========================================================================

sal_block_in = 0
sal_block_fin = 1415    # last sal BENCHMARK
temp_block_in = 100536
temp_block_fin = 101951
zos_block_in = 201072
zos_block_fin = 202487

#==========================================================================

wheel=r"\|/-"

for i in range( 0, n_elem):                    # row index


    if ( i % ( n_elem // 1000 ) == 0 ):
        print("Status:", int((i / n_elem)*100) + 1, "%  ", wheel[( int(i/(n_elem // 1000)) % 4)], "\r", end="" )

    data_df.loc[i,"Period"] = format( data_df.loc[i,"Period"], "02d" )

#===================================================== sal ===========================================================

    if ( data_df.iloc[i, 5] != "BENCHMARK" and data_df.iloc[i, 0] == "sal" ):
#         try:
#             sal_block_fin     # blocks variables is the width of the sal, temp and zos variables
#         except NameError:
#             sal_block_fin = i - 1
         
         data_df.loc[i,"mean"] = float( format( data_df.loc[i,"mean"] - data_df.loc[ sal_block_in + ((i - sal_block_fin - 1) % (sal_block_fin - sal_block_in + 1 )), "mean"], ".2f" ))
         data_df.loc[i,"50th"] = float( format( data_df.loc[i,"50th"] - data_df.loc[ sal_block_in + ((i - sal_block_fin - 1) % (sal_block_fin - sal_block_in + 1 )), "50th"], ".2f" ))

#======================================================= temp ========================================================

    if ( data_df.iloc[i, 5] != "BENCHMARK" and data_df.iloc[i, 0] == "temp" ):
#         try:
#             temp_block_in
#         except NameError:
#             temp_block_in = i

#    if ( data_df.iloc[i, 5] != "BENCHMARK" and data_df.iloc[i, 0] == "temp" ):
#         try:
#             temp_block_fin
#         except NameError:
#             temp_block_fin = i - 1
         data_df.loc[i,"mean"] = float( format( data_df.loc[i,"mean"] - data_df.loc[ temp_block_in + ((i - temp_block_fin - 1) % (temp_block_fin - temp_block_in + 1)), "mean"], ".2f" ))
         data_df.loc[i,"50th"] = float( format( data_df.loc[i,"50th"] - data_df.loc[ temp_block_in + ((i - temp_block_fin - 1) % (temp_block_fin - temp_block_in + 1)), "50th"], ".2f" ))

#======================================================== zos =========================================================

    if ( data_df.iloc[i, 5] != "BENCHMARK" and data_df.iloc[i, 0] == "zos" ):
#         try:
#             zos_block_in
#         except NameError:
#             zos_block_in = i

#    if ( data_df.iloc[i, 5] != "BENCHMARK" and data_df.iloc[i, 0] == "zos" ):
#         try:
#             zos_block_fin
#         except NameError:
#             zos_block_fin = i - 1
         data_df.loc[i,"mean"] = float( format( data_df.loc[i,"mean"] - data_df.loc[ zos_block_in + ((i - zos_block_fin -1) % (zos_block_fin - zos_block_in + 1)), "mean"], ".2f" ))
         data_df.loc[i,"50th"] = float( format( data_df.loc[i,"50th"] - data_df.loc[ zos_block_in + ((i - zos_block_fin -1) % (zos_block_fin - zos_block_in + 1)), "50th"], ".2f" ))

#========================================================================================================================

data_df["global_model"] = data_df["global_model"].replace("BENCHMARK", np.nan) 
data_df.dropna( inplace=True )

data_df[["Field","Period","Period-label","Decade","Serial-code","RCP","50th","mean","node","lat","lon","global_model","regional_model"]].to_csv( "./ciao.csv" , sep=";", header=True, index=False )

print("The task is completed!")
