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
	return confirm('Delete this bank account?');
}
</script>

</head>

<body>
<?php
$left = printleft();

echo '
<div class="cc_right">
		
<div class="cn_head">
	<div style="float:left; width:150px;">Confirmation Inbox</div>
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
				<th>No</th>
				<th>Nomor Order</th>
				<th>Tanggal Transfer</th>
				<th>Bank Transfer</th>
				<th>Bank Customer</th>
				<th>No Rekening & a/n</th>
				<th>Nominal Transfer</th>
				<th>Action</th>
			</tr>	
            ';
			
			$sql = "SELECT *
					FROM confirm
					ORDER BY id_conf";
						
			$result = mysqli_query($con, $sql);
				
			$a = 1;
				
			while($row = mysqli_fetch_assoc($result)) {
			$d=$row[tgl_t];
			$dt=date('d F Y', strtotime($d ));
			echo '
                <tr>
					<td><center>'.$a.'</center></td>
					<td>'.$row[no_or].'</td>
					<td>'.$dt.'</td>
					<td>'.$row[bank_t].'</td>
					<td>'.$row[bank_a].'</td>
					<td>'.$row[rek_an].'</td>
					<td>'.$row[nom_t].'</td>
					<td><center><a href="view_confirm_detail.php?id='.$row[id_conf].'">View Content</td>
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