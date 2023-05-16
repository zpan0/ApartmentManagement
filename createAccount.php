<?php
    //if(!isset($_COOKIE['email'])){
        // if not set, go to login
        //header('Location: login.php');
    //}

    // grab all functions
    require('functions.php');

    // testing any errors
    error_reporting(E_ALL);
    ini_set('display_errors', 1);


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_COOKIE['email'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $question = $_POST['question'];
        $answer = $_POST['answer'];

        if($password != $repassword){
            callAlert("Passwords do not match");
        }elseif($password == 'newuser'){
            callAlert("Please enter another password");
        } else{
            insertPassword($email, $password);
            if($question == 'question1'){
                $question = 1;
            }
            if($question == 'question2'){
                $question = 2;
            }
            if($question == 'question3'){
                $question = 3;
            }
            if($question == 'question4'){
                $question = 4;
            }
            insertQuestion($email, $question);
            insertAnswer($email, $question, $answer);
            updateAccountCreation($email);
            callAlert("Account successfully set!");
            header('Location: login.php');
        }
    }

?>

<html>

    <head>

    </head>

    <body>
        <form method = "post" autocomplete="off">
            <fieldset>
                <!-- All inputs to form is required -->
                <!-- PASSWORD -->
                <label for="password" id="inputLabels"> Set Password: </label>
                <input type="password" id="password" name="password"  required>
                <br>
                <label for="repassword" id="inputLabels"> Re-enter Password: </label>
                <input type="password" id="repassword" name="repassword"  required>
                <p>
                    *  PASSWORD IS CASE SENSITIVE 
                </p>
                <br>
                <select id="question" name="question" required>
                    <option disabled selected value> -- select a security question -- </option>
                    <option value="question1">What is your favorite movie?</option>
                    <option value="question2">What was your favorite sport in high school?</option>
                    <option value="question3">What is your mother’s maiden name?</option>
                    <option value="question4">What elementary school/high school did you attend?</option>
                </select>
                <br>
                <br>
                <label for="answer" id="inputLabels"> Answer: </label>
                <input type="text" id="answer" name="answer"  required>
                <br>
                <br>
                <!-- SUBMIT -->
                <input type="submit" id="submitBtn" name="create" value="CREATE ACCOUNT">
            </fieldset>
        </form>
    </body>

</html>