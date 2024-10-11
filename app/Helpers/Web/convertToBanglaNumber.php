<?php

namespace App\Helpers;

function convertToBanglaNumber( $number )
 {
    $englishNumbers = [ '0', '1', '2', '3', '4', '5', '6', '7', '8', '9' ];
    $banglaNumbers = [ '০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯' ];
    return str_replace( $englishNumbers, $banglaNumbers, $number );
}
