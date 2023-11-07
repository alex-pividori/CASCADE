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

            .img-zoom-container {
                position: relative;
            }


            .titleDiv {
                color: #6495ed;
                background-color: rgba(0, 99, 73, 0.1); /* #fff8dc */;
                text-align: center;
                font-family: "Times New Roman", Times, serif;
            }

            .img-zoom-lens:hover {
                box-shadow: 0 0 6px 3px rgba(0, 140, 186, 0.5);
            }

            .img-zoom-lens {
                position: absolute;
                border: 1px solid black;
                /*set the size of the lens:*/
                width: 50px;
                height: 50px;
            }

            .img-zoom-result {
                position: relative;
                left: 400px;
                bottom: -10px;
                border: 5px solid black;
                /*set the size of the result div:*/
                width:  408px;
                height: 408px;
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

<script>
function imageZoom(imgID, resultID) {
  var img, lens, result, cx, cy;
  img = document.getElementById(imgID);
  result = document.getElementById(resultID);
  /*create lens:*/
  lens = document.createElement("DIV");
  lens.setAttribute("class", "img-zoom-lens");
  /*insert lens:*/
  img.parentElement.insertBefore(lens, img);
  /*calculate the ratio between result DIV and lens:*/
  cx = result.offsetWidth / lens.offsetWidth;
  cy = result.offsetHeight / lens.offsetHeight;
  /*set background properties for the result DIV:*/
  result.style.backgroundImage = "url('" + img.src + "')";
  result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
  /*execute a function when someone moves the cursor over the image, or the lens:*/
  lens.addEventListener("mousemove", moveLens);
  img.addEventListener("mousemove", moveLens);
  /*and also for touch screens:*/
  lens.addEventListener("touchmove", moveLens);
  img.addEventListener("touchmove", moveLens);

  function moveLens(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image:*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    /*calculate the position of the lens:*/
    x = pos.x - (lens.offsetWidth / 2);
    y = pos.y - (lens.offsetHeight / 2);
    /*prevent the lens from being positioned outside the image:*/
    if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
    if (x < 0) {x = 0;}
    if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
    if (y < 0) {y = 0;}
    /*set the position of the lens:*/
    lens.style.left = x + "px";
    lens.style.top = y + "px";
    /*display what the lens "sees":*/
    result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
  }

  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
</script>

 
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
  
            <a href="https://www.arpae.it/it" target="_blank" title="arpae website (it)">
            <img src="logos/arpae_logo.png" alt="Agenzia Regionale per la Protezione dell'Ambiente Emilia Romagna" style="float:right;height:14.2%;width:16.2%">
            </a>

            <a href="http://www.arpa.fvg.it" target="_blank" title="ARPA-FVG website (it)">
            <img src="logos/arpafvg-logo.jfif" alt="Agenzia Regionale per la Protezione dell'Ambiente Friuli Venezia Giulia" style="float:right;height:14.2%;width:16.2%">
            </a>

            <h3 align="center">Interreg IT-HR AdriaClim @ ARPA FVG - CRMA</h3>
</div>

<!-- +++++++++++++++++++++++++++      MAPS      ++++++++++++++++++++++++++++++++ -->

<p style="text-align: center;" >For more informations about this simulation, consult the following file: </p>
<div style="text-align: center;"><a  href="./NEMO_monitoring_stations_arpae.txt"  target="_blank" >NEMO_monitoring_stations</a></div>
<div style="text-align: center;"><a  href="https://www.nemo-ocean.eu/"            target="_blank" >NEMO model website</a></div>

<br><br><br>

<pre><font face="Times New Roman" size="5">             <mark>Monitoring stations:</mark> </font>  </pre>

<p style="text-align:center;" >
<a  href="./NEMO_monitoring_points_arpae.png" target="_blank" title="Monitoring stations">
<div class="img-zoom-container"><img id="myimage"  src="./NEMO_monitoring_points_arpae.png"  style="float:left; width:370px;"></div></a>
<a  href="./arpae_map.png" target="_blank" title="Monitoring stations">
<img src="./arpae_map.png" alt="Monitoring stations" style="float:right; width: 280px;">
</a>
</p>

<div id="myresult" class="img-zoom-result"></div>

<!-- +++++++++++++++++++++++++++  <map> imagine   ++++++++++++++++++++++++++++++++ -->

<script>
// Initiate zoom effect:
imageZoom("myimage", "myresult");
</script>

<!-- -------------------------------------------------------------------------------- -->

<br><br><br><br>

<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
 
<table align="center">

<caption class="titleDiv" style="font-size:2vw">NEMO model validation arpae (Boxplots)</caption>


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
<img src="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_1004_tot.png" alt="Miniature of the graph type" style="float: center; width:100px; height:75px;">
</th>

<!-- +++++++++++++++++++++ Season 1 ++++++++++++++++++ -->

<td style="color:red">
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_1014_season1.pdf"  target="_blank" >1014</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_2014_season1.pdf"  target="_blank" >2014</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_1019_season1.pdf"  target="_blank" >1019</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_604_season1.pdf"  target="_blank" >604</a><br>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_619_season1.pdf"  target="_blank" >619</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_614_season1.pdf"  target="_blank" >614</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_2004_season1.pdf"  target="_blank" >2004</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_1004_season1.pdf"  target="_blank" >1004</a><br>
</td>

<!-- +++++++++++++++++++++ Season 2 ++++++++++++++++++ -->

<td style="color:red">
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_1014_season2.pdf"  target="_blank" >1014</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_2014_season2.pdf"  target="_blank" >2014</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_1019_season2.pdf"  target="_blank" >1019</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_604_season2.pdf"  target="_blank" >604</a><br>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_619_season2.pdf"  target="_blank" >619</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_614_season2.pdf"  target="_blank" >614</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_2004_season2.pdf"  target="_blank" >2004</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_1004_season2.pdf"  target="_blank" >1004</a><br>
</td>

<!-- +++++++++++++++++++++ Season 3 ++++++++++++++++++ -->

<td style="color:red">
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_1014_season3.pdf"  target="_blank" >1014</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_2014_season3.pdf"  target="_blank" >2014</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_1019_season3.pdf"  target="_blank" >1019</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_604_season3.pdf"  target="_blank" >604</a><br>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_619_season3.pdf"  target="_blank" >619</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_614_season3.pdf"  target="_blank" >614</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_2004_season3.pdf"  target="_blank" >2004</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_1004_season3.pdf"  target="_blank" >1004</a><br>
</td>

<!-- +++++++++++++++++++++ Season 4 ++++++++++++++++++ -->

<td style="color:red">
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_1014_season4.pdf"  target="_blank" >1014</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_2014_season4.pdf"  target="_blank" >2014</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_1019_season4.pdf"  target="_blank" >1019</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_604_season4.pdf"  target="_blank" >604</a><br>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_619_season4.pdf"  target="_blank" >619</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_614_season4.pdf"  target="_blank" >614</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_2004_season4.pdf"  target="_blank" >2004</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_1004_season4.pdf"  target="_blank" >1004</a><br>
</td>

<!-- +++++++++++++++++++++ Annual ++++++++++++++++++ -->

<td style="color:red">
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_1014_tot.pdf"  target="_blank" >1014</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_2014_tot.pdf"  target="_blank" >2014</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_1019_tot.pdf"  target="_blank" >1019</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_604_tot.pdf"  target="_blank" >604</a><br>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_619_tot.pdf"  target="_blank" >619</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_614_tot.pdf"  target="_blank" >614</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_2004_tot.pdf"  target="_blank" >2004</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_T_1004_tot.pdf"  target="_blank" >1004</a><br>
</td>


</tr>

<!-- ================================================================ -->
<!-- ========================= Salinity ========================= -->
<!-- ================================================================ -->

<tr>
<th bgcolor="chartreuse" text-align:center >Salinity<br>
<img src="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_1019_season4.png" alt="Miniature of the graph type" style="float: center; width:100px; height:75px;">
</th>

<!-- +++++++++++++++++++++ Season 1 ++++++++++++++++++ -->

<td style="color:red">
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_1014_season1.pdf"  target="_blank" >1014</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_2014_season1.pdf"  target="_blank" >2014</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_1019_season1.pdf"  target="_blank" >1019</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_604_season1.pdf"  target="_blank" >604</a><br>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_619_season1.pdf"  target="_blank" >619</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_614_season1.pdf"  target="_blank" >614</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_2004_season1.pdf"  target="_blank" >2004</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_1004_season1.pdf"  target="_blank" >1004</a>
</td>

<!-- +++++++++++++++++++++ Season 2 ++++++++++++++++++ -->

<td style="color:red">
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_1014_season2.pdf"  target="_blank" >1014</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_2014_season2.pdf"  target="_blank" >2014</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_1019_season2.pdf"  target="_blank" >1019</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_604_season2.pdf"  target="_blank" >604</a><br>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_619_season2.pdf"  target="_blank" >619</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_614_season2.pdf"  target="_blank" >614</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_2004_season2.pdf"  target="_blank" >2004</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_1004_season2.pdf"  target="_blank" >1004</a>
</td>

<!-- +++++++++++++++++++++ Season 3 ++++++++++++++++++ -->

<td style="color:red">
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_1014_season3.pdf"  target="_blank" >1014</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_2014_season3.pdf"  target="_blank" >2014</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_1019_season3.pdf"  target="_blank" >1019</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_604_season3.pdf"  target="_blank" >604</a><br>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_619_season3.pdf"  target="_blank" >619</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_614_season3.pdf"  target="_blank" >614</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_2004_season3.pdf"  target="_blank" >2004</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_1004_season3.pdf"  target="_blank" >1004</a>
</td>

<!-- +++++++++++++++++++++ Season 4 ++++++++++++++++++ -->

<td style="color:red">
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_1014_season4.pdf"  target="_blank" >1014</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_2014_season4.pdf"  target="_blank" >2014</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_1019_season4.pdf"  target="_blank" >1019</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_604_season4.pdf"  target="_blank" >604</a><br>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_619_season4.pdf"  target="_blank" >619</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_614_season4.pdf"  target="_blank" >614</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_2004_season4.pdf"  target="_blank" >2004</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_1004_season4.pdf"  target="_blank" >1004</a>
</td>

<!-- +++++++++++++++++++++ Annual ++++++++++++++++++ -->

<td style="color:red">
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_1014_tot.pdf"  target="_blank" >1014</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_2014_tot.pdf"  target="_blank" >2014</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_1019_tot.pdf"  target="_blank" >1019</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_604_tot.pdf"  target="_blank" >604</a><br>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_619_tot.pdf"  target="_blank" >619</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_614_tot.pdf"  target="_blank" >614</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_2004_tot.pdf"  target="_blank" >2004</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_boxplot_delta_S_1004_tot.pdf"  target="_blank" >1004</a>
</td>

</tr>


<tr>
<td colspan="6" style="text-align: center;">
<a href="./SCENARIO/NEMO_validation_arpae/arpae_NEMO_validation_model_vs_measures"     target="_blank" rel="noopener noreferrer" >Statistical indexes for NEMO validation </a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_NEMO_validation_model_vs_measures.csv" target="_blank" rel="noopener noreferrer" >( Download )</a>
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
<img src="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1014_season1_middle.png" alt="Miniature of the graph type" style="float: center; width:100px; height:75px;">
</th>

<!-- +++++++++++++++++++++ Season 1 ++++++++++++++++++ -->

<td style="color:red; text-align: left;">
1014:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1014_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1014_season1_middle.png"  target="_blank" >middle</a><br>
2014:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2014_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2014_season1_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2014_season1_bottom.png"  target="_blank" >bottom</a><br>
1019:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1019_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1019_season1_middle.png"  target="_blank" >middle</a><br>
604:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_604_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_604_season1_middle.png"  target="_blank" >middle</a><br>
619:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_619_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_619_season1_middle.png"  target="_blank" >middle</a><br>
614:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_614_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_614_season1_middle.png"  target="_blank" >middle</a><br>
2004:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2004_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2004_season1_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2004_season1_bottom.png"  target="_blank" >bottom</a><br>
1004:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1004_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1004_season1_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1004_season1_bottom.png"  target="_blank" >bottom</a><br>
</td>

<td style="color:red; text-align: left;">
1014:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1014_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1014_season2_middle.png"  target="_blank" >middle</a><br>
2014:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2014_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2014_season2_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2014_season2_bottom.png"  target="_blank" >bottom</a><br>
1019:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1019_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1019_season2_middle.png"  target="_blank" >middle</a><br>
604:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_604_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_604_season2_middle.png"  target="_blank" >middle</a><br>
619:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_619_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_619_season2_middle.png"  target="_blank" >middle</a><br>
614:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_614_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_614_season2_middle.png"  target="_blank" >middle</a><br>
2004:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2004_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2004_season2_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2004_season2_bottom.png"  target="_blank" >bottom</a><br>
1004:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1004_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1004_season2_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1004_season2_bottom.png"  target="_blank" >bottom</a><br>
</td>

<td style="color:red; text-align: left;">
1014:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1014_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1014_season3_middle.png"  target="_blank" >middle</a><br>
2014:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2014_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2014_season3_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2014_season3_bottom.png"  target="_blank" >bottom</a><br>
1019:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1019_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1019_season3_middle.png"  target="_blank" >middle</a><br>
604:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_604_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_604_season3_middle.png"  target="_blank" >middle</a><br>
619:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_619_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_619_season3_middle.png"  target="_blank" >middle</a><br>
614:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_614_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_614_season3_middle.png"  target="_blank" >middle</a><br>
2004:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2004_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2004_season3_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2004_season3_bottom.png"  target="_blank" >bottom</a><br>
1004:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1004_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1004_season3_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1004_season3_bottom.png"  target="_blank" >bottom</a><br>
</td>

<td style="color:red; text-align: left;">
1014:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1014_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1014_season4_middle.png"  target="_blank" >middle</a><br>
2014:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2014_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2014_season4_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2014_season4_bottom.png"  target="_blank" >bottom</a><br>
1019:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1019_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1019_season4_middle.png"  target="_blank" >middle</a><br>
604:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_604_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_604_season4_middle.png"  target="_blank" >middle</a><br>
619:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_619_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_619_season4_middle.png"  target="_blank" >middle</a><br>
614:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_614_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_614_season4_middle.png"  target="_blank" >middle</a><br>
2004:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2004_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2004_season4_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2004_season4_bottom.png"  target="_blank" >bottom</a><br>
1004:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1004_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1004_season4_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1004_season4_bottom.png"  target="_blank" >bottom</a><br>
</td>

<td style="color:red; text-align: left;">
1014:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1014_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1014_tot_middle.png"  target="_blank" >middle</a><br>
2014:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2014_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2014_tot_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2014_tot_bottom.png"  target="_blank" >bottom</a><br>
1019:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1019_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1019_tot_middle.png"  target="_blank" >middle</a><br>
604:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_604_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_604_tot_middle.png"  target="_blank" >middle</a><br>
619:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_619_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_619_tot_middle.png"  target="_blank" >middle</a><br>
614:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_614_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_614_tot_middle.png"  target="_blank" >middle</a><br>
2004:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2004_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2004_tot_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_2004_tot_bottom.png"  target="_blank" >bottom</a><br>
1004:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1004_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1004_tot_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_temp_1004_tot_bottom.png"  target="_blank" >bottom</a><br>
</td>

</tr>

<th bgcolor="chartreuse" text-align:center >ECDF Salinity<br>
<img src="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1014_season1_middle.png" alt="Miniature of the graph type" style="float: center; width:100px; height:75px;">
</th>

<td style="color:red; text-align: left;">
1014:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1014_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1014_season1_middle.png"  target="_blank" >middle</a><br>
2014:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2014_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2014_season1_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2014_season1_bottom.png"  target="_blank" >bottom</a><br>
1019:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1019_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1019_season1_middle.png"  target="_blank" >middle</a><br>
604:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_604_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_604_season1_middle.png"  target="_blank" >middle</a><br>
619:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_619_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_619_season1_middle.png"  target="_blank" >middle</a><br>
614:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_614_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_614_season1_middle.png"  target="_blank" >middle</a><br>
2004:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2004_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2004_season1_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2004_season1_bottom.png"  target="_blank" >bottom</a><br>
1004:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1004_season1_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1004_season1_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1004_season1_bottom.png"  target="_blank" >bottom</a><br>
</td>

<td style="color:red; text-align: left;">
1014:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1014_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1014_season2_middle.png"  target="_blank" >middle</a><br>
2014:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2014_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2014_season2_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2014_season2_bottom.png"  target="_blank" >bottom</a><br>
1019:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1019_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1019_season2_middle.png"  target="_blank" >middle</a><br>
604:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_604_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_604_season2_middle.png"  target="_blank" >middle</a><br>
619:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_619_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_619_season2_middle.png"  target="_blank" >middle</a><br>
614:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_614_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_614_season2_middle.png"  target="_blank" >middle</a><br>
2004:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2004_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2004_season2_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2004_season2_bottom.png"  target="_blank" >bottom</a><br>
1004:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1004_season2_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1004_season2_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1004_season2_bottom.png"  target="_blank" >bottom</a><br>
</td>

<td style="color:red; text-align: left;">
1014:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1014_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1014_season3_middle.png"  target="_blank" >middle</a><br>
2014:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2014_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2014_season3_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2014_season3_bottom.png"  target="_blank" >bottom</a><br>
1019:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1019_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1019_season3_middle.png"  target="_blank" >middle</a><br>
604:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_604_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_604_season3_middle.png"  target="_blank" >middle</a><br>
619:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_619_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_619_season3_middle.png"  target="_blank" >middle</a><br>
614:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_614_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_614_season3_middle.png"  target="_blank" >middle</a><br>
2004:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2004_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2004_season3_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2004_season3_bottom.png"  target="_blank" >bottom</a><br>
1004:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1004_season3_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1004_season3_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1004_season3_bottom.png"  target="_blank" >bottom</a><br>
</td>

<td style="color:red; text-align: left;">
1014:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1014_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1014_season4_middle.png"  target="_blank" >middle</a><br>
2014:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2014_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2014_season4_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2014_season4_bottom.png"  target="_blank" >bottom</a><br>
1019:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1019_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1019_season4_middle.png"  target="_blank" >middle</a><br>
604:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_604_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_604_season4_middle.png"  target="_blank" >middle</a><br>
619:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_619_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_619_season4_middle.png"  target="_blank" >middle</a><br>
614:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_614_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_614_season4_middle.png"  target="_blank" >middle</a><br>
2004:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2004_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2004_season4_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2004_season4_bottom.png"  target="_blank" >bottom</a><br>
1004:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1004_season4_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1004_season4_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1004_season4_bottom.png"  target="_blank" >bottom</a><br>
</td>

<td style="color:red; text-align: left;">
1014:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1014_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1014_tot_middle.png"  target="_blank" >middle</a><br>
2014:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2014_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2014_tot_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2014_tot_bottom.png"  target="_blank" >bottom</a><br>
1019:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1019_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1019_tot_middle.png"  target="_blank" >middle</a><br>
604:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_604_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_604_tot_middle.png"  target="_blank" >middle</a><br>
619:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_619_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_619_tot_middle.png"  target="_blank" >middle</a><br>
614:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_614_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_614_tot_middle.png"  target="_blank" >middle</a><br>
2004:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2004_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2004_tot_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_2004_tot_bottom.png"  target="_blank" >bottom</a><br>
1004:
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1004_tot_top.png"  target="_blank" >top</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1004_tot_middle.png"  target="_blank" >middle</a>
<a href="./SCENARIO/NEMO_validation_arpae/arpae_ecdf_sal_1004_tot_bottom.png"  target="_blank" >bottom</a><br>
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
