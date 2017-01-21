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
                FROM `admin`
                WHERE `admin_id` = '$id'";
            $result = mysqli_query($con, $query);
     
            if($result) {
                // Make sure the result is valid
                if($result->num_rows == 1) {
                // Get the row
                    $row = mysqli_fetch_assoc($result);
					
					$status = $row[admin_status];
     
                    // Print data
					echo '
						<div class="cc_right">

				<div class="cn_head">Edit Administrator</div>
				<div class="cn_cont">
					<p>
						<form action="edit_admin_process.php?id='.$row[admin_id].'" method="POST" enctype="multipart/form-data">
        					<fieldset>
                            	<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Name *</div>
									<input type="text" class="medium" name="name" value="'.$row[admin_name].'" />
								</p>
        						<p>
            						<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Password *</div>
	    							<input type="password" name="password" value="'.$row[admin_pw].'" />
            					</p>
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Full Name</div>
									<input type="text" class="medium" name="fullname" value="'.$row[admin_fullname].'" />
								</p>
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Email</div>
									<input type="text" class="medium" name="email" value="'.$row[admin_email].'" />
								</p>
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Phone Number</div>
									<input type="text" class="medium" name="phone" value="'.$row[admin_phone].'" />
								</p>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Status *</div>
									<select name="status">';
										if ($row[admin_status] == "active") {
											echo '<option selected value="active">Active</option>
                                        		  <option value="inactive">Inactive</option>
											';
										}
										else
										{
											echo '<option selected value="inactive">Inactive</option>
                                        		  <option value="active">Active</option>
											';
										}
									echo '
                                    </select>
								</p>
								
            				</fieldset>
                            
    						<input type="submit" value="Save" name="submit" />
						</form>
					</p>
                    
                    <p>* required fields</p>
				</div>
					';
				
                // Free the mysqli resources
                mysqli_free_result($result);
            }
            else {
                echo "Error! Query failed: <pre>{$con->error}</pre>";
            }  
        } 
    else 
        echo 'Error! No ID was passed.';
	
		}
	}
?>
		
            
<?php
		
echo '
</div> <!-- End of cc_right -->
';
		
$footer = printfooter();
?>
             
		
</body>
</html>