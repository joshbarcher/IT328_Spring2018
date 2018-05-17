<?php
    //turn on some global settings
    error_reporting(E_ALL);

    //global includes
    require 'model/model.php';
    require 'controllers/controller.php';

    //load the fat free framework
    $fatFree = require 'vendor/bcosca/fatfree-core/base.php';

    $fatFree->set('ONERROR', function($fatFree) {
        echo $fatFree->get('ERROR.text');
    });

    //define some routes
    $fatFree->route('GET /', function() {
        welcome();
    });

    $fatFree->route('GET /favoriteSaying', function() {
        printSaying();
    });

    $fatFree->route('GET /saying/@message', function ($fatFree, $params) {
        printSpecificSaying($fatFree, $params['message']);
    });

    $fatFree->route('GET /primes/@low/@high', function ($fatFree, $params) {
        calculatePrimes($fatFree, $params['low'], $params['high']);
    });

    //test the templating language of Fat Free
    $fatFree->route('GET /test', function($fatFree) {
        performTests($fatFree);
    });

    $fatFree->run();
?>