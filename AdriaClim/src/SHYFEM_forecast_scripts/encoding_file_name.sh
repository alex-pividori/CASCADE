#!/bin/bash

# ==================== VARIABLES ====================

plot_type="$1" 
domain_label="$2"
conf_script_dir="$3"

# --- Tables ---
d1_L_table="$4"
d2_L_table_tpl="$5"
d345_L_table_tpl="$6"

d12345_V_table="$7"

d1_E_table="$8"

# --- Date Time ---
time_b="$9"
DATEB="${10}"

time_in="${11}"
time_fin="${12}"

day_in="${13}" 
day_fin="${14}"

# --- Parameters and templates ---
code_field_length="${15}"
graph_file_name_out_tpl="${16}"
time_resolution="${17}"
t_steps_multi_TS="${18}"
ext="${19}"
level="${20:-0}"

# -----
zeros="$( printf  '0%.0s' $( seq 1 $code_field_length ) )"
BASE36=( $(echo {0..9} {A..Z}) )

# =================================================================

function decimal_to_base36(){

    arg1="$@"
    for i in $(bc <<< "obase=36; $arg1")
    do
        echo -n ${BASE36[$(( 10#$i ))]}
    done
}

# =================================================================
# ====================== Graph name creation ======================
# =================================================================

# file name format:   L-NNNNN_V-NNNNN_T-NNNNN_E-NNNNN.extension

# ------- L field -------
d1_L="$(     grep --max-count=1 "$plot_type"    "${conf_script_dir}/${d1_L_table}"   | awk -F';' '{ print $1 }' )"
d1_L="${d1_L:-?}"

d2_L_table="${d2_L_table_tpl//%d1_L%/${d1_L}}"

if [[ $plot_type != hs_gif_?*_SHYFEM && $plot_type != "time_series_lines_height_multy_day_PYTHON" ]]; then 
    d2_L="$( grep --max-count=1 "$plot_type"    "${conf_script_dir}/${d2_L_table}"   | awk -F';' '{ print $1 }' )"
else
    d2_L="$( grep --max-count=1 "$level"        "${conf_script_dir}/${d2_L_table}"   | awk -F';' '{ print $1 }' )"
fi

d2_L="${d2_L:-?}"

d345_L_table="${d345_L_table_tpl//%d1_L%/${d1_L}}"
d345_L="$(   grep --max-count=1 "${domain_label}" "${conf_script_dir}/${d345_L_table}" | awk -F';' '{ print $1 }' )"
d345_L="${d345_L:-???}"

L_code="${d1_L}${d2_L}${d345_L}"

# ------- V field -------
d12345_V="$( grep --max-count=1 "$plot_type"  "${conf_script_dir}/${d12345_V_table}" | awk -F';' '{ print $1 }' )"
d12345_V="${d12345_V:-?????}"

V_code="${d12345_V}"

# ------- T field -------
# Initial time-step in minutes

sec_b=$(  date -ud "$DATEB $time_b"               +%s )
sec_in=$( date -ud "$DATEB $time_in ${day_in}day" +%s )
code_conv="${zeros}$( decimal_to_base36 $(( ( sec_in - sec_b ) / 60 )) )"
d12345_T="${code_conv: -${code_field_length}}"
d12345_T="${d12345_T:-?????}"

T_code="${d12345_T}"

# ------- E field -------
#  Time period in minutes

d1_E="$(     grep --max-count=1 "$plot_type"    "${conf_script_dir}/${d1_E_table}"   | awk -F';' '{ print $1 }' )"

if [[ "$plot_type" != "TS_multi_diagram_NCL" ]]; then
    sec_fin=$( date -ud "$DATEB $time_fin ${day_fin}day" +%s )
    code_conv1="${zeros}$( decimal_to_base36 $(( ( sec_fin - sec_in ) / 60 )) )"
    d345_E="${code_conv1: -3}"
else
    code_conv2="${zeros}$( decimal_to_base36  $(( time_resolution * t_steps_multi_TS )) )"
    d345_E="${code_conv2: -3}"
fi

d345_E="${d345_E:-???}"

d2_E=0  # this digit will be used for further encoding processes
E_code="${d1_E}${d2_E}${d345_E}"

# ==== Graph file name creation ====
graph_file_name_out="${graph_file_name_out_tpl//%L_code%/${L_code}}"
graph_file_name_out="${graph_file_name_out//%V_code%/${V_code}}"
graph_file_name_out="${graph_file_name_out//%T_code%/${T_code}}"
graph_file_name_out="${graph_file_name_out//%E_code%/${E_code}}"
graph_file_name_out="${graph_file_name_out//%extension%/${ext}}"

# ============ Coded File name output return ===========
echo -n "${graph_file_name_out}"

