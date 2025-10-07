<?php

function solution($A) {
    // Implement your solution here
    $count = count($A);
    if ($count < 3) {
        return 0;
    }
    // Step 1: Find all peaks
    $peaks = [];
    for ($i = 1; $i < $count - 1; $i++) {
        if ($A[$i] > $A[$i - 1] && $A[$i] > $A[$i + 1]) {
            $peaks[] = $i;
        }
    }

    $peaksCount = count($peaks);
    if ($peaksCount <= 1) {
        return $peaksCount;
    }

    // Step 2: Use binary search to find the maximum number of flags
    $maxFlags = 0;
    $left = 1;
    $right = (int) sqrt($count) + 1; // upper bound for flags

    while ($left <= $right) {
        $mid = (int) (($left + $right) / 2);
        $flagsPlaced = 1; // place the first flag at the first peak
        $lastFlagPosition = $peaks[0];

        // Try to place remaining flags
        for ($i = 1; $i < $peaksCount; $i++) {
            if ($peaks[$i] - $lastFlagPosition >= $mid) {
                $flagsPlaced++;
                $lastFlagPosition = $peaks[$i];
                if ($flagsPlaced == $mid) {
                    break;
                }
            }
        }

        if ($flagsPlaced >= $mid) {
            $maxFlags = $mid; // try for more flags
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }

    return $maxFlags;
}

echo solution(array(1,5,3,4,3,4,1,2,3,4,6,2));
//echo solution(array(1,5,3,4,3,4,1,2,3,4));