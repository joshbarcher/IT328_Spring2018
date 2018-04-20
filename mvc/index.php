<?php
    //load shared resources among pages
    require 'database/db.php';
    require 'controllers/messageController.php';

    //save the HTTP verb
    $httpVerb = $_SERVER['REQUEST_METHOD']; //GET or POST

    //determine which page was requested
    $page = 'view';
    $file = 'viewMessages.php';
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        switch ($page) {
            case 'view':
                $file = 'viewMessages.php';
                break;
            case 'add':
                $file = 'insertMessage.php';
                break;
        }
    }

    //pass control to a controller function
    switch ($page) {
        case 'view':
            showView();
            break;
        case 'add':
            if ($httpVerb == 'GET') {
                showInsertForm();
            } else { //POST
                handleInsertForm();
            }
            break;
    }
?>