<?php
/**Order class represents all applicants**/

class Applicant
{
    private $_fname;
    private $_lname;
    private $_email;
    private $_state;
    private $_phone;
    private $_github;
    private $_experience;
    private $_relocate;
    private $_bio;

    //constructor
    function __construct($fname="", $lname="", $email="", $state="", $phone="", $github="", $experience="", $relocate="", $bio="" ){
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_email = $email;
        $this->_state = $state;
        $this->_phone = $phone;
        $this->_github = $github;
        $this->_experience = $experience;
        $this->_relocate = $relocate;
        $this->_bio = $bio;
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

    /**
     * getEmail returns the email name of the applicant
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * getEmail sets the email of the applicant
     * @param $email string
     *
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * getEmail returns the email name of the applicant
     * @return string
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * getEmail sets the email of the applicant
     * @param $state string
     *
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * getPhone returns the email name of the applicant
     * @return string
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * getPhone sets the email of the applicant
     * @param $phone string
     *
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * getGitHub returns the email name of the applicant
     * @return string
     */
    public function getGitHub()
    {
        return $this->_github;
    }

    /**
     * getGitHub sets the email of the applicant
     * @param $github string
     *
     */
    public function setGitHub($github)
    {
        $this->_github = $github;
    }

    /**
     * getExperience returns the email name of the applicant
     * @return string
     */
    public function getExperience()
    {
        return $this->_experience;
    }

    /**
     * getExperience sets the email of the applicant
     * @param $expereince string
     *
     */
    public function setExperience(string $expereince)
    {
        $this->_experience = $expereince;
    }

    /**
     * getRelocate returns the email name of the applicant
     * @return string
     */
    public function getRelocate()
    {
        return $this->_relocate;
    }

    /**
     * getRelocate sets the email of the applicant
     * @param $relocate string
     *
     */
    public function setRelocate(string $relocate)
    {
        $this->_relocate = $relocate;
    }

    /**
     * getBio returns the email name of the applicant
     * @return string
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * getBio sets the email of the applicant
     * @param $bio string
     *
     */
    public function setBio(string $bio)
    {
        $this->_bio = $bio;
    }
}