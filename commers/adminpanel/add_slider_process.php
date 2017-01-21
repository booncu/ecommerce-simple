<?php
	  
	  include "php/connectdb.php";
?>
      
<!doctype html>
<html> 
   <head>
      <title>Uploading File</title>
   </head>
   <body>
      <h1>File Upload</h1>
      <?php
	  
	  if (!isset($_POST['submit']))
      	die("Wrong submission");
	  
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
	  	
			// Close the mysql connection
    		$con->close();
      ?>
      
   </body>
</html>

