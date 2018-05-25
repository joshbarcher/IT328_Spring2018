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
function insertColor($name, $red, $green, $blue) {
    $connect = getConnection();
    $query = "INSERT INTO colors (name, red, green, blue) 
                     VALUES ('$name', '$red', '$green', '$blue')";
    $results = mysqli_query($connect, $query);
    return $results;
}

//READ
function getColors() {
    $connect = getConnection();
    $query = 'SELECT name, red, green, blue FROM colors';
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