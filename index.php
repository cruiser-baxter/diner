<?php
// controller for the diner project

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// start session
session_start();

require_once ('vendor/autoload.php');

// instantiate Fat-Free
$f3 = Base::instance();

// define routes
$f3->route('GET /', function (){
    // instantiate a view object
    $view = new Template();
    echo $view->render('views/home.html');
});

// breakfast view
$f3->route('GET /breakfast', function (){
    // instantiate a view object
    $view = new Template();
    echo $view->render('views/breakfast.html');
});

// lunch view
$f3->route('GET /lunch', function (){
    // instantiate a view object
    $view = new Template();
    echo $view->render('views/lunch.html');
});

// order 1 view
$f3->route('GET|POST /order1', function (){
    // if form submitted store data in session array
    // send user to the next order form
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['food'] = $_POST['food'];
        $_SESSION['meal'] = $_POST['meal'];
        header('location: order2');
    }

    // instantiate a view object
    $view = new Template();
    echo $view->render('views/order1.html');
});

// order 2 view
$f3->route('GET|POST /order2', function (){
    // if form submitted store data in session array
    // send user to the next order form
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['conds'] = implode(", ", $_POST['conds']);

        header('location: summary');
    }
    // instantiate a view object
    $view = new Template();
    echo $view->render('views/order2.html');
});

// order summary view
$f3->route('GET|POST /summary', function (){
    // instantiate a view object
    $view = new Template();
    echo $view->render('views/summary.html');
});

// run Fat-Free
$f3->run();