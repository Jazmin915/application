<?php
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();
/*if( empty(session_id()) && !headers_sent()){
    session_start();
}*/

// Require the autoload file
require_once('vendor/autoload.php');
require_once('model/data-layer.php');
require_once('model/validate.php');



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

// Define route ("personal info page" for 328/application/personal)
$f3->route('GET|POST /personal', function ($f3) {

    //var_dump($_POST);
    //If the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Move data from POST array to SESSION array
        //$_SESSION['name'] = $_POST['name'];
        $_SESSION['last'] = $_POST['last'];
        //$_SESSION['email'] = $_POST['email'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['phone'] = $_POST['phone'];

        $name = trim($_POST['name']);
        if(empty($_POST['name'])){
            $f3->set('errors["name"]',
                    'This section must be filled');
        }
        //validating the name is all alphabet
        if(validName($name)) {
            $_SESSION['name'] = $name;
        } //if its not valid create a variable to store the error message
        else {
            $f3->set('errors["name"]',
                'Name must have alphabetical characters only');
        }

        //validating the email
        $email = $_POST['email'];
        if(validEmail($email)) {
            $_SESSION['email'] = $email;
        } // else give an error message
        else {
            $f3->set('errors["email"]',
                    'Please enter a valid email');
        }

        //validating phone
        $phone = $_POST['phone'];
        if(validPhone($phone)) {
            $_SESSION['phone'] = $phone;
        } // else give an error message
        else {
            $f3->set('errors["phone"]',
                'Please enter a valid phone number');
        }

        //if there are no errors go to next page
        if (empty($f3->get('errors'))){
            $f3->reroute('experience');
        }

    }

    //Instantiate a view
    $view = new Template();
    echo $view->render("views/personal.html");
});

// Define route ("experience/biography page" for 328/application/experience)
$f3->route('GET|POST /experience', function ($f3) {

    //If the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Move data from POST array to SESSION array
        $_SESSION['biography'] = $_POST['biography'];
        //$_SESSION['github'] = $_POST['github'];
        $_SESSION['experience'] = $_POST['experience'];
        $_SESSION['relocate'] = $_POST['relocate'];


        $github = trim($_POST['github']);
        //validating the name is all alphabet
        if(validGithub($github)) {
            $_SESSION['github'] = $github;
        } //if its not valid create a variable to store the error message
        else {
            $f3->set('errors["github"]',
                'Must be a valid GitHub URL');
        }

        //if there are no errors go to next page
        if (empty($f3->get('errors'))){
            $f3->reroute('openings');
        }

    }

    //adding the radio buttons data to the hive----------
    //Add years exp to the hive
    $f3->set('years', getYears());
    //add relocation to the hive
    $f3->set('relocate', relocate());

    //Instantiate a view
    $view = new Template();
    echo $view->render("views/experience.html");
});

// Define route ("job openings page" for 328/application/job-openings)
$f3->route('GET|POST /openings', function ($f3) {

    //If the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Move data from POST array to SESSION array
        $_SESSION['jobSelected'] = implode(", ",$_POST['jobSelected']); //jobs is the name tag we set in out html
        $_SESSION['industrySelected'] = implode(", ",$_POST['industrySelected']);

        //validate the job selection
        $jobSelected = $_POST['jobSelected'];
        if(validSelectionsJobs($jobSelected)){
            $_SESSION['jobSelected'] = $jobSelected;
        } else {
            $f3->set('errors["jobSelected"]',
                    'Job Selection is invalid!!!');
        }

        //if there are no errors go to next page
        if (empty($f3->get('errors'))){
            $f3->reroute('summary');
        }


        //redirect to personal page
        //$f3->reroute('summary');
    }

    //adding to the hive
    $f3->set('jobs', getJob());
    $f3->set('industry', getIndustry());

    //Instantiate a view
    $view = new Template();
    echo $view->render("views/job-openings.html");
});

// Define route ("job openings page" for 328/application/summary)
$f3->route('GET /summary', function () {

    //Instantiate a view

    $view = new Template();
    echo $view->render("views/summary.html");
});

//Run Fat-free
$f3->run();
// Java -> f3.run();