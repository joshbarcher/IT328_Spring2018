<?php

function getConnection() {
    $connection = mysqli_connect('localhost', 'jarcherg_user',
        'fW9iS%Zp6*.L', 'jarcherg_IT328');
    if (!$connection) {
        printError();
    }

    return $connection;
}

function printError() {
    echo "Unable to connect to MySQL." . PHP_EOL;
    echo "Error number: " . mysqli_connect_errno() . PHP_EOL;
    echo "Error message: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//CREATE
function insertNote($body) {
    $connect = getConnection();
    $query = "INSERT INTO notes (body) 
                     VALUES ('$body')";
    $results = mysqli_query($connect, $query);
    return $results;
}

//READ
function getNotes() {
    $connect = getConnection();
    $query = 'SELECT body FROM notes';
    $results = mysqli_query($connect, $query);

    $returnArray = array();
    while ($row = mysqli_fetch_assoc($results)) {
        $returnArray[] = $row;
    }

    //free the memory taken up by the results
    mysqli_free_result($results);

    return $returnArray;
}

?>