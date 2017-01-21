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

</head>

<body>
<?php
$left = printleft();

?>
		<div class="cc_right">

				<div class="cn_head">Add Slider Content</div>
				<div class="cn_cont">
					<p>
						<form action="add_slider.php" method="POST" enctype="multipart/form-data">
        					<fieldset>
                            	<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Name</div>
									<input type="text" class="medium" name="name" />
								</p>
        						<p>
            						<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">File:</div>
	    							<input type="file" name="pic" />
            					</p>
            				</fieldset>
    						<input type="submit" value="Save" name="submit" />
						</form>
					</p>
				</div>
            
<?php

	//  if (!isset($_POST['submit']))
    //  	die("Wrong submission");
	  
	  if(isset($_FILES['pic']))
	  {
			if ($_POST['name'])
			{
    			$pic_name = $_POST['name'];

				$file_name = $_FILES['pic']['name'];
    			$file_size = $_FILES['pic']['size'];
    			$file_tmp = $_FILES['pic']['tmp_name'];
    			$file_type = $_FILES['pic']['type'];
			
				$allowedExts = array("gif", "jpeg", "jpg", "png");
				$temp = explode(".", $_FILES["file"]["name"]);
				$extension = end($temp);
			
				if (($file_type == "image/gif")
				|| ($file_type == "image/jpeg")
				|| ($file_type == "image/jpg")
				|| ($file_type == "image/pjpeg")
				|| ($file_type == "image/x-png")
				|| ($file_type == "image/png"))
				{
				
					echo "Nama file: $pic_name <br>";
           			echo "Tipe: $file_type <br>";
            		echo "<hr>";
			
					if (move_uploaded_file($file_tmp, "pic/" . $file_name)) {
				
						$sql = " INSERT INTO pic(pic_name, pic_type, pic_tmp) 
							VALUES ('{$pic_name}', '{$file_type}', '{$file_name}')";
				
						if(mysqli_query($con, $sql)) {
                			echo 'Success! Your file was successfully added! <br><br>';
            			}
				
            			else {
                			echo 'Error! Failed to insert the file'
                   			. "<pre>{$con->error}</pre><br><br>";
            			}
					}
				
					echo '<p>Click <a href="view_slider.php">here</a> to see the list.</p>';
				}
				else
					echo 'Invalid file type: ' . $file_type;;
			}
			else
				echo '<p><a href="form.php">Please insert a name</a></p>';
	  }
	  else
	  		echo '<p><a href="form.php">No file was uploaded.</a></p>';
	  	
		echo '
			</div> <!-- End of cc_right -->
		';
		
		$footer = printfooter();
		
			// Close the mysql connection
    		$con->close();
      ?>
</body>
</html>