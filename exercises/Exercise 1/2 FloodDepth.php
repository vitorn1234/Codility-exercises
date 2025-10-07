<?php

function solution($A)
{
//    // Implement your solution here
//    $count = count($A);
//    $tempWater =array();
//    foreach ($A as $key =>$value) {
//        if ($key == 0 || $key == $count-1) {
//            //echo 0,"-", 0,"-", $value, "\n";
//            $tempWater[$key]= 0;
//            continue;
//        }
//        // First part
//        $firstPart = max(array_slice($A, 0, $key));
//        // Second part
//        $secondPart = max(array_slice($A, $key+1));
//        //$max= max($firstPart, $secondPart);
//        $min = min($firstPart, $secondPart);
//        //echo "-", $min,"-", $value, "\n";
//        $tempWater[$key] = 0;
//        if ( $min > $value ){
//            $tempWater[$key] = $min-$value;
//           // echo "water", $tempWater[$key], "\n";
//        }
//    }
//   // return $tempWater;
//    //return array_sum($tempWater);
//    return max($tempWater);
    $n = count($A);
    if ($n == 0) return 0;

    $leftMax = array_fill(0, $n, 0);
    $rightMax = array_fill(0, $n, 0);

    // Precompute max height to the left of each position
    $maxLeft = 0;
    for ($i = 0; $i < $n; $i++) {
        $maxLeft = max($maxLeft, $A[$i]);
        $leftMax[$i] = $maxLeft;
        //print_r($leftMax);
    }

    // Precompute max height to the right of each position
    $maxRight = 0;
    for ($i = $n - 1; $i >= 0; $i--) {
        $maxRight = max($maxRight, $A[$i]);
        $rightMax[$i] = $maxRight;
        //print_r($maxRight);
    }

    // Calculate total trapped water
    // Find the maximum volume in a single pond
    $maxVolume = 0;
    for ($i = 0; $i < $n; $i++) {
        $waterAtPosition = min($leftMax[$i], $rightMax[$i]) - $A[$i];
        if ($waterAtPosition > $maxVolume) {
            $maxVolume = $waterAtPosition;
        }
    }

    return $maxVolume;
}


echo solution([1, 3, 2, 1, 2, 1, 5, 3, 3, 4, 2]);
//echo solution('zxcasdqwe123');
