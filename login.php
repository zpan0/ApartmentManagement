<?php
    // grab all functions
    require('functions.php');

    // testing any errors
    error_reporting(E_ALL);
    ini_set('display_errors', 1);


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $auth = checkAccountCreation($email);

        // default password for new users are "newuser"
        if(($password == "newuser") && ($auth == 0)){
            setcookie('email', $email, time() + 300, '/');
            header('Location: createAccount.php');
        } else{
            // check login info - returns SSN
            $confirmLogin = checkUser($email, $password);

            // if login info doesn't exist
            if($confirmLogin == ""){
                setcookie('email', '', time() - 3600, '/');
                callAlert("Email or Password does not exist");
            } else{
                // sets a cookie that only lasts 5 minute, needs to be authenticated
                setcookie('email', $email, time() + 300, '/');
                // callAlert("Successfully logged in");
                header('Location: doubleAuthentication.php');
            }
        }
    }

?>

<html>
<style>
        body {
            background-color: #f8f8f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 2px 4px rgba(0,0,0,0.1);
            width: 300px;}

        label {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p {
            font-size: 12px;
            color: #777;
            margin-bottom: 10px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            color: #0056b3;
        }

    </style>
    <head>

    </head>

    <body>
        <form method = "post" autocomplete="off">
            <fieldset>
                <!-- All inputs to form is required -->
                <!-- EMAIL -->
                <label for="email" id="inputLabels"> Email: </label>
                <input type="text" id="email" name="email" required>
                <br>
                <!-- PASSWORD -->
                <label for="password" id="inputLabels"> Password: </label>
                <input type="password" id="password" name="password"  required>
                <p> 
                    * BOTH USERNAME AND PASSWORD ARE CASE SENSITIVE 
                </p>
                <p>
                    * DEFAULT PASSWORD FOR NEW USERS IS 'newuser'
                </p>
                <br>
                <!-- SUBMIT -->
                <input type="submit" id="submitBtn" name="login" value="LOG IN">
            </fieldset>
        </form>
    </body>

</html>

