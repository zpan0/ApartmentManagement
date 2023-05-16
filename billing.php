<?php 
session_start();

	include("config.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        $randomid = (rand(1,1000000));
		$dueDate = $_POST['dueDate'];
        $leaseID = $_POST['leaseID'];
		$price = $_POST['price'];
        $description = $_POST['description'];

		if(!empty($dueDate) && !empty($leaseID) && !empty($price))
		{

			//save to database
			
			$query = "insert into billing (billingid,leaseid,duedate,description,price) values ('$randomid','$leaseID','$dueDate','$description','$price')";

			mysqli_query($con, $query);

			header("Location: admin.php");
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
	<title>New Bill</title>
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
			<div style="font-size: 20px;margin: 10px;color: white;">New Bill</div>

			<input id="text" type="text" name="leaseID" required placeholder="Lease ID"><br><br>
			<input id="text" type="text" name="dueDate" required placeholder="Due Date (mm/dd/yyyy)"><br><br>
			<input id="text" type="text" name="price" required placeholder="Price"><br><br>
			<input id="text" type="text" name="description" required placeholder="Description"><br><br>


			<input id="button" type="submit" value="Submit"><br><br>

			<a href="admin.php">Back to Admin Page</a><br><br>
		</form>
	</div>
</body>
</html>