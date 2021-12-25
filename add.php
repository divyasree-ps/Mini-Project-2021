<?php 
	session_start();
	$con=mysqli_connect("localhost","root","","atm");
	if($_SESSION['user']){
		$user=$_SESSION['user'];
	}
	else{
		header("location:index.php");
	}
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		date_default_timezone_set("Africa/Kampala");
		$amount=mysqli_real_escape_string($con,$_POST['amount']);
		$details=mysqli_real_escape_string($con,$_POST['details']);
		$time = strftime("%T");
		$date = strftime("%B %d, %Y");
		mysqli_connect("localhost", "root","") or die(mysql_error()); 
		mysqli_select_db($con,"atm") or die("Cannot connect to database"); 
		mysqli_query($con,"INSERT INTO Passbook (amount,date_transaction,details,user) VALUES ('$amount','$date','$details','$user')");
		Print '<script>alert("Successful Deposit Made.");window.location.assign("balance.php");</script>';
	
	}
	else
	{
		header("location:home.php");
	}


 ?>
