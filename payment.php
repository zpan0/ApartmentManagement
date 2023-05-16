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

    if(isset($_COOKIE['email'])){
        $checkemail = $_COOKIE['email'];
        $isResident = checkResident($checkemail);
        if($isResident == 0){
  
          callalert("You are not a resident");
          header('Location: home.php');
          callalert("You are not a resident");
  
        }
  
      } else{
        header('Location: login.php');
      }
    $sql = "SELECT * FROM lease INNER JOIN person ON lease.ResSSN = person.SSN WHERE person.Email = '$checkemail'";
    $result = mysqli_query($conn, $sql);
  
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $leaseID = $row["LeaseID"];
        }
    }



	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        date_default_timezone_set('America/New_York');
		$billingID = $_POST['billingID'];
        $amountPaid = $_POST['amountPaid'];
		$description = $_POST['description'];
        $paymentDate = $date = date('m/d/Y', time());


		if(!empty($billingID) && !empty($amountPaid) && !empty($leaseID) && !empty($description))
		{

			//save to database
			
			$query = "insert into payment (leaseid,billingid,amountpaid,description,paymentdate) values ('$leaseID','$billingID','$amountPaid','$description','$paymentDate')";

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
	<title>New Payment</title>
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
			<div style="font-size: 20px;margin: 10px;color: white;">New Payment</div>

			<input id="text" type="text" name="billingID" required placeholder="Billing ID"><br><br>
			<input id="text" type="number" name="amountPaid" required placeholder="Payment Amount"><br><br>
			<input id="text" type="text" name="description" required placeholder="Description"><br><br>


			<input id="button" type="submit" value="Submit"><br><br>

			<a href="resident.php">Back to Resident Page</a><br><br>
		</form>
	</div>
</body>
</html>