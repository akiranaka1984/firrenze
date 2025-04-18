<?php

if (!function_exists('is_in_array')) {
    function is_in_array($needle, $haystack) {
        return in_array($needle, $haystack);
    }
}

if (!function_exists('contains_in_array')) {
    function contains_in_array($input, $str) {
        foreach($input as $imp){
            if (strpos($imp, $str) !== false) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('is_saturday')) {
    function is_saturday($str) {
        $jadays = array('日','月','火','水','木','金','土');
        if($jadays[date('N', strtotime($str))-1] == '金'){
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('is_sunday')) {
    function is_sunday($str) {
        $jadays = array('日','月','火','水','木','金','土');
        if($jadays[date('N', strtotime($str))-1] == '土'){
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('check_saturday')) {
    function check_saturday($date) {
        // 日付が土曜日であるかを確認
        return date('N', strtotime($date)) == 6;
    }
}

if (!function_exists('check_sunday')) {
    function check_sunday($date) {
        // 日付が日曜日であるかを確認
        return date('N', strtotime($date)) == 7;
    }
}

?>