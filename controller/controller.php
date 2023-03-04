<?php
class Controller
{
    //Field that represents FatFree object
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        //Instantiate a view
        $view = new Template();
        echo $view->render("views/home.html");
    }

    function personal()
    {
        //If the form has been submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Creating an Applicant object
            $newApplicant = new Applicant();

            //Move data from POST array into object then into Session array
            //$_SESSION['name'] = $_POST['name'];
            //$_SESSION['last'] = $_POST['last'];
            //$_SESSION['email'] = $_POST['email'];
            //$_SESSION['state'] = $_POST['state'];

            //data to add to the Applicant object
            $last = $_POST['last'];
            $newApplicant->setLname($last);

            $state = $_POST['state'];
            $newApplicant->setState($state);


            $fname = trim($_POST['fname']);
            if(empty($_POST['fname']) || empty($_POST['last'])){
                $this->_f3->set('empty["fname"]',
                    'This section must be filled');
            }
            //validating the name is all alphabet
            if(Validate::validName($fname)) {
                //$_SESSION['fname'] = $fname;
                $newApplicant->setFname($fname);
            } //if its not valid create a variable to store the error message
            else {
                $this->_f3->set('errors["fname"]',
                    'Name must have alphabetical characters only');
            }

            //validating the email
            $email = $_POST['email'];
            if(Validate::validEmail($email)) {
                $newApplicant->setEmail($email);
                //$_SESSION['email'] = $email;
            } // else give an error message
            else {
                $this->_f3->set('errors["email"]',
                    'Please enter a valid email');
            }

            //validating phone
            $phone = $_POST['phone'];
            if(Validate::validPhone($phone)) {
                $newApplicant->setPhone($phone);
                //$_SESSION['phone'] = $phone;
            } // else give an error message
            else {
                $this->_f3->set('errors["phone"]',
                    'Please enter a valid phone number');
            }

            //if there are no errors go to next page
            if (empty($this->_f3->get('errors'))){
                //if there are no errors, put the newApplicant object into a session array
                $_SESSION['newApplicant'] = $newApplicant;
                $this->_f3->reroute('experience');
            }
        }
        //Instantiate a view
        $view = new Template();
        echo $view->render("views/personal.html");
    }

    function experience()
    {
        //If the form has been submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Move data from POST array to SESSION array
            //$_SESSION['biography'] = $_POST['biography'];
            //$_SESSION['github'] = $_POST['github'];
            //$_SESSION['experience'] = $_POST['experience'];
            $_SESSION['relocate'] = $_POST['relocate'];


            $biography= $_POST['biography'];
            if(Validate::validExperienceBio($biography)){ //if valid meal then put it in the session array
                //$newApplicant->setBio($biography);
                $_SESSION['biography'] = $biography;
            } else {
                $this->_f3->set('errors["biography"]',
                    'Please enter your bio');
            }


            //Validate the years exp
            $year= $_POST['year'];
            if(Validate::validExperience($year)){ //if valid meal then put it in the session array
                $_SESSION['year'] = $year;
            } else {
                $this->_f3->set('errors["year"]',
                    'experience is invalid');
            }

            $github = trim($_POST['github']);
            //validating the name is all alphabet
            if(Validate::validGithub($github)) {
                $_SESSION['github'] = $github;
            } //if its not valid create a variable to store the error message
            else {
                $this->_f3->set('errors["github"]',
                    'Must be a valid GitHub URL');
            }

            //if there are no errors go to next page
            if (empty($this->_f3->get('errors'))){
                $this->_f3->reroute('openings');
            }

        }

        //adding the radio buttons data to the hive----------
        //Add years exp to the hive
        $this->_f3->set('years', getYears());
        //add relocation to the hive
        $this->_f3->set('relocate', relocate());

        //Instantiate a view
        $view = new Template();
        echo $view->render("views/experience.html");
    }

    function openings()
    {
        //If the form has been submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Move data from POST array to SESSION array
            $_SESSION['jobSelected'] = implode(", ",$_POST['jobSelected']); //jobs is the name tag we set in out html
            $_SESSION['industrySelected'] = implode(", ",$_POST['industrySelected']);

            //validate the job selection
            $jobSelected = $_POST['jobSelected'];
            if(Validate::validSelectionsJobs($jobSelected)){
                $_SESSION['jobSelected'] = $jobSelected;
            } else {
                $this->_f3>set('errors["jobSelected"]',
                    'Job Selection is invalid!!!');
            }

            //validate the industry selection
            $industrySelected = $_POST['industrySelected'];
            if(Validate::validSelectionsVerticals($industrySelected)){
                $_SESSION['industrySelected'] = $industrySelected;
            } else {
                $this->_f3->set('errors["industry"]',
                    'Industry Selection is invalid!!!');
            }

            //if there are no errors go to next page
            if (empty($this->_f3->get('errors'))){
                $this->_f3->reroute('summary');
            }


            //redirect to personal page
            //$f3->reroute('summary');
        }

        //adding to the hive
        $this->_f3->set('jobs', getJob());
        $this->_f3->set('industry', getIndustry());

        //Instantiate a view
        $view = new Template();
        echo $view->render("views/job-openings.html");
    }

    function summary()
    {
        //Instantiate a view
        $view = new Template();
        echo $view->render("views/summary.html");
    }
}