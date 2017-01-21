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

				<div class="cn_head">Add Administrator</div>
				<div class="cn_cont">
                
					<p>
						<form action="add_admin_process.php" method="POST" enctype="multipart/form-data">
        					<fieldset>
                            	<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Name *</div>
									<input type="text" class="medium" name="name" />
								</p>
        						<p>
            						<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Password *</div>
	    							<input type="password" name="password" />
            					</p>
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Full Name</div>
									<input type="text" class="medium" name="fullname" />
								</p>
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Email</div>
									<input type="text" class="medium" name="email" />
								</p>
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Phone Number</div>
									<input type="text" class="medium" name="phone" />
								</p>
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Status *</div>
									<select name="status">
                                    	<option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
								</p>
            				</fieldset>
                            
    						<input type="submit" value="Save" name="submit" />
						</form>
					</p>
                    
                    <p>* required fields</p>
				
            </div>
<?php

	//  if (!isset($_POST['submit']))
    //  	die("Wrong submission");
	  
	if($_POST["name"] && $_POST["password"] && $_POST["status"] ) {
	  
      		if (!isset($_POST['submit']))
            	die("Wrong submission");
			  
			$sql = "INSERT INTO `admin` (`admin_name`, `admin_pw`, `admin_fullname`, `admin_email`, `admin_phone`, `admin_status`)
                VALUES ('$_POST[name]', '$_POST[password]', '$_POST[fullname]', '$_POST[email]', '$_POST[phone]', '$_POST[status]')";
					
			if(mysqli_query($con, $sql)) {
         		echo "A new admin added! <br><br>
				<a href='view_admin.php'>View list of admin</a>";
			}
			else {
             	echo "Adding a new admin failed.<br><br>";
			}
				
			// Close the mysql connection
    		$con->close(); 
	}
		
	else 
		echo "Please fill all required fields.";
?>
             
			</div> <!-- End of cc_right -->

<?php
$footer = printfooter();

?>
</body>
</html>