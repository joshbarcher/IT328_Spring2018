<?php
    require '../../../connection.php';

    //create a new user
    function createNewUser($username, $password, $accountType) {
        $pdo = getConnection();

        //prepare my query
        $digest = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, password, accountType) 
                  VALUES (:username, :password, :accountType)";

        //create a statement object (prepared statement)
        $statement = $pdo->prepare($query);

        //bind our inputs to the query
        $statement->bindValue(':username', $username,
                     PDO::PARAM_STR);
        $statement->bindValue(':password', $digest,
            PDO::PARAM_STR);
        $statement->bindValue(':accountType', $accountType,
            PDO::PARAM_STR);

        //execute the query and get our results
        $rowsAffected = $statement->execute();

        return $rowsAffected;
    }

    //validate a user
    function isUser($username, $password) {
        $pdo = getConnection();

        //get the stored password (if there is one)
        $query = "SELECT password FROM users WHERE username='$username'";
        $results = $pdo->query($query);

        //get the one row (if there is one)
        $row = $results->fetch(PDO::FETCH_ASSOC);
        if ($row != null) {
            $digest = $row['password'];

            return password_verify($password, $digest);
        } else {
            return false;
        }
    }

    function getUsers() {
        $pdo = getConnection();

        //get the data
        $query = 'SELECT username FROM users';
        $statement = $pdo->prepare($query);
        $statement->execute();

        //return the data
        //return $statement->fetchAll(PDO::FETCH_ASSOC);

        $resultsArray = array();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $resultsArray[] = $row;
        }

        return $resultsArray;
    }
?>