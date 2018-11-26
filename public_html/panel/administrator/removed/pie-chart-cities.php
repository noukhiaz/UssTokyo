<?php
//$total_cities =  mysql_query("SELECT * FROM incidents as t1 LEFT JOIN countries_cities as t2 ON find_in_set(t2.id, t1.city_id)  group by t2.id"); 
$total_cities =  mysql_query("SELECT * FROM incidents where category = '1' AND is_active = '1' group by city_id"); 
$rowses_cities =   mysql_num_rows($total_cities);
while($row_cities  =   mysql_fetch_array($total_cities))
{
	$cities  = $row_cities["city_id"]; 
	$cites = mysql_query("select * from countries_cities where id = '$cities' ");
	$citess = mysql_fetch_assoc($cites);
	//echo '<a href="index.php?p=incidents&search=1&city='.$citess['id'].'"  class="font-black">'. $citess['name'].' </a>';
	$cities = $citess['name'];
	$citiesid = $citess['id'];
	$results = mysql_query("select * from incidents WHERE city_id =  '$citiesid' AND category = '1'");  
	$number_of_rowss = mysql_num_rows($results);  
//	echo "". $number_of_rowss. " <br />"; 
	$cities_record = $number_of_rowss;
	$city_records[] = '{
    "country": "'.$cities.'",
    "litres": '.$cities_record.'
  }';
}
?><?php //echo implode(',', $city_records);?>
<style>
#chartdiv_cities {
  width: 100%;
  height: 500px;
  font-size: 11px;
}
.amcharts-pie-slice {
  transform: scale(1);
  transform-origin: 100% 1050%;
  transition-duration: 0.3s;
  transition: all .3s ease-out;
  -webkit-transition: all .3s ease-out;
  -moz-transition: all .3s ease-out;
  -o-transition: all .3s ease-out;
  cursor: pointer;
  box-shadow: 0 0 30px 0 #000;
}
.amcharts-pie-slice:hover {
  transform: scale(1.1);
  filter: url(#shadow);
}		
.amcharts-chart-div a {display:none !important;}					
</style>

<!-- Chart code -->
<script>
var chart_pie = AmCharts.makeChart("chartdiv_cities", {
  "type": "pie",
  "startDuration": 0,
   "theme": "light",
  "addClassNames": true,
  "legend":{
   	"position":"top",
    "marginRight":100,
    "autoMargins":false
  },
  "innerRadius": "30%",
  "defs": {
    "filter": [{
      "id": "shadow",
      "width": "200%",
      "height": "200%",
      "feOffset": {
        "result": "offOut",
        "in": "SourceAlpha",
        "dx": 0,
        "dy": 0
      },
      "feGaussianBlur": {
        "result": "blurOut",
        "in": "offOut",
        "stdDeviation": 5
      },
      "feBlend": {
        "in": "SourceGraphic",
        "in2": "blurOut",
        "mode": "normal"
      }
    }]
  },
  "dataProvider": [<?php echo implode(',', $city_records);?>],
  "valueField": "litres",
  "titleField": "country",
  "export": {
    "enabled": false
  }
});

chart_pie.addListener("init", handleInit);

chart_pie.addListener("rollOverSlice", function(e) {
  handleRollOver(e);
});

function handleInit(){
  chart_pie.legend.addListener("rollOverItem", handleRollOver);
}

function handleRollOver(e){
  var wedge = e.dataItem.wedge.node;
  wedge.parentNode.appendChild(wedge);
}
</script>

<!-- HTML -->
<div id="chartdiv_cities"></div>	
					