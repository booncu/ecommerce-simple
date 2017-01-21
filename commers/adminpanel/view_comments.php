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
function functionDelc() {
	return confirm('Delete this comment status?');
}
</script>

</head>

<body>
<?php
$left = printleft();

echo '
<div class="cc_right">
		
<div class="cn_head">
	<div style="float:left; width:150px;">Comments Inbox</div>
	<div style="float:right; width:40px; padding-right:20px;">
		<table style="font-size:12px; font-weight:bold;">
		</table>
	</div>
	<div style="clear:both;"></div>
</div>
<div class="cn_cont">

	
	<p>
		<form action="mod/act_deleteproduct.php" method="post" onSubmit="return confirm("Are you sure want to delete selected news?");">
		<center><table border=0 cellpadding=2 cellspacing=2 class="altrowstable" id="alternatecolor"  width=100%>
			<tr>
				<th>No.</th>
				<th>Name</th>
				<th>Email</th>
				<th>Komentar</th>
				<th>Info</th>
				<th>Page</th>
				<th>Status</th>
				<th>Action</th>
			</tr>	
            ';
			
			$sql = "SELECT *
					FROM comment
					ORDER BY id_com";
						
			$result = mysqli_query($con, $sql);
				
			$a = 1;
				
			while($row = mysqli_fetch_assoc($result)) {
			$t=$row[tgl];
			$dt= date("d-m-Y", strtotime($t));
			$pt="SELECT * FROM product WHERE prod_id ='$row[id_pg]' ";
			$rpt=mysqli_query($con, $pt);
			$pp=mysqli_fetch_assoc($rpt);
			echo '
                <tr>
					<td><center>'.$a.'</center></td>
					<td>'.$row[name_com].'</td>
					<td>'.$row[email].'</td>
					<td>'.$row[isi_com].'</td>
					<td>Tanggal :'.$dt.'|Jam:'.$row[time].'</td>
					<td>'.$pp[prod_name].'</td>
					<td align="center"><a href="edit_status_comment.php?id='.$row[id_com].'&st='.$row[status].'"> '.$row[status].'</a></td>
					<td><center><a href="delete_comment.php?id='.$row[id_com].'" onclick="return functionDelc()"><img src="images/delete.png" /></a></td>
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