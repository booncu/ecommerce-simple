<?PHP

include "php/connectdb.php";

$uname = "";
$pword = "";
$errorMessage = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$uname = $_POST['admin_name'];
	$pword = $_POST['password'];

	$sql = "SELECT * FROM admin WHERE admin_email = '$uname' AND admin_pw = '$pword'";
	$result = mysqli_query($con, $sql);
	$num_rows = mysqli_num_rows($result);
			
	$row = mysqli_fetch_array($result);
    $id = $row['admin_id'];
		
	if ($result) {
		if ($num_rows == 1) {
			session_start();
				
			$_SESSION['login'] = "1";
			$_SESSION['admin'] = $id;
				
			
			header ("Location: home.php");
		}
		else {
			session_start();
			$_SESSION['login'] = "";
			header ("Location: login.php");
		}	
	}
	else {
		$errorMessage = "Error logging on.";
	}

	mysqli_close($con);

}

else {
	$errorMessage = "Error connecting to database.";
}


?>