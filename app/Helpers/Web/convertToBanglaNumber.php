<?php

namespace App\Helpers;

function convertToBanglaNumber( $number )
 {
    $englishNumbers = [ '0', '1', '2', '3', '4', '5', '6', '7', '8', '9' ];
    $banglaNumbers = [ '০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯' ];
    return str_replace( $englishNumbers, $banglaNumbers, $number );
}


if (!function_exists('bnNumber')) {
    function bnNumber($number)
    {
        $search = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $replace = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        return str_replace($search, $replace, $number);
    }
}



