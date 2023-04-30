<?php

if (!function_exists('year')) {
    function year()
    {
        $years = array("1st", "2nd", "3rd", "4th");
        return $years;
    }
}

if (!function_exists('term')) {
    function term()
    {
        $term = array("1st", "2nd");
        return $term;
    }
}
