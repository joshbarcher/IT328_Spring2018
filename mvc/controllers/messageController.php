<?php
    function showView() { //GET REQUEST for viewMessages.php
        //prepare the data for the view page
        $records = getMessages();

        //load the view page
        require 'views/viewMessages.php';
    }

    function showInsertForm() { //GET REQUEST for insertMessages.php
        require 'views/insertMessage.php';
    }

    function handleInsertForm() { //POST REQUEST for insertMessages.php
        //get the form message and insert into DB
        $message = $_POST['message'];
        insertMessage($message);

        //redirect
        header('location: index.php?page=view');
    }
?>