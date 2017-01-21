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
	return confirm('Delete this store?');
}

function viewAdd()
{
	<?php
		include "php/connectdb.php";
	
		$sql2 = "SELECT store_address FROM store";
		$result2 = mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_assoc($result2);
		
	?>
	
	if (newreg!=null) {
		return newreg;
	}
}
</script>

</head>

<body>
<?php
$left = printleft();

echo '
<div class="cc_right">
		
<div class="cn_head">
	<div style="float:left; width:100px;">List of Stores</div>
	<div style="float:right; width:40px; padding-right:20px;">
		<table style="font-size:12px; font-weight:bold;">
			<tr><td><img src="images/195.png" height="16px" /></td>
			<td><span style="padding-top:1px;"><a href="add_store.php">Add</a></span></td>
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
				<th>Region</th>
				<th>Image</th>
				<th>Address</th>
				<th>Map</th>
				<th>Actions</th>
			</tr>	
            ';
			
			$sql = "SELECT *
					FROM store
					ORDER BY store_id DESC";
						
			$result = mysqli_query($con, $sql);
				
			$a = 1;
				
			while($row = mysqli_fetch_assoc($result)) {
				
				$store_region = $row[region_id];
				
				$sql2 = "SELECT region_name
						FROM region
						WHERE region_id = $store_region";
				$row2 = mysqli_fetch_assoc(mysqli_query($con, $sql2));
		
			echo '
                <tr>
					<td><center>'.$a.'</center></td>
					<td>'.$row[store_city].'</td>
					<td>'.$row2[region_name].'</td>
					<td><center><img src="pic/store/'.$row[store_img].'" width="100" /></center></td>
					<td><center><a href="viewer_store.php?id='.$row[store_id].'">View Address</a></center></td>
					<td align="right">'.$row[store_map].'</td>
					<td><center><a href="edit_store.php?id='.$row[store_id].'"><img src="images/edit.png" /></a>  <a href="delete_store.php?id='.$row[store_id].'" onclick="return functionDel()"><img src="images/delete.png" /></a></center></td>
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