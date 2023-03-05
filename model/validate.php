<?php

Class Validate
{
    //function to check if all name is alphabetic
    static function validName($fname)
    {
        /*if (ctype_alpha($name)){
            return true;
        }
        else {
            return false;
        }*/

        //shorter way of writing
        return ctype_alpha($fname);
    }

    //checking that the github link is a valid URL
    static function validGithub($github)
    {
        return filter_var($github, FILTER_VALIDATE_URL);
    }

    static function validEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    static function validPhone($phone)
    {
        return filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    }

    static function validExperienceBio($biography){

        return is_string($biography);
    }

    static function validExperience($year) {

        return in_array($year, DataLayer::getYears());
    }

    static function validSelectionsJobs($jobSelected): bool
    {

        $validOptions = DataLayer::getJob();
        foreach ($jobSelected as $option) {
            if (!in_array($option, $validOptions)) {
                return false;
            }
        }
        return true;
        /*
                if (in_array($jobSelected, getJob())){
                    return true;
                } else {
                    return false;
                }*/


    }

    static function validSelectionsVerticals($industrySelected)
    {
        $validOptions = DataLayer::getIndustry();
        foreach ($industrySelected as $option) {
            if (!in_array($option, $validOptions)) {
                return false;
            }
        }
        return true;
    }
}
