@section('footer')
	<!-- banner -->
	<!--copy rights start here-->
	<div class="copyrights">
		 <p>Copyright &copy; 2019.Icoterie All rights reserved</p>
	</div>	
	<!--copy rights end here-->
	<!-- js -->
	<script type="text/javascript" src="/icoterie/js/jquery-2.1.4.min.js"></script>
	<!-- /amcharts -->
	<script type="text/javascript" src="/icoterie/js/amcharts.js"></script>
	<script type="text/javascript" src="/icoterie/js/serial.js"></script>
	<script type="text/javascript" src="/icoterie/js/export.js"></script>	
	<script type="text/javascript" src="/icoterie/js/light.js"></script>
	<!-- Chart code -->
	<script type="text/javascript">
var chart = AmCharts.makeChart("chartdiv", {
    "theme": "light",
    "type": "serial",
    "startDuration": 2,
    "dataProvider": [{
        "country": "USA",
        "visits": 4025,
        "color": "#FF0F00"
    }, {
        "country": "China",
        "visits": 1882,
        "color": "#FF6600"
    }, {
        "country": "Japan",
        "visits": 1809,
        "color": "#FF9E01"
    }, {
        "country": "Germany",
        "visits": 1322,
        "color": "#FCD202"
    }, {
        "country": "UK",
        "visits": 1122,
        "color": "#F8FF01"
    }, {
        "country": "France",
        "visits": 1114,
        "color": "#B0DE09"
    }, {
        "country": "India",
        "visits": 984,
        "color": "#04D215"
    }, {
        "country": "Spain",
        "visits": 711,
        "color": "#0D8ECF"
    }, {
        "country": "Netherlands",
        "visits": 665,
        "color": "#0D52D1"
    }, {
        "country": "Russia",
        "visits": 580,
        "color": "#2A0CD0"
    }, {
        "country": "South Korea",
        "visits": 443,
        "color": "#8A0CCF"
    }, {
        "country": "Canada",
        "visits": 441,
        "color": "#CD0D74"
    }, {
        "country": "Brazil",
        "visits": 395,
        "color": "#754DEB"
    }, {
        "country": "Italy",
        "visits": 386,
        "color": "#DDDDDD"
    }, {
        "country": "Taiwan",
        "visits": 338,
        "color": "#333333"
    }],
    "valueAxes": [{
        "position": "left",
        "axisAlpha":0,
        "gridAlpha":0
    }],
    "graphs": [{
        "balloonText": "[[category]]: <b>[[value]]</b>",
        "colorField": "color",
        "fillAlphas": 0.85,
        "lineAlpha": 0.1,
        "type": "column",
        "topRadius":1,
        "valueField": "visits"
    }],
    "depth3D": 40,
	"angle": 30,
    "chartCursor": {
        "categoryBalloonEnabled": false,
        "cursorAlpha": 0,
        "zoomable": false
    },
    "categoryField": "country",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha":0,
        "gridAlpha":0

    },
    "export": {
    	"enabled": true
     }

}, 0);
</script>
<!-- Chart code -->
<script type="text/javascript">
var chart = AmCharts.makeChart("chartdiv1", {
    "type": "serial",
	"theme": "light",
    "legend": {
        "horizontalGap": 10,
        "maxColumns": 1,
        "position": "right",
		"useGraphSettings": true,
		"markerSize": 10
    },
    "dataProvider": [{
        "year": 2017,
        "europe": 2.5,
        "namerica": 2.5,
        "asia": 2.1,
        "lamerica": 0.3,
        "meast": 0.2,
        "africa": 0.1
    }, {
        "year": 2016,
        "europe": 2.6,
        "namerica": 2.7,
        "asia": 2.2,
        "lamerica": 0.3,
        "meast": 0.3,
        "africa": 0.1
    }, {
        "year": 2015,
        "europe": 2.8,
        "namerica": 2.9,
        "asia": 2.4,
        "lamerica": 0.3,
        "meast": 0.3,
        "africa": 0.1
    }],
    "valueAxes": [{
        "stackType": "regular",
        "axisAlpha": 0.5,
        "gridAlpha": 0
    }],
    "graphs": [{
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Europe",
        "type": "column",
		"color": "#000000",
        "valueField": "europe"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "North America",
        "type": "column",
		"color": "#000000",
        "valueField": "namerica"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Asia-Pacific",
        "type": "column",
		"color": "#000000",
        "valueField": "asia"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Latin America",
        "type": "column",
		"color": "#000000",
        "valueField": "lamerica"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Middle-East",
        "type": "column",
		"color": "#000000",
        "valueField": "meast"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Africa",
        "type": "column",
		"color": "#000000",
        "valueField": "africa"
    }],
    "rotate": true,
    "categoryField": "year",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha": 0,
        "gridAlpha": 0,
        "position": "left"
    },
    "export": {
    	"enabled": true
     }
});
	</script>

	<!-- //amcharts -->
	<script type="text/javascript" src="/icoterie/js/chart1.js"></script>
	<script src="/icoterie/js/Chart.min.js"></script>
	<script type="text/javascript" src="/icoterie/js/modernizr.custom.js"></script>
	<script type="text/javascript" src="/icoterie/js/classie.js"></script>
	<script type="text/javascript" src="/icoterie/js/gnmenu.js"></script>
	<script type="text/javascript">
		new gnMenu( document.getElementById( 'gn-menu' ) );
	</script>
	<!-- script-for-menu -->
	<!-- /circle-->
	<script type="text/javascript" src="/icoterie/js/circles.js"></script>
	<script type="text/javascript">
		var colors = [
				['#ffffff', '#fd9426'],
				['#ffffff', '#fc3158'],
				['#ffffff', '#53d769'],
				['#ffffff', '#147efb']
			];
		for (var i = 1; i <= 7; i++) {
			var child = document.getElementById('circles-' + i),
				percentage = 30 + (i * 10);
				
			Circles.create({
				id:         child.id,
				percentage: percentage,
				radius:     80,
				width:      10,
				number:   	percentage / 1,
				text:       '%',
				colors:     colors[i - 1]
			});
		}			
	</script>
	<!-- //circle -->
	<!--skycons-icons-->
	<script type="text/javascript" src="/icoterie/js/skycons.js"></script>
	<script type="text/javascript">
		var icons = new Skycons({"color": "#fcb216"}),
			list  = [
				"partly-cloudy-day"
			],
			i;

			for(i = list.length; i--; )
			icons.set(list[i], list[i]);
		icons.play();
	</script>
	<script type="text/javascript">
		var icons = new Skycons({"color": "#fff"}),
			list  = [
				"clear-night","partly-cloudy-night", "cloudy", "clear-day", "sleet", "snow", "wind","fog"
			],
			i;

		for(i = list.length; i--; )
		icons.set(list[i], list[i]);
		icons.play();
	</script>
	<!--//skycons-icons-->
	<!-- //js -->
	<script src="/icoterie/js/screenfull.js"></script>
	<script type="text/javascript">
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}
			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
		});
	</script>
	<script type="text/javascript" src="/icoterie/js/flipclock.js"></script>
	<script type="text/javascript">
		var clock;
		$(document).ready(function() {
			clock = $('.clock').FlipClock({
		        clockFace: 'HourlyCounter'
		    });
		});
	</script>
	<script type="text/javascript" src="/icoterie/js/bars.js"></script>
	<script type="text/javascript" src="/icoterie/js/jquery.nicescroll.js"></script>
	<script type="text/javascript" src="/icoterie/js/scripts.js"></script>
	<script type="text/javascript" type="text/javascript" src="/icoterie/js/bootstrap-3.1.1.min.js"></script>
@stop