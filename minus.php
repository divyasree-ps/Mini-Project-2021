<?php 
	session_start();
	$con=mysqli_connect("localhost","root","","atm");
	if($_SESSION['user']){
		$user=$_SESSION['user'];
	}
	else{
		header("location:index.php");
	}
		
	mysqli_connect("localhost", "root","") or die(mysql_error()); 
	mysqli_select_db($con,"ATM") or die("Cannot connect to database"); 

	$balance=2000.00;
	$query=mysqli_query($con,"SELECT * from Passbook WHERE user='$user'");
	while($row=mysqli_fetch_array($query))
		{
			$balance= $balance + $row['amount'];
		}

	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		date_default_timezone_set("Africa/Kampala");
		$amount=mysqli_real_escape_string($con,$_POST['amount']);

		
		if($amount>$balance)
		{
			
			Print '<script>alert("You do not have sufficient Funds.");;
			window.location.assign("balance.php")</script>';
			exit("You have insufficient funds!");
			//header("location: balance.php");
			
		}
		$amount=(-$amount);
		$details=mysqli_real_escape_string($con,$_POST['details']);
		$time = strftime("%T");
		$date = strftime("%B %d, %Y");

		mysqli_query($con,"INSERT INTO Passbook (amount,date_transaction,details,user) VALUES ('$amount','$date','$details','$user')");
		Print '<script>alert("Successful Withdrawal.");window.location.assign("balance.php");</script>';
		
	}
	else
	{
		header("location:home.php");
	}


 ?>
