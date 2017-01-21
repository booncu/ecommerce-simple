<?php
	  include "php/connectdb.php";
	  include "php/sessionstart.php";
	  include "php/left.php";
	  include "php/footer.php";
?>

<html>
<head>
<title>ReadBoy Administrator</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/home.css" />
<link rel="shortcut icon" href="images/favicon.png">
<!-- accordion styling -->	
	<link rel="stylesheet" type="text/css" href="css/tabs-accordion.css"/> 
<script type="text/javascript" src="js/jquery.tools.min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="js/jwplayer/jwplayer.js"></script>
<script type="text/javascript">jwplayer.key="BejWJLx1E+lZwDQ9+oYpcTrdeGastP1tN8w5pg==";</script>
<link rel="stylesheet" type="text/css" href="css/th.css" />

<script>
function functionDraft() {
	return confirm("Add new store?");
}

function addReg()
{
	var newreg = prompt("Please enter a new region","");
	
	if (newreg!=null) {
		return newreg;
	}
}

</script>

<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
var geocoder = new google.maps.Geocoder();

function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    } else {
      updateMarkerAddress('Cannot determine address at this location.');
    }
  });
}

function updateMarkerStatus(str) {
  document.getElementById('markerStatus').innerHTML = str;
}

function updateMarkerPosition(latLng) {
  document.getElementById('info').value = [
    latLng.lat(),
    latLng.lng()
  ].join(', ');
}

function updateMarkerAddress(str) {
  document.getElementById('address').innerHTML = str;
}

function initialize() {
  var latLng = new google.maps.LatLng(-6.204827176102235, 106.88895267868043);
  var map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 14,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var marker = new google.maps.Marker({
    position: latLng,
    title: 'Point A',
    map: map,
    draggable: true
  });

  // Update current position info.
  updateMarkerPosition(latLng);
  geocodePosition(latLng);

  // Add dragging event listeners.
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Dragging...');
  });

  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Dragging...');
    updateMarkerPosition(marker.getPosition());
  });

  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Drag ended');
    geocodePosition(marker.getPosition());
  });
}

// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initialize);
</script>

</head>

<body>

 <style>
  #mapCanvas {
    width: 500px;
    height: 400px;
    float: left;
  }
  #infoPanel {
    float: left;
    margin-left: 10px;
  }
  #infoPanel div {
    margin-bottom: 5px;
  }
  </style>

<?php
$left = printleft();

?>
		<div class="cc_right">

				<div class="cn_head">Add Store</div>
				<div class="cn_cont">
                
					<p>
						<form action="add_store_process.php" method="POST" enctype="multipart/form-data">
        					<fieldset class='fieldset'>
								<legend>Add Store</legend>
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Choose Region *</div>
									<select name="region">
                                    	<option value="" disabled selected>--choose a region--</option>
                                    	<?php
											$sql = "SELECT * FROM region";
											$result = mysqli_query($con,$sql);
											
											while ($row = mysqli_fetch_assoc($result)) {
												echo '
													<option value="'.$row[region_id].'">'.$row[region_name].'</option>
												';
											}
										?>
                                    </select>
                                    <input type=button onClick="location.href='add_region.php'" value='Add'>
								</p>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Name *</div>
									<input type="text" class="medium" name="city" />
								</p>
                                <p>
									<div style="width:600px;">
                               	 		<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; width:100px; font-size:13px;">Address</div>
                                		<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; font-size:13px;"><textarea cols="70" rows="10"name="address" id="editor1" ></textarea>
										<script>CKEDITOR.replace( 'editor1',{uiColor:'#666',height:'200px'});</script></div>
                                	</div>
								</p>
                                <p>
            						<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Image:</div>
	    							<input type="file" name="image" />
            					</p>
                                <p>
									<div style="width:900px;">
                               	 		<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; width:100px; font-size:13px; float:left;">Map</div>
                                		<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; font-size:13px;"
										 	<div id="mapCanvas"></div><br />
  											<div id="infoPanel">
    											<b>Marker status:</b> <div id="markerStatus"><i>Click and drag the marker.</i></div>
    											<b>Current position:</b> <input type="text" class="medium" name="map" id="info" /><br />
    											<b>Closest matching address:</b> <div id="address"></div>
                                          	</div>
                                    	</div>
  									</div>
                                </p>
								</fieldset>
                            
    						<input type="submit" value="Submit" name="submit" onClick="return functionDraft()" />
						</form>
					</p>
				<p>* required fields</p>
            </div>
             
			</div> <!-- End of cc_right -->
            
<?php
$footer = printfooter();

?>
</body>
</html>