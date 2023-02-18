<?php
    //function to check if all name is alphabetic
    function validName($name)
    {
        /*if (ctype_alpha($name)){
            return true;
        }
        else {
            return false;
        }*/

        //shorter way of writing
        return ctype_alpha($name);
    }

    //checking that the github link is a valid URL
    function validGithub($github)
    {
        return filter_var($github, FILTER_VALIDATE_URL);
    }

    function validEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function validPhone($phone)
    {
        return filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    }

    function validSelectionsJobs($jobSelected)
    {

        $validOptions = getJob();
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