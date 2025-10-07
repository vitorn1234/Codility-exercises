<?php

function solution($S) {
    $arrayWords = explode(" ", $S);
    $size=-1;
    $validPassword = "";
    foreach ($arrayWords as $v) {
        $currentSize = strlen($v);
        // check valid symbols  (a−z, A−Z, 0−9);
        if (!preg_match('/^[a-zA-Z0-9]+$/', $v))
        {
            continue;
        }
        //  check if it's odd
//        if ($currentSize % 2 == 0){
//            continue;
//        }

        //  check if letters are even
        $countLetters = preg_match_all('/[a-zA-Z]/', $v, $matches);
        if ($countLetters !=0  && $countLetters % 2 != 0){
            continue;
        }
//        echo $countLetters,$countLetters % 2;
        // check uf digits are even
        $countDigits = preg_match_all('/\d/', $v, $matches);
        if ($countDigits !=0  && $countDigits % 2 == 0){
            continue;
        }

        if ($currentSize > $size  && $countDigits >= 1) {
            $size = $currentSize;
            $validPassword = $v;
        }
    }

    return $size;
}


//echo solution("test 5 a0A pass007 ?xy1");
//echo solution('zxcasdqwe123');
echo solution('asdf! 3ab qqqq adw3');
