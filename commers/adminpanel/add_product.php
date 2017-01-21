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
	return confirm("Add new product?");
}

</script>

</head>

<body>
<?php
$left = printleft();

?>
		<div class="cc_right">

				<div class="cn_head">Add Product</div>
				<div class="cn_cont">
                
					<p>
						<form action="add_product_process.php" method="POST" enctype="multipart/form-data">
        					<fieldset class='fieldset'>
								<legend>Add Product</legend>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Product Name *</div>
									<input type="text" class="medium" name="title" />
                                    <br />
								</p>
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Category</div>
									<select name="category">
                                    	<?php
											$sql2 = "SELECT *
													FROM category
													ORDER BY cat_name";
											$result2 = mysqli_query($con, $sql2);
											$num2 = mysqli_num_rows($result2);
								
											$a = 0;
											while ($row2 = mysqli_fetch_assoc($result2)) {
												echo '<option value="'.$row2[cat_id].'" />'.$row2[cat_name].'<br />';
											}
										?>
                            		</select>
                                	&nbsp;&nbsp;&nbsp;<input type=button onClick="location.href='add_category_add.php'" value='Add'>
                            	</p>
                                <p>
                                	<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Brands</div>
                                    
                                    <?php
									$sql = "SELECT *
											FROM brand";
									$result = mysqli_query($con, $sql);
																		
									$i = 0;
									while ($row = mysqli_fetch_assoc($result)) {
										if ($i>1) {
											echo '<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;"></div>';
											echo '<input type="checkbox" name="brand[]" value="'.$row[brand_id].'" />'.$row[brand_name].'<br />';
										}
										else {
											echo '<input type="checkbox" name="brand[]" value="'.$row[brand_id].'" />'.$row[brand_name].'<br />';
										}
										$i = $i + 1;
									}
									?>
                                    <br />
                                </p>
                                <p>
            						<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Product Image:</div>
	    							<input type="file" name="image" />
            					</p>
            					<p><span style="font-style:italic;color:red;">*Gambar Harus dengan Ukuran Resolusi terbesar : Width=640 pixel, height=752 pixel</span></p>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; width:100px; font-size:13px;">Description</div>
									<textarea cols="70" rows="10" name="text" id="editor1" ></textarea>
									<script>CKEDITOR.replace( 'editor1',{uiColor:'#666',height:'360px'});</script>
								</p>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; width:200px; font-size:13px;">Description Detail</div>
									<textarea cols="70" rows="10" name="desc" id="editor2" ></textarea>
									<script>CKEDITOR.replace( 'editor2',{uiColor:'#666',height:'360px'});</script>
								</p>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; width:200px; font-size:13px;">Informasi Cicilan</div>
									<textarea cols="70" rows="10" name="ic" id="editor3" ></textarea>
									<script>CKEDITOR.replace( 'editor3',{uiColor:'#666',height:'230px'});</script>
								</p>
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Price</div>
									<input type="text" class="medium" name="price" />
								</p>
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Price with Discount</div>
									<input type="text" class="medium" name="pricedisc" />
								</p>
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Weight (in grams)</div>
									<input type="text" class="medium" name="weight" />
								</p>
                                
                                <p>
            						<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Product Video:</div>
	    							<input type="file" name="video" />
            					</p>
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Status Unggulan</div>
									<select name="stat_unggulan">
                                    	<option value="unggulan">Unggulan</option>
                                        <option value="non-unggulan">Non Unggulan</option>
                                    </select>
								</p>
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Special</div>
									<select name="special">
                                    	<option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
								</p>
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Status Published</div>
									<select name="prod_status">
                                        <option value="unpublished">Do not publish now</option>
                                        <option value="published">Publish now</option>
                                    </select>
								</p>
								
								</fieldset>
                            
    						<input type="submit" value="Submit" name="submit" onClick="return functionDraft()" />
						</form>
					</p>
				<p>* required fields</p>
            </div>
             
			</div> <!-- End of cc_right -->
            
<?php
$footer = printfooter();

?>
</body>
</html>