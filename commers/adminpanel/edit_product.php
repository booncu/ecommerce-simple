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
	return confirm("Edit product details?");
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
                FROM `product`
                WHERE `prod_id` = '$id'";
            $result = mysqli_query($con, $query);
     
            if($result) {
                // Make sure the result is valid
                if($result->num_rows == 1) {
                // Get the row
                    $row = mysqli_fetch_assoc($result);
     
                    // Print data
					echo '
						<div class="cc_right">

				<div class="cn_head">Edit Product</div>
				<div class="cn_cont">
					<p>
						<form action="edit_product_process.php?id='.$row[prod_id].'" method="POST" enctype="multipart/form-data">
        					<fieldset>
                            	<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Product Name</div>
									<input type="text" class="medium" name="newtitle" value="'.$row[prod_name].'" />
								</p>
								';
								$category = array("A","B","C","D","E");
								$a = 0;
								$b = "0";
								//echo $category[$b];
									
								echo '
								<p>
            						<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Category</div>
                                    <select name="newcategory">
									';
									
										$sql4 = "SELECT *
												FROM `category`
												WHERE cat_id = $row[prod_category]";
										$row4 = mysqli_fetch_assoc(mysqli_query($con, $sql4));
									
										echo '
											<option selected value="'.$row[prod_category].'">'.$row4[cat_name].'</option>
                                    	';
						
										//Fetch the rest of the categories from its database
											$sql2= "SELECT *
													FROM `category`
													ORDER BY cat_name";
											$result2 = mysqli_query($con, $sql2);
												
											while ($row2 = mysqli_fetch_assoc($result2)) {
												if ($row2[cat_id] != $row[prod_category]) {
													echo '<option value="'.$row2[cat_id].'">'.$row2[cat_name].'</option>';
												}
											}
										echo '
									</select>		
									
									&nbsp;&nbsp;&nbsp;<a href="add_category_edit.php?id='.$row[prod_id].'">Add New Category</a>
            					</p>
								<p>
                                	<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Brands</div>
									';
									
									$brand = explode(",", $row[prod_brand]);
									$n = count($brand);
									//echo $brand[1]."<br>";
									
									$sql3 = "SELECT *
											FROM brand";
									$result3 = mysqli_query($con, $sql3);
									
									$r = 1;
									while ($row3 = mysqli_fetch_assoc($result3)) {
										if ($r>2) 
											echo '<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;"></div>';
										//echo $row3[brand_code];
										$check = "no";
										for($i=0; $i<$n; $i++) {	
											if (($brand[$i] == $row3[brand_id]) && ($check == "no")) {
												echo '<input type="checkbox" name="newbrand[]" value="'.$row3[brand_id].'" checked />'.$row3[brand_name].'<br />';
												$check = "yes";
											}
											else {
												if (($check == "no") && ($i == ($n-1))) {
												 	echo '<input type="checkbox" name="newbrand[]" value="'.$row3[brand_id].'" />'.$row3[brand_name].'<br />';
												}
											}
										}
										$r = $r + 1;
									}
                                    
                                echo '
                                </p>
        						<p>
            						<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Change Image:</div>
									<img src="product/pic/'.$row[prod_img].'" width="100" />
	    							<input type="file" name="newimage" />
            					</p>
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; width:100px; font-size:13px;">Description</div>
									<textarea cols="70" rows="10" name="newtext" id="editor1">'.$row[prod_text].'</textarea>
									<script>CKEDITOR.replace( "editor1",{uiColor:"#666",height:"360px"});</script>
								</p>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; width:100px; font-size:13px;">Description Detail</div>
									<textarea cols="70" rows="10" name="newdesc" id="editor2">'.$row[prod_desc].'</textarea>
									<script>CKEDITOR.replace( "editor2",{uiColor:"#666",height:"360px"});</script>
								</p>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; width:200px; font-size:13px;">Informasi Cicilan</div>
									<textarea cols="70" rows="10" name="newic" id="editor3" >'.$row[prod_cil].'</textarea>
									<script>CKEDITOR.replace( "editor3",{uiColor:"#666",height:"230px"});</script>
								</p>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Price</div>
									<input type="text" class="medium" name="newprice" value="'.$row[prod_price].'" />
								</p> 
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Price with Discount</div>
									<input type="text" class="medium" name="newpricedisc" value="'.$row[prod_pricedisc].'" />
								</p>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Weight (in grams)</div>
									<input type="text" class="medium" name="newweight" value="'.$row[prod_weight].'" />
								</p>
								<p>
            						<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Change Video:</div>
									'.$row[prod_vid].'<br><br>
									<div id="myElement">Loading the player...</div>
										<script type="text/javascript">
    										jwplayer("myElement").setup({
												height: 180,
           										width: 300,
												autostart: false,
        										file: "product/vid/'.$row[prod_vidtmp].'"
    										});
										</script>
	    							<input type="file" name="newvid" />
            					</p>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Status Unggulan</div>
									<select name="stat_unggulan">
                                    	<option selected value="'.$row[prod_unggulan].'">'.$row[prod_unggulan].'</option>
										';
										if ($row[prod_unggulan] == "unggulan") {
											echo '<option value="non-unggulan">non-unggulan</option>';
										}
										else {
											echo '<option value="unggulan">unggulan</option>';
										}
									echo '
                                    </select>
								</p>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Special</div>
									<select name="special">
                                    	<option selected value="'.$row[prod_special].'">'.$row[prod_special].'</option>
										';
										if ($row[prod_special] == "Yes") {
											echo '<option value="No">No</option>';
										}
										else {
											echo '<option value="Yes">Yes</option>';
										}
									echo '
                                    </select>
								</p>
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Status Published</div>
									<select name="prod_status">
                                    	<option selected value="'.$row[prod_status].'">'.$row[prod_status].'</option>
										';
										if ($row[prod_status] == "published") {
											echo '<option value="unpublished">unpublished</option>';
										}
										else {
											echo '<option value="published">published</option>';
										}
									echo '
                                    </select>
								</p>
            				</fieldset>
                            <br />
    						<input type="submit" value="Submit" name="submit" onclick="return functionDraft()" />
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