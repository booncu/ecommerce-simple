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
<script type="text/javascript" src="js/altrow.js"></script>
<link rel="stylesheet" type="text/css" href="css/th.css" />
<link rel="stylesheet" type="text/css" href="css/fortable.css" />

<!-- Video -->
<script src="http://jwpsrv.com/library/vu1WBp+VEeOssyIACi0I_Q.js"></script>

<script>
function functionDel() {
	return confirm('Delete this product?');
}
</script>

</head>

<body>
<?php
$left = printleft();

echo '
<div class="cc_right">
		
<div class="cn_head">
	<div style="float:left; width:100px;">List of Products</div>
	<div style="float:right; width:40px; padding-right:20px;">
		<table style="font-size:12px; font-weight:bold;">
			<tr><td></td>
			<td><span style="padding-top:1px;"><a href="add_product.php"><img src="images/195.png" height="16px" />&nbsp;Add</a></span></td>
			</tr>
		</table>
	</div>
	<div style="clear:both;"></div>
</div>
<div class="cn_cont">

	
	<p>
		<form action="mod/act_deleteproduct.php" method="post" onSubmit="return confirm("Are you sure want to delete selected news?");">
		<center><table border=0 cellpadding=2 cellspacing=2 class="altrowstable" id="alternatecolor"  width=100%>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Category</th>
				<th>Brand(s)</th>
				<th>Image</th>
				<th>Product Info</th>
				<th>Actions</th>
			</tr>	
            ';
			
			$sql = "SELECT *
					FROM product
					ORDER BY prod_id DESC";
						
			$result = mysqli_query($con, $sql);
				
			$a = 1;
				
			while($row = mysqli_fetch_assoc($result)) {
				
				//Manage brand
				$brand = explode(",", $row[prod_brand]);
				$num = count($brand);
				$brand_name = "";
				
				$sql2 = "SELECT *
						FROM brand";
				$result2 = mysqli_query($con, $sql2);
				
				while ($row2 = mysqli_fetch_assoc($result2)) {
					for($i=0; $i<$num; $i++) {
						if (($brand[$i] == $row2[brand_id]) && ($brand_name == "")) {
							$brand_name = $row2[brand_name];
						}
						else {
							if (($brand[$i] == $row2[brand_id]) && ($brand_name != "")) {
								$brand_name = $brand_name.", ".$row2[brand_name];
							}
						}
					}
				}
				
				//Manage category
				$sql3 = "SELECT *
						FROM category
						WHERE cat_id = $row[prod_category]";
				$row3 = mysqli_fetch_assoc(mysqli_query($con, $sql3));
				
				//Manage weight
				$weight_kg = $row[prod_weight] / 1000;
		
			echo '
                <tr>
					<td><center>'.$a.'</center></td>
					<td>'.$row[prod_name].'</td>
					<td>'.$row3[cat_name].'</td>
					<td>'.$brand_name.'</td>
					<td><center><img src="product/pic/'.$row[prod_img].'" width="100" /></center></td>
					<td>Price: '.$row[prod_price].'<br>
						Price with Discount: '.$row[prod_pricedisc].'<br>
						Weight: '.$weight_kg.' kg<br>
						Video: '.$row[prod_vid].'<br>
						Unggulan: '.$row[prod_unggulan].'<br>
						Special: '.$row[prod_special].'<br>
						Status: '.$row[prod_status].'<br>
					</td>
					<td><center><a href="edit_product.php?id='.$row[prod_id].'"><img src="images/edit.png" /></a>  <a href="delete_product.php?id='.$row[prod_id].'" onclick="return functionDel()"><img src="images/delete.png" /></a></center></td>
				</tr>
                ';
				$a = $a + 1;
				}
			
			
			echo '
		</table></center>
	</p>
	
</div>
</div> <!-- End of cc_right -->
';

$footer = printfooter();
?>

</body>
</html>