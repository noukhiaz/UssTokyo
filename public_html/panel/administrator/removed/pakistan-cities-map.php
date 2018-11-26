<style>
#chartdiv {
  width: 100%;
  height: 500px;
}
</style>

<script src="https://www.amcharts.com/lib/3/ammap.js"></script>
<script src="https://www.amcharts.com/lib/3/maps/js/pakistanLow.js"></script>
<script>
// svg path for target icon
var targetSVG = "M9,0C4.029,0,0,4.029,0,9s4.029,9,9,9s9-4.029,9-9S13.971,0,9,0z M9,15.93 c-3.83,0-6.93-3.1-6.93-6.93S5.17,2.07,9,2.07s6.93,3.1,6.93,6.93S12.83,15.93,9,15.93 M12.5,9c0,1.933-1.567,3.5-3.5,3.5S5.5,10.933,5.5,9S7.067,5.5,9,5.5 S12.5,7.067,12.5,9z";

var starSVG = "M20,7.244 L12.809,6.627 L10,0 L7.191,6.627 L0,7.244 L5.455,11.971 L3.82,19 L10,15.272 L16.18,19 L14.545,11.971 L20,7.244 L20,7.244 Z M10,13.396 L6.237,15.666 L7.233,11.385 L3.91,8.507 L8.29,8.131 L10,4.095 L11.71,8.131 L16.09,8.507 L12.768,11.385 L13.764,15.666 L10,13.396 L10,13.396 Z";

window.map = AmCharts.makeChart( "chartdiv", {
  "type": "map",
  "projection":"winkel3",
  "theme": "light",

  "imagesSettings": {
    "rollOverColor": "#089282",
    "rollOverScale": 3,
    "selectedScale": 3,
    "selectedColor": "#089282",
    "color": "#13564e",
	"balloonText": "[[title]]: [[value]]"
  },

  "areasSettings": {
    "unlistedAreasColor": "#15A892",
    outlineThickness:0.1
  },

  "dataProvider": {
    "map": "pakistanLow",
    "images": [ {
      "svgPath": targetSVG,
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Islamabad",
      "latitude": 33.720,
      "longitude": 73.060,
	  "value": 1000
    },
	{
      "svgPath": targetSVG,
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Rawalpindi",
      "latitude": 33.600,
      "longitude": 73.040,
	  "value": 150
    } 
	,
	{
      "svgPath": targetSVG,
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Abbotabad",
      "latitude": 34.10,
      "longitude": 73.15,
	  "value": 150
    }
	]
  },
  "listeners": [{
    "event": "clickMapObject",
    "method": function(event) {
      if (event.mapObject.svgPath !== undefined) {
        event.mapObject.svgPath = starSVG;
        event.mapObject.validate();
      }
    }
  }]
} );
</script>
<div id="chartdiv"></div>