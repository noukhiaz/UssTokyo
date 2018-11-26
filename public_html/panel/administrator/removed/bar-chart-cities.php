<?php
//$total_cities =  mysql_query("SELECT * FROM incidents as t1 LEFT JOIN countries_cities as t2 ON find_in_set(t2.id, t1.city_id)  group by t2.id"); 
$incident_datea =  mysql_query("SELECT * FROM incidents where category = '1'  order by id asc"); 
//$rowses_incidents =   mysql_num_rows($incident_date);
while($row_dates =  mysql_fetch_array($incident_datea))
{
	$incident_date  = $row_dates["incident_date"]; 
	$city_id  = $row_dates["city_id"]; 
	$results = mysql_query("select * from incidents WHERE incident_date =  '$incident_date' AND category = '1' ");  
	$number_of_rowsssss = mysql_num_rows($results);  
//	echo "". $number_of_rowss. " <br />"; 
	$date_record = $number_of_rowsssss;
	$date_records[] = '{"date": "'.$incident_date.'",
        "value": '.$number_of_rowsssss.', 
		 "city": '.$city_id.'
  }';
		
}
?><?php //echo implode(',', $date_records);?>
<!-- Styles -->
<style>
#chartdiv_de {
	width	: 100%;
	height	: 500px;
}
										
</style>

<!-- Resources -->


<!-- Chart code -->
<script>
var chart_bar = AmCharts.makeChart("chartdiv_de", {
    "type": "serial",
    "theme": "light",
    "marginRight": 40,
    "marginLeft": 40,
    "autoMarginOffset": 20,
    "mouseWheelZoomEnabled":true,
    "dataDateFormat": "DD-MM-YYYY",
    "valueAxes": [{
        "id": "v1",
        "axisAlpha": 0,
        "position": "left",
        "ignoreAxisWidth":true
    }],
    "balloon": {
        "borderThickness": 1,
        "shadowAlpha": 0
    },
    "graphs": [{
        "id": "g1",
        "balloon":{
          "drop":true,
          "adjustBorderColor":false,
          "color":"#ffffff"
        },
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "bulletSize": 5,
        "hideBulletsCount": 50,
        "lineThickness": 2,
        "title": "red line",
        "useLineColorForBulletBorder": true,
        "valueField": "value",
        "balloonText": "<span style='font-size:12px;'>[[value]] Attacks</span>"
    }],
    "chartScrollbar": {
        "graph": "g1",
        "oppositeAxis":false, //false
        "offset":30,
        "scrollbarHeight": 80,
        "backgroundAlpha": 0,
        "selectedBackgroundAlpha": 0.1,
        "selectedBackgroundColor": "#888888",
        "graphFillAlpha": 0,
        "graphLineAlpha": 0.5,
        "selectedGraphFillAlpha": 0,
        "selectedGraphLineAlpha": 1,
        "autoGridCount":true,
        "color":"#AAAAAA"
    },
    "chartCursor": {
        "pan": true,
        "valueLineEnabled": true,
        "valueLineBalloonEnabled": true,
        "cursorAlpha":1,
        "cursorColor":"#258cbb",
        "limitToGraph":"g1",
        "valueLineAlpha":0.2,
        "valueZoomable":true 
    },
    "valueScrollbar":{
      "oppositeAxis":false, //false
      "offset":50,
      "scrollbarHeight":10
    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": true,
        "dashLength": 1,
        "minorGridEnabled": true
    },
    "export": {
        "enabled": true
    },
    "dataProvider": [<?php echo implode(',', $date_records);?>]
});

chart_bar.addListener("rendered", zoomChart);

zoomChart();

function zoomChart() {
    chart_bar.zoomToIndexes(chart_bar.dataProvider.length - 40, chart_bar.dataProvider.length - 1);
}
</script>

<!-- HTML -->
<div id="chartdiv_de"></div>