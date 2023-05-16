<?php 
session_start();

	include("config.php");
	include("functions.php");

    if(isset($_SESSION['email']))
    {
        $user_data = checkUser($con);
    }
	
?>


<!DOCTYPE html>
<html>

<head>
	<title>Apartments</title>
	<style>
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

        body {
        margin: 0;
        font-family: Arial, sans-serif;
       /* background-image: url(https://www.virtualbx.com/wp-content/uploads/2022/02/Alexan-Springdale-Rendering-Pool-1-scaled-1.jpg);*/
        background-size: cover;
        background-position: center;
        }
	</style>
</head>
<header>
      <h1>Welcome to Our Apartments</h1>
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
<body>
	<h1>Apartments</h1>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
		<label for="bedrooms">Search by Number of Bedrooms:</label>
		<input type="number" id="bedrooms" name="bedrooms" min="1" max="10" step="1" value="1">
        <br>
        <label for="PriceRange">Price Range:</label>
        <select id="PriceRange" name="PriceRange">
        <option value="1">$1000-$1999</option>
        <option value="2">$2000-$2999</option>
        <option value="3">$3000-$3999</option>
        <option value="4">$4000-$4999</option>
        </select> <br>
		<input type="submit" value="Search">
	</form>
    <br>

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

        $sql = "SELECT * FROM apartment";
		$result = mysqli_query($conn, $sql);

		// Display the results in an HTML table
		if (mysqli_num_rows($result) > 0) {
			echo "<table id='allResults'>";
			echo "<tr><th>Apartment Number</th><th>Status</th><th>Number of Bedrooms</th><th>Number of Bathrooms</th><th>Square Footage</th><th>Price</th><th>Details</th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>".$row["ApartmentNumber"]."</td><td>".$row["Status"]."</td><td>".$row["NumBedrooms"]."</td><td>".$row["NumBathrooms"]."</td><td>".$row["SquareFootage"]."</td><td>".$row["Price"]."</td><td>".$row["Details"]."</td></tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}

		// If the form has been submitted, search the apartment table by NumBedrooms
		if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['bedrooms']) && isset($_GET['PriceRange'])) {
			$numBedrooms = $_GET["bedrooms"] ?? NULL;
            $priceRange = $_GET["PriceRange"] ?? NULL;
            if($priceRange == 1){
                $sql = "SELECT * FROM apartment WHERE NumBedrooms = $numBedrooms AND Price BETWEEN 1000 AND 1999";
            } else if($priceRange == 2){
                $sql = "SELECT * FROM apartment WHERE NumBedrooms = $numBedrooms AND Price BETWEEN 2000 AND 2999";
            } else if($priceRange == 3){
                $sql = "SELECT * FROM apartment WHERE NumBedrooms = $numBedrooms AND Price BETWEEN 3000 AND 3999";
            } else if($priceRange == 4){
                $sql = "SELECT * FROM apartment WHERE NumBedrooms = $numBedrooms AND Price BETWEEN 4000 AND 4999";
            } else {
                $sql = "SELECT * FROM apartment WHERE NumBedrooms = $numBedrooms";
            }

			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {

				echo "<h2>Results:</h2>";
				echo "<table>";
				echo "<tr><th>Apartment Number</th><th>Status</th><th>Number of Bedrooms</th><th>Number of Bathrooms</th><th>Square Footage</th><th>Price</th><th>Details</th></tr>";
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td>".$row["ApartmentNumber"]."</td><td>".$row["Status"]."</td><td>".$row["NumBedrooms"]."</td><td>".$row["NumBathrooms"]."</td><td>".$row["SquareFootage"]."</td><td>".$row["Price"]."</td><td>".$row["Details"]."</td></tr>";
				}
				echo "</table>";
			} else {
				echo "<p>No results found.</p>";
			}
		}

		// Close the database connection
		mysqli_close($conn);
	?>
</body>
</html>