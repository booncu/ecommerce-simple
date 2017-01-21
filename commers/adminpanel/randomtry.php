<?php
	include "php/connectdb.php";
?>

<!DOCTYPE html>
<html>
<body>

<?php
	
$string = "2014-03-17";
$unix = strtotime($string);
$to_db = getdate($unix);
//$to_db = mktime($timestamp);

$sql3= "UPDATE `order`
		SET `order_shipdate` = FROM_UNIXTIME($unix)
		WHERE `order_id` = '1'";
		
$result3 = mysqli_query($con, $sql3);

if ($result3)
	echo "yes result3";

?>

</body>
</html>
