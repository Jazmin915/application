<?php

class DataLayer
{
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

    //checkboxes on Job Opening page
    /*function getJob(){
        return array("JS"=>"JavaScript", "Html"=>"HTML", "php"=>"PHP", "css"=>"CSS",
                    "java"=>"Java", "react"=>"ReactJS", "python"=>"Python", "node"=>"NodeJS");
    }*/

    /**
     * this function returns jobs in the mailing list page in an array
     * @return string[]
     */
    static function getJob(){
        return array("JavaScript", "HTML", "PHP", "CSS",
            "Java", "ReactJS", "Python", "NodeJS");
    }

    /*function getIndustry(){
        return array("saas"=>"SaaS", "indTech"=>"Industrial Tech", "htech"=>"Health Tech",
                        "cyber"=>"Cyber Security", "ag"=>"Ag Tech", "hit"=>"Hit Tech++");
    }*/

    /**
     * this function returns verticals in the mailing list page in an array
     * @return string[]
     */
    static function getIndustry(){
        return array("SaaS", "Industrial Tech", "Health Tech",
            "Cyber Security", "Ag Tech", "Hit Tech");
    }


}
