<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="EN">
<head>
                <title>INTERREG IT-HR  AdriaClim project -- ARPA FVG - CRMA  -- C3HPC DATA ACCESS</title>
                <meta http-equiv="Content-type" content="text/html; charset=utf-8">
                <meta http-equiv="content-language" content="it, en">
                <meta name="author" content="Alex Pividori">
                <link rel="stylesheet" href="./styles.css" type="text/css">
       

      <style type="text/css">
            body {
                font-family: sans-serif;
                color: black;
                /* background-image: url("./logos/calm-sea-background.jpg"); */
                background-color: #f0f8ff;
            }

            .titleDiv {
                color: #6495ed;
                background-color: rgba(0, 99, 73, 0.1); /* #fff8dc */;
                text-align: center;
                font-family: "Times New Roman", Times, serif;
            }

            .myClass  {
                color: black;
                border-collapse: collapse;
                text-align: center;
            }

            table, th {
                border: 1px solid black;
                border-collapse: collapse;
                text-align: center;
            }
    
            td {
                border: 1px solid black;
                border-collapse: collapse;
                text-align: right;
            }

            th, td {
                padding: 10px;
                border-collapse: collapse;
            }

            a:link {
                color: #708090;
                background-color: transparent;
                text-decoration: none;
            }

            a:visited {
                color: #796878;
                background-color: transparent;
                text-decoration: none;
            }

            a:hover {
                text-decoration: underline;
            }


            a:active {
                color: red;
                background-color: transparent;
                text-decoration: underline;
            }


            p.first_cell {
                text-align: center;
                margin-bottom: 0em;
                color: #ff5050;
            }

        </style>

 
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

<p style="text-align: center;" >For more informations about this simulation, consult the following file: </p>
<div style="text-align: center;"><a href="./NEMO_monitoring_stations.txt"  target="_blank" >NEMO_monitoring_stations</a></div>
<div style="text-align: center;"><a href="https://www.nemo-ocean.eu/"  target="_blank" >NEMO model website</a></div>

<br><br><br>

<pre><font face="Times New Roman" size="5">                    <mark>Monitoring stations:</mark> </font>  </pre>

<p style="text-align:center;" >
<a  href="./NEMO_monitoring_points.png" target="_blank" title="Monitoring stations">
<img src="./NEMO_monitoring_points.png" alt="Monitoring stations" style="float:left;width:440px;height:314px;">
</a>

</p>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
 
<table align="center">

<caption class="titleDiv" style="font-size:2vw">NEMO model validation (Boxplots)</caption>


<thead bgcolor="gainsboro">
<tr>
<!-- +++++++++++++++ first cell +++++++++++++++++++ -->

<th align="center" > <p class="first_cell">Physical Quantity</p> </th> 

<!-- +++++++++++++ end of first cell +++++++++++++++++ -->

<th>  <p  class="myClass" > Jan-Feb-Mar        </p>  </th> 
<th>  <p  class="myClass" > Apr-May-Jun        </p>  </th> 
<th>  <p  class="myClass" > Jul-Aug-Sep        </p>  </th> 
<th>  <p  class="myClass" > Oct-Nov-Dec        </p>  </th> 
<th>  <p  class="myClass" > Annual             </p>  </th>
</tr> 
</thead>


<tbody>

<!-- ================================================================ -->
<!-- =========================  BOXPLOT ============================= -->
<!-- ================================================================ -->

<tr>
<th bgcolor="red" text-align:center >Temperature<br>
<img src="./SCENARIO/NEMO_validation/boxplot_delta_T_SMLG2_tot.png" alt="Miniature of the graph type" style="float: center; width:100px; height:75px;">
</th>

<!-- +++++++++++++++++++++ Season 1 ++++++++++++++++++ -->

<td style="color:red">
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_SMLG2_season1.pdf"  target="_blank" >SMLG2</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_SMLG3_season1.pdf"  target="_blank" >SMLG3</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_ME221_season1.pdf"  target="_blank" >ME221</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_SMTS3_season1.pdf"  target="_blank" >SMTS3</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_F464_season1.pdf"  target="_blank" >F464</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_P555_season1.pdf"  target="_blank" >P555</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_SMTS1_season1.pdf"  target="_blank" >SMTS1</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_MA311_season1.pdf"  target="_blank" >MA311</a><br>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_fll-bandiera_season1.png"  target="_blank" >fll-Bandiera</a>
</td>

<!-- +++++++++++++++++++++ Season 2 ++++++++++++++++++ -->

<td style="color:red">
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_SMLG2_season2.pdf"  target="_blank" >SMLG2</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_SMLG3_season2.pdf"  target="_blank" >SMLG3</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_ME221_season2.pdf"  target="_blank" >ME221</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_SMTS3_season2.pdf"  target="_blank" >SMTS3</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_F464_season2.pdf"  target="_blank" >F464</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_P555_season2.pdf"  target="_blank" >P555</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_SMTS1_season2.pdf"  target="_blank" >SMTS1</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_MA311_season2.pdf"  target="_blank" >MA311</a><br>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_fll-bandiera_season2.png"  target="_blank" >fll-Bandiera</a>
</td>

<!-- +++++++++++++++++++++ Season 3 ++++++++++++++++++ -->

<td style="color:red">
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_SMLG2_season3.pdf"  target="_blank" >SMLG2</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_SMLG3_season3.pdf"  target="_blank" >SMLG3</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_ME221_season3.pdf"  target="_blank" >ME221</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_SMTS3_season3.pdf"  target="_blank" >SMTS3</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_F464_season3.pdf"  target="_blank" >F464</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_P555_season3.pdf"  target="_blank" >P555</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_SMTS1_season3.pdf"  target="_blank" >SMTS1</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_MA311_season3.pdf"  target="_blank" >MA311</a><br>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_fll-bandiera_season3.png"  target="_blank" >fll-Bandiera</a>
</td>

<!-- +++++++++++++++++++++ Season 4 ++++++++++++++++++ -->

<td style="color:red">
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_SMLG2_season4.pdf"  target="_blank" >SMLG2</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_SMLG3_season4.pdf"  target="_blank" >SMLG3</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_ME221_season4.pdf"  target="_blank" >ME221</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_SMTS3_season4.pdf"  target="_blank" >SMTS3</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_F464_season4.pdf"  target="_blank" >F464</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_P555_season4.pdf"  target="_blank" >P555</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_SMTS1_season4.pdf"  target="_blank" >SMTS1</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_MA311_season4.pdf"  target="_blank" >MA311</a><br>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_fll-bandiera_season4.png"  target="_blank" >fll-Bandiera</a>
</td>

<!-- +++++++++++++++++++++ Annual ++++++++++++++++++ -->

<td style="color:red">
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_SMLG2_tot.pdf"  target="_blank" >SMLG2</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_SMLG3_tot.pdf"  target="_blank" >SMLG3</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_ME221_tot.pdf"  target="_blank" >ME221</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_SMTS3_tot.pdf"  target="_blank" >SMTS3</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_F464_tot.pdf"  target="_blank" >F464</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_P555_tot.pdf"  target="_blank" >P555</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_SMTS1_tot.pdf"  target="_blank" >SMTS1</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_MA311_tot.pdf"  target="_blank" >MA311</a><br>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_T_fll-bandiera_tot.png"  target="_blank" >fll-Bandiera</a>
</td>


</tr>

<!-- ================================================================ -->
<!-- ========================= Salinity ========================= -->
<!-- ================================================================ -->

<tr>
<th bgcolor="chartreuse" text-align:center >Salinity<br>
<img src="./SCENARIO/NEMO_validation/boxplot_delta_S_SMLG2_season1.png" alt="Miniature of the graph type" style="float: center; width:100px; height:75px;">
</th>

<!-- +++++++++++++++++++++ Season 1 ++++++++++++++++++ -->

<td style="color:red">
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_SMLG2_season1.pdf"  target="_blank" >SMLG2</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_SMLG3_season1.pdf"  target="_blank" >SMLG3</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_ME221_season1.pdf"  target="_blank" >ME221</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_SMTS3_season1.pdf"  target="_blank" >SMTS3</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_F464_season1.pdf"  target="_blank" >F464</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_P555_season1.pdf"  target="_blank" >P555</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_SMTS1_season1.pdf"  target="_blank" >SMTS1</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_MA311_season1.pdf"  target="_blank" >MA311</a>
</td>

<!-- +++++++++++++++++++++ Season 2 ++++++++++++++++++ -->

<td style="color:red">
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_SMLG2_season2.pdf"  target="_blank" >SMLG2</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_SMLG3_season2.pdf"  target="_blank" >SMLG3</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_ME221_season2.pdf"  target="_blank" >ME221</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_SMTS3_season2.pdf"  target="_blank" >SMTS3</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_F464_season2.pdf"  target="_blank" >F464</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_P555_season2.pdf"  target="_blank" >P555</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_SMTS1_season2.pdf"  target="_blank" >SMTS1</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_MA311_season2.pdf"  target="_blank" >MA311</a>
</td>

<!-- +++++++++++++++++++++ Season 3 ++++++++++++++++++ -->

<td style="color:red">
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_SMLG2_season3.pdf"  target="_blank" >SMLG2</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_SMLG3_season3.pdf"  target="_blank" >SMLG3</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_ME221_season3.pdf"  target="_blank" >ME221</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_SMTS3_season3.pdf"  target="_blank" >SMTS3</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_F464_season3.pdf"  target="_blank" >F464</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_P555_season3.pdf"  target="_blank" >P555</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_SMTS1_season3.pdf"  target="_blank" >SMTS1</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_MA311_season3.pdf"  target="_blank" >MA311</a>
</td>

<!-- +++++++++++++++++++++ Season 4 ++++++++++++++++++ -->

<td style="color:red">
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_SMLG2_season4.pdf"  target="_blank" >SMLG2</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_SMLG3_season4.pdf"  target="_blank" >SMLG3</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_ME221_season4.pdf"  target="_blank" >ME221</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_SMTS3_season4.pdf"  target="_blank" >SMTS3</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_F464_season4.pdf"  target="_blank" >F464</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_P555_season4.pdf"  target="_blank" >P555</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_SMTS1_season4.pdf"  target="_blank" >SMTS1</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_MA311_season4.pdf"  target="_blank" >MA311</a>
</td>

<!-- +++++++++++++++++++++ Annual ++++++++++++++++++ -->

<td style="color:red">
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_SMLG2_tot.pdf"  target="_blank" >SMLG2</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_SMLG3_tot.pdf"  target="_blank" >SMLG3</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_ME221_tot.pdf"  target="_blank" >ME221</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_SMTS3_tot.pdf"  target="_blank" >SMTS3</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_F464_tot.pdf"  target="_blank" >F464</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_P555_tot.pdf"  target="_blank" >P555</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_SMTS1_tot.pdf"  target="_blank" >SMTS1</a>
<a href="./SCENARIO/NEMO_validation/boxplot_delta_S_MA311_tot.pdf"  target="_blank" >MA311</a>
</td>

</tr>


<tr>
<td colspan="6" style="text-align: center;">
<a href="./SCENARIO/NEMO_validation/NEMO_validation_model_vs_measures" target="_blank" rel="noopener noreferrer" >Statistical indexes for NEMO validation </a>
<a href="./SCENARIO/NEMO_validation/NEMO_validation_model_vs_measures.csv" target="_blank" rel="noopener noreferrer" >( Download )</a>
</td>
</tr>


</tbody>
</table>

<br><br><br>

<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

<table align="center">

<caption class="titleDiv" style="font-size:2vw">ECDFs NEMO model validation</caption>


<thead bgcolor="gainsboro">
<tr>
<!-- +++++++++++++++ first cell +++++++++++++++++++ -->

<th align="center" > <p class="first_cell">Physical Quantity</p> </th>

<!-- +++++++++++++ end of first cell +++++++++++++++++ -->

<th>  <p  class="myClass" > Jan-Feb-Mar        </p>  </th>
<th>  <p  class="myClass" > Apr-May-Jun        </p>  </th>
<th>  <p  class="myClass" > Jul-Aug-Sep        </p>  </th>
<th>  <p  class="myClass" > Oct-Nov-Dec        </p>  </th>
<th>  <p  class="myClass" > Annual             </p>  </th>
</tr>
</thead>


<tbody>

<!-- ================================================================ -->
<!-- ============================= ECDF ============================= -->
<!-- ================================================================ -->

<tr>
<th bgcolor="red" text-align:center >ECDF Temperature<br>
<img src="./SCENARIO/NEMO_validation/ecdf_temp_SMLG2_season1_middle.png" alt="Miniature of the graph type" style="float: center; width:100px; height:75px;">
</th>

<!-- +++++++++++++++++++++ Season 1 ++++++++++++++++++ -->

<td style="color:red">
<div style="text-align: left;" >SMLG2:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG2_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG2_season1_middle.png"  target="_blank" >middle</a><br></div>
SMLG3:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG3_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG3_season1_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG3_season1_bottom.png"  target="_blank" >bottom</a><br>
<div style="text-align: left;" >ME221:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_ME221_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_ME221_season1_middle.png"  target="_blank" >middle</a><br></div>
SMTS3:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS3_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS3_season1_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS3_season1_bottom.png"  target="_blank" >bottom</a><br>
F464:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_F464_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_F464_season1_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_F464_season1_bottom.png"  target="_blank" >bottom</a><br>
P555:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_P555_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_P555_season1_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_P555_season1_bottom.png"  target="_blank" >bottom</a><br>
SMTS1:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS1_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS1_season1_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS1_season1_bottom.png"  target="_blank" >bottom</a><br>
MA311:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_MA311_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_MA311_season1_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_MA311_season1_bottom.png"  target="_blank" >bottom</a><br>
<div style="text-align: left;" >Fll. Bandiera:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_fll-bandiera_season1_top.png"  target="_blank" >top</a><br></div>
</td>

<td style="color:red">
<div style="text-align: left;" >SMLG2:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG2_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG2_season2_middle.png"  target="_blank" >middle</a><br></div>
SMLG3:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG3_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG3_season2_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG3_season2_bottom.png"  target="_blank" >bottom</a><br>
<div style="text-align: left;" >ME221:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_ME221_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_ME221_season2_middle.png"  target="_blank" >middle</a><br></div>
SMTS3:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS3_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS3_season2_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS3_season2_bottom.png"  target="_blank" >bottom</a><br>
F464:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_F464_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_F464_season2_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_F464_season2_bottom.png"  target="_blank" >bottom</a><br>
P555:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_P555_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_P555_season2_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_P555_season2_bottom.png"  target="_blank" >bottom</a><br>
SMTS1:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS1_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS1_season2_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS1_season2_bottom.png"  target="_blank" >bottom</a><br>
MA311:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_MA311_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_MA311_season2_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_MA311_season2_bottom.png"  target="_blank" >bottom</a><br>
<div style="text-align: left;" >Fll. Bandiera:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_fll-bandiera_season2_top.png"  target="_blank" >top</a><br></div>
</td>

<td style="color:red">
<div style="text-align: left;" >SMLG2:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG2_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG2_season3_middle.png"  target="_blank" >middle</a><br></div>
SMLG3:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG3_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG3_season3_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG3_season3_bottom.png"  target="_blank" >bottom</a><br>
<div style="text-align: left;" >ME221:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_ME221_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_ME221_season3_middle.png"  target="_blank" >middle</a><br></div>
SMTS3:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS3_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS3_season3_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS3_season3_bottom.png"  target="_blank" >bottom</a><br>
F464:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_F464_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_F464_season3_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_F464_season3_bottom.png"  target="_blank" >bottom</a><br>
P555:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_P555_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_P555_season3_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_P555_season3_bottom.png"  target="_blank" >bottom</a><br>
SMTS1:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS1_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS1_season3_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS1_season3_bottom.png"  target="_blank" >bottom</a><br>
MA311:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_MA311_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_MA311_season3_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_MA311_season3_bottom.png"  target="_blank" >bottom</a><br>
<div style="text-align: left;" >Fll. Bandiera:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_fll-bandiera_season3_top.png"  target="_blank" >top</a><br></div>
</td>

<td style="color:red">
<div style="text-align: left;" >SMLG2:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG2_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG2_season4_middle.png"  target="_blank" >middle</a><br></div>
SMLG3:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG3_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG3_season4_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG3_season4_bottom.png"  target="_blank" >bottom</a><br>
<div style="text-align: left;" >ME221:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_ME221_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_ME221_season4_middle.png"  target="_blank" >middle</a><br></div>
SMTS3:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS3_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS3_season4_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS3_season4_bottom.png"  target="_blank" >bottom</a><br>
F464:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_F464_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_F464_season4_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_F464_season4_bottom.png"  target="_blank" >bottom</a><br>
P555:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_P555_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_P555_season4_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_P555_season4_bottom.png"  target="_blank" >bottom</a><br>
SMTS1:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS1_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS1_season4_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS1_season4_bottom.png"  target="_blank" >bottom</a><br>
MA311:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_MA311_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_MA311_season4_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_MA311_season4_bottom.png"  target="_blank" >bottom</a><br>
<div style="text-align: left;" >Fll. Bandiera:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_fll-bandiera_season4_top.png"  target="_blank" >top</a><br></div>
</td>

<td style="color:red">
<div style="text-align: left;" >SMLG2:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG2_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG2_tot_middle.png"  target="_blank" >middle</a><br></div>
SMLG3:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG3_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG3_tot_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMLG3_tot_bottom.png"  target="_blank" >bottom</a><br>
<div style="text-align: left;" >ME221:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_ME221_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_ME221_tot_middle.png"  target="_blank" >middle</a><br></div>
SMTS3:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS3_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS3_tot_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS3_tot_bottom.png"  target="_blank" >bottom</a><br>
F464:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_F464_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_F464_tot_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_F464_tot_bottom.png"  target="_blank" >bottom</a><br>
P555:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_P555_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_P555_tot_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_P555_tot_bottom.png"  target="_blank" >bottom</a><br>
SMTS1:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS1_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS1_tot_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_SMTS1_tot_bottom.png"  target="_blank" >bottom</a><br>
MA311:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_MA311_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_MA311_tot_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_temp_MA311_tot_bottom.png"  target="_blank" >bottom</a><br>
<div style="text-align: left;" >Fll. Bandiera:
<a href="./SCENARIO/NEMO_validation/ecdf_temp_fll-bandiera_tot_top.png"  target="_blank" >top</a><br></div>
</td>

</tr>

<th bgcolor="chartreuse" text-align:center >ECDF Salinity<br>
<img src="./SCENARIO/NEMO_validation/ecdf_sal_SMLG2_season1_middle.png" alt="Miniature of the graph type" style="float: center; width:100px; height:75px;">
</th>

<td style="color:red">
<div style="text-align: left;" >SMLG2:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG2_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG2_season1_middle.png"  target="_blank" >middle</a><br></div>
SMLG3:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG3_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG3_season1_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG3_season1_bottom.png"  target="_blank" >bottom</a><br>
<div style="text-align: left;" >ME221:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_ME221_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_ME221_season1_middle.png"  target="_blank" >middle</a><br></div>
SMTS3:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS3_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS3_season1_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS3_season1_bottom.png"  target="_blank" >bottom</a><br>
F464:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_F464_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_F464_season1_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_F464_season1_bottom.png"  target="_blank" >bottom</a><br>
P555:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_P555_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_P555_season1_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_P555_season1_bottom.png"  target="_blank" >bottom</a><br>
SMTS1:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS1_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS1_season1_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS1_season1_bottom.png"  target="_blank" >bottom</a><br>
MA311:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_MA311_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_MA311_season1_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_MA311_season1_bottom.png"  target="_blank" >bottom</a><br>
</td>

<td style="color:red">
<div style="text-align: left;" >SMLG2:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG2_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG2_season2_middle.png"  target="_blank" >middle</a><br></div>
SMLG3:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG3_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG3_season2_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG3_season2_bottom.png"  target="_blank" >bottom</a><br>
<div style="text-align: left;" >ME221:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_ME221_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_ME221_season2_middle.png"  target="_blank" >middle</a><br></div>
SMTS3:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS3_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS3_season2_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS3_season2_bottom.png"  target="_blank" >bottom</a><br>
F464:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_F464_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_F464_season2_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_F464_season2_bottom.png"  target="_blank" >bottom</a><br>
P555:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_P555_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_P555_season2_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_P555_season2_bottom.png"  target="_blank" >bottom</a><br>
SMTS1:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS1_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS1_season2_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS1_season2_bottom.png"  target="_blank" >bottom</a><br>
MA311:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_MA311_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_MA311_season2_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_MA311_season2_bottom.png"  target="_blank" >bottom</a><br>
</td>

<td style="color:red">
<div style="text-align: left;" >SMLG2:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG2_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG2_season3_middle.png"  target="_blank" >middle</a><br></div>
SMLG3:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG3_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG3_season3_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG3_season3_bottom.png"  target="_blank" >bottom</a><br>
<div style="text-align: left;" >ME221:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_ME221_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_ME221_season3_middle.png"  target="_blank" >middle</a><br></div>
SMTS3:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS3_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS3_season3_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS3_season3_bottom.png"  target="_blank" >bottom</a><br>
F464:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_F464_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_F464_season3_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_F464_season3_bottom.png"  target="_blank" >bottom</a><br>
P555:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_P555_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_P555_season3_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_P555_season3_bottom.png"  target="_blank" >bottom</a><br>
SMTS1:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS1_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS1_season3_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS1_season3_bottom.png"  target="_blank" >bottom</a><br>
MA311:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_MA311_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_MA311_season3_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_MA311_season3_bottom.png"  target="_blank" >bottom</a><br>
</td>

<td style="color:red">
<div style="text-align: left;" >SMLG2:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG2_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG2_season4_middle.png"  target="_blank" >middle</a><br></div>
SMLG3:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG3_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG3_season4_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG3_season4_bottom.png"  target="_blank" >bottom</a><br>
<div style="text-align: left;" >ME221:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_ME221_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_ME221_season4_middle.png"  target="_blank" >middle</a><br></div>
SMTS3:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS3_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS3_season4_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS3_season4_bottom.png"  target="_blank" >bottom</a><br>
F464:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_F464_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_F464_season4_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_F464_season4_bottom.png"  target="_blank" >bottom</a><br>
P555:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_P555_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_P555_season4_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_P555_season4_bottom.png"  target="_blank" >bottom</a><br>
SMTS1:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS1_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS1_season4_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS1_season4_bottom.png"  target="_blank" >bottom</a><br>
MA311:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_MA311_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_MA311_season4_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_MA311_season4_bottom.png"  target="_blank" >bottom</a><br>
</td>

<td style="color:red">
<div style="text-align: left;" >SMLG2:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG2_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG2_tot_middle.png"  target="_blank" >middle</a><br></div>
SMLG3:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG3_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG3_tot_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMLG3_tot_bottom.png"  target="_blank" >bottom</a><br>
<div style="text-align: left;" >ME221:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_ME221_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_ME221_tot_middle.png"  target="_blank" >middle</a><br></div>
SMTS3:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS3_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS3_tot_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS3_tot_bottom.png"  target="_blank" >bottom</a><br>
F464:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_F464_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_F464_tot_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_F464_tot_bottom.png"  target="_blank" >bottom</a><br>
P555:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_P555_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_P555_tot_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_P555_tot_bottom.png"  target="_blank" >bottom</a><br>
SMTS1:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS1_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS1_tot_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_SMTS1_tot_bottom.png"  target="_blank" >bottom</a><br>
MA311:
<a href="./SCENARIO/NEMO_validation/ecdf_sal_MA311_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_MA311_tot_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation/ecdf_sal_MA311_tot_bottom.png"  target="_blank" >bottom</a><br>
</td>

</tr>

<!-- ============================================================================================================= -->

</tbody>
</table>


</body>


 <div  style="font-size: 10px">
            <p    style="text-align:center; color:black" >
               ARPA FVG - Via Cairoli, 14 - 33057 Palmanova (UD)<br>
               Tel +39 0432 1918111 - Fax +39 0432 1918120 - C.F. P.IVA 02096520305<br>
            </p>
        </div>

</html>
