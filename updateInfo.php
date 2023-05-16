<?php 
session_start();

	include("config.php");
	include("functions.php");

    if(isset($_SESSION['email']))
    {
        $user_data = checkUser($con);
    }
    $checkemail = $_COOKIE['email'];
    echo $checkemail;
    if(isset($_COOKIE['email'])){
      $checkemail = $_COOKIE['email'];

    } else{
      header('Location: login.php');
    }


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted

		$newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];


		if(!empty($newPassword) && !empty($confirmPassword) && ($newPassword == $confirmPassword))
		{
			//Update database
			$query = "UPDATE person SET Password = $newPassword WHERE Email = '$checkemail'";

			mysqli_query($con, $query);
            header("Location: logout.php");

            die;

		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>New Password</title>
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
			<div style="font-size: 20px;margin: 10px;color: white;">Change Password</div>

			<input id="text" type="text" name="newPassword" required placeholder="New Password"><br><br>
            <input id="text" type="text" name="confirmPassword" required placeholder="Confirm New Password"><br><br>


			<input id="button" type="submit" value="Signup"><br><br>

			<a href="home.php">Back to Home Page</a><br><br>
		</form>
	</div>
</body>
</html>