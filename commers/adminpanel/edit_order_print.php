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
                FROM `order`
                WHERE `order_id` = '$id'";
            $result = mysqli_query($con, $query);
     
            if($result) {
                // Make sure the result is valid
                if($result->num_rows == 1) {
                // Get the row
                    $row = mysqli_fetch_assoc($result);
     				$user_id = $row[user_id];
                    // Print data
					echo '

				<div class="cn_head">Order</div>
				<div class="cn_cont">
					<p>
						<form action="edit_order_status.php?id='.$row[order_id].'" method="POST" enctype="multipart/form-data">
        					<fieldset class="fieldset">
                            	<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:70px; font-size:13px;"><b>Order ID</b></div>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; font-size:13px;">'.$row[order_id].'</div>
								</p>
								<p>
            						<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:70px; font-size:13px;"><b>Status</b></div>
                                    <select name="newstatus">
										<option selected value="'.$row[order_status].'">'.$row[order_status].'</option> 
                                    </select>
            					</p>
            				</fieldset>
						</form>
							<fieldset class="fieldset">
								<legend>Shipping</legend>
								<form action="edit_order_shipping.php?id='.$row[order_id].'" method="POST" enctype="multipart/form-data">
										<p>
            								<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Service</div>
                                    		<select name="service">
												<option selected value="'.$row[order_shipcomp].'">'.$row[order_shipcomp].'</option>
                                   		 	</select>
            							</p>
										<p>
											<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Date</div>
											';
											
											$sql4 = "SELECT EXTRACT(YEAR FROM `order_shipdate`) AS `order_year`,
													EXTRACT(MONTH FROM `order_shipdate`) AS `order_month`,
													EXTRACT(DAY FROM `order_shipdate`) AS `order_day`
													FROM `order`
        											WHERE `order_id` = '1'";
											$result4 = mysqli_query($con, $sql4);
											$row4 = mysqli_fetch_assoc($result4);
											
											echo '
											<select name="date">
												<option selected value="'.$row4[order_day].'">'.$row4[order_day].'</option>
                                    		</select>
											';
											
											$monthname = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
											$month = $row4[order_month];
											$montharr = $month - 1;
											
											echo '
											<select name="month">
												<option selected value="'.$month.'">'.$monthname["$montharr"].'</option>
                                    		</select>
											<select name="year">
												<option selected value="'.$row4[order_year].'">'.$row4[order_year].'</option>
                                    		</select>
										</p>
										<p>
											<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">No. Resi Order</div>
											<input type="text" class="medium" name="shipnum" value="'.$row[order_shipnum].'" />
										</p>
								</form>
								<p></p>
							</fieldset>
							<fieldset class="fieldset">
								<legend>Customer Details</legend>
								';
								
								$sql2 = "SELECT *
                						FROM `user`
               		 					WHERE `user_id` = '$user_id'";
            					$result2 = mysqli_query($con, $sql2);
								$row2 = mysqli_fetch_assoc($result2);
								
								if (mysqli_num_rows($result2)==1) {
								
									echo '
									<p>
										<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;"><b>Name</b></div>
										<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; font-size:13px;">'.$row2[user_fullname].'</div>
									</p>
									<p>
										<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;"><b>Address</b></div>
										<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; font-size:13px;">'.$row2[user_address].'<br></div>
									</p>
									<p>
										<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;"><b>Phone Number</b></div>
										<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; font-size:13px;">'.$row2[user_phone].'<br></div>
									</p>
									<p>
										<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;"><b>Email</b></div>
										<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; font-size:13px;">'.$row2[user_email].'</div>
									</p>
									';
								}
							echo'
							</fieldset>
							<fieldset class="fieldset">
								<legend>Order Details</legend>
								<table border=0 cellpadding=2 cellspacing=2 class="altrowstable" id="alternatecolor"  width=100%>
									<tr>
										<th>No</th>
										<th>Product Name</th>
										<th>Image</th>
										<th>Price</th>
										<th>Amount</th>
										<th>Total</th>
									</tr>	
								';
								
								$sql3 = "SELECT *
                						FROM `orderdetails`
               		 					WHERE `orderdetails_id` = '$id'";
										
								$result3 = mysqli_query($con, $sql3);
								
								$a = 1;
								
								while ($row3=mysqli_fetch_assoc($result3)) {
									$product_id = $row3[product_id];
									
									$sql4 = "SELECT *
                							FROM `product`
               		 						WHERE `prod_id` = '$product_id'";
									$result4 = mysqli_query($con, $sql4);
									$row4 = mysqli_fetch_assoc($result4);
									
									echo '
										<tr>
										<td><center>'.$a.'</center></td>
										<td><center>'.$row4[prod_name].'</center></td>
										<td><center><img src="product/pic/'.$row4[prod_img].'" width="100" /></center></td>';
										if ($row4[prod_pricedisc]!="") {
											echo '
											<td><center>'.$row4[prod_pricedisc].'</center></td>
											';
											$price = $row4[prod_pricedisc];
										}
										else {
											echo '<td><center>'.$row4[prod_price].'</center></td>
											';
											$price = $row4[prod_price];
										}
										echo '
										<td><center>'.$row3[orderdetails_sum].'</center></td>
										<td><center> Rp. '.number_format($row3[orderdetails_totalprice],"-",",",".").',-</center></td>
										</tr>
									';
									$total_pay["$a"] = $row3[orderdetails_totalprice];
									$a = $a + 1;
								}
								
								$b = 1;
								$total = "0";
								
								while ($b<=$a) {
									$total = $total + $total_pay["$b"];
									$b = $b + 1;
								}
								
								echo '
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td><center><b>TOTAL PAYMENT</b></center></td>
										<td><center><b>Rp '.number_format($total,"-",",",".").',-</b></center></td>
									</tr>
								</table>
							</fieldset>
                            <p></p>
						</form>
					</p>
                <center><a href="edit_order.php?id='.$row[order_id].'">Back</a></center>
                    
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

';

?>

   
   </body>
</html>
