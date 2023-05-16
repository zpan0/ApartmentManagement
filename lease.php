<?php 
session_start();

	include("config.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        $randomid = (rand(1,1000000));
		$startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
		$numRes = $_POST['numRes'];
		$SSN = $_POST['resSSN'];
		$price = $_POST['price'];
		$aptNum = $_POST['aptNum'];

		if(!empty($startDate) && !empty($endDate) && !empty($numRes) && !empty($SSN) &&! empty($price) && !empty($aptNum))
		{

			//save to database
			
			$query = "insert into lease (leaseid,startdate,enddate,numresidents,price,resssn,apartmentnumber) values ('$randomid','$startDate','$endDate','$numRes','$price','$SSN', '$aptNum')";

			mysqli_query($con, $query);

			$query = "UPDATE apartment SET Status = 'Unavailable' WHERE ApartmentNumber = $aptNum";

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
	<title>New Lease Agreement</title>
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
			<div style="font-size: 20px;margin: 10px;color: white;">New Lease Agreement</div>

			<input id="text" type="text" name="startDate" required placeholder="Start Date (mm/dd/yyyy)"><br><br>
			<input id="text" type="text" name="endDate" required placeholder="End Date (mm/dd/yyyy)"><br><br>
			<input id="text" type="number" name="numRes" required placeholder="Number of Residents"><br><br>
			<input id="text" type="text" name="price" required placeholder="Price"><br><br>
			<input id="text" type="text" name="resSSN" required placeholder="Resident SSN"><br><br>
			<input id="text" type="text" name="aptNum" required placeholder="Apartment Number"><br><br>

			<input id="button" type="submit" value="Submit"><br><br>

			<a href="admin.php">Back to Admin Page</a><br><br>
		</form>
	</div>
</body>
</html>