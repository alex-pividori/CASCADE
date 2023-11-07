;*****************************************************************************
;
; Read potential temp (TEMP), salinity (SALT)
; Compute potential density (PD) for specified range PD(t,s)
; (use ncl function based on Yeager's algorithm for rho computation)
; Used K.Lindsay's "za" for zonal avg -- already binned into basins
; Plots temp vs salt (scatter plot), pd overlay
;
; The example model is "tsdiagram_1.ncl" downloadable from  
; https://www.ncl.ucar.edu/Applications/tsdiagram.shtml
;
;******************************************************************************
;
; DESCRIPTION:    this NCL script is inspired by the "tsdiagram_1.ncl" NCL script
;                 (NCL Graphics) which can be found at the following link:
;                 https://www.ncl.ucar.edu/Applications/iso.shtml in the section
;                 "Contours without maps".
;                 This script is aimed at drawing a TS plot with color change of Markers
;                 over the north of the Adriatic sea. The color intensity of dots have to change in function of depth.
;                 this is performed with a variable RGB index in a do cycle. Has been used netCDF
;                 file from COPERNICUS-Marine. This program, differently from the others, create a TS diagram of a single
;                 water column in a single grid point. So it overlap many diagrams with a single dot with a different color
;                 for each cycle.
;                 for each data file specified in an initialisation file (see file_inizializzazione.txt).
;                 (*) https://www.ncl.ucar.edu/Document/Functions/Contributed/int2p_n_Wrap.shtml
;
; EXTERNAL CALLS: none.
;
; EXTERNAL FILES: - CSV data files;
;                   For depths, temperature and salinity:
;                   ( tmp file denominated "data_TS.txt" )
;
;
; DEVELOPER:      Alex Pividori (alex.pividori@arpa.fvg.it)
;                 ARPA FVG - S.O.C. Stato dell'Ambiente
;                 "AdriaClim" Interreg IT-HR project
;
; CREATION DATE:  15/03/2023
;
; NCL Version:    6.6.2
;
; MODIFICATIONS:  16/03/2023 --->  Creation of script starting from the ncl code "S_T_diagram.ncl"
;                                  present in the path: "/lustre/arpa/scratch/pividori.tmp/golfo/S_T_diagram"
;
;=====================================================================================================

begin  

; =============================== PARAMETERS ========================================

; plot limits

;  The plot limits are useful to plot a many graphs on a single xy axis table to have the same scale and labels

;=====> initial resource settings ==========

data = readAsciiTable( data_input_file, 3, "float", 0 )

depths = data(:,0)
temp   = data(:,1)
salt   = data(:,2)

salt_max  = max(salt)
temp_max  = max(temp)
depth_min = min(depths)
depth_max = max(depths)

;======================================================
;             SEASON CHECK (Temperature)
;======================================================

if      ( temp_max .ge. 26.0 ) then
    ; we are in summer
    tmincn = 13.0
    tmaxcn = 30.0
else if ( temp_max .ge. 23.0 ) then
    ; we are in autumn
    tmincn = 14.0
    tmaxcn = 26.0
else if ( temp_max .ge. 14.0 ) then
    ; we are in spring
    tmincn = 10.0
    tmaxcn = 23.0
else
    ; we are in winter
    tmincn = 7.0
    tmaxcn = 14.0
end if
end if
end if

;======================================================
;                 RANGE CHECK (Salinity)
;======================================================

if      ( salt_max .ge. 30.0 ) then
    smincn = 30.0
    smaxcn = 40.0
else if ( salt_max .ge. 20.0 ) then
    smincn = 20.0
    smaxcn = 30.0
else
    smincn = 5.0
    smaxcn = 20.0
end if
end if

;==========================================================
;                         pd plot
;==========================================================

; Before I create che pd lines plot

resov                            = True
resov@gsnDraw                    = False    ; Will draw later, after overlaying
resov@gsnFrame                   = False
resov@cnLevelSelectionMode       = "AutomaticLevels"
resov@cnInfoLabelOn              = "False"
resov@cnLineLabelPlacementMode   = "Constant"
resov@cnLineLabelFontHeightF     = ".02"

depth = 0.                           ;in meters
tspan = fspan(tmincn, tmaxcn, 51)    ; create an array of temperature points by dividing the temperature interval in 51 parts
sspan = fspan(smincn, smaxcn, 51)    ; create an array of salinity points by dividing the salinity interval in 51 parts

; the more points the better... using Yeager's numbers

t_range = conform_dims( (/ 51, 51 /), tspan, 0)     ; create a 51x51 vector using the tspan elements. The first is the number of raws, the second the colums.
s_range = conform_dims( (/ 51, 51 /), sspan, 1)     ; number elements of sspan must be a subset of 51*51

pd = rho_mwjf( t_range, s_range, depth)

pd!0    = "temp"
pd!1    = "salt"
pd&temp = tspan
pd&salt = sspan
pd      = 1000.*(pd-1.)        ; Put into kg/m3 pot den units that exceed a m3 of pure water

;  printVarSummary(pd)
;  printVarInfo(pd,"rho_mwjf")

; create the pd lines plot

resov                            = True
resov@gsnDraw                    = False    ; Will draw later, after overlaying
resov@gsnFrame                   = False
resov@cnLevelSelectionMode       = "AutomaticLevels"
resov@cnInfoLabelOn              = "False"
resov@cnLineLabelPlacementMode   = "Constant"
resov@cnLineLabelFontHeightF     = ".02"

;=======================================================
;              CREATION DATE VARIABLE
;=================================================
                                            
; Year, month and day extraction forecast 

time_f_s = str_split( time_f, ":" )
hour_f   = time_f_s(0)
minute_f = time_f_s(1)

date_f_s = str_split_by_length( date_f, (/4, 2, 2/))
year_f   = date_f_s(0)
month_f  = date_f_s(1)           
day_f    = date_f_s(2)

; Year, month and day extraction bulletin date

time_b_s = str_split( time_b, ":" )
hour_b   = time_b_s(0)
minute_b = time_b_s(1)

date_b_s = str_split_by_length( date_b, (/4, 2, 2/))
year_b   = date_b_s(0)
month_b  = date_b_s(1)
day_b    = date_b_s(2)

; seconds are set to 0
minuntes_val_f = cd_inv_calendar( toint(year_f), toint(month_f), toint(day_f), toint(hour_f), toint(minute_f), 0, "minutes", 0 )
minuntes_val_b = cd_inv_calendar( toint(year_b), toint(month_b), toint(day_b), toint(hour_b), toint(minute_b), 0, "minutes", 0 )

delta_minutes = minuntes_val_f - minuntes_val_b

hours_forecast    = toint( delta_minutes / 60 )
minutes_forecast  = toint( toint(delta_minutes) % 60 )

;=====================================================================================
      
; Date formatting

date_plot_f = year_f+"-"+month_f+"-"+day_f        ; to be used in plot's subtitles
date_plot_b = year_b+"-"+month_b+"-"+day_b

;======================================= Graphics ====================================

wks= gsn_open_wks( "png", output_dir+"/"+output_file )

;=====================================================================================

; Before I create che pd lines plot

resov                            = True
resov@gsnDraw                    = False    ; Will draw later, after overlaying
resov@gsnFrame                   = False
resov@cnLevelSelectionMode       = "AutomaticLevels"
resov@cnInfoLabelOn              = "False"
resov@cnLineLabelPlacementMode   = "Constant"
resov@cnLineLabelFontHeightF     = ".02"

plotpd = gsn_csm_contour(wks, pd, resov)      ; create the underground mask with constant density lines

;======================================================================================
;                                     scatter plot
;======================================================================================

res                     = True
res@gsnMaximize         = True
res@gsnDraw             = False       ; Will draw later, after overlaying
res@gsnFrame            = False

res@tiMainString        = "SHYFEM forecast run: "+date_plot_b+" "+hour_b+":"+minute_b+" UTC  +"+sprinti("%0.2i", hours_forecast)+":"+sprinti("%0.2i", minutes_forecast)+"h"
res@xyMarkLineModes     = "Markers"   ; simbols used to mark the points
res@xyMarkers           = 16
res@txFontHeightF       = 0.015       ; font dimension of center string

res@tiXAxisFontHeightF  = 0.02
res@tiYAxisFontHeightF  = 0.02

;------ min and max extreme of X and Y axes

res@trXMinF             = smincn      
res@trXMaxF             = smaxcn
res@trYMinF             = tmincn
res@trYMaxF             = tmaxcn

res@tiXAxisString       = "Salinity [g/kg]"             
res@tiYAxisString       = "Temperature [~S~o~N~C]"     ; the string ~S~o~N~ generate the special character °


parallelpos = 1.15               ; the legend is disposed vertically, so the parallelpos remain constant
yposition   = -0.2               ; the initial position of y position of legend

plotpd = gsn_csm_contour(wks,pd,resov)

;===============================================================================================================

res@gsnRightString      = "Depth: "+depth_min+" - "+depth_max+" m"     
res@gsnCenterString     = "lat: "+latitude+"~S~o~N~N"+" lon: "+longitude+"~S~o~N~E"
res@gsnLeftString       = "Node: "+node_name         

i_fin = dimsizes( depths ) - 1

do i=0,i_fin   ; cycle on depths
  
    res@pmLegendDisplayMode    = "Always"                                 ; turn on legend
    res@pmLegendSide           = "Top"                                    ; Change order of collocation legends
;   res@lgAutoManage           = True

    res@pmLegendOrthogonalPosF = yposition                                ; move units down, distance from the top of the graph
    res@pmLegendParallelPosF   = parallelpos                              ; move units right, distance from legends

    res@pmLegendWidthF         = 0.05                                     ; Change width and
    res@pmLegendHeightF        = 0.05                                     ; height of legend.
    res@lgPerimOn              = False                                    ; turn on/off box around
    res@lgLabelFontHeightF     = .013                                     ; label font height

    if (depths(i) .lt. 10.0 ) then
        res@pmLegendParallelPosF   = parallelpos - 0.0048                    ; this is only an aesthetic tool to allineate verticall the legend dots
    end if

    if ( i .eq. 1 ) then
        delete( [/res@gsnRightString, res@gsnCenterString, res@gsnLeftString/] )   
    end if

    res@xyExplicitLegendLabels = sprintf( "%5.1f", depths(i) )+" m"     ; create explicit labels
 
    x = salt(i)     
    y = temp(i)      

    res@xyMarkerColor      = (/ todouble(i)/(i_fin + 1), 1.0 - todouble(i)/(i_fin + 1), 0. /)  ; at numerator there is n+1 to avoid black

    plot_i = gsn_csm_xy(wks, (/x, x/), (/y, y/), res )      ; create the dots graph with T-S points. Every sinsle x element correspond to a particular

    overlay( plotpd, plot_i )

    yposition = yposition - 0.05
 
end do    ; end of cycle on depths 

draw( plotpd )
frame( wks )

end
