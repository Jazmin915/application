<!--
Author: Jazmin Gonzalez
Date: 1/20/23
File: index.php
Description: this is my controller for the application project-->

<?php

// Turn on error reporting
ini_set('display_errors', 1);

error_reporting(E_ALL);

// Require the autoload file
require_once('vendor/autoload.php');

// Create an instance of the Base class (instantiate F3 base class)
$f3 = Base::instance();
// Java equivalent -> Base f3 = new Base();

// Define a default route ("home page" for 328/application)
//this is what the user sees when they go to the main directory
$f3->route('GET /', function () {

    //Instantiate a view
    //Template is a class in the fat free framework
    $view = new Template();
    echo $view->render("views/home.html");
});

//Run Fat-free
$f3->run();
// Java -> f3.run();