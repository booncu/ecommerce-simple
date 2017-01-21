<?php session_start();
include("includes/header.php");
include("config/koneksi.php"); //connects to the database
if (isset($_POST['username'])){
	$username = $_POST['username'];
	$query="select * from user where user_email='$username'";
	$result   = mysql_query($query);
	$count=mysql_num_rows($result);
	// If the count is equal to one, we will send message other wise display an error message.
	if($count==1)
	{
		$rows=mysql_fetch_array($result);
		$pass  =  $rows['user_pw'];//FETCHING PASS
		//echo "your pass is ::".($pass)."";
		$to = $rows['user_email'];
		//echo "your email is ::".$email;
		//Details for sending E-mail
		$from = "Readboy";
		$url = "http://www.readboy.co.id/";
		$body  =  "readboy password recovery <br/>
		-----------------------------------------------<br/>
		Url : $url;<br/>
		email Details is : $to;<br/>
		Here is your password  : $pass;<br/><br/><br/><br/>
		Team Readboy";
		$from = "admin@readboy.co.id";
		$subject = "readboy Password recovered";
		$headers1 = "From: $from\n";
		$headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";
		$headers1 .= "X-Priority: 1\r\n";
		$headers1 .= "X-MSMail-Priority: High\r\n";
		$headers1 .= "X-Mailer: Just My Server\r\n";
		$sentmail = mail ( $to, $subject, $body, $headers1 );
	} else {
	if ($_POST['username']!="") {
	echo "<div class='container'><div class='alert alert-error'>
  <button type='button' class='close' data-dismiss='alert'>&times;</button>
  <span style='color: #ff0000;'> Not found your email in our database</span>
</div></div>";
		}
		}
	//If the message is sent successfully, display sucess message otherwise display an error message.
	if($sentmail==1)
	{
		echo "<div class='container'><div class='alert alert-success'>
  <button type='button' class='close' data-dismiss='alert'>&times;</button>
  <span style='color: #ff0000;'> Your Password Has Been Sent To Your Email Address.</span>
</div></div>";
	}
		else
		{
		if($_POST['email']!="")
		echo "<div class='container'><div class='alert alert-error'>
  <button type='button' class='close' data-dismiss='alert'>&times;</button><span style='color: #ff0000;'> Cannot send password to your e-mail address.Problem with sending mail...</span></div</div>>";
	}
}
?>

<section id="content">
  <div class="container">
  <div class="row-fluid">
    <div class="span12">
    <div class="ct_fg">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<label> Enter your Email ID : </label>
		<input style="margin-bottom:0!important;" id="username" type="text" name="username" />
		<input id="button" class="btn btn-inverse btnnya" type="submit" name="button" value="Submit" />
	</form>
      </div>
     </div>
    </div>
  </div>
</section>
<?php
include ("includes/footer.php");
?>