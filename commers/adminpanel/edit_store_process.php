<?php
	  ob_start();
	  include "php/connectdb.php";
	  include "php/sessionstart.php";
	  include "php/left.php";
     
// Make sure an ID was passed
if(isset($_GET['id'])) {
		$id = $_GET['id'];
		
	$region_id = $_POST[newregion];
	$store_city = $_POST[newcity];
	$store_tmp = strtolower(str_replace(" ","-",$store_city));
	$store_address = $_POST[newaddress];
	$store_map = $_POST[newmap];
	
	$query = "SELECT *
			  FROM store
			  WHERE store_id = $id";
	$result = mysqli_fetch_assoc(mysqli_query($con, $query));
	
	$file_name = $result[store_img];

	$file_type = $_FILES['newimage']['type'];
	if (($file_type == "image/gif")
		|| ($file_type == "image/jpeg")
		|| ($file_type == "image/jpg")
		|| ($file_type == "image/pjpeg")
		|| ($file_type == "image/x-png")
		|| ($file_type == "image/png"))
	{
		$filepath = "pic/store/".$file_name;
		unlink($filepath);
		
		$file_name = rand(1,99999).$_FILES['newimage']['name'];
		$file_tmp = $_FILES['newimage']['tmp_name'];
		$move = move_uploaded_file($file_tmp, "pic/store/" . $file_name);
	}
	 
	if($_POST['submit']) {
		
		$sql2 = "UPDATE store
				SET region_id = '$region_id',
					store_city = '$store_city',
					store_img = '$file_name',
					store_address = '$store_address',
					store_map = '$store_map'
				WHERE store_id = '$id' ";	
					
		mysqli_query($con, $sql2);
	$con->close(); 
}
	// Close the mysql connection
	header ('location: view_store.php');
    $con->close(); 
}	
?>
