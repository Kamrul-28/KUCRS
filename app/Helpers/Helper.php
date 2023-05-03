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
if (!function_exists('course_type')) {
    function course_type()
    {
        $course_type = array("Sessional", "Theory");
        return $course_type;
    }
}
if (!function_exists('course_pattern')) {
    function course_pattern()
    {
        $course_pattern = array("Core", "Optional");
        return $course_pattern;
    }
}
if (!function_exists('registration_type')) {
    function registration_type()
    {
        $registration_type = array("Default", "Adjustment");
        return $registration_type;
    }
}
if (!function_exists('customSession')) {
    function customSession()
    {
        $customSession = array("2017-2018", "2018-2019","2020-2021", "2021-2022","2022-2023");
        return $customSession;
    }
}
