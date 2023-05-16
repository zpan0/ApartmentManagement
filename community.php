<?php 
session_start();

	include("config.php");
	include("functions.php");

    if(isset($_SESSION['user_id']))
    {
        $user_data = check_login($con);
    }
	
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Apartment Website</title>
  </head>
  
<style> 

body {
  background-image: url('https://www.shutterstock.com/image-photo/abstract-blur-living-room-area-260nw-514264279.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

/* Header styles */

header {
  background-color: #333;
  color: #fff;
  padding: 10px;
}

header h1 {
  margin: 0;
}

/* Navigation styles */

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
/* Community Page styles */

.community {
  display: flex;
  flex-wrap: wrap;
}

.community-section {
  flex-basis: calc(50% - 20px);
  margin-right: 20px;
  margin-bottom: 20px;
}

.community-section:last-child {
  margin-right: 0;
}

.community-section h2 {
  margin-top: 0;
}

.community-section p {
  margin-bottom: 0;
}

.form-container {
  width: 30%;
  margin: 0 auto;
}

</style>
  <body>
    <!-- Navigation bar -->
    <header>
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

    <!-- Main content area -->
    <main>
      <h1>Welcome to Our Apartment Community!</h1>
      <p>Discover the perfect place to call home in our beautiful apartment community. Browse our available floor plans and amenities, and contact us to schedule a tour today!</p>

    <!-- Community page accessible to non-residents -->
    <div id="community-page">
      <h2>Community</h2>
      <p>As part of our commitment to building a strong community, we welcome everyone to join us in our events and activities.</p>

      <!-- Events section -->
      <div class="form-container">
      <section id="events">
        <h3>Events</h3>
        <ul>
          <li>Movie Night: Friday, April 22 at 7:00 PM</li>
          <li>Yoga Class: Saturday, April 23 at 9:00 AM</li>
          <li>Cooking Class: Sunday, April 24 at 3:00 PM</li>
        </ul>
      </section>

      <!-- Leave a suggestion section -->
      <section id="leave-suggestion">
        <h3>Leave a Suggestion</h3>
        <form>
          <label for="suggestion">What do you suggest?</label>
          <textarea id="suggestion" name="suggestion"></textarea>
          <button type="submit">Submit</button>
        </form>
      </section>

      <!-- Have a problem section -->
      <section id="have-problem">
        <h3>Have a Problem?</h3>
        <form>
          <label for="problem">What's the problem?</label>
          <textarea id="problem" name="problem"></textarea>
          <button type="submit">Submit</button>
        </form>
      </section>

      <!-- Rate your room section -->
      <section id="rate-room">
        <h3>Rate your room!</h3>
        <form>
          <label for="room-rating">How would you rate your room?</label>
          <select id="room-rating" name="room-rating">
            <option value="5">5 - Excellent</option>
            <option value="4">4 - Very Good</option>
            <option value="3">3 - Good</option>
            <option value="2">2 - Fair</option>
            <option value="1">1 - Poor</option>
          </select>
          <button type="submit">Submit</button>
        </form>
      </section>

     <section id="rate-building">
        <h3>Rate your building!</h3>
        <form>
          <label for="bulding-rating">How would you rate your Building?</label>
          <select id="building-rating" name="building-rating">
            <option value="5">5 - Excellent</option>
            <option value="4">4 - Very Good</option>
            <option value="3">3 - Good</option>
            <option value="2">2 - Fair</option>
            <option value="1">1 - Poor</option>
          </select>
          <button type="submit">Submit</button>
        </form>
      </section>
      <section id="Ask Question">
        <h3>Ask a Question</h3>
            <form action="" method="post">
              <label for="name">Name:</label>
              <input type="text" id="name" name="name" required>
          
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" required>
            
              <label for="question">Question:</label>
              <textarea id="question" name="question" required></textarea>
          
              <button type="submit">Submit</button>
            </form> 

        </section>
        <section>
            <h3>Answer Potential Resident’s Questions!</h3>
            <p>Residents can answer questions from potential residents.</p>
        </section>
        </div>
    </main>
   

</body>
</html>

