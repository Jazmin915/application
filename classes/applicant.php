<?php
/**Order class represents all applicants**/

class Applicants
{
    private $_fname;
    private $_lname;
    private $_state;
    private $_phone;
    private $_github;
    private $_experience;
    private $_relocate;
    private $_bio;

    //constructor
    function __construct(){
        $this->_fname = "";
        $this->_lname = "";
        $this->_email = "";
        $this->_state = "";
        $this->_phone = "";
        $this->_github = "";
        $this->_experience = "";
        $this->_relocate = "";
        $this->_bio = "";
    }

    /**
     * getfname returns the name of the applicant
     * @return string
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * setFname sets the first name of the applicant
     * @param $fname string
     *
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * getLname returns the last name of the applicant
     * @return string
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * setLname sets the last name of the applicant
     * @param $lname string
     *
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }
}