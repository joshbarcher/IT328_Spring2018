<?php
    function welcome() {
        echo 'hello!';
    }

    function printSaying() {
        //gather up the data needed

        //show the view
        echo Template::instance()->render('views/saying.php');
    }

    function printSpecificSaying($fatFree, $message) {
        //save a value as a "router variable"
        $fatFree->set('message', $message);

        echo Template::instance()->render('views/specificSaying.php');
    }

    function calculatePrimes($fatFree, $low, $high) {
        $primes = findPrimes($low, $high);

        //save our data to the router
        $fatFree->set('primes', $primes);

        //load the page
        echo Template::instance()->render('views/primes.php');
    }

    function performTests($fatFree) {
        //get the data
        $carOwners = array(
            'Josh' => 'Nissan Altima',
            'Conner' => 'Honda Civic',
            'Alex' => 'Toyota Corrolla'
        );

        $fatFree->set('owners', $carOwners);
        $fatFree->set('cat', '<strong>garfield</strong>');

        //load the view
        echo Template::instance()->render('views/test.php');
    }
?>








