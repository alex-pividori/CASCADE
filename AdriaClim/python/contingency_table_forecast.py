import sys
import inspect
import numpy  as np
import pandas as pd
import argparse
import types
import os

# ========================================================================================================================

parser = argparse.ArgumentParser( prog=sys.argv[0], description="The main goal of this Python script is to parse some useful scores (and skill scores) for categorical forecast validation.\n\The mandatory arguments are: - Input file name\n                             - Output file template\n                             - Bin extremes (space separated)\n\n\
Load the conda package manager. The simpleast way to run this script is: 'python  %(prog)s  input_file.txt  %%%%index%%%%.csv  -b  1 12 15 20 25'", epilog="For more information consult the manual.", formatter_class=argparse.RawTextHelpFormatter, add_help=True )

parser.add_argument('input_file',  type=str, help="Enter the input raw data file. Two columns CSV file.")
parser.add_argument('output_file', type=str, help="Enter the output file template. '%%%%index%%%%' field will be substituted with the score name/acronym (e.g: %%%%index%%%%.csv).")
parser.add_argument("-b", '--bin_range', required=True, type=float, nargs="+", help="Enter bin ranges. The lower value is included, the higher one is excluded.\nThe bin intervals are calculated only between the values inserted (bin_1: from n_1 to n_2, bin_2 from n_2 to n_3 etc etc).\nFormat: -b  n_1 n_2 n_3 ... n_m where n_* is float or int.")
parser.add_argument('-i', '--info', action='store_true', help="Provides the documentation of this script and the documentation of each function defined.")
parser.add_argument('-sep_in',  '--separator_in',  type=str, choices=[";", ",", "\s+", "|", ":"], default=";", help="Used to change the input file separator. (default: '%(default)s').")
parser.add_argument('-sep_out', '--separator_out', type=str, choices=[";", ",", "\s+", "|", ":"], default=";", help="Used to change the output file separator. (default: '%(default)s').")
parser.add_argument('-dec_out', '--decimal_out',   type=int, default=3, choices=range(16), help="Used to modify the number of decimal digits in output values. (default: %(default)s).")
parser.add_argument('-comm', '--comment', type=str, default="#", help="Specify the meta character used as a comment character for the initial metadata (default: %(default)s).")

parser.add_argument('--version', action='version', version='%(prog)s 1.0')

# ======================================================================

args            = parser.parse_args()

input_file      = args.input_file
output_file_tpl = args.output_file

sep_in          = args.separator_in
sep_out         = args.separator_out

decimal_out     = args.decimal_out

value_ranges    = args.bin_range
n_intervals     = len(value_ranges) - 1

meta            = args.comment

# =========================================================

def skill_score( A, A_ref, A_perf ):
    '''This function calculates the skill score (SS) of a generic (A) score (e.g MAE, MSE etc )
    respect to a reference score value of the same kind (A_ref). A_ref could be the
    climatological or the persistance value.
    The SS is interpreted as a (percentage) improvement over the reference forecasts.
    If A = A_perf, the skill score attains its maximum value of 1 (or 100%). If A = A_ref, then
    SS_ref = 0%, indicating no improvement over the reference forecasts.

    skill_score( A, A_ref, A_perf )
        Returns the Skill Score respect the A_ref reference value.
        return ( A - A_ref )/( A_perf - A_ref )

    >>> skill_score(0.6, 0.8, 0)
        0.25

    If A_ref is equal to A_perf, a ZeroDivisionError is raised.'''

    try:
        iter(( A - A_ref )/( A_perf - A_ref ))
        return (( A - A_ref )/( A_perf - A_ref )).replace(to_replace = [np.inf, -np.inf], value = np.nan )
    except:
        if (A_perf == A_ref):
            return np.nan
        else:
            return ( A - A_ref )/( A_perf - A_ref )

def reducted_matrix( tab, j ):
    '''This function transforms an n x n squared matrix into a 2 x 2 reduced squared matrix
    relatively to a particular event of the 'n' events set.
    This process is really useful to semplify the parsing process of some scores.
    The algorithm consist in:

    a = A_jj
    b = sum_i( A_ji ) - A_jj
    c = sum_i( A_ij ) - A_jj
    d = sum_ab( A_ab ) with a != j and b != j

    for the j-th event. Where a, b, c, d are the table's cells from left to right and from the
    top to the bottom. A_ij is the original n x n matrix and the first index is referred to the
    row and the second to the column.

    reducted_matrix( tab, j )
        returns a 2 x 2 pd.DataFrame
        tab: Input DataFrame
        j  : Event (starting from 0) for which we want to create the reduced contingency table. 
        return pd.DataFrame( [ [tab[j][j], np.sum( tab.loc[j] ) - tab[j][j] ],\
               [ np.sum(tab[j]) - tab[j][j], np.sum(np.sum(tab.drop(j, axis=0).drop(j,axis=1)))]]) 

    >>> A = pd.DataFrame( [[ 0,  6,  7, 2], \n
                           [14, 88, 28, 7], \n
                           [ 7, 19, 13, 2], \n
                           [ 0,  3,  1, 1]] )

    >>> reducted_matrix( A, 0 )   

        [[ 0,  15 ],
         [21, 162 ]]
    '''
    # j: event. It goes from 0 to (n_intervals - 1)
    return pd.DataFrame( [ [tab[j][j], np.sum( tab.loc[j] ) - tab[j][j] ], [ np.sum( tab[j] ) - tab[j][j], np.sum(np.sum( tab.drop(j, axis=0).drop(j, axis=1) )) ]] )

# ==========================================================
#                    Functions scores
# ==========================================================

def Bias( tab ):
    '''This function parses the biases of N events in a contingency table. 
    Convention used: row are the forecasts and columns the observations.
    In a simple 2 x 2 table, the bias is: B = (a+b)/(a+c)

    bias(tab)
       returns a pd.Series with the biases for each of the j events.

    >>> A = pd.DataFrame( [[ 0,  6,  7, 2], \n
                           [14, 88, 28, 7], \n
                           [ 7, 19, 13, 2], \n
                           [ 0,  3,  1, 1]] )

    >>> bias(A)
    0    0.714286
    1    1.181034
    2    0.836735
    3    0.416667
    '''
    return  pd.Series([ np.sum(tab.loc[i]) / np.sum(tab[i]) for i in range(n_intervals) ] )

def H_rate( tab ):
    '''This function parses the Hit-rate or the proportion correct in a contingency table.
    Convention used: row are the forecasts and columns the observations.
    In a simple 2 x 2 table, the hit-rate is: H = (a+d)/n
    Where n = a + b + c + d

    H_rate(tab)
       returns a float with the hit-rate of the entire contingency table.

    >>> A = pd.DataFrame( [[ 0,  6,  7, 2], \n
                           [14, 88, 28, 7], \n
                           [ 7, 19, 13, 2], \n
                           [ 0,  3,  1, 1]] )

    >>> H_rate(A)
        0.5151 
    '''
    return np.trace(tab) / np.sum( tab.sum() )

def CSI( tab ):
    '''This function parses the Critical Success index (CSI) or threat score (TS) of N events in a contingency table.
   Convention used: row are the forecasts and columns the observations.
   In a simple 2 x 2 table, the CSI is: TS = CSI = a/(a + b + c)

   CSI(tab)
       returns a pd.Series with the CSI for each of the j events.

    >>> A = pd.DataFrame( [[ 0,  6,  7, 2], \n
                           [14, 88, 28, 7], \n
                           [ 7, 19, 13, 2], \n
                           [ 0,  3,  1, 1]] )

    >>> CSI(A)
    0    0.000000
    1    0.533333
    2    0.168831
    3    0.062500
    '''
    return pd.Series([ tab[i][i] / (np.sum(tab.loc[i]) + np.sum(tab[i]) - tab[i][i] ) for i in range(n_intervals) ] )

def POD( tab ):
    '''This function parses the Probability Of Detection (POD) of N events in a contingency table.
    Convention used: row are the forecasts and columns the observations.
    In a simple 2 x 2 table, the POD is: POD = a/(a + c)

    POD(tab)
       returns a pd.Series with the POD for each of the j events.

    >>> A = pd.DataFrame( [[ 0,  6,  7, 2], \n
                           [14, 88, 28, 7], \n
                           [ 7, 19, 13, 2], \n
                           [ 0,  3,  1, 1]] )

    >>> POD(A)
    0    0.000000
    1    0.758621
    2    0.265306
    3    0.083333
    '''
    return pd.Series([ tab[i][i] /  np.sum(tab[i]) for i in range(n_intervals) ])

def FAR( tab ):
    '''This function parses the False Allarm Rate (FAR) of N events in a contingency table.
    Convention used: row are the forecasts and columns the observations.
    In a simple 2 x 2 table, the FAR is: FAR = b/(a + b)

    FAR(tab)
       returns a pd.Series with the FAR for each of the j events.

    >>> A = pd.DataFrame( [[ 0,  6,  7, 2], \n
                           [14, 88, 28, 7], \n
                           [ 7, 19, 13, 2], \n
                           [ 0,  3,  1, 1]] )

    >>> FAR(A)
    0    1.000000
    1    0.357664
    2    0.682927
    3    0.800000
    '''
    return pd.Series([ (np.sum(tab.loc[i]) - tab[i][i]) / np.sum(tab.loc[i]) for i in range(n_intervals) ])

def SR( tab ):
    '''This function parses the Success Ratio (SR) of N events in a contingency table.
    Convention used: row are the forecasts and columns the observations.
    In a simple 2 x 2 table, the SR is: SR = a/(a + b) = 1 - FAR
 
    SR(tab)
        returns a pd.Series with the SR for each of the j events.
        return 1 - FAR( tab )

    >>> A = pd.DataFrame( [[ 0,  6,  7, 2], \n
                           [14, 88, 28, 7], \n
                           [ 7, 19, 13, 2], \n
                           [ 0,  3,  1, 1]] )

    >>> SR(A)
    0    0.000000
    1    0.642336
    2    0.317073
    3    0.200000
    '''
    return 1 - FAR(tab)

def PCR( tab ):
    '''This function parses the Probability of Correct Rejection (PCR) of N events in a contingency table.
    Convention used: row are the forecasts and columns the observations.
    In a simple 2 x 2 table, the PCR is: PCR = d/(b + d) 

    PCR(tab)
       returns a pd.Series with the PCR for each of the j events.

    >>> A = pd.DataFrame( [[ 0,  6,  7, 2], \n
                           [14, 88, 28, 7], \n
                           [ 7, 19, 13, 2], \n
                           [ 0,  3,  1, 1]] )

    >>> PCR(A)
    0    0.915254
    1    0.402439
    2    0.812081
    3    0.978495 
    '''
    return pd.Series([ reducted_matrix(tab, i)[1][1] / (reducted_matrix(tab, i)[1][1] + reducted_matrix(tab, i)[1][0] ) for i in range(n_intervals) ])

# ==========================================================
#                 Summary skill scores
# ==========================================================

def HSS( tab ):
    '''This function parses the Heidke skill score (HSS) of N classes in a contingency table.
    Convention used: row are the forecasts and columns the observations.
    In a simple 2 x 2 table, the HSS is: HSS = 2*(a*d - b*c) / ( (a + c)*(c + d) + (a + b)*(b + d) )

    HSS(tab)
       returns a pd.Series with the HSS for each of the jth class.

    >>> A = pd.DataFrame( [[ 0,  6,  7, 2], \n
                           [14, 88, 28, 7], \n
                           [ 7, 19, 13, 2], \n
                           [ 0,  3,  1, 1]] )

    >>> HSS(A)
    0    0.915254
    1    0.402439
    2    0.812081
    3    0.978495
    '''
    heidke_score = [np.nan] * n_intervals

    for i in range(n_intervals):
        a = reducted_matrix(tab, i)[0][0]
        b = reducted_matrix(tab, i)[1][0]
        c = reducted_matrix(tab, i)[0][1]
        d = reducted_matrix(tab, i)[1][1]

        heidke_score[i] = 2*(a*d - b*c) / ( (a + c)*(c + d) + (a + b)*(b + d) )

    return pd.Series(heidke_score)


def KSS( tab ):
    '''This function parses the Hanssen-Kuipers discriminant (KSS) or Kuipers' performance 
    index or True skill score of N classes in a contingency table.
    Convention used: row are the forecasts and columns the observations.
    In a simple 2 x 2 table, the KSS is: KSS = (a*d - b*c) / (a + c)*(b + d) 

    KSS(tab)
       returns a pd.Series with the KSS for each of the jth class.

    >>> A = pd.DataFrame( [[ 0,  6,  7, 2], \n
                           [14, 88, 28, 7], \n
                           [ 7, 19, 13, 2], \n
                           [ 0,  3,  1, 1]] )

    >>> KSS(A)
    0   -0.084746
    1    0.161060
    2    0.077387
    3    0.061828
    '''
    kuipers_score = [np.nan] * n_intervals

    for i in range(n_intervals):
        a = reducted_matrix(tab, i)[0][0]
        b = reducted_matrix(tab, i)[1][0]
        c = reducted_matrix(tab, i)[0][1]
        d = reducted_matrix(tab, i)[1][1]

        kuipers_score[i] = (a*d - b*c) / ( (a + c)*(b + d) )

    return pd.Series(kuipers_score)

# ====================== Info handling =====================

if ( args.info ):
    print("This Python script has been created in according to modern forecast model validation. After reading an input file passed through")
    print("a positional argument, a categorical table is created and series of scores are calculated and writed into an output CSV file.")
    print( "\nInfo flag set to 'True'. The entire functions' documentation is printed:" )

    for f_name in [name for name, value in inspect.getmembers(sys.modules[__name__], predicate=lambda x: isinstance(x, types.FunctionType) and x.__module__ == __name__) ]:
        print( "\n'"+f_name+"' function documentation is:\n", eval( f_name+".__doc__" ) )

# ======================== Read data =======================

data = pd.read_csv( input_file, names=["model", "measure", "Climatology"], sep=sep_in )

# ==== data clean ====
data_cln = data.dropna()

data_model   = data_cln["model"]
data_measure = data_cln["measure"]
data_clim    = data_cln["Climatology"]

# ======================= Cross Table ========================

cat_model      = pd.cut( data_model  , bins = value_ranges, include_lowest=True, right=False, duplicates="raise", labels = range(n_intervals) )
cat_measure    = pd.cut( data_measure, bins = value_ranges, include_lowest=True, right=False, duplicates="raise", labels = range(n_intervals) )
cat_ref        = pd.cut( data_clim,    bins = value_ranges, include_lowest=True, right=False, duplicates="raise", labels = range(n_intervals) )

model_crosstab = pd.crosstab( cat_model, cat_measure, margins = False, dropna=False)
ref_crosstab   = pd.crosstab( cat_ref,   cat_measure, margins = False, dropna=False)

# ========================= Writing Process =========================

res_out = "{:."+str(decimal_out)+"f}"
# ============== set precision ===============
np.set_printoptions( precision = decimal_out )

indexes     = ["Bias", "H", "POD", "PCR", "CSI", "FAR", "SR", "HSS", "KSS", "SS_Bias", "SS_H", "SS_POD", "SS_PCR", "SS_CSI", "SS_FAR", "SS_SR", "SS_HSS", "SS_KSS"]

header_info = {"Bias":"Bias in categorical forecast", "H":"Hit rate or the proportion correct", "POD":"Probability Of Detection", "PCR":"Probability Of Correct Rejection", \
                "CSI":"Critical Success Index or Threat Score (TS)", "FAR":"False Alarm Rate", "SR":"Success Ratio (1-FAR)", "HSS":"Heidke skill score", \
                "KSS":"Kuipers' performance index, Hanssen-Kuipers discriminant or true skill score", \
                "SS_Aindex":"Skill Score between model and reference 'Aindex'. SS_Aindex = ( A - A_ref )/( A_perf - A_ref )" }

# =======================================================================
for index in indexes: 

    # ==== Perf Index ====
    A_perf = 0 if ( "FAR" in index ) else 1
  
    # ====================

    if ( "SS_" in index ):
        meta_data = meta                                                                         + "\n"  + \
                    meta + " " + "Bin intervals: "+str(value_ranges)                             + ".\n" + \
                    meta + " " + "SS_Aindex" + ": "+ header_info["SS_Aindex"]                    + ".\n" + \
                    meta + " " + index.split("_")[1] + ": " + header_info[ index.split("_")[1] ] + ".\n" + \
                    meta + "\n"
    else:
        meta_data = meta + "\n" + \
                    meta + " " + "Bin intervals: "+str(value_ranges) + ".\n" + \
                    meta + " " + index + ": "+ header_info[index]    + ".\n" + \
                    meta + "\n"

    if ( index != "H" and index != "SS_H" ):
        header = "Bin_interval" + sep_out + index
    else:
        header = index

    output_file = output_file_tpl.replace("%%index%%", index) 

    if ( os.path.isfile(output_file) ):
        with open( output_file, 'r+') as f:
            first_line = f.readline().strip('\n')
            if ( first_line[0] != meta ):
                f.write( meta_data + header + "\n" )
    else:
        with open( output_file, 'w') as f:
            f.write( meta_data + header + "\n" )

# ===================================================================

    if   ( index == "H" ):
        with open( output_file, 'a') as f:
            f.write( res_out.format( H_rate(model_crosstab) ) + "\n" )
    elif ( index == "SS_H" ):
        with open( output_file, 'a') as f:
            f.write( res_out.format( skill_score( H_rate(model_crosstab), H_rate(ref_crosstab), 1 )) + "\n" )
    else:
        if ( "SS_" in index ):
            score_v = eval( "skill_score("+ index.split("_")[1] + "(model_crosstab)," + index.split("_")[1] +"(ref_crosstab), " + str(A_perf) + ")" )
            with open( output_file, 'a') as f:
                for i in range(n_intervals):
                    f.write( "["+str(value_ranges[i])+","+str(value_ranges[i+1])+"[" + sep_out + res_out.format(score_v[i]) + "\n" )
        else:
            score_v = eval( index+"(model_crosstab)" )
            with open( output_file, 'a') as f:
                for i in range(n_intervals):
                    f.write( "["+str(value_ranges[i])+","+str(value_ranges[i+1])+"[" + sep_out + res_out.format(score_v[i]) + "\n" )

