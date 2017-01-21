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
function changeStatus() {
	return confirm("Change order status?");
}

function changeService() {
	return confirm("Edit shipping?");
}

</script>

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
                FROM `confirm`
                WHERE `id_conf` = '$id' ";
            $result = mysqli_query($con, $query);
     
            if($result) {
                // Make sure the result is valid
                if($result->num_rows == 1) {
                // Get the row
                    $row = mysqli_fetch_assoc($result);
     				$od= explode('-', $row[no_or]);
                    // Print data
					echo '
						<div class="cc_right">

				<div class="cn_head">View Details</div>
				<div class="cn_cont">
					
							<fieldset class="fieldset">
							<legend style="padding:7px;">Confirmation Details</legend>
							<table style="font-size:12px;">
							<tbody>
							<tr>
							<td width="100">Nomor Order</td>
							<td>:&nbsp;&nbsp;'.$row[no_or].'</td>
							</tr>
							<tr>
							<td>Tanggal Transfer</td>
							<td>:&nbsp;&nbsp;'.$row[tgl_t].'</td>
							</tr>
							<tr>
							<td>Bank Transfer</td>
							<td>:&nbsp;&nbsp;'.$row[bank_t].'</td>
							</tr>
							<tr>
							<td>Bank Customer</td>
							<td>:&nbsp;&nbsp;'.$row[bank_a].'</td>
							</tr>
							<tr>
							<td>No Rekening & A/N</td>
							<td>:&nbsp;&nbsp;'.$row[rek_an].'</td>
							</tr>
							<tr>
							<td>Nominal Transfer</td>
							<td>:&nbsp;&nbsp;'.$row[nom_t].'</td>
							</tr>
							
							</tbody>
							</table>
							
							</fieldset>
							
							<fieldset class="fieldset">
								<legend style="padding:7px;">Confirmation Customer Details</legend>
								';
													
								$sql2 = "SELECT *
                						FROM `order`,`user`
               		 					WHERE `order_id` = '".$od[1]."' AND `user`.`user_id` = `order`.`user_id` ";
            					$result2 = mysqli_query($con, $sql2);
								$row2 = mysqli_fetch_assoc($result2);
								
								if (mysqli_num_rows($result2)==1) {
								
									echo '
									<table style="font-size:12px;">
									<tbody>
									<tr>
									<td>Nama Lengkap</td>
									<td>:&nbsp;&nbsp;'.$row2[user_fullname].'</td>
									</tr>
									
									<tr>
									<td>Alamat</td>
									<td>:&nbsp;&nbsp;'.$row2[user_address].'</td>
									</tr>
									
									<tr>
									<td>Phone</td>
									<td>:&nbsp;&nbsp;'.$row2[user_phone].'</td>
									</tr>
									
									<tr>
									<td>Email</td>
									<td>:&nbsp;&nbsp;'.$row2[user_email].'</td>
									</tr>
									
									</tbody>
									</table>
									';
								}
								
								
							echo'
							</fieldset>             
                    
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
