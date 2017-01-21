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

<script>
function functionDel() {
	return confirm('Delete the file?');
}
</script>

</head>

<body>
<?php
$left = printleft();

echo '
<div class="cc_right">
		
<div class="cn_head">
	<div style="float:left; width:100px;">Admin List</div>
	<div style="float:right; width:40px; padding-right:20px;">
		<table style="font-size:12px; font-weight:bold;">
			<tr><td><img src="images/195.png" height="16px" /></td>
			<td><span style="padding-top:1px;"><a href="add_admin.php">Add</a></span></td>
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
				
				<th>Full Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Status</th>
				<th>Action</th>
			</tr>	
            ';
			
			$sql = "SELECT *
					FROM admin
					ORDER BY admin_id";
						
			$result = mysqli_query($con, $sql);
				
			$a = 1;
				
			while($row = mysqli_fetch_assoc($result)) {
				
			//echo $row[file_name];
				
			//echo $a;
			echo '
                <tr>
					<td><center>'.$a.'</center></td>
					<td>'.$row["admin_name"].'</td>
					
					<td>'.$row["admin_fullname"].'</td>
					<td>'.$row["admin_email"].'</td>
					<td align="right">'.$row["admin_phone"].'</td>
					<td>'.$row["admin_status"].'</td>
					<td><center><a href="edit_admin.php?id='.$row[admin_id].'"><img src="images/edit.png" /></a>  <a href="delete_admin.php?id='.$row[admin_id].'" onclick="return functionDel()"><img src="images/delete.png" /></a></center></td>
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