<?php    

    // Creates a connection wtih MySQL
    function Connection(){
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $db ='testApt';

        // Create connection
        $connection = mysqli_connect($host,$user,$password,$db);
        // Check connection
        if (!$connection) {
            echo "Connection failed: " . mysqli_connect_error();
        }
        return $connection;
    }

    // Calls an alert with a message
    function callAlert($message){
        echo 
        "<script> 
            alert('$message');
        </script>";
    }

    // Check user login info
    function checkUser($email, $password){
        // Create connection to MySQL
        $connection = Connection();

        // SQL Query
        $select = "SELECT email, password FROM person";
        // Execute SQL Query
        $result = mysqli_query($connection, $select);

        // Iterate through the results
        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                // check matching email and passwords
                if(($row["email"] == $email) && ($row["password"] == $password)){
                    return $row["email"];
                }
            }
        } else {
            // if there is no data in the database
            echo "0 results";
        }

        // Close connection to MySQL
        mysqli_close($connection);
    }

    // Check if user is an admin
    function checkAdmin($email){
        // Create connection to MySQL
        $connection = Connection();

        // SQL Query
        $select = "SELECT email, type FROM person";
        // Execute SQL Query
        $result = mysqli_query($connection, $select);

        // Iterate through the results
        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                // check matching email and passwords
                if(($row["email"] == $email) && ($row["type"] == 'Admin')){
                    return 1;
                }
            }
        } else {
            // if there is no data in the database
            return 0;
            callAlert("You are not an admin");
        }

        // Close connection to MySQL
        mysqli_close($connection);
    }

        // Check if user is an admin
        function checkResident($email){
            // Create connection to MySQL
            $connection = Connection();
    
            // SQL Query
            $select = "SELECT email, type FROM person";
            // Execute SQL Query
            $result = mysqli_query($connection, $select);
    
            // Iterate through the results
            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    // check matching email and passwords
                    if(($row["email"] == $email) && ($row["type"] == 'Resident')){
                        return 1;
                    }
                }
            } else {
                // if there is no data in the database
                return 0;
                callAlert("You are not a resident");
            }
    
            // Close connection to MySQL
            mysqli_close($connection);
        }
    
    function checkQuestion($email, $num){
        // Create connection to MySQL
        $connection = Connection();

        // SQL Query
        $select = "SELECT email, question".$num." FROM TestQuestion";
        // Execute SQL Query
        $result = mysqli_query($connection, $select);

        // Iterate through the results
        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                // check matching email and passwords
                if($row["email"] == $email){
                    return $row["question".$num];
                }
            }
        } else {
            // if there is no data in the database
            echo "0 results";
        }

        // Close connection to MySQL
        mysqli_close($connection);
    }


    // Confirm answer for questions
    function confirmQuestion($email, $answer, $question){
        // Create connection to MySQL
        $connection = Connection();

        // SQL Query    
        if($question == 1){
            $insert = $select = "SELECT email, answer FROM Question1";
        }
        elseif($question == 2){
            $insert = $select = "SELECT email, answer FROM Question2"; 
        }
        elseif($question == 3){
            $insert = $select = "SELECT email, answer FROM Question3";
        }
        elseif($question == 4){
            $insert = $select = "SELECT email, answer FROM Question4";
        }

        $result = mysqli_query($connection, $select);
        // Iterate through the results
        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                // check matching email and passwords
                if(($row["email"] == $email) && ($row["answer"] == $answer)){
                    return $row["answer"];
                }
            }
        } else {
            // if there is no data in the database
            echo "0 results";
        }

        // Close connection to MySQL
        mysqli_close($connection);
    }

    // create password
    function insertPassword($email, $password){
        // Create connection to MySQL
        $connection = Connection();

        // SQL Query    
        $update = "UPDATE `person` SET `password` = '$password' WHERE `email` = '$email'";
        $result = mysqli_query($connection, $update);
        //printf("Records updated: %d\n", mysqli_affected_rows($connection));

        // Close connection to MySQL
        mysqli_close($connection);
    }

    // create question for user
    function insertQuestion($email, $question){
        // Create connection to MySQL
        $connection = Connection();

        // SQL Query    
        if($question == 1){
            $insert = "INSERT INTO TestQuestion (email, question1) VALUES ('$email','1')";
        }
        elseif($question == 2){
            $insert = "INSERT INTO TestQuestion (email, question2) VALUES ('$email','1')";
        }
        elseif($question == 3){
            $insert = "INSERT INTO TestQuestion (email, question3) VALUES ('$email','1')";
        }
        elseif($question == 4){
            $insert = "INSERT INTO TestQuestion (email, question4) VALUES ('$email','1')";
        }
        $result = mysqli_query($connection, $insert);
        
        // Close connection to MySQL
        mysqli_close($connection);
    }
    // create question for user
    function insertAnswer($email, $question, $answer){
        // Create connection to MySQL
        $connection = Connection();

        // SQL Query    
        if($question == 1){
            $insert = "INSERT INTO Question1 (email, answer) VALUES ('$email','$answer')";
        }
        elseif($question == 2){
            $insert = "INSERT INTO Question2 (email, answer) VALUES ('$email','$answer')";
        }
        elseif($question == 3){
            $insert = "INSERT INTO Question3 (email, answer) VALUES ('$email','$answer')";
        }
        elseif($question == 4){
            $insert = "INSERT INTO Question4 (email, answer) VALUES ('$email','$answer')";
        }
        $result = mysqli_query($connection, $insert);
        
        // Close connection to MySQL
        mysqli_close($connection);
    }

    // Check if the account password has already been created
    function checkAccountCreation($email){
        // Create connection to MySQL
        $connection = Connection();

        // SQL Query
        $select = "SELECT email, auth FROM person";
        // Execute SQL Query
        $result = mysqli_query($connection, $select);

        // Iterate through the results
        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                // check matching email and passwords
                if($row["email"] == $email){
                    return $row["auth"];
                }
            }
        } else {
            // if there is no data in the database
            echo "0 results";
        }

        // Close connection to MySQL
        mysqli_close($connection);
    }

    // Check if the account password has already been created
    function updateAccountCreation($email){
        // Create connection to MySQL
        $connection = Connection();

        // SQL Query    
        $update = "UPDATE `person` SET `auth` = '1' WHERE `email` = '$email'";
        $result = mysqli_query($connection, $update);
       //  printf("Records updated: %d\n", mysqli_affected_rows($connection));

        // Close connection to MySQL
        mysqli_close($connection);
    }


    
?>