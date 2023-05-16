<?php 
session_start();

	include("config.php");
	include("functions.php");

    if(isset($_SESSION['email']))
    {
        $user_data = checkUser($con);
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
	
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Resident Page</title>
 
    <style>
      body {
        margin: 0;
        font-family: Arial, sans-serif;
       /* background-image: url(https://www.virtualbx.com/wp-content/uploads/2022/02/Alexan-Springdale-Rendering-Pool-1-scaled-1.jpg);*/
        background-size: cover;
        background-position: center;
      }

      .createAccount{
        font-size: 1rem;
        justify-content: left;
      }

    table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			padding: 5px;
            
		}

      header {
        background-color: rgba(100, 100, 202, 0.8);
        color: white;
        padding: 20px;
      }

      header h1 {
        margin: 0;
      
      }

      nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
      }

      nav li {
        float: left;
      }

      nav a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }

      nav a:hover {
        background-color: rgba(255, 255, 255, 0.2);
        color: white;
      }

     main {
        padding: 20px;
        margin: 20px;
        border: 1px solid #ddd;

        background-repeat: no-repeat;
        background-size: cover;
        background-position: center top;
        height: 100vh;
      }

      main h2 {
      font-size: 1.5rem;
      margin-bottom: 1rem;
    }

    main p {
      font-size: 1.2rem;
      margin-bottom: 2rem;
    }

    form {
      display: flex;
      flex-wrap: wrap;
      margin-bottom: 2rem;
    }

    form label {
      display: inline-block;
      width: 8rem;
      font-size: 1.2rem;
      margin-right: 1rem;
    }
      form input[type="text"],
    form select {
      padding: 0.5rem;
      font-size: 1.2rem;
      border: none;
      border-radius: 0.5rem;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
      margin-bottom: 1rem;
    }

    form input[type="text"] {
      flex: 2;
      margin-right: 1rem;
    }

    form select {
      flex: 1;
    }

    form button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
    form button:hover {
      background-color: #fff;
      color: #2c3e50;
      border: 1px solid #2c3e50;
    }
      footer {
          margin: 0 auto;
          width: fit-content;
     }
      
    </style>

  </head>
  <body>
    <header>
      <h1>Resident Page - <?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];} ?></h1>
      <nav>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="apartments.php">Apartments</a></li>
          <li><a href="">Amenities</a></li>
          <li><a href="community.php">Community</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="admin.php">Admin</a></li>
          <li><a href="resident.php">Residents</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </header>
    <main>
  <h1>
    <a class = "createAccount" href="payment.php">Make A Payment</a><br>
    <a class = "createAccount" href="updateInfo.php">Change Password</a><br><br>

  </h1>

 

<h2>Active Lease Agreements</h2>
<?php
  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "testapt";
  $leaseID = "";
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  $sql = "SELECT * FROM lease INNER JOIN person ON lease.ResSSN = person.SSN WHERE person.Email = '$checkemail'";
  $result = mysqli_query($conn, $sql);
  
  // Display the results in an HTML table
  if (mysqli_num_rows($result) > 0) {
    echo "<table id='allResults'>";
    echo "<tr><th>Lease ID</th><th>Apartment Number</th><th>Name</th><th>Start Date</th><th>End Date</th><th>Number of Residents</th><th>Price</th><th>Email</th><th>Phone Number</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        $leaseID = $row["LeaseID"];
      echo "<tr><td>".$row["LeaseID"]."</td><td>".$row["ApartmentNumber"]."</td><td>".$row["Name"]."</td><td>".$row["StartDate"]."</td><td>".$row["EndDate"]."</td><td>".$row["NumResidents"]."</td><td>".$row["Price"]."</td><td>".$row["Email"]."</td><td>".$row["Phone_Number"]."</td></tr>";
      }
      echo "</table>";
      } else {
        echo "0 results";
      }
    ?>

<br><br>
<h2>Past Payments</h2>
<?php
  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "testapt";
  
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  $sql = "SELECT * FROM billing INNER JOIN payment ON billing.BillingID = payment.BillingID WHERE billing.leaseID = '$leaseID'";
  $result = mysqli_query($conn, $sql);
  
  // Display the results in an HTML table
  if (mysqli_num_rows($result) > 0) {
    echo "<table id='allResults'>";
    echo "<tr><th>Billing ID</th><th>Lease ID</th><th>Due Date</th><th>Price</th><th>Description</th><th>Payment Date</th><th>Amount Paid</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>".$row["BillingID"]."</td><td>".$row["LeaseID"]."</td><td>".$row["DueDate"]."</td><td>".$row["Price"]."</td><td>".$row["Description"]."</td><td>".$row["PaymentDate"]."</td><td>".$row["AmountPaid"]."</td></tr>";
      }
      echo "</table>";
      } else {
        echo "0 results";
      }
    ?>

<br><br>
<h2>Unpaid Bills</h2>
<?php
  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "testapt";
  
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  $sql = "SELECT * FROM billing WHERE BillingID NOT IN ( SELECT BillingID FROM payment ) AND billing.leaseID = '$leaseID'";
  $result = mysqli_query($conn, $sql);
  
  
  // Display the results in an HTML table
  if (mysqli_num_rows($result) > 0) {
    echo "<table id='allResults'>";
    echo "<tr><th>Billing ID</th><th>Lease ID</th><th>Due Date</th><th>Price</th><th>Description</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>".$row["BillingID"]."</td><td>".$row["LeaseID"]."</td><td>".$row["DueDate"]."</td><td>".$row["Price"]."</td><td>".$row["Description"]."</td></tr>";
      }
      echo "</table>";
      } else {
        echo "0 results";
      }

    $sql = "SELECT SUM(Price) AS TotalPrice FROM billing WHERE BillingID NOT IN (SELECT BillingID FROM payment) AND leaseID = $leaseID";

    // Execute the query and fetch the result
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $totalPrice = $row['TotalPrice'];
      
    // Output the result
    echo "<h2>The total amount due is: $" . $totalPrice. "</h2>";
    ?>
    </main>
</footer>
</body>
</html>