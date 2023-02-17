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