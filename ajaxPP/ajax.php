<?php
require_once 'db.php';

//respond to different types of commands
if (isset($_GET['command'])) {
    switch ($_GET['command']) {
        case 'addNote':
            addNote();
            break;
    }

} else {
    echo 'error';
}

function addNote()
{
    //convert array to variables
    extract($_GET);

    //update the db
    insertNote($body);
}
?>