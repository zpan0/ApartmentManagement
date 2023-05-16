<?php 
session_start();

	include("config.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$name = $_POST['name'];
		$SSN = $_POST['SSN'];
		$phoneNumber = $_POST['phoneNumber'];
		$usertype = $_POST['usertype'];
		$randomid = (rand(1,1000000));

		if(!empty($email) && !empty($name) && !empty($SSN) && !empty($phoneNumber) &&! empty($usertype))
		{

			//save to database
			
			$query = "insert into person (email,password,name,ssn,phone_number,type) values ('$email','newuser','$name','$SSN','$phoneNumber','$usertype')";

			mysqli_query($con, $query);

			if($usertype == 'Admin'){
				$query = "insert into employee (empid,empssn,role) values ('$randomid','$SSN','Admin')";
				mysqli_query($con, $query);
			} else if ($usertype == 'Resident'){
				$query = "insert into resident (resssn) values ('$SSN')";
				mysqli_query($con, $query);
			}

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="email" required placeholder="Email"><br><br>
			<input id="text" type="text" name="name" required placeholder="Name"><br><br>
			<input id="text" type="number" name="SSN" required placeholder="SSN"><br><br>
			<input id="text" type="text" name="phoneNumber" required placeholder="Phone Number"><br><br>
			<input id="text" type="text" name="usertype" required placeholder="User Type (Admin or Resident)"><br><br>


			<input id="button" type="submit" value="Signup"><br><br>

			<a href="admin.php">Back to Admin Page</a><br><br>
		</form>
	</div>
</body>
</html>