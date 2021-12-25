<html>
	<head>
	<title>Welcome to E-Banking</title>
<style>
 .container{
	width: 450px;
	padding: 4% 4% 4%;
	margin : auto;
	box-shadow: 10px 10px 5px #888888;
	background-color: #fff;
	text-align: center;
	position:relative;
	top:50px;
	vertical-align: middle;
}

form{
	align-content: center;
	padding:10px;
	margin-top: 15px;
}
input
{
	margin :5px;
}

a{
	color:#f00f53;
	text-decoration: none;
	align-content: right;
}

.button{
	width :150px;
	margin :10px;
	padding:5px;
	font-weight: bold;
	background-color: #ff474a;
	text-align: center;
	position:relative;
	right:-100px;
	color:white;
}

.button:hover {
  background: #a30003;
}
body{
	background-color: PaleTurquoise;
}
    body
    {
    background-color : PaleTurquoise ;
    </style>
	</head>
	<body>

	<div class="container">
		<h2 >The Registraion Page</h2>
		<a href="index.php" >Click Here to Go Back.</a><br/>
		<form action="register.php" method="POST">
			Username : <input type="text" name="username" required="required"/><br/>
			Account Number : <input type="text" name="accountno" required="required"/><br/>
			Password : <input type="password" name="password" required="required"/><br/>
			Mobile Number : <input type="text" name="phnno" required="required"/><br/>
			<input type="submit" value="Register" class="button"/>
			</form>	
	</div>
	</body>
	
</html>

<?php
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$con=mysqli_connect("localhost","root","","atm");
		$name = mysqli_real_escape_string($con,$_POST['name']);
		$username = mysqli_real_escape_string($con,$_POST['username']);
		$password = mysqli_real_escape_string($con,$_POST['password']);
		$phnno = mysqli_real_escape_string($con,$_POST['phnno']);
		$accountno = mysqli_real_escape_string($con,$_POST['accountno']);
		$bool=true;

		mysqli_connect("localhost","root","") or die(mysql_error());
		mysqli_select_db($con,"ATM") or die("Cannot connect to database");
		$query=mysqli_query($con,"SELECT * FROM users");	
		while($row=mysqli_fetch_array($query))
		{
			$table_user=$row['username'];
			if($username==$table_user)
			{
				$bool=false;
				Print '<script>alert("Username has already been taken!");</script>';
				Print '<script>window.location.assign("register.php");</script>';
			}
		}
		if($bool)
		{
			mysqli_query($con,"INSERT INTO users (username,password,phnno,accountno) VALUES ('$username','$password','$phnno','$accountno')");
			Print '<script>alert("Successfully Registered! ");</script>';
			Print '<script>window.location.assign("index.php");</script>';
		}
	}
?>
