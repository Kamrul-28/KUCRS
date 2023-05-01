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

if (!function_exists('course_category')) {
    function course_category()
    {
        $course_category = array("Undergraduate", "Graduate", 'M.Phil', 'Ph.D');
        return $course_category;
    }
}
