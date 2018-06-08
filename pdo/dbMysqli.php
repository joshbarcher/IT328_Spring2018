<?php
    function getConnection() {
        $connection = mysqli_connect('localhost', 'jarcherg_user',
            'fW9iS%Zp6*.L', 'jarcherg_IT328');
        if (!$connection) {
            printError();
        }

        return $connection;
    }

    //create a new user
    function createNewUser($username, $password, $accountType)
    {
        $mysqli = getConnection();

        //create a hash of the password (should use password_hash() for php >= 5.5)
        $digest = md5($password);

        $query = "INSERT INTO users (username, password, accountType)
                                VALUES ('$username', '$digest', '$accountType')";

        //returns the number of rows affect (integer) or false (no effect)
        $results = mysqli_query($mysqli, $query);

        return $results;
    }

    //validate a user
    function isUser($username, $password)
    {
        $mysqli = getConnection();

        $digest = md5($password);
        $query = "SELECT username FROM users WHERE username='$username' AND password='$digest'";

        $results = mysqli_query($mysqli, $query);
        $row = mysqli_fetch_assoc($results);

        if ($row != null) {
            return true;
        } else {
            return false;
        }
    }
?>