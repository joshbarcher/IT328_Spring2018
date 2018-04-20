<?php
    //this is our data layer!

    function getConnection() {
        $user = 'jarcherg_dummy';
        $pass = '^6C_sl~oVHTM';
        $host = 'localhost';
        $database = 'jarcherg_IT328';

        $connection = mysqli_connect($host, $user, $pass, $database);

        //if we get a false value, something went wrong
        if (!$connection) {
            echo 'Error connection to DB: '.mysqli_connect_error();
            exit;
        }

        return $connection;
    }

    function insertMessage($message) {
        $connection = getConnection();

        $query = "INSERT INTO messages (body) VALUES ('$message')";

        return mysqli_query($connection, $query);
    }

    function getMessages() {
        $connection = getConnection();

        //query for message records
        $query = 'SELECT id, body FROM messages';

        $results = mysqli_query($connection, $query);

        if (!$results) {
            echo 'Error retrieving records.';
            exit;
        }

        $records = array();
        while ($row = mysqli_fetch_assoc($results)) {
            $records[] = $row;
        }

        //free up server resources
        mysqli_free_result($results);

        return $records;
    }
?>