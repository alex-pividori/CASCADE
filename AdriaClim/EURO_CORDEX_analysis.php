<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="EN">
<head>
                <title>INTERREG IT-HR  AdriaClim project -- ARPA FVG - CRMA  -- C3HPC DATA ACCESS</title>
                <meta http-equiv="Content-type" content="text/html; charset=utf-8">
                <meta http-equiv="content-language" content="it, en">
                <meta name="author" content="Alex Pividori">
                <link rel="stylesheet" href="./page_style.css" type="text/css">
       
</head>

<!-- +++++++++++++  START BODY +++++++++++++++++++++++++++++++ -->

<body bgcolor="#AFFFFF" >  

<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

<div class="titleDiv">
            <a href="https://www.italy-croatia.eu/web/AdriaClim" target="_blank" title="AdriaClim website">
                <img src="logos/adriaclim-logo.png" alt="Interreg Italy-Croatia AdriaClim" style="float:left;height:15.0%;width:18.8%">
            </a>

            <a href="http://www.arpa.fvg.it/cms/tema/aria/utilita/CRMA/index.html" target="_blank" title="CRMA website (it)">
                <img src="logos/crma-logo.png" alt="Centro Regionale di Modellistica Ambientale" style="float:right;height:14.0%;width:13.0%">
            </a>

            <a href="http://www.arpa.fvg.it" target="_blank" title="ARPA FVG website (it)">
            <img src="logos/arpafvg-logo.jfif" alt="Agenzia Regionale per la Protezione dell'Ambiente del Friuli Venezia Giulia" style="float:right;height:14.2%;width:16.2%">
            </a>

            <h3 align="center">Interreg IT-HR AdriaClim @ ARPA FVG - CRMA</h3>
</div>

<!-- +++++++++++++++++++++++++++      MAPS      ++++++++++++++++++++++++++++++++ -->

<p>For more informations about monitored points: 
<a href="./points_coordinates.txt"  target="_blank" >Monitored points coordinates</a></p>

<br><br>

<p>
Description of fields:<br>
- evspsbl   "Evaporation" Evaporazione                                                                  [kg m-2 s-1]<br>
- hfls      "Surface Upward Latent Heat Flux" Flusso superficiale di calore latente                     [W m-2]<br>
- hfss      "Surface Upward Sensible Heat Flux" Flusso superficiale di calore sensibile                 [W m-2]<br>
- huss      "Near-Surface Specific Humidity" Umidita` specifica superficiale                            [kg kg-1]<br>
- pr        "Precipitation" Precipitazioni                                                              [mm day-1]<br>
- ps        "Surface Air Pressure" Pressione superficiale dell'aria                                     [Pa]<br>
- rlds      "Surface Downwelling Longwave Radiation" Radiazione superficiale di onde lunghe             [W m-2]<br>
- rsds      "Surface Downwelling Shortwave Radiation" Radiazione superficiale di onde corte             [W m-2]<br>
- tas       "Near-Surface Air Temperature" Temperatura dell'aria vicino al suolo                        [K]<br>
- tasmax    "Daily Maximum Near-Surface Air Temperature" Temperatura massima dell'aria vicino al suolo  [K]<br>
- tasmin    "Daily Minimum Near-Surface Air Temperature" Temperatura minima dell'aria vicino al suolo   [K]<br>
- ts        "Surface Temperature" Temperatura al suolo                                                  [K]<br>
- uas       "Eastward Near- Surface Wind Velocity" Vento da est vicino al suolo                         [m s-1]<br>
- vas       "Northward Near- Surface Wind Velocity" Vento da nord vicino al suolo                       [m s-1]
</p>

<p>
<img src="logos/green_light.png"  width="25" height="25" > : RCP 2.6 
<img src="logos/yellow_light.png"  width="25" height="25" > : RCP 4.5
<img src="logos/red_light.png"  width="25" height="25" > : RCP 8.5
</p>


<pre><font face="Times New Roman" size="4">                            Boundary and internal Points: </font>  </pre>
<a  href="./map_EURO-CORDEX.png" target="_blank" title="Boundary and internal Points">
<img src="./map_EURO-CORDEX.png" alt="Boundary and internal Points" style="float:left;width:430px;height:396px;">
</a>

<br><br><br>

<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++ BOXPLOT PYTHON ++++++++++++++++++++++++++-->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<table align="center">

<caption class="titleDiv" style="font-size:1.5vw">EURO-CORDEX data files scenario Boxplot differences respect to 2010÷2020 decade</caption>

<thead bgcolor="gainsboro">
<tr>
<!-- +++++++++++++++ first cell +++++++++++++++++++ -->
<th style="text-align:center;" > <p class="first_cell"> Graphic </p> </th>
<th colspan="4" >  <p  class="myClass" >Projections of Atmospheric physical dimensions</p>  </th>
<!-- +++++++++++++++ end of head +++++++++++++++++++ -->
</tr>
</thead>

<tbody>

<tr>
<th bgcolor="#90CAF9" style="text-align:center;" >Ensemble Model projections<br>(Median Differences)</th>

<!-- +++++++++++++++++++++ Python Model Boxplots python  ++++++++++++++++++ -->

<td style="color:red">
uas: 
<a href="./SCENARIO/dme_boxplot_py/E01/dme_boxplot_uas_E01.png"  target="_blank" >E01</a><br>
vas: 
<a href="./SCENARIO/dme_boxplot_py/E01/dme_boxplot_vas_E01.png"  target="_blank" >E01</a><br>
ps:
<a href="./SCENARIO/dme_boxplot_py/E01/dme_boxplot_ps_E01.png"  target="_blank" >E01</a><br>
rsds: 
<a href="./SCENARIO/dme_boxplot_py/E01/dme_boxplot_rsds_E01.png"  target="_blank" >E01</a><br>
</td>
<td style="color:red">
tas: 
<a href="./SCENARIO/dme_boxplot_py/E01/dme_boxplot_tas_E01.png"  target="_blank" >E01</a><br>
huss:
<a href="./SCENARIO/dme_boxplot_py/E01/dme_boxplot_huss_E01.png"  target="_blank" >E01</a><br>
pr: 
<a href="./SCENARIO/dme_boxplot_py/E01/dme_boxplot_pr_E01.png"  target="_blank" >E01</a><br>
<a href="./SCENARIO/dme_boxplot_py/E02/dme_boxplot_pr_E02.png"  target="_blank" >E02</a><br>
<a href="./SCENARIO/dme_boxplot_py/E03/dme_boxplot_pr_E03.png"  target="_blank" >E03</a><br>
<a href="./SCENARIO/dme_boxplot_py/E04/dme_boxplot_pr_E04.png"  target="_blank" >E04</a><br>
hfls: 
<a href="./SCENARIO/dme_boxplot_py/E01/dme_boxplot_hfls_E01.png"  target="_blank" >E01</a><br>
</td>
<td style="color:red">
hfss: 
<a href="./SCENARIO/dme_boxplot_py/E01/dme_boxplot_hfss_E01.png"  target="_blank" >E01</a><br>
rlds: 
<a href="./SCENARIO/dme_boxplot_py/E01/dme_boxplot_rlds_E01.png"  target="_blank" >E01</a><br>
ts:
<a href="./SCENARIO/dme_boxplot_py/E01/dme_boxplot_ts_E01.png"  target="_blank" >E01</a><br>
evspsbl:
<a href="./SCENARIO/dme_boxplot_py/E01/dme_boxplot_evspsbl_E01.png"  target="_blank" >E01</a><br>
</td>
<td style="color:red">
tasmax: 
<a href="./SCENARIO/dme_boxplot_py/E01/dme_boxplot_tasmax_E01.png"  target="_blank" >E01</a><br>
tasmin: 
<a href="./SCENARIO/dme_boxplot_py/E01/dme_boxplot_tasmin_E01.png"  target="_blank" >E01</a><br>
</td>
</tr>

<!-- ++++++++++++++++++++++++ Second Line ++++++++++++++++++++++++++++++++++ -->

<tr>
<th bgcolor="#90CAF9" style="text-align:center;" >Ensemble Model projections<br>(Mean Differences)</th>

<!-- +++++++++++++++++++++ Python Model Boxplots python  ++++++++++++++++++ -->

<td style="color:red">
uas:
<a href="./SCENARIO/dmm_boxplot_py/E01/dmm_boxplot_uas_E01.png"  target="_blank" >E01</a><br>
vas:
<a href="./SCENARIO/dmm_boxplot_py/E01/dmm_boxplot_vas_E01.png"  target="_blank" >E01</a><br>
ps:
<a href="./SCENARIO/dmm_boxplot_py/E01/dmm_boxplot_ps_E01.png"  target="_blank" >E01</a><br>
rsds:
<a href="./SCENARIO/dmm_boxplot_py/E01/dmm_boxplot_rsds_E01.png"  target="_blank" >E01</a><br>
</td>
<td style="color:red">
tas:
<a href="./SCENARIO/dmm_boxplot_py/E01/dmm_boxplot_tas_E01.png"  target="_blank" >E01</a><br>
huss:
<a href="./SCENARIO/dmm_boxplot_py/E01/dmm_boxplot_huss_E01.png"  target="_blank" >E01</a><br>
pr:
<a href="./SCENARIO/dmm_boxplot_py/E01/dmm_boxplot_pr_E01.png"  target="_blank" >E01</a><br>
<a href="./SCENARIO/dmm_boxplot_py/E02/dmm_boxplot_pr_E02.png"  target="_blank" >E02</a><br>
<a href="./SCENARIO/dmm_boxplot_py/E03/dmm_boxplot_pr_E03.png"  target="_blank" >E03</a><br>
<a href="./SCENARIO/dmm_boxplot_py/E04/dmm_boxplot_pr_E04.png"  target="_blank" >E04</a><br>
hfls:
<a href="./SCENARIO/dmm_boxplot_py/E01/dmm_boxplot_hfls_E01.png"  target="_blank" >E01</a><br>
</td>
<td style="color:red">
hfss:
<a href="./SCENARIO/dmm_boxplot_py/E01/dmm_boxplot_hfss_E01.png"  target="_blank" >E01</a><br>
rlds:
<a href="./SCENARIO/dmm_boxplot_py/E01/dmm_boxplot_rlds_E01.png"  target="_blank" >E01</a><br>
ts:
<a href="./SCENARIO/dmm_boxplot_py/E01/dmm_boxplot_ts_E01.png"  target="_blank" >E01</a><br>
evspsbl:
<a href="./SCENARIO/dmm_boxplot_py/E01/dmm_boxplot_evspsbl_E01.png"  target="_blank" >E01</a><br>
</td>
<td style="color:red">
tasmax:
<a href="./SCENARIO/dmm_boxplot_py/E01/dmm_boxplot_tasmax_E01.png"  target="_blank" >E01</a><br>
tasmin:
<a href="./SCENARIO/dmm_boxplot_py/E01/dmm_boxplot_tasmin_E01.png"  target="_blank" >E01</a><br>
</td>
</tr>


</tbody>
</table>

<br><br>

<!-- +++++++++++++++++++++++++++ SECOND MAP ++++++++++++++++++++++++ -->

<pre><font face="Times New Roman" size="4">               Monitoring Points for WRF and OSMER analysis: </font>  </pre>
<a  href="./map_W_points.png" target="_blank" title="Monitoring Points for WRF and OSMER analysis">
<img src="./map_W_points.png" alt="Monitoring Points for WRF and OSMER analysis" style="float:left; width:450px;">
</a>

<br>
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++ CSV delta sharing  ++++++++++++++++++++++++++-->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<table align="center">

<caption class="titleDiv" style="font-size:1.5vw">EURO-CORDEX Delta monthly CSV files respect to 2010÷2020 decade</caption>

<thead bgcolor="gainsboro">
<tr>
<!-- +++++++++++++++ first cell +++++++++++++++++++ -->
<th style="text-align:center;" > <p class="first_cell"> Graphic </p> </th>
<th colspan="4" >  <p  class="myClass" >Projections of Atmospheric physical dimensions</p>  </th>
<!-- +++++++++++++++ end of head +++++++++++++++++++ -->
</tr>
</thead>

<tbody>

<tr>
<th bgcolor="#90CAF9" style="text-align:center;" >Ensemble Model projections<br>(Mean Differences)</th>

<td style="color:red">
<a href="./SCENARIO/csv_files_ln/mean_evspsbl"      target="_blank" >evspsbl</a>
<a href="./SCENARIO/csv_files_ln/mean_evspsbl.csv"  target="_blank" download >(Download)</a><br>
<a href="./SCENARIO/csv_files_ln/mean_hfls"  target="_blank" >hfls</a>
<a href="./SCENARIO/csv_files_ln/mean_hfls.csv"  target="_blank" download>(Download)</a><br>
<a href="./SCENARIO/csv_files_ln/mean_hfss"  target="_blank" >hfss</a>
<a href="./SCENARIO/csv_files_ln/mean_hfss.csv"  target="_blank" download>(Download)</a><br>
<a href="./SCENARIO/csv_files_ln/mean_huss"  target="_blank" >huss</a>
<a href="./SCENARIO/csv_files_ln/mean_huss.csv"  target="_blank" download>(Download)</a><br>
</td>
<td style="color:red">
<a href="./SCENARIO/csv_files_ln/mean_pr"  target="_blank" >pr</a>
<a href="./SCENARIO/csv_files_ln/mean_pr.csv"  target="_blank" download>(Download)</a><br>
<a href="./SCENARIO/csv_files_ln/mean_ps"  target="_blank" >ps</a>
<a href="./SCENARIO/csv_files_ln/mean_ps.csv"  target="_blank" download>(Download)</a><br>
<a href="./SCENARIO/csv_files_ln/mean_rlds"  target="_blank" >rlds</a>
<a href="./SCENARIO/csv_files_ln/mean_rlds.csv"  target="_blank" download>(Download)</a><br>
<a href="./SCENARIO/csv_files_ln/mean_rsds"  target="_blank" >rsds</a>
<a href="./SCENARIO/csv_files_ln/mean_rsds.csv"  target="_blank" download>(Download)</a><br>
</td>
<td style="color:red">
<a href="./SCENARIO/csv_files_ln/mean_tas"  target="_blank" >tas</a>
<a href="./SCENARIO/csv_files_ln/mean_tas.csv"  target="_blank" download>(Download)</a><br>
<a href="./SCENARIO/csv_files_ln/mean_tasmax"  target="_blank" >tasmax</a>
<a href="./SCENARIO/csv_files_ln/mean_tasmax.csv"  target="_blank" download>(Download)</a><br>
<a href="./SCENARIO/csv_files_ln/mean_tasmin"  target="_blank" >tasmin</a>
<a href="./SCENARIO/csv_files_ln/mean_tasmin.csv"  target="_blank" download>(Download)</a><br>
<a href="./SCENARIO/csv_files_ln/mean_ts"  target="_blank" >ts</a>
<a href="./SCENARIO/csv_files_ln/mean_ts.csv"  target="_blank" download>(Download)</a><br>
</td>
<td style="color:red">
<a href="./SCENARIO/csv_files_ln/mean_uas"  target="_blank" >uas</a>
<a href="./SCENARIO/csv_files_ln/mean_uas.csv"  target="_blank" download>(Download)</a><br>
<a href="./SCENARIO/csv_files_ln/mean_vas"  target="_blank" >vas</a>
<a href="./SCENARIO/csv_files_ln/mean_vas.csv"  target="_blank" download>(Download)</a><br>
</td>

</tr>

<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

<tr>
<th bgcolor="#90CAF9" style="text-align:center;" >Ensemble Model projections<br>(Median Differences)</th>

<td style="color:red">
<a href="./SCENARIO/csv_files_ln/median_evspsbl"  target="_blank" >evspsbl</a>
<a href="./SCENARIO/csv_files_ln/median_evspsbl.csv"  target="_blank" >(Download)</a><br>
<a href="./SCENARIO/csv_files_ln/median_hfls"  target="_blank" >hfls</a>
<a href="./SCENARIO/csv_files_ln/median_hfls.csv"  target="_blank" >(Download)</a><br>
<a href="./SCENARIO/csv_files_ln/median_hfss"  target="_blank" >hfss</a>
<a href="./SCENARIO/csv_files_ln/median_hfss.csv"  target="_blank" >(Download)</a><br>
<a href="./SCENARIO/csv_files_ln/median_huss"  target="_blank" >huss</a>
<a href="./SCENARIO/csv_files_ln/median_huss.csv"  target="_blank" >(Download)</a><br>
</td>
<td style="color:red">
<a href="./SCENARIO/csv_files_ln/median_pr"  target="_blank" >pr</a>
<a href="./SCENARIO/csv_files_ln/median_pr.csv"  target="_blank" >(Download)</a><br>
<a href="./SCENARIO/csv_files_ln/median_ps"  target="_blank" >ps</a>
<a href="./SCENARIO/csv_files_ln/median_ps.csv"  target="_blank" >(Download)</a><br>
<a href="./SCENARIO/csv_files_ln/median_rlds"  target="_blank" >rlds</a>
<a href="./SCENARIO/csv_files_ln/median_rlds.csv"  target="_blank" >(Download)</a><br>
<a href="./SCENARIO/csv_files_ln/median_rsds"  target="_blank" >rsds</a>
<a href="./SCENARIO/csv_files_ln/median_rsds.csv"  target="_blank" >(Download)</a><br>
</td>
<td style="color:red">
<a href="./SCENARIO/csv_files_ln/median_tas"  target="_blank" >tas</a>
<a href="./SCENARIO/csv_files_ln/median_tas.csv"  target="_blank" >(Download)</a><br>
<a href="./SCENARIO/csv_files_ln/median_tasmax"  target="_blank" >tasmax</a>
<a href="./SCENARIO/csv_files_ln/median_tasmax.csv"  target="_blank" >(Download)</a><br>
<a href="./SCENARIO/csv_files_ln/median_tasmin"  target="_blank" >tasmin</a>
<a href="./SCENARIO/csv_files_ln/median_tasmin.csv"  target="_blank" >(Download)</a><br>
<a href="./SCENARIO/csv_files_ln/median_ts"  target="_blank" >ts</a>
<a href="./SCENARIO/csv_files_ln/median_ts.csv"  target="_blank" >(Download)</a><br>
</td>
<td style="color:red">
<a href="./SCENARIO/csv_files_ln/median_uas"  target="_blank" >uas</a>
<a href="./SCENARIO/csv_files_ln/median_uas.csv"  target="_blank" >(Download)</a><br>
<a href="./SCENARIO/csv_files_ln/median_vas"  target="_blank" >vas</a>
<a href="./SCENARIO/csv_files_ln/median_vas.csv"  target="_blank" >(Download)</a><br>
</td>

</tr>


</tbody>
</table>

<br><br><br><br>
<!-- ================================================================================================================== -->

<table align="center">

<caption class="titleDiv" style="font-size:1.5vw">WRF model wind vs OSMER in-situ measures (wind intersity and direction)</caption>

<thead bgcolor="gainsboro">
<tr>
<!-- +++++++++++++++ first cell +++++++++++++++++++ -->
<th style="text-align:center; background-color: red;" >  <p  class="myClass" style="text-align:center;">Monitoring Station</p></th>
<th>2012</th>
<th>2015</th>
<th>2016</th>
<th>2017</th>
<th>2018</th>
<th>2019</th>
<th>2020</th>
<th>2021</th>
<!-- +++++++++++++++ end of head +++++++++++++++++++ -->
</tr>
</thead>

<tbody>

<tr>
<th bgcolor="#90CAF9" style="text-align:center;" >W01 (Lignano)</th>

<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2012_01_2012_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2012_02_2012_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2012_03_2012_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2012_04_2012_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2012_05_2012_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2012_06_2012_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2012_07_2012_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2012_08_2012_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2012_09_2012_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2012_10_2012_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2012_11_2012_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2012_12_2012_12.png" target="blank">12</a>
</td>

<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2015_01_2015_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2015_02_2015_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2015_03_2015_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2015_04_2015_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2015_05_2015_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2015_06_2015_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2015_07_2015_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2015_08_2015_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2015_09_2015_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2015_10_2015_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2015_11_2015_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2015_12_2015_12.png" target="blank">12</a>
</td>

<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2016_01_2016_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2016_02_2016_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2016_03_2016_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2016_04_2016_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2016_05_2016_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2016_06_2016_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2016_07_2016_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2016_08_2016_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2016_09_2016_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2016_10_2016_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2016_11_2016_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2016_12_2016_12.png" target="blank">12</a>
</td>

<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2017_01_2017_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2017_02_2017_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2017_03_2017_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2017_04_2017_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2017_05_2017_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2017_06_2017_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2017_07_2017_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2017_08_2017_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2017_09_2017_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2017_10_2017_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2017_11_2017_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2017_12_2017_12.png" target="blank">12</a>
</td>

<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2018_01_2018_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2018_02_2018_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2018_03_2018_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2018_04_2018_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2018_05_2018_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2018_06_2018_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2018_07_2018_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2018_08_2018_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2018_09_2018_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2018_10_2018_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2018_11_2018_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2018_12_2018_12.png" target="blank">12</a>
</td>

<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2019_01_2019_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2019_02_2019_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2019_03_2019_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2019_04_2019_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2019_05_2019_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2019_06_2019_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2019_07_2019_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2019_08_2019_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2019_09_2019_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2019_10_2019_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2019_11_2019_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2019_12_2019_12.png" target="blank">12</a>
</td>
<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2020_01_2020_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2020_02_2020_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2020_03_2020_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2020_04_2020_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2020_05_2020_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2020_06_2020_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2020_07_2020_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2020_08_2020_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2020_09_2020_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2020_10_2020_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2020_11_2020_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2020_12_2020_12.png" target="blank">12</a>
</td>

<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2021_01_2021_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2021_02_2021_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2021_03_2021_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2021_04_2021_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2021_05_2021_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2021_06_2021_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2021_07_2021_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2021_08_2021_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2021_09_2021_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2021_10_2021_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2021_11_2021_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W01_2021_12_2021_12.png" target="blank">12</a>
</td>
</tr>

<tr>
<th bgcolor="#90CAF9" style="text-align:center;" >W02 (Fossalon di Grado)</th>

<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2012_01_2012_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2012_02_2012_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2012_03_2012_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2012_04_2012_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2012_05_2012_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2012_06_2012_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2012_07_2012_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2012_08_2012_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2012_09_2012_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2012_10_2012_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2012_11_2012_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2012_12_2012_12.png" target="blank">12</a>
</td>

<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2015_01_2015_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2015_02_2015_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2015_03_2015_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2015_04_2015_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2015_05_2015_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2015_06_2015_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2015_07_2015_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2015_08_2015_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2015_09_2015_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2015_10_2015_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2015_11_2015_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2015_12_2015_12.png" target="blank">12</a>
</td>

<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2016_01_2016_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2016_02_2016_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2016_03_2016_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2016_04_2016_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2016_05_2016_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2016_06_2016_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2016_07_2016_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2016_08_2016_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2016_09_2016_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2016_10_2016_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2016_11_2016_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2016_12_2016_12.png" target="blank">12</a>
</td>
<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2017_01_2017_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2017_02_2017_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2017_03_2017_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2017_04_2017_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2017_05_2017_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2017_06_2017_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2017_07_2017_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2017_08_2017_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2017_09_2017_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2017_10_2017_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2017_11_2017_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2017_12_2017_12.png" target="blank">12</a>
</td>
<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2018_01_2018_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2018_02_2018_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2018_03_2018_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2018_04_2018_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2018_05_2018_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2018_06_2018_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2018_07_2018_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2018_08_2018_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2018_09_2018_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2018_10_2018_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2018_11_2018_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2018_12_2018_12.png" target="blank">12</a>
</td>
<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2019_01_2019_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2019_02_2019_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2019_03_2019_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2019_04_2019_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2019_05_2019_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2019_06_2019_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2019_07_2019_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2019_08_2019_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2019_09_2019_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2019_10_2019_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2019_11_2019_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2019_12_2019_12.png" target="blank">12</a>
</td>
<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2020_01_2020_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2020_02_2020_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2020_03_2020_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2020_04_2020_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2020_05_2020_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2020_06_2020_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2020_07_2020_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2020_08_2020_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2020_09_2020_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2020_10_2020_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2020_11_2020_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2020_12_2020_12.png" target="blank">12</a>
</td>
<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2021_01_2021_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2021_02_2021_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2021_03_2021_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2021_04_2021_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2021_05_2021_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2021_06_2021_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2021_07_2021_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2021_08_2021_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2021_09_2021_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2021_10_2021_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2021_11_2021_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W02_2021_12_2021_12.png" target="blank">12</a>
</td>

<tr>

<tr>
<th bgcolor="#90CAF9" style="text-align:center;" >W03 (Paloma Buoy)</th>

<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2012_01_2012_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2012_02_2012_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2012_03_2012_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2012_04_2012_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2012_05_2012_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2012_06_2012_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2012_07_2012_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2012_08_2012_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2012_09_2012_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2012_10_2012_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2012_11_2012_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2012_12_2012_12.png" target="blank">12</a>
</td>

<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2015_01_2015_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2015_02_2015_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2015_03_2015_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2015_04_2015_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2015_05_2015_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2015_06_2015_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2015_07_2015_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2015_08_2015_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2015_09_2015_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2015_10_2015_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2015_11_2015_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2015_12_2015_12.png" target="blank">12</a>
</td>

<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2016_01_2016_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2016_02_2016_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2016_03_2016_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2016_04_2016_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2016_05_2016_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2016_06_2016_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2016_07_2016_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2016_08_2016_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2016_09_2016_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2016_10_2016_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2016_11_2016_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2016_12_2016_12.png" target="blank">12</a>
</td>
<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2017_01_2017_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2017_02_2017_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2017_03_2017_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2017_04_2017_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2017_05_2017_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2017_06_2017_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2017_07_2017_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2017_08_2017_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2017_09_2017_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2017_10_2017_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2017_11_2017_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2017_12_2017_12.png" target="blank">12</a>
</td>
<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2018_01_2018_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2018_02_2018_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2018_03_2018_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2018_04_2018_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2018_05_2018_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2018_06_2018_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2018_07_2018_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2018_08_2018_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2018_09_2018_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2018_10_2018_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2018_11_2018_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2018_12_2018_12.png" target="blank">12</a>
</td>
<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2019_01_2019_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2019_02_2019_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2019_03_2019_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2019_04_2019_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2019_05_2019_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2019_06_2019_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2019_07_2019_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2019_08_2019_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2019_09_2019_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2019_10_2019_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2019_11_2019_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2019_12_2019_12.png" target="blank">12</a>
</td>
<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2020_01_2020_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2020_02_2020_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2020_03_2020_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2020_04_2020_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2020_05_2020_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2020_06_2020_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2020_07_2020_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2020_08_2020_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2020_09_2020_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2020_10_2020_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2020_11_2020_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2020_12_2020_12.png" target="blank">12</a>
</td>
<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2021_01_2021_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2021_02_2021_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2021_03_2021_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2021_04_2021_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2021_05_2021_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2021_06_2021_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2021_07_2021_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2021_08_2021_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2021_09_2021_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2021_10_2021_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2021_11_2021_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W03_2021_12_2021_12.png" target="blank">12</a>
</td>
</tr>

<tr>
<th bgcolor="#90CAF9" style="text-align:center;" >W04 (Trieste)</th>

<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2012_01_2012_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2012_02_2012_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2012_03_2012_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2012_04_2012_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2012_05_2012_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2012_06_2012_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2012_07_2012_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2012_08_2012_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2012_09_2012_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2012_10_2012_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2012_11_2012_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2012_12_2012_12.png" target="blank">12</a>
</td>

<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2015_01_2015_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2015_02_2015_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2015_03_2015_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2015_04_2015_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2015_05_2015_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2015_06_2015_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2015_07_2015_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2015_08_2015_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2015_09_2015_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2015_10_2015_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2015_11_2015_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2015_12_2015_12.png" target="blank">12</a>
</td>

<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2016_01_2016_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2016_02_2016_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2016_03_2016_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2016_04_2016_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2016_05_2016_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2016_06_2016_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2016_07_2016_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2016_08_2016_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2016_09_2016_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2016_10_2016_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2016_11_2016_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2016_12_2016_12.png" target="blank">12</a>
</td>
<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2017_01_2017_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2017_02_2017_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2017_03_2017_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2017_04_2017_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2017_05_2017_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2017_06_2017_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2017_07_2017_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2017_08_2017_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2017_09_2017_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2017_10_2017_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2017_11_2017_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2017_12_2017_12.png" target="blank">12</a>
</td>
<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2018_01_2018_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2018_02_2018_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2018_03_2018_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2018_04_2018_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2018_05_2018_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2018_06_2018_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2018_07_2018_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2018_08_2018_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2018_09_2018_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2018_10_2018_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2018_11_2018_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2018_12_2018_12.png" target="blank">12</a>
</td>
<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2019_01_2019_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2019_02_2019_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2019_03_2019_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2019_04_2019_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2019_05_2019_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2019_06_2019_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2019_07_2019_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2019_08_2019_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2019_09_2019_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2019_10_2019_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2019_11_2019_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2019_12_2019_12.png" target="blank">12</a>
</td>
<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2020_01_2020_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2020_02_2020_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2020_03_2020_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2020_04_2020_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2020_05_2020_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2020_06_2020_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2020_07_2020_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2020_08_2020_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2020_09_2020_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2020_10_2020_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2020_11_2020_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2020_12_2020_12.png" target="blank">12</a>
</td>
<td style="color:red">
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2021_01_2021_01.png" target="blank">01</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2021_02_2021_02.png" target="blank">02</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2021_03_2021_03.png" target="blank">03</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2021_04_2021_04.png" target="blank">04</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2021_05_2021_05.png" target="blank">05</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2021_06_2021_06.png" target="blank">06</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2021_07_2021_07.png" target="blank">07</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2021_08_2021_08.png" target="blank">08</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2021_09_2021_09.png" target="blank">09</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2021_10_2021_10.png" target="blank">10</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2021_11_2021_11.png" target="blank">11</a>
<a href="./SCENARIO/wind/wind_wrf-osmer_W04_2021_12_2021_12.png" target="blank">12</a>
</td>
</tr>

<!-- ===================================================================================================== -->

<thead bgcolor="gainsboro">
<tr>
<!-- +++++++++++++++ first cell +++++++++++++++++++ -->
<th style="text-align:center; background-color: red;" >  <p  class="myClass" style="text-align:center;">Physical quantity</p></th>
<th colspan="8" >Historical Probability Density functions (WRF and OSMER measures)</th>
</tr>
</thead>

<tr>
<th bgcolor="#90CAF9" style="text-align:center;" >Wind Direction</th>

<td colspan="8" style="color:red; text-align: center;">
<a href="./SCENARIO/wind/wind_pdf_wrf-osmer_W01.png" target="blank">W01</a>
<a href="./SCENARIO/wind/wind_pdf_wrf-osmer_W02.png" target="blank">W02</a>
<a href="./SCENARIO/wind/wind_pdf_wrf-osmer_W03.png" target="blank">W03</a>
<a href="./SCENARIO/wind/wind_pdf_wrf-osmer_W04.png" target="blank">W04</a>
<a href="./SCENARIO/wind/wind_pdf_wrf-osmer_W03_bc.png" target="blank">W03_(bc)</a>
</td>
</tr>

<!-- ======================== -->

<tr>
<th bgcolor="#90CAF9" style="text-align:center;" >Wind Speed</th>

<td colspan="8" style="color:red; text-align: center;">
<a href="./SCENARIO/wind/wind_pdf_module_wrf-osmer_W01.png" target="blank">W01</a>
<a href="./SCENARIO/wind/wind_pdf_module_wrf-osmer_W02.png" target="blank">W02</a>
<a href="./SCENARIO/wind/wind_pdf_module_wrf-osmer_W03.png" target="blank">W03</a>
<a href="./SCENARIO/wind/wind_pdf_module_wrf-osmer_W04.png" target="blank">W04</a>
<a href="./SCENARIO/wind/wind_pdf_module_wrf-osmer_W03_bc.png" target="blank">W03_(bc)</a>
</td>
</tr>

<!-- ======================== -->

<tr>
<th bgcolor="#90CAF9" style="text-align:center;" >Wind Speed (log)</th>

<td colspan="8" style="color:red; text-align: center;">
<a href="./SCENARIO/wind/wind_pdf_module-log_wrf-osmer_W01.png" target="blank">W01</a>
<a href="./SCENARIO/wind/wind_pdf_module-log_wrf-osmer_W02.png" target="blank">W02</a>
<a href="./SCENARIO/wind/wind_pdf_module-log_wrf-osmer_W03.png" target="blank">W03</a>
<a href="./SCENARIO/wind/wind_pdf_module-log_wrf-osmer_W04.png" target="blank">W04</a>
<a href="./SCENARIO/wind/wind_pdf_module-log_wrf-osmer_W03_bc.png" target="blank">W03_(bc)</a>
</td>
</tr>


</tbody>
</table>

<br><br><br><br>
<!-- ================================================================================================================== -->
<!-- ================================================== PRESSURE ====================================================== -->
<!-- ================================================================================================================== -->

<table align="center">

<caption class="titleDiv" style="font-size:1.5vw">WRF Sea-level-pressure vs OSMER in-situ measures (Sea Level Pressure)</caption>

<thead bgcolor="gainsboro">
<tr>
<!-- +++++++++++++++ first cell +++++++++++++++++++ -->
<th style="text-align:center; background-color: red;" >  <p  class="myClass" style="text-align:center;">Monitoring Station</p></th>
<th>2012</th>
<th>2015</th>
<th>2016</th>
<th>2017</th>
<th>2018</th>
<th>2019</th>
<th>2020</th>
<th>2021</th>
<!-- +++++++++++++++ end of head +++++++++++++++++++ -->
</tr>
</thead>

<tbody>

<tr>
<th bgcolor="#90CAF9" style="text-align:center;" >W01 (Lignano)</th>
<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2012_01_2012_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2012_02_2012_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2012_03_2012_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2012_04_2012_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2012_05_2012_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2012_06_2012_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2012_07_2012_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2012_08_2012_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2012_09_2012_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2012_10_2012_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2012_11_2012_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2012_12_2012_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W01_2012_01_2012_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W01_2012_07_2012_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W01_2012_01_2012_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2015_01_2015_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2015_02_2015_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2015_03_2015_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2015_04_2015_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2015_05_2015_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2015_06_2015_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2015_07_2015_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2015_08_2015_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2015_09_2015_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2015_10_2015_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2015_11_2015_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2015_12_2015_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W01_2015_01_2015_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W01_2015_07_2015_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W01_2015_01_2015_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2016_01_2016_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2016_02_2016_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2016_03_2016_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2016_04_2016_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2016_05_2016_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2016_06_2016_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2016_07_2016_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2016_08_2016_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2016_09_2016_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2016_10_2016_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2016_11_2016_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2016_12_2016_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W01_2016_01_2016_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W01_2016_07_2016_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W01_2016_01_2016_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2017_01_2017_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2017_02_2017_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2017_03_2017_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2017_04_2017_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2017_05_2017_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2017_06_2017_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2017_07_2017_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2017_08_2017_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2017_09_2017_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2017_10_2017_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2017_11_2017_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2017_12_2017_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W01_2017_01_2017_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W01_2017_07_2017_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W01_2017_01_2017_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2018_01_2018_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2018_02_2018_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2018_03_2018_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2018_04_2018_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2018_05_2018_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2018_06_2018_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2018_07_2018_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2018_08_2018_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2018_09_2018_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2018_10_2018_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2018_11_2018_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2018_12_2018_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W01_2018_01_2018_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W01_2018_07_2018_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W01_2018_01_2018_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2019_01_2019_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2019_02_2019_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2019_03_2019_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2019_04_2019_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2019_05_2019_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2019_06_2019_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2019_07_2019_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2019_08_2019_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2019_09_2019_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2019_10_2019_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2019_11_2019_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2019_12_2019_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W01_2019_01_2019_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W01_2019_07_2019_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W01_2019_01_2019_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2020_01_2020_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2020_02_2020_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2020_03_2020_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2020_04_2020_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2020_05_2020_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2020_06_2020_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2020_07_2020_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2020_08_2020_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2020_09_2020_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2020_10_2020_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2020_11_2020_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2020_12_2020_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W01_2020_01_2020_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W01_2020_07_2020_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W01_2020_01_2020_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2021_01_2021_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2021_02_2021_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2021_03_2021_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2021_04_2021_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2021_05_2021_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2021_06_2021_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2021_07_2021_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2021_08_2021_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2021_09_2021_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2021_10_2021_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2021_11_2021_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W01_2021_12_2021_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W01_2021_01_2021_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W01_2021_07_2021_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W01_2021_01_2021_12.png" target="blank">Annual</a>
</td>
</tr>

<tr>
<th bgcolor="#90CAF9" style="text-align:center;" >W02 (Fossalon di Grado)</th>
<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2012_01_2012_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2012_02_2012_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2012_03_2012_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2012_04_2012_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2012_05_2012_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2012_06_2012_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2012_07_2012_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2012_08_2012_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2012_09_2012_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2012_10_2012_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2012_11_2012_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2012_12_2012_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W02_2012_01_2012_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W02_2012_07_2012_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W02_2012_01_2012_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2015_01_2015_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2015_02_2015_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2015_03_2015_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2015_04_2015_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2015_05_2015_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2015_06_2015_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2015_07_2015_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2015_08_2015_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2015_09_2015_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2015_10_2015_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2015_11_2015_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2015_12_2015_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W02_2015_01_2015_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W02_2015_07_2015_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W02_2015_01_2015_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2016_01_2016_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2016_02_2016_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2016_03_2016_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2016_04_2016_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2016_05_2016_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2016_06_2016_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2016_07_2016_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2016_08_2016_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2016_09_2016_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2016_10_2016_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2016_11_2016_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2016_12_2016_12.png" target="blank">12</a><br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W02_2016_01_2016_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W02_2016_07_2016_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W02_2016_01_2016_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2017_01_2017_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2017_02_2017_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2017_03_2017_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2017_04_2017_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2017_05_2017_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2017_06_2017_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2017_07_2017_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2017_08_2017_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2017_09_2017_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2017_10_2017_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2017_11_2017_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2017_12_2017_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W02_2017_01_2017_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W02_2017_07_2017_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W02_2017_01_2017_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2018_01_2018_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2018_02_2018_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2018_03_2018_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2018_04_2018_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2018_05_2018_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2018_06_2018_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2018_07_2018_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2018_08_2018_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2018_09_2018_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2018_10_2018_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2018_11_2018_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2018_12_2018_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W02_2018_01_2018_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W02_2018_07_2018_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W02_2018_01_2018_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2019_01_2019_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2019_02_2019_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2019_03_2019_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2019_04_2019_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2019_05_2019_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2019_06_2019_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2019_07_2019_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2019_08_2019_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2019_09_2019_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2019_10_2019_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2019_11_2019_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2019_12_2019_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W02_2019_01_2019_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W02_2019_07_2019_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W02_2019_01_2019_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2020_01_2020_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2020_02_2020_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2020_03_2020_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2020_04_2020_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2020_05_2020_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2020_06_2020_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2020_07_2020_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2020_08_2020_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2020_09_2020_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2020_10_2020_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2020_11_2020_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2020_12_2020_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W02_2020_01_2020_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W02_2020_07_2020_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W02_2020_01_2020_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2021_01_2021_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2021_02_2021_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2021_03_2021_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2021_04_2021_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2021_05_2021_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2021_06_2021_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2021_07_2021_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2021_08_2021_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2021_09_2021_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2021_10_2021_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2021_11_2021_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W02_2021_12_2021_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W02_2021_01_2021_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W02_2021_07_2021_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W02_2021_01_2021_12.png" target="blank">Annual</a>
</td>
</tr>

<tr>
<th bgcolor="#90CAF9" style="text-align:center;" >W03 (Paloma Buoy)</th>
<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2012_01_2012_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2012_02_2012_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2012_03_2012_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2012_04_2012_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2012_05_2012_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2012_06_2012_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2012_07_2012_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2012_08_2012_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2012_09_2012_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2012_10_2012_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2012_11_2012_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2012_12_2012_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W03_2012_01_2012_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W03_2012_07_2012_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W03_2012_01_2012_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2015_01_2015_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2015_02_2015_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2015_03_2015_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2015_04_2015_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2015_05_2015_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2015_06_2015_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2015_07_2015_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2015_08_2015_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2015_09_2015_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2015_10_2015_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2015_11_2015_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2015_12_2015_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W03_2015_01_2015_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W03_2015_07_2015_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W03_2015_01_2015_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2016_01_2016_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2016_02_2016_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2016_03_2016_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2016_04_2016_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2016_05_2016_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2016_06_2016_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2016_07_2016_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2016_08_2016_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2016_09_2016_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2016_10_2016_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2016_11_2016_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2016_12_2016_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W03_2016_01_2016_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W03_2016_07_2016_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W03_2016_01_2016_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2017_01_2017_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2017_02_2017_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2017_03_2017_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2017_04_2017_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2017_05_2017_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2017_06_2017_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2017_07_2017_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2017_08_2017_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2017_09_2017_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2017_10_2017_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2017_11_2017_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2017_12_2017_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W03_2017_01_2017_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W03_2017_07_2017_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W03_2017_01_2017_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2018_01_2018_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2018_02_2018_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2018_03_2018_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2018_04_2018_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2018_05_2018_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2018_06_2018_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2018_07_2018_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2018_08_2018_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2018_09_2018_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2018_10_2018_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2018_11_2018_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2018_12_2018_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W03_2018_01_2018_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W03_2018_07_2018_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W03_2018_01_2018_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2019_01_2019_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2019_02_2019_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2019_03_2019_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2019_04_2019_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2019_05_2019_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2019_06_2019_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2019_07_2019_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2019_08_2019_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2019_09_2019_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2019_10_2019_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2019_11_2019_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2019_12_2019_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W03_2019_01_2019_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W03_2019_07_2019_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W03_2019_01_2019_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2020_01_2020_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2020_02_2020_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2020_03_2020_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2020_04_2020_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2020_05_2020_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2020_06_2020_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2020_07_2020_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2020_08_2020_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2020_09_2020_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2020_10_2020_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2020_11_2020_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2020_12_2020_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W03_2020_01_2020_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W03_2020_07_2020_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W03_2020_01_2020_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2021_01_2021_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2021_02_2021_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2021_03_2021_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2021_04_2021_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2021_05_2021_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2021_06_2021_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2021_07_2021_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2021_08_2021_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2021_09_2021_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2021_10_2021_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2021_11_2021_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W03_2021_12_2021_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W03_2021_01_2021_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W03_2021_07_2021_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W03_2021_01_2021_12.png" target="blank">Annual</a>
</td>
</tr>

<tr>
<th bgcolor="#90CAF9" style="text-align:center;" >W04 (Trieste)</th>

<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2012_01_2012_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2012_02_2012_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2012_03_2012_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2012_04_2012_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2012_05_2012_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2012_06_2012_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2012_07_2012_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2012_08_2012_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2012_09_2012_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2012_10_2012_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2012_11_2012_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2012_12_2012_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W04_2012_01_2012_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W04_2012_07_2012_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W04_2012_01_2012_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2015_01_2015_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2015_02_2015_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2015_03_2015_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2015_04_2015_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2015_05_2015_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2015_06_2015_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2015_07_2015_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2015_08_2015_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2015_09_2015_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2015_10_2015_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2015_11_2015_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2015_12_2015_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W04_2015_01_2015_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W04_2015_07_2015_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W04_2015_01_2015_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2016_01_2016_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2016_02_2016_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2016_03_2016_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2016_04_2016_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2016_05_2016_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2016_06_2016_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2016_07_2016_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2016_08_2016_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2016_09_2016_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2016_10_2016_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2016_11_2016_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2016_12_2016_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W04_2016_01_2016_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W04_2016_07_2016_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W04_2016_01_2016_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2017_01_2017_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2017_02_2017_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2017_03_2017_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2017_04_2017_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2017_05_2017_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2017_06_2017_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2017_07_2017_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2017_08_2017_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2017_09_2017_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2017_10_2017_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2017_11_2017_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2017_12_2017_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W04_2017_01_2017_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W04_2017_07_2017_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W04_2017_01_2017_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2018_01_2018_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2018_02_2018_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2018_03_2018_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2018_04_2018_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2018_05_2018_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2018_06_2018_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2018_07_2018_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2018_08_2018_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2018_09_2018_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2018_10_2018_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2018_11_2018_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2018_12_2018_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W04_2018_01_2018_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W04_2018_07_2018_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W04_2018_01_2018_12.png" target="blank">Annual</a>
</td>



<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2019_01_2019_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2019_02_2019_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2019_03_2019_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2019_04_2019_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2019_05_2019_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2019_06_2019_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2019_07_2019_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2019_08_2019_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2019_09_2019_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2019_10_2019_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2019_11_2019_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2019_12_2019_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W04_2019_01_2019_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W04_2019_07_2019_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W04_2019_01_2019_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2020_01_2020_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2020_02_2020_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2020_03_2020_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2020_04_2020_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2020_05_2020_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2020_06_2020_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2020_07_2020_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2020_08_2020_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2020_09_2020_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2020_10_2020_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2020_11_2020_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2020_12_2020_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W04_2020_01_2020_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W04_2020_07_2020_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W04_2020_01_2020_12.png" target="blank">Annual</a>
</td>


<td style="color:red">
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2021_01_2021_01.png" target="blank">01</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2021_02_2021_02.png" target="blank">02</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2021_03_2021_03.png" target="blank">03</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2021_04_2021_04.png" target="blank">04</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2021_05_2021_05.png" target="blank">05</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2021_06_2021_06.png" target="blank">06</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2021_07_2021_07.png" target="blank">07</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2021_08_2021_08.png" target="blank">08</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2021_09_2021_09.png" target="blank">09</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2021_10_2021_10.png" target="blank">10</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2021_11_2021_11.png" target="blank">11</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_W04_2021_12_2021_12.png" target="blank">12</a>
<br>
<a href="./SCENARIO/pressure/press_wrf-osmer_1S_W04_2021_01_2021_06.png" target="blank">1S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_2S_W04_2021_07_2021_12.png" target="blank">2S</a>
<a href="./SCENARIO/pressure/press_wrf-osmer_year_W04_2021_01_2021_12.png" target="blank">Annual</a>
</td>
</tr>

<thead bgcolor="gainsboro">
<tr>
<!-- +++++++++++++++ first cell +++++++++++++++++++ -->
<th style="text-align:center; background-color: red;" >  <p  class="myClass" style="text-align:center;">Physical quantity</p></th>
<th colspan="8" >Historical Probability Density functions (WRF and OSMER measures)</th>
</tr>
</thead>

<tr>
<th bgcolor="#90CAF9" style="text-align:center;" >Sea level Pressure</th>

<td colspan="8" style="color:red; text-align: center;">
<a href="./SCENARIO/pressure/press_pdf_wrf-osmer_W01.png" target="blank">W01</a>
<a href="./SCENARIO/pressure/press_pdf_wrf-osmer_W02.png" target="blank">W02</a>
<a href="./SCENARIO/pressure/press_pdf_wrf-osmer_W03.png" target="blank">W03</a>
<a href="./SCENARIO/pressure/press_pdf_wrf-osmer_W04.png" target="blank">W04</a>
</td>
</tr>

<tr>
<th bgcolor="#90CAF9" style="text-align:center;" >Sea level Pressure (log)</th>

<td colspan="8" style="color:red; text-align: center;">
<a href="./SCENARIO/pressure/press_pdf_log_wrf-osmer_W01.png" target="blank">W01</a>
<a href="./SCENARIO/pressure/press_pdf_log_wrf-osmer_W02.png" target="blank">W02</a>
<a href="./SCENARIO/pressure/press_pdf_log_wrf-osmer_W03.png" target="blank">W03</a>
<a href="./SCENARIO/pressure/press_pdf_log_wrf-osmer_W04.png" target="blank">W04</a>
</td>
</tr>

</tbody>
</table>


</body>

<br><br><br><br><br>

 <div  style="font-size: 10px">
            <p    style="text-align:center; color:black" >
               ARPA FVG - Via Cairoli, 14 - 33057 Palmanova (UD)<br>
               Tel +39 0432 1918111 - Fax +39 0432 1918120 - C.F. P.IVA 02096520305<br>
            </p>
        </div>

</html>
