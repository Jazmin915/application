<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/../pdo-config.php');

class DataLayer
{
    //Database connection object

    private $_dbh;

    function __construct()
    {
        try {
            //Instantiate a PDO object by using the PDO constructor
            $this->_dbh = new PDO(DB_DRIVER, USERNAME, PASSWORD);
            //echo "Successful!";
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function insertApplicant($appObj)
    {
        //1. Define the query
        $sql = "INSERT INTO applicant (fname, lname, email, phone, github, experience, relocate, bio, mailing_lists_signup, mailing_list_subsriptions, image)
                VALUES (:fname, :lname, :email, :phone, :github, :experience, :relocate, :bio, :mailing_lists_signup, :mailing_list_subsriptions, :image)";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $fname = $appObj->getFname();
        $lname = $appObj->getLname();
        $email = $appObj->getEmail();
        $phone = $appObj->getPhone();
        $git = $appObj->getGitHub();
        $experience = $appObj->getExperience();
        $relocate = $appObj->getRelocate();
        $bio = $appObj->getBio();
        $mail = "";
        $subscriptions = "";
        $img = "";
        $statement->bindParam(':fname', $fname);
        $statement->bindParam(':lname', $lname);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':phone', $phone);
        $statement->bindParam(':github', $git);
        $statement->bindParam(':experience', $experience);
        $statement->bindParam(':relocate', $relocate);
        $statement->bindParam(':bio', $bio);
        $statement->bindParam(':mailing_lists_signup', $mail);
        $statement->bindParam(':mailing_list_subsriptions', $subscriptions);
        $statement->bindParam(':image', $img);


        //4. Execute the query
        $statement->execute();

        //5. Process the results
    }


    /**
     * this function returns years in the experience page in an array
     * @return string[]
     */
    //experience radio buttons
    static function getYears()
    {
        return array("0-2", "2-4", "4+");
    }

    /**
     * this function returns relocation option in the experience page in an array
     * @return string[]
     */
    static function relocate(){
        return array("Yes", "No", "Maybe");
    }

    /**
     * this function returns jobs in the mailing list page in an array
     * @return string[]
     */
    static function getJob(){
        return array("JavaScript", "HTML", "PHP", "CSS",
            "Java", "ReactJS", "Python", "NodeJS");
    }

    /**
     * this function returns verticals in the mailing list page in an array
     * @return string[]
     */
    static function getIndustry(){
        return array("SaaS", "Industrial Tech", "Health Tech",
            "Cyber Security", "Ag Tech", "Hit Tech");
    }


}
