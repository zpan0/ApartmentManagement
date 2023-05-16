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
    <meta charset="UTF-8">
    <title>Home Page</title>
 
    <style>
      body {
        margin: 0;
        font-family: Arial, sans-serif;
       /* background-image: url(https://www.virtualbx.com/wp-content/uploads/2022/02/Alexan-Springdale-Rendering-Pool-1-scaled-1.jpg);*/
        background-size: cover;
        background-position: center;
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
        background-image: url('https://www.virtualbx.com/wp-content/uploads/2022/02/Alexan-Springdale-Rendering-Pool-1-scaled-1.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center top;
        height: 100vh;
      }

      main h2 {
      font-size: 2rem;
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
    <main>
<h1 style="text-align:center; font-size: 4rem; color: #ff7f50">
    <b>Welcome <?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];} ?></b>
  </h1>
    </main>
   <footer>
  <h2>Find Your Dream Apartment</h2>
  <p>Search our listings:</p>
  <form action="apartments.php">
    <!-- <label for="location">Location:</label>
    <input type="text" id="location" name="location">  -->
    <br>
    <label for="bedrooms">Number of Bedrooms:</label>
    <select id="bedrooms" name="bedrooms">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select> <br><br>
    <label for="PriceRange"> Price Range:</label>
        <select id="PriceRange" name="PriceRange">
        <option value="1">$1000-$1999</option>
        <option value="2">$2000-$2999</option>
        <option value="3">$3000-$3999</option>
        <option value="4">$4000-$4999</option>
    </select> <br>
    <button type="submit" class="search-button">Search</button>
  </form>
</footer>
 
  </body>
</html>
