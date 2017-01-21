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
	return confirm("Change comment status?");
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
                FROM `comment`
                WHERE `id_com` = '$id'";
            $result = mysqli_query($con, $query);
     
            if($result) {
                // Make sure the result is valid
                if($result->num_rows == 1) {
                // Get the row
                    $row = mysqli_fetch_assoc($result);
     				
					$q = "SELECT * FROM `product` WHERE `prod_id` = '$row[id_pg]' ";
					$rp = mysqli_query($con, $q);
					$np = mysqli_fetch_assoc($rp);
					
                    // Print data
					echo '
						<div class="cc_right">

				<div class="cn_head">Comment view<span style="float:right;margin-right:20px;background:#FC6C71;padding:11px;margin-top:-10px;"><a style="color:#fff;" href="view_comments.php">Back</a></span></div>
				<div class="cn_cont">
					<p>
						<form action="edit_status_comment.php?id='.$id.'" method="POST" enctype="multipart/form-data">
        					<fieldset class="fieldset">
                            	<table style="font-size:12px;">
								<tbody>
								<tr>
								<td>Product view </td>
								<td>:&nbsp;'.$np[prod_name].'</td>
								</tr>
								</tbody>
								</table>
								';
								$status = array("Y","N");
								$a = 0;
									
								echo '
								<p>
            						<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:70px; font-size:13px;"><b>Status</b></div>
                                    <select name="newstatus">
										<option selected value="'.$row[status].'">'.$row[status].'</option>
                                    ';
						
									while ($a<2) {
										if ($status["$a"]!=$row[status]) {
											echo '
                                    			<option value="'.$status["$a"].'">'.$status["$a"].'</option>
											';
										}
										$a = $a + 1;
									}
									
									echo '
                                    </select>
									<input type="submit" value="Change" name="submit" onclick="return changeStatus()" />
            					</p>
            				</fieldset>
						</form>
							
							<fieldset class="fieldset">
								<legend>Comment Details</legend>
								<div style="float:left;display:block;position:relative;">
								<table style="font-size:12px;">
								<tbody>
								<tr>
								<td>Nama </td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;'.$row[name_com].'</td
								</tr>
								<tr>
								<td> Email</td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp; '.$row[email].'</td>
								</tr>
								<tr>
								<td>Tanggal</td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;'.$row[tgl].'</td>
								</tr>
								<tr>
								<td>Waktu</td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;'.$row[time].'</td>
								</tr>
								</tbody>
								</table>
								</div>
								
								<div style="float:left;display:block;position:relative;margin-left:50px;">
								<table style="font-size:12px;">
								<tbody>
								<tr>
								<td>Komentar</td>
								<td width="200">:&nbsp;&nbsp;'.$row[isi_com].'</td>
								</tr>
								</tbody>
								</table>
								</div>
									
							</fieldset>
							
                            <p></p>
						</form>
					</p>
                
                    
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