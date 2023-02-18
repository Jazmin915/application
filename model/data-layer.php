<?php

    //experience radio buttons
    function getYears(){
        return array("0-2", "2-4", "4+");
    }

    function relocate(){
        return array("Yes", "No", "Maybe");
    }

    //checkboxes on Job Opening page
    /*function getJob(){
        return array("JS"=>"JavaScript", "Html"=>"HTML", "php"=>"PHP", "css"=>"CSS",
                    "java"=>"Java", "react"=>"ReactJS", "python"=>"Python", "node"=>"NodeJS");
    }*/

    function getJob(){
        return array("JavaScript", "HTML", "PHP", "CSS",
        "Java", "ReactJS", "Python", "NodeJS");
    }

    function getIndustry(){
        return array("saas"=>"SaaS", "indTech"=>"Industrial Tech", "htech"=>"Health Tech",
                        "cyber"=>"Cyber Security", "ag"=>"Ag Tech", "hit"=>"Hit Tech++");
    }

