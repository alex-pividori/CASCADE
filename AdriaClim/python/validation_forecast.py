import sys
import inspect
import scipy.stats as stats
from   statistics import mean
import numpy  as np
import pandas as pd
import math
import argparse
import types
import os

# ========================================================================================================================

parser = argparse.ArgumentParser( prog=sys.argv[0], description="The main goal of this Python script is to parse some useful scores (and skill scores) of continuous predictands forecast.\nMandatory arguments are: - Input file name\n                         - Output file name\n\n\
Load the conda package manager. The simpleast way to run this script is: 'python  %(prog)s  input_file.txt  output_file.txt'", epilog="For more information consult the manual.", formatter_class=argparse.RawTextHelpFormatter, add_help=True )

parser.add_argument('input_file', type=str, help="Enter the input raw data file. Three columns CSV file:\n1st column: Model data\n2nd column: Corresponding measures\n3rd column: Reference (e.g. Climatology) data.")
parser.add_argument('output_file', type=str, help="Enter the output data file.")
parser.add_argument('-i', '--info', action='store_true', help="Provides the documentation of this script and the documentation of each function defined.")
parser.add_argument('-sep_in',  '--separator_in',  type=str, choices=[";", ",", "\s+", "|", ":"], default=";", help="Used to change the input file separator. (default: '%(default)s')")
parser.add_argument('-sep_out', '--separator_out', type=str, choices=[";", ",", "\s+", "|", ":"], default=";", help="Used to change the output file separator. (default: '%(default)s')")
parser.add_argument('-dec_out', '--decimal_out',   type=int, default=3, choices=range(16), help="Used to modify the number of decimal digits in output values. (default: %(default)s)")
parser.add_argument('-ecdf', '--ecdf_formula', type=int, default=0, choices=range(3), help="Specify the ECDF formula. \nDescription:\n0 -> i/n\n1 -> i/(n+1)\n2 -> (i - 1/3)/(n + 1/3)\n(default: %(default)s)")
parser.add_argument('-comm', '--comment', type=str, default="#", help="Specify the meta character used as a comment character (default: %(default)s)")

parser.add_argument('--version', action='version', version='%(prog)s 1.0')

# ======================================================================

args = parser.parse_args()

input_file   = args.input_file
output_file  = args.output_file

sep_in       = args.separator_in
sep_out      = args.separator_out

decimal_out  = args.decimal_out
ecdf_formula = args.ecdf_formula

meta         = args.comment

# ============================== Functions ==============================

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

    if (A_perf == A_ref):
        return np.nan
    else:
        return ( A - A_ref )/( A_perf - A_ref )

def ecdf(data):
    """ Compute ECDF by i/n, i/(n+1) or (i - 1/3)/( n + 1/3 ).
    Given an input dataset, this function returns a tuple of two elements, the ascissa and ordinate 
    ECDF (Empirical cumulative distribution function) function values respectively.

    >>> ecdf([1, 2, 3, 4, 5])
        (array([1, 2, 3, 4, 5]), array([0.2, 0.4, 0.6, 0.8, 1. ]))

    The ECDF value can be calculated with three different formulas:
        - np.arange(1, n + 1) / n
        - np.arange(1, n + 1) / (n + 1)
        - (np.arange(1, n + 1) - 1/3) / (n + 1/3)
    """
    x = np.sort(data)
    n = x.size
 
    if   ( ecdf_formula == 0 ):
        y = np.arange(1, n + 1) / n
    elif ( ecdf_formula == 1 ):
        y =  np.arange(1, n + 1) / (n + 1)
    else:
        y = (np.arange(1, n + 1) - 1/3) / (n + 1/3)

    return(x,y)

def ecdf_F(x, data):
    """Empirical cumulative distribution function (ECDF) in correspondence of the x value/values for the
    sample constructed with the 'data' values. It return only the ordinate values of the ECDF.

    ecdf_F(x, data):
    return a pd.Series of the ordinata ecdf_F with x ascissa according with the ECDF for 'data' sample.

    >>> ecdf_F([2, 3], [1, 2, 3, 4, 5] )

    0    0.166667
    1    0.333333
    dtype: float64
    """

    ecdf_y = pd.Series( []*len(x), dtype="int32" )
    index = ecdf(data)[0].searchsorted( x )
 
    for i in range(len(index)):
  
        if ( index[i] == 0 ):
            ecdf_y[i] = 0
        else:
            ecdf_y[i] = ecdf(data)[1][ index[i] - 1 ]

    return ecdf_y

# ==== LEPS function ====
def leps( model, meas):
    """LEPS (linear error in probability space) of the two distributions: model and measures.
       
    leps( model, meas):
        Returns, the linear error in probability space in relation with the two datasets: model
        values and measures.
    
    return: skill_score( np.sum( abs( ecdf_F(model, model) - ecdf_F(meas, meas) ) ), np.sum( abs( 0.5 - ecdf_F(meas, meas) ) ), 0 )
   
    Where 'skill_score' function (type help(skill_score) ) returns: ( A - A_ref )/( A_perf - A_ref ) and 'ecdf_F' function returns
    the empirical cumulative distribution function values in )0,1( for the ascissa input data of the entire sample given.     

    >>> leps( [1, 2, 3, 4, 5, 6], [2, 1, 3.5, 5.5, 4.5, 6.2] )
        0.55

    ref: Daniel S.Wilks, 1995: Statistical Methods in the Atmoshperic sciences.
    """
    return skill_score( np.sum( abs( ecdf_F(model, model) - ecdf_F(meas, meas) ) ), np.sum( abs( 0.5 - ecdf_F(meas, meas) ) ), 0 )
  
# ==== ACC ====     

def ACC( model, meas, Cm):
    """ACC ( Anomaly Correlation Coefficient ) calculates the anomaly correlation coefficient between model and measures 
    respect the Climatological mean value. The ACC is bounded by [-1,+1] extremes.
 
    ACC(model, meas, Cm):
       return: np.sum( ( model - Cm )*( meas - Cm ) ) / np.sqrt( np.sum( ( model - Cm )**2 ) * np.sum( ( meas - Cm )**2 ))
 
    where Cm is the climatolofical mean value reference.
 
    >>> ACC( model, meas, Cm)
        0.85
 
    ref: Daniel S.Wilks, 1995: Statistical Methods in the Atmoshperic sciences.
    """
    return  np.sum( ( model - Cm )*( meas - Cm ) ) / np.sqrt( np.sum( ( model - Cm )**2 ) * np.sum( ( meas - Cm )**2 ))

# ====================== Info handling =====================

if ( args.info ):
    print("This Python script has been created in according to modern forecast model validation. After reading an input file passed through")
    print("a positional argument, a series of scores are calculated and writed into an output CSV file.")
    print("The scores calculated are: Pearson, Spearman, Kendall (tau B), Bias, MAE, MSE, RMSE, LEPS, Skill Score relative to previous scores.")
    print( "\nInfo flag set to 'True'. The entire functions' documentation is printed:" )

    for f_name in [name for name, value in inspect.getmembers(sys.modules[__name__], predicate=lambda x: isinstance(x, types.FunctionType) and x.__module__ == __name__) ]:
        print( "\n'"+f_name+"' function documentation is:\n", eval( f_name+".__doc__" ) )

# ======================== Read data =======================

data = pd.read_csv( input_file, names=["model", "measure", "Climatology"], sep=sep_in )

# data clean
data_cln = data.dropna()

data_model   = data_cln["model"]
data_measure = data_cln["measure"]
data_clim    = data_cln["Climatology"]

# python inplements two versions of Kendall rank correlation coefficient: tau_b and tau_c (default "b")
tau,      p_value_kendall  = stats.kendalltau( data_model, data_measure, variant="b" )
pearson,  p_value_pearson  = stats.pearsonr(   data_model, data_measure ) 
spearman, p_value_spearman = stats.spearmanr(  data_model, data_measure, alternative="two-sided" )

tau_ref,      p_value_kendall_ref  = stats.kendalltau( data_clim, data_measure, variant="b" )
pearson_ref,  p_value_pearson_ref  = stats.pearsonr(   data_clim, data_measure )
spearman_ref, p_value_spearman_ref = stats.spearmanr(  data_clim, data_measure, alternative="two-sided" )

# ==========================================================
# ========================= Scores =========================
# ==========================================================

# Bias
bias     = mean(data_model) - mean(data_measure)
bias_ref = mean(data_clim)  - mean(data_measure)

# MAE: Mean absolute error
MAE      = mean( abs(data_model - data_measure) )
MAE_ref  = mean( abs(data_clim  - data_measure) )

# MSE: Mean squared error
MSE      = mean( (data_model - data_measure)**2 )
MSE_ref  = mean( (data_clim  - data_measure)**2 )

# RMSE: Root Mean squared error
RMSE     = np.sqrt( MSE )
RMSE_ref = np.sqrt( MSE_ref )

# ========================= Writing Process =========================

res_out = "{:."+str(decimal_out)+"f}"

meta_data = meta + "\n" + \
            meta + " " + "Pearson: Pearson correlation coefficient.\n" + \
            meta + " " + "Spearman: Spearman's rank correlation coefficient.\n" + \
            meta + " " + "Kendall_tau: Kendall rank correlation coefficient. tau_b formula is used by default.\n" + \
            meta + " " + "bias: Bias among means.\n" + \
            meta + " " + "MAE: Mean Absolute Error.\n" + \
            meta + " " + "MSE: Mean Squared Error.\n" + \
            meta + " " + "RMSE: Root Mean Squared Error.\n" + \
            meta + " " + "LEPS: Linear Error in Probability Space.\n" + \
            meta + " " + "SS_Aindex: Skill Score between model and reference 'Aindex'. SS_Aindex = ( A - A_ref )/( A_perf - A_ref ).\n" + \
            meta + "\n"

header = "Pearson" + sep_out + "Spearman"   + sep_out + "Kendall_tau" + sep_out + "bias"    + sep_out + "MAE"     + sep_out + "MSE"    + sep_out + "RMSE"   + sep_out + \
         "LEPS"    + sep_out + "SS_Pearson" + sep_out + "SS_Spearman" + sep_out + "SS_Ktau" + sep_out + "SS_bias" + sep_out + "SS_MAE" + sep_out + "SS_MSE" + sep_out + "SS_RMSE"

if ( os.path.isfile(output_file) ):
    with open( output_file, 'r+') as f:
        first_line = f.readline().strip('\n')
        if ( first_line[0] != meta ):
            f.write( meta_data + header + "\n" )
else:
    with open( output_file, 'w') as f:
        f.write( meta_data + header + "\n" )    

with open( output_file, 'a') as f:
    f.write( res_out.format(pearson)     + sep_out + \
             res_out.format(spearman)    + sep_out + \
             res_out.format(tau)         + sep_out + \
             res_out.format(bias)        + sep_out + \
             res_out.format(MAE)         + sep_out + \
             res_out.format(MSE)         + sep_out + \
             res_out.format(RMSE)        + sep_out + \
             res_out.format( leps(data_model, data_measure) )              + sep_out + \
             res_out.format( skill_score( pearson,  pearson_ref,  1 ) )    + sep_out + \
             res_out.format( skill_score( spearman, spearman_ref, 1 ) )    + sep_out + \
             res_out.format( skill_score( tau,      tau_ref,      1 ) )    + sep_out + \
             res_out.format( skill_score( bias,     bias_ref,     0 ) )    + sep_out + \
             res_out.format( skill_score( MAE,      MAE_ref,      0 ) )    + sep_out + \
             res_out.format( skill_score( MSE,      MSE_ref,      0 ) )    + sep_out + \
             res_out.format( skill_score( RMSE,     RMSE_ref,     0 ) )  + "\n"  )

