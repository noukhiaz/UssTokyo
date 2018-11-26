<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}
</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/ammap.js"></script>
<script src="https://www.amcharts.com/lib/3/maps/js/pakistanLow.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/none.js"></script>

<!-- Chart code -->
<script>


var map = AmCharts.makeChart( "chartdiv", {
  "type": "map",
  "theme": "light",
  "colorSteps": 10,

  "dataProvider": {
    "map": "pakistanLow",
	"getAreasFromMap": true,
    "areas": [ {
      "id": "PK-BA",
      "value": 4447100
    }, {
      "id": "PK-PB",
      "value": 626932
    }, {
      "id": "PK-SD",
      "value": 5130632
    }, {
      "id": "PK-KP",
      "value": 5130032
    }
	, {
      "id": "PK-GB",
      "value": 5130032
    }, {
      "id": "PK-TA",
      "value": 5130032
    }
	, {
      "id": "PK-JK",
      "value": 4447100
    }, {
      "id": "PK-IS",
      "value": 5130032
    } ]
  },

  "areasSettings": {
    "autoZoom": true
  },

  "valueLegend": {
    "right": 10,
    "minValue": "little",
    "maxValue": "a lot!"
  },

  "export": {
    "enabled": true
  }

} );
</script>

<!-- HTML -->
<div id="chartdiv"></div>	
<div id="mapdiv"></div>	