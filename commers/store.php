<?php

	include "config/koneksi.php";
	
	$idreg = $_GET[id];
?>

			
			<div class="wrap clearfix">
				<div class="row-fluid">
				<div class="st-content">	
				<div class="stc" style="width:450px;">
				<?php 
				$select_store = mysql_query("select * from store where region_id = '$idreg' ");
				while ($s = mysql_fetch_array($select_store)){
				$title_reg = mysql_fetch_array(mysql_query("select region_name from region where region_id = '$idreg' "));
				echo"<div class='header-title-desc-ls'>";
				echo"<h3>$title_reg[region_name]</h3>";
				echo"</div>";
				echo"	<div class='row-fluid entry-post-ls'>
								<div class='span4 post-thumb-ls'>
									<img src='adminpanel/pic/store/$s[store_img]' alt='' title='' />
								</div>
									<div class='span8 post-content'>
									$s[store_city]<br>
									$s[store_address]
									<br>
									<br>
									</div>
									<a class='$s[region_id]' id='mp' style='cursor:pointer;'>Open Map</a>

									
									<div class='clearfix'></div>
									
									
								  
								  								
								   
							</div>";
							}?>
							
							
							<!--<script type="text/javascript">
     myLatlng = new google.maps.LatLng(43.65644,-79.380686);
     centerLatlng = new google.maps.LatLng(43.65644,-79.380686);

      //start of modal google map
      $("#myModal").modal({
          show: false
      }).on("shown", function()
      {
          var map_options = {
            zoom: 14,
            mapTypeControl: false,
            center:centerLatlng,
            panControl:false,
            rotateControl:false,
            streetViewControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          };

        var map = new google.maps.Map(document.getElementById("mapcanvas"), map_options);

         var contentString = '<div id="mapInfo">'+
            '<p><strong>Cineplex Odeon Yong & Dundas</strong><br>'+
            'Suite 402<br>10 Dundas Street East<br>' +
            'Toronto, ON<br>'+
            'P: (416) 977-9262</p>'+
            '<a href="http://www.google.ca/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&ved=0CF4QFjAA&url=http%3A%2F%2Fwww.cineplex.com%2FTheatres%2FTheatreDetails%2FCineplex-Odeon-Yonge-Dundas-Cinemas-formerly-AMC-.aspx&ei=wVxnUdfWM8GtqgGc5YGoCQ&usg=AFQjCNFrLpCFDXGjtGx6y1GSkSNvhdrMpA&bvm=bv.45107431,d.aWM" target="_blank">Now Playing</a>'+
            '</div>';

          var infowindow = new google.maps.InfoWindow({
            content: contentString
          });
          
          var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title:"Cineplex Odeon Yong & Dundas",
                  maxWidth: 200,
                  maxHeight: 200
          });
          
          google.maps.event.addListener(marker, 'click', function() {
             infowindow.open(map,marker);
          });
          infowindow.open(map,marker);
      });
      //end of modal google map
    </script>
	<!--Button to trigger modal
								   <a href='#myModal' role='button' class='btn' data-toggle='modal'>Launch demo modal</a>
							  <div id='myModal' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
								<div class='modal-header'>
								  <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
								  <h3 id='myModalLabel'></h3>
								</div>
								<div class='modal-body'>
								  
								</div>
								<div class='modal-footer'>
								  <button class='btn' data-dismiss='modal' aria-hidden='true'>Close</button>      
								</div>
							  </div>
	
						</div>
								<div id="mapCanvas"  style="width:500px; height:200px;"></div>
							<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

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
  var latLng = new google.maps.LatLng(-6.163430865953719, 106.91023868942261);
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
</script>-->
						</div>
				
				</div>
				
							
				
   
									 
		
				</div>
				</div>			