<?php
    // 'email' cookie is temporary!
    // main cookie to see if logged in is 'loggedin'
    // checks if cookie 'login' is set
    if(!isset($_COOKIE['email'])){
        // if not set, go to login
        header('Location: login.php');
    }

    $email = $_COOKIE['email'];

    // grab all functions
    require('functions.php');

    // testing any errors
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // checks their answers to security question
        if (!empty( $_POST["number1"])) {
            $question1 = $_POST['question1'];
            $confirmAuth = confirmQuestion($email, $question1, 1);
            if($confirmAuth == ""){
                callAlert("Wrong! Please try again.");
            }else{
                setcookie('loggedin', $confirmAuth, time() + 3600, '/');
                callAlert("Successfully logged in");
                // replace with another file
                header('Location: home.php');
            }
        } elseif (!empty( $_POST["number2"])) {
            $question2 = $_POST['question2'];
            $confirmAuth = confirmQuestion($email, $question2, 2);
            if($confirmAuth == ""){
                callAlert("Wrong! Please try again.");
            }else{
                setcookie('loggedin', $confirmAuth, time() + 3600, '/');
                callAlert("Successfully logged in");
                header('Location: home.php');
            }
        } elseif (!empty( $_POST["number3"])){
            $question3 = $_POST['question3'];
            $confirmAuth = confirmQuestion($email, $question3, 3);
            if($confirmAuth == ""){
                callAlert("Wrong! Please try again.");
            }else{
                setcookie('loggedin', $confirmAuth, time() + 3600, '/');
                callAlert("Successfully logged in");
                header('Location: home.php');
            }
        } elseif (!empty( $_POST["number4"])){
            $question4 = $_POST['question4'];
            $confirmAuth = confirmQuestion($email, $question4, 4);
            if($confirmAuth == ""){
                callAlert("Wrong! Please try again.");
            }else{
                setcookie('loggedin', $confirmAuth, time() + 3600, '/');
                callAlert("Successfully logged in");
                header('Location: home.php');
            }
        } 
        else{
            return null;
        }
    }
?>

<html>
    
    <head>

    </head>

    <body>
        <p>Answer one of the following questions: <br></p>
        <p> 
            * ANSWERS ARE CASE SENSITIVE 
        </p>
        <?php 
            // checks checks what their security question is and asks it
            if(checkQuestion($email, 1) == 1){ ?>
                <div class='question1'> 
                    <form method = "post" autocomplete="off">
                        <label for="question1" id="inputLabels"> What is your favorite movie? </label>
                        <input type="text" id="question1" name="question1" required>
                        <input type="hidden" name="number1" value="number1">
                        <input type="submit" id="submitBtn" name="submit" value="Submit">
                    </form>
                </div>
        <?php
            }
            elseif(checkQuestion($email, 2) == 1){ ?>
                <div class='question2'> 
                    <form method = "post" autocomplete="off">
                        <label for="question2" id="inputLabels"> What was your favorite sport in high school? </label>
                        <input type="text" id="question2" name="question2" required>
                        <input type="hidden" name="number2" value="number2">
                        <input type="submit" id="submitBtn" name="submit" value="Submit">
                    </form>
                </div>
        <?php
            }
            elseif(checkQuestion($email, 3) == 1){ ?>
                <div class='question3'> 
                    <form method = "post" autocomplete="off">
                        <label for="question3" id="inputLabels"> What is your mother’s maiden name? </label>
                        <input type="text" id="question3" name="question3" required>
                        <input type="hidden" name="number3" value="number3">
                        <input type="submit" id="submitBtn" name="submit" value="Submit">
                    </form>
                </div>
        <?php
            }
            elseif(checkQuestion($email, 4) == 1){ ?>
                <div class='question4'> 
                    <form method = "post" autocomplete="off">
                        <label for="question4" id="inputLabels"> What elementary school/high school did you attend? </label>
                        <input type="text" id="question4" name="question4" required>
                        <input type="hidden" name="number4" value="number4">
                        <input type="submit" id="submitBtn" name="submit" value="Submit">
                    </form>
                </div>
        <?php
            }
        ?>
        
    </body>

</html>