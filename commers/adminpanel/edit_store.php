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
	return confirm("Edit store details?");
}

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


 // Make sure an ID was passed
    if(isset($_GET['id'])) {
			  
    	// Get the ID
        $id = $_GET['id'];
     
        // Make sure the ID is in fact a valid ID
        if($id <= 0) {
            die('The ID is invalid!');
        }
        else {
            // Fetch the file information
            $query = "
                SELECT *
                FROM `store`
                WHERE `store_id` = '$id'";
            $result = mysqli_query($con, $query);
     
            if($result) {
                // Make sure the result is valid
                if($result->num_rows == 1) {
                // Get the row
                    $row = mysqli_fetch_assoc($result);
					$region_id = $row[region_id];
					
					$sql3 = "SELECT region_name
							FROM region
							WHERE region_id = '$region_id' ";
					$row3 = mysqli_fetch_assoc(mysqli_query($con, $sql3));
					
					$sql4 = "SELECT store_map
							FROM store
							WHERE store_id = '$id'";
					$row4 = mysqli_fetch_assoc(mysqli_query($con, $sql4));
					
					echo "
						<meta name='viewport' content='initial-scale=1.0, user-scalable=no' />
						<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false'></script>
						<script type='text/javascript'>
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
  								var latLng = new google.maps.LatLng(".$row4[store_map].");
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
						";
     
                // Print data
				echo '
				<div class="cc_right">

				<div class="cn_head">Edit Store</div>
				<div class="cn_cont">
					<p>
						<form action="edit_store_process.php?id='.$row[store_id].'" method="POST" enctype="multipart/form-data">
        					<fieldset>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Region</div>
									<select name="newregion">
                                    	<option selected value="'.$region_id.'">'.$row3[region_name].'</option>
                                    	';
											$sql2 = "SELECT * FROM region";
											$result2 = mysqli_query($con,$sql2);
											
											while ($row2 = mysqli_fetch_assoc($result2)) {
												if ($row2[region_id] != $region_id) {
													echo '
														<option value="'.$row2[region_id].'">'.$row2[region_name].'</option>';	
												}
											}
                                    echo '
									</select>
								</p>
                            	<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Name *</div>
									<input type="text" class="medium" name="newcity" value="'.$row[store_city].'" />
								</p>
								<p>
									<div style="width:600px;">
                               	 		<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; width:100px; font-size:13px;">Address</div>
                                		<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; font-size:13px;">
										<textarea rows="7" cols="50" name="newaddress" id="editor1">'.$row[store_address].'</textarea>
										<script>CKEDITOR.replace( "editor1",{uiColor:"#666",height:"200px"});</script>
										
										</div>
                                	</div>
								</p>        						<p>
            						<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Change Image:</div>
									<img src="pic/store/'.$row[store_img].'" width="100" />
	    							<input type="file" name="newimage" />
            					</p>
								<p>
									<div style="width:900px;">
                               	 		<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; width:100px; font-size:13px; float:left;">Map</div>
                                		<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; font-size:13px;"
										 	<div id="mapCanvas"></div><br />
  											<div id="infoPanel">
    											<b>Marker status:</b> <div id="markerStatus"><i>Click and drag the marker.</i></div>
    											<b>Current position:</b> <input type="text" class="medium" name="newmap" id="info" /><br />
    											<b>Closest matching address:</b> <div id="address"></div>
                                          	</div>
                                    	</div>
  									</div>
                                </p>
            				</fieldset>
    						<input type="submit" value="Submit" name="submit" onclick="return functionDraft()" /><br /><br />
							* required fields
							<br />
						</form>
					</p>
                    <p><br /><br /></p>
                    
				</div>
					';
			
                // Free the mysqli resources
                mysqli_free_result($result);
            }
			
            else {
                echo "Error! Query failed: <pre>{$con->error}</pre>";
            }
			
            mysqli_close($con);
        }
    
    else 
        echo 'Error! No ID was passed.';
	
		}
	}

echo '
</div>
</div> <!-- End of cc_right -->
';

$footer = printfooter();
?>

   
   </body>
</html>
