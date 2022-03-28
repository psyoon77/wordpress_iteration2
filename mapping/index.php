<!DOCTYPE html>
<html>
	<head>
		<title>Temples of the Classical World</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="scripts/leaflet/leaflet.css" />
		<link rel="stylesheet" href="/css/map.css" />
		<script>

		function setQ(){


			//alert("sssss");
			alert( ctl["_container"].offsetHeight  );





				// $( ctl["_container"]  ).css( "width", 80 );
				// $( ctl["_container"]  ).css( "height", 80 ); 
			//	 $(ctl["_container"] ).css( "overflow", "auto" ); 

			//$.map(ctl, function(value, key) {
				
				//alert( value + "::" + key );
			  
		//		});
			

		}


		</script>
		
	</head>
	<body  >
	
	 
	
	
	<div id='mask'>
	<table>
			<tr>
				<td colspan=2>
					<h1  class="leftTop">
						Temples of the Classical World
					</h1>
				</td>
			</tr>
			<tr>
				<td    id='side_top'>
					<h2 class="leftTop" >
						Pick a variable by which to map the structures in the database:
					</h2>
					<form class="moveBottom" id="mapType" style="display:inline; vertical-align=left">
						<select id="mymenu" size="1">
							<option value="nothing" selected="selected">
								none
							</option>
							<option value="sex">
								sex of deity
							</option>
							<option value="deitytype">
								type of deity
							</option>
<!--
							<option value="type">
								type of structure
							</option>
 -->
							<option value="century">
								century BC of construction
							</option>
							<option value="orientations">
								orientation
							</option>
							<option value="heatmap">
								heatmap
							</option>
						</select>
					</form>
					<br>
					<p class="leftTop" align="center" style="font-size:small">
						Zoom to: <a id="rome" href="javascript:rome();">
							Rome
						</a>
						or
						<a id="all" href="javascript:showAll();">
							the world
						</a>
						or
						<a id="all" href="javascript:showVisible();">
							visible sites
						</a>
					</p>
					<hr  class="leftTop" width="80%">
				</td>
				<td rowspan="2"   id='map'>
				</td>
			</tr>
			<tr   >
				<td     >
				    <div  class="leftTop"  id="side_bottom"></div>
				</td>
			</tr>
			<tr class="leftTop"  id='bottom'>
				<td colspan=2>
                    Filter the sites shown on the map:
                    <?php
                            include 'scripts/make_menues.php';
                            makeMenu('first', '1');
                            makeOperatorMenu('firstOp');
                            echo '<input name=" firsttxt" type="text" maxlength="512" id="firstTxt" class="searchField" /> +
                            '; makeMenu('second', '2');
                            makeOperatorMenu('secondOp');
                     echo '
                            <input name="secondTxt" type="text" maxlength="512" id="secondTxt" class="searchField" /> +
                            '; makeMenu('third', '3');
                            makeOperatorMenu('thirdOp');
                    echo '
                            <input name="thirdTxt" type="text" maxlength="512" id="thirdTxt" class="searchField" />
                            ';
                    ?>
					<button id="process" onclick="readInput();">
						Process
					</button>
					<button id="clear" onclick="clearFilter();">
						Clear
					</button>
				</td>
			</tr>
		</table>
</div>

		<script type="text/javascript">var allPoints = {};
		</script>
		<script type="text/javascript">document.cookie = "querytype=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
		</script>
		</script>
		<script type="text/javascript">document.cookie = "querytype=map; path=/";
		</script>
		<script type="text/javascript" src="scripts/function_fix_date.js">
		</script>
		<script type="text/javascript" src="scripts/function_check_run.js">
		</script>
		<script type="text/javascript" src="scripts/function_get_pleiades_place.js">
		</script>
		<script type="text/javascript" src="scripts/set_cookie.js">
		</script>
		<script type="text/javascript" src="scripts/function_clear_layers.js">
		</script>
		<script type="text/javascript" src="scripts/function_clear_controls.js">
		</script>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<script type="text/javascript" src="scripts/function_layer_by_sex.js?key=2">
		</script>
		<script type="text/javascript" src="scripts/function_layer_by_type.js">
		</script>
		<script type="text/javascript" src="scripts/function_layer_by_deitytype.js">
		</script>
		<script type="text/javascript" src="scripts/function_layer_by_century.js">
		</script>
		<script type="text/javascript" src="scripts/function_layer_by_orientation.js">
		</script>
		<script type="text/javascript" src="scripts/function_layer_by_heat.js">












		







		

		

		
		</script>
		<script type="text/javascript" src="scripts/leaflet/leaflet.js">
		</script>
		<script type="text/javascript" src="scripts/leaflet.rotatedMarker.js">
		</script>
		<script type="text/javascript" src="scripts/leaflet-heat.js">
		</script>
		<script type="text/javascript" src="scripts/load_icons.js">
		</script>
		<script type="text/javascript" src="scripts/tile.stamen.js">
		</script>
		<script type="text/javascript" src="scripts/aurelian_wall.js">
		</script>
		<script type="text/javascript" src="scripts/load_basemaps.js">
		</script>
<!-- Load jQuery library using plain JavaScript -->
		<script src="scripts/jquery.min.js">
		</script>
		<script   type="text/javascript" src="scripts/load_navigation.js">
		</script>
<!--
		<script type="text/javascript" src="scripts/get_citations.js">
		</script>
 -->
		<script type="text/javascript" src="scripts/on_each_feature.js">
		</script>
		<script type="text/javascript" src="scripts/function_clear_filter.js">
		</script>
		<script type="text/javascript" src="scripts/function_get_item_data.js">
		</script>
		<script type="text/javascript" src="scripts/relocate_map.js">
		</script>

		<!-- php script that loads a variable 'biblio' into js -->
		<?php include 'scripts/get_biblio.php' ?>

		<script type="text/javascript">
			// Set a variable to indicate start-up
			// Cookies last a day, so they won't do.
			var allPoints = [];

			// Create menu to select the way to format the data
			var selectmenu = document.getElementById("mymenu")
				selectmenu.onchange = function () {
				    var chosenoption = this.options[this.selectedIndex]
				    switch (chosenoption.value) {
				    case "sex":
				        layer_by_sex();
				      // alert("");
				       
				        break;
// 				    case "type":
// 				        layer_by_type();
// 				        break;
				    case "century":
				        layer_by_century();
				        break;
				    case "orientations":
				        layer_by_orientation();
				        break;
					case "deitytype":
						layer_by_deitytype();
						break;
				    case "heatmap":
				        layer_by_heat();
				        break;
				    case "nothing":
				        clearLayers();
				        clearControls();
 				        map.addLayer(osm);
				    }
				    setResponsive();
				}

			// Create map without layers since the user will do that.

			// Define the bounds for the zoomed out map to show all points
			// Could make this a calculated value based on range of points
			var bounds = [[55,-10.05],[30,39.5]];
			
			
			//var bounds = [[55,-1000.05],[30,39.5]];
			var map = L.map('map', {
			    minZoom: 3,
			    zoomSnap: .5,
			    zoomDelta: .5,
			    layers: [osm]
			});

			// Zoom out
			all();

			L.control.scale({
			    position: 'bottomright'
			}).addTo(map);

			// Add control for wall.
			wallCtl = L.control.layers(null, wallOverlay, {
				collapsed: false
			}).addTo(map);

			// Clear the cookie on startup
			// Will generate a php error in json.php
			// var sqlquery = '';
			setCookie('sqlquery', 'dummy', '-1');

			// Load navigation instructions
			loadNavigation();

			// Read the inputted search
			function readInput() {
				conn = '';
				searchInput = '';
				firstInputMenu = document.getElementById("first").value;
				firstOpText = document.getElementById("firstOp").value;
				firstInputText = test_input(document.getElementById("firstTxt").value);
				secondInputMenu = document.getElementById("second").value;
				secondOpText = document.getElementById("secondOp").value;
				secondInputText = test_input(document.getElementById("secondTxt").value);
				thirdInputMenu = document.getElementById("third").value;
				thirdOpText = document.getElementById("thirdOp").value;
				thirdInputText = test_input(document.getElementById("thirdTxt").value);
				if ( firstInputMenu != '' ) {
				searchInput = firstInputMenu + opTrans(firstOpText, firstInputText);
				conn = ' AND ';
				}
				if ( secondInputMenu != '' ) {
				searchInput = searchInput + conn + secondInputMenu + opTrans(secondOpText, secondInputText);
				conn = ' AND ';
				}
				if ( thirdInputMenu != '' ) {
				searchInput = searchInput + conn + thirdInputMenu + opTrans(thirdOpText, thirdInputText);
				}
				if ( searchInput != '' ) {
// 					document.getElementById("side").innerHTML = 'Inputted query:' + searchInput;
					setCookie('sqlquery', searchInput, '1');
				}
				if ( firstInputMenu + secondInputMenu + thirdInputMenu == '' ) {
					alert('You need to select a field to search on.')
				}
			};

			// Translate operator into sql
				function opTrans(option, str) {
				    translation = "";
				    endStr = "'";
				    switch (option) {
				    case "contains":
				   	    translation=" LIKE '%";
				        endStr = "%'";
				    	break;
				    case "doesNotContain":
				   	    translation=" NOT LIKE '%";
				        endStr = "%'";
				        break;
				    case "beginsWith":
				   	    translation=" LIKE '";
				        endStr = "%'";
				        break;
				    case "is":
				   	    translation=" = '";
				        break;
				    case "isNot":
				   	    translation=" != '";
				        break;
				    case "lessThan":
				   	    translation=" < '";
				        break;
				    case "greaterThan":
				   	    translation=" > '";
				        break;
				    }
				    return (translation + str + endStr);
				}

			// Clean up the inputted string
			function test_input(data) {
			    data = data.trim();
			    data=data.replace(/[^a-z\d '"%=-]+/ig,'');
			    return data;
			};

			// Listen for return in text fields
			document.getElementById("firstTxt")
			    .addEventListener("keyup", function(event) {
			    event.preventDefault();
			    if (event.keyCode == 13) {
			        document.getElementById("process").click();
			    }
			});
			document.getElementById("secondTxt")
			    .addEventListener("keyup", function(event) {
			    event.preventDefault();
			    if (event.keyCode == 13) {
			        document.getElementById("process").click();
			    }
			});
			document.getElementById("thirdTxt")
			    .addEventListener("keyup", function(event) {
			    event.preventDefault();
			    if (event.keyCode == 13) {
			        document.getElementById("process").click();
			    }
			});
		</script>
		<style>
/* pad */		
@media (min-width: 481px) and (max-width: 1024px) {

.leftTop {


    display: none;
}

.moveBottom {

 width: 100%;
   
  position: fixed;
  bottom: 10px;
  left: 100px;
  
  

}

.sizeZero {

	width: 0px;
}
#map {

 
	width: 1024px; 
	max-width: 100%;
	
	height: 960px;
	max-height: 90%;

}

#side_top {

	width: 0px;

}
 

table, th, td {
 /* border: 1px solid black; */
}
	}			
		
		
		
		
/* phone */		
@media (min-width: 320px) and (max-width: 480px) {


 /*
$( ctl["_container"] ).css( "width", 80 );
$( ctl["_container"] ).css( "height", 80 ); 
$( ctl["_container"] ).css( "overflow", "auto" ); 
 */


ctl["_container"] {
    width: 80px

}


.leftTop {


    display: none;
}

.moveBottom {

 width: 100%;
   
  position: fixed;
  bottom: 10px;
  left: 100px;
  
  

}

.sizeZero {

	width: 0px;
}
#map {

 
	width: 480px;
	max-width: 100%;
	
	height: 620px;
	max-height: 90%;

}

#side_top {

	width: 0px;

}
 

table, th, td {
 /* border: 1px solid black; */
}
	}	
		
		</style>
		
		<script>

		var responsive;
		  
		function setResponsive() {

			var width = $(window).width();

			//alert(typeof ctl);
			

		if(typeof ctl === 'object' ){	
			
			if (320 <= width && width <= 480 ){
				$( ctl["_container"] ).css( "width", 80 );
				$( ctl["_container"] ).css( "height", 150 ); 
				$( ctl["_container"] ).css( "overflow", "auto" ); 
				
				//alert("a");
			}

			if (481 <= width && width <= 1024 ){
				$( ctl["_container"] ).css( "width", 132 );
				$( ctl["_container"] ).css( "height", 243 ); 
				$( ctl["_container"] ).css( "overflow", "auto" ); 
				//alert("b");
			}
		}
			
		}
		  
		$(window).on('load', function () {
		    setResponsive();
		});
		  
		$(window).on('resize', function () {
		    setResponsive();
		});





		</script>
		
		
		
	</body>
</html>
