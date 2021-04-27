<?php
// controller for the diner project

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once ('vendor/autoload.php');

// instantiate Fat-Free
$f3 = Base::instance();

// define routes
$f3->route('GET /', function (){
    // instantiate a view object
    $view = new Template();
    echo $view->render('views/home.html');
});

//
$f3->route('GET /breakfast', function (){
    // instantiate a view object
    //$view = new Template();
    //echo $view->render('views/home.html');
    echo "<h2>What's for breakfast?</h2>";
});

// run Fat-Free
$f3->run();