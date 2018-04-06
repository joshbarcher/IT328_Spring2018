<?php
    $vacationSpots = array('Chicago', 'Staycation', 'Canada/Alaska');

    foreach ($vacationSpots as $spot) {
        echo "<p>Spot: $spot</p>";
    }

    for ($i = 0; $i < sizeof($vacationSpots); $i++) {
        echo "<p>Spot: $vacationSpots[$i]</p>";
    }

    //associate arrays map keys to values
    $favoriteMovies = array('Geoff' => 'A Clockwork Orange',
                            'Josh' => 'The Lord of the Rings',
                            'Nick' => 'The Matrix');

    //looping over an associative array
    foreach ($favoriteMovies as $key => $value) {
        echo "The favorite movie for $key is $value<br>";
    }
?>