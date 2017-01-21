<?php
	ob_start();
	include "php/connectdb.php";
	include "php/sessionstart.php";
?>

<!doctype html>
<html>
<head>
<title>Bursa Moge Administrator</title>
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
function functionDel() {
	alert("Your file is deleted.");
}
</script>

</head>

<body>
<?php
   
    // Make sure an ID was passed
    if(isset($_GET['id'])) {
		
		// Get the ID
        $id = $_GET['id'];
     
        // Make sure the ID is in fact a valid ID
        if($id <= 0) {
            die('The ID is invalid!');
        }
        else {	
			$sql2 = "SELECT partner_img
			  		FROM partner
			  		WHERE partner_id = $id";
			$result2 = 	mysqli_query($con, $sql2);
			$row2 = mysqli_fetch_assoc($result2);
			$file_name = $row2[partner_img];
			
            $query = "
				DELETE 
				FROM partner
				WHERE partner_id = '$id'
				";
            $result = mysqli_query($con, $query);
     
            if($result) {
				$filepath = "pic/partner/".$file_name;
				//echo $filepath;
				unlink($filepath);
				
                echo "File is deleted<br>
						<a href='view_partner.php'>Back</a><br><br><br>";
     
                // Free the mysqli resources
                @mysqli_free_result($result);
            }
            else {
                echo "Error! Query failed: <pre>{$con->error}</pre>";
            }
			
			header ('location: view_partner.php');
            mysqli_close($con);
        }
    }
    else {
        echo 'Error! No ID was passed.';
    }
	
?>

   
   </body>
</html>
