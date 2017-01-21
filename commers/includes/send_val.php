<?php 

include "../config/koneksi.php";

//define variables
	$emailErr = $passErr =  " ";
	$email= $pass = " ";
	
	if ($_SERVER["REQUEST_METHOD"] =="POST")
	{
	    
		if (empty($_POST["email"]))
			{$emailErr = "Email is Required";}
		else
			{
			$email = test_input($_POST["email"]);
			//check if name only contains letters and whitespace
			if ( !preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
			{$emailErr = "Invalid Email Format";
			}
			}
	if (empty($_POST["password"]))
	   {$passErr = "Password is required";}
	 else 
		{
		 $pass = test_input($_POST["password"]);
		 if ( !preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/", $pass))
			{
			$passErr = "Password";
			}
		}
		
		//check database
		 $sql = "SELECT * FROM user WHERE user_email = '$email' AND user_pw = '$pass' ";
		 $result = mysql_query($sql);
		 $num_rows = mysql_num_rows($result);
		 $row = mysql_fetch_array($result);
		 $id = $row['user_id'];
		 
	
		if ($result){
			if($num_rows == 1) {
				session_start();
				
				$_SESSION['login'] = "1";
				$_SESSION['user'] = $id;
				header ("Location: ../product.php");
				
				}
				else {
				   
					session_start();
					$_SESSION['login'] = "";
					header ("Location: ../login.php");
					
					
				}	
			
		}	
		else {
		$errorMessage = "Error logging on.";
		}

		mysql_close();					
			
	}
	
		
	
		
		function test_input($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
			}
	
	 
?>
