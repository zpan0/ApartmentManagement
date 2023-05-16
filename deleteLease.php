<?php 
session_start();

	include("config.php");
	include("functions.php");

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "testapt";
    $leaseID = "";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$leaseID = $_POST['leaseID'];

		if(!empty($leaseID))
		{
            $sql = "SELECT ApartmentNumber FROM lease WHERE LeaseID = '$leaseID'";
            $result = mysqli_query($conn, $sql);
  
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $aptNum = $row["ApartmentNumber"];
                }
            }

            $query = "UPDATE apartment SET Status = 'Available' WHERE ApartmentNumber = $aptNum";

			mysqli_query($con, $query);
			//save to database
			
			$query = "DELETE FROM lease WHERE LeaseID = $leaseID";

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
	<title>Delete a Lease Agreement</title>
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
			<div style="font-size: 20px;margin: 10px;color: white;">Delete a Lease Agreement</div>

			<input id="text" type="text" name="leaseID" required placeholder="leaseID"><br><br>



			<input id="button" type="submit" value="Submit"><br><br>

			<a href="admin.php">Back to Admin Page</a><br><br>
		</form>
	</div>
</body>
</html>