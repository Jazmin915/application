<?php
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);


// Require the autoload file
require_once('vendor/autoload.php');
require_once('model/data-layer.php');

//Start a session
session_start();

//test code for applicant class
/*$applicant1 = new Applicant();
$applicant1->setFname("Rodney");
echo $applicant1->getFname();
var_dump($applicant1);*/


// Create an instance of the Base class (instantiate F3 base class)
$f3 = Base::instance();
// Java equivalent -> Base f3 = new Base();

//Instantiate a Controller object
$con = new Controller($f3);

// Define a default route ("home page" for 328/application)
//this is what the user sees when they go to the main directory
$f3->route('GET /', function () {

    $GLOBALS['con']->home();

});

// Define route ("personal info page" for 328/application/personal)
$f3->route('GET|POST /personal', function ($f3) {

    $GLOBALS['con']->personal();

});

// Define route ("experience/biography page" for 328/application/experience)
$f3->route('GET|POST /experience', function ($f3) {

    $GLOBALS['con']->experience();
});

// Define route ("job openings page" for 328/application/job-openings)
$f3->route('GET|POST /openings', function ($f3) {

    $GLOBALS['con']->openings();

});

// Define route ("job openings page" for 328/application/summary)
$f3->route('GET /summary', function () {

    $GLOBALS['con']->summary();

});

//Run Fat-free
$f3->run();
// Java -> f3.run();