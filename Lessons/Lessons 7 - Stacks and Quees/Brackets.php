<?php

function solution($S)
{
    // Implement your solution here
    $count = strlen($S);
    $openPositionArray = array();
    $countPositions = 0;
    for ($i = 0; $i < $count; $i++) {
        //echo $S[$i];
        // print_r($openPositionArray);print_r($countPositions);
        if ($S[$i] == "[" || $S[$i] == "(" || $S[$i] == "{") {
            $openPositionArray[$countPositions] = $S[$i];
            $countPositions++;
            continue;
        }
        if (!empty($openPositionArray) &&
            (($S[$i] == "]" && $openPositionArray[$countPositions - 1] == "[")
                || ($S[$i] == ")" && $openPositionArray[$countPositions - 1] == "(")
                || ($S[$i] == "}" && $openPositionArray[$countPositions - 1] == "{"))) {
            unset($openPositionArray[$countPositions - 1]);
            $countPositions--;
            continue;
        } else {
            return 0;
        }
    }
    if (!empty($openPositionArray)) {
        return 0;
    }
    return 1;
}


echo solution("{[()()]}");
echo solution("([)()]");