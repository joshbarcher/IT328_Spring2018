<?php
    require 'colorsDb.php';

    switch($_GET['command']) {
        case 'allColors':
            ajaxGetColors();
            break;
        case 'insert':
            ajaxInsertColor();
            break;
    }

    function ajaxInsertColor() {
        //map my array values to variables
        extract($_GET);

        insertColor($name, $red, $green, $blue);
    }

    function ajaxGetColors() {
        //get an array of color records
        $colorsArray = getColors();

        //send the array to the JS file in the browser as JSON data
        echo json_encode($colorsArray);
    }
?>