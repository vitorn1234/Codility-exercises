<?php

function solution2($N)
{
    // variable to store the length
    // of longest consecutive 0's
    $maxm = 0;

    // to temporary store the
    // of consecutive 0's
    $cnt = 0;

    $gapsBefore = 0;
    $gapsAfter = 0;
    $gaps = 0;
    $maxmPrevious = 0;
    while ($N) {
        if (!($N & 1)) {
            $cnt++;
            $N >>= 1;
            $maxm = max($maxm, $cnt);
            echo "--------",$N,"|",$maxm,"|",$cnt,"|",$gapsBefore,"\n";
        } else {
//            if ($gapsBefore == 0) {
//                $gapsBefore = 1;
//            } else if ($gapsBefore == 1 && $gapsAfter == 1) {
//                $gapsBefore = 1; $gapsAfter  = 0;
//            } else if ($gapsBefore == 1 && $gapsAfter == 1) {
//                $gapsAfter= 1;
//            }
            $gaps ++;
            $maxm = max($maxm, $cnt);
            $cnt = 0;
            $N >>= 1;
            echo "--------",$N,"|",$maxm,"|",$cnt,"|",$gapsBefore,"\n";
        }
    }
    if ($gaps < 2) { return 0; }
    return $maxm;
}

function solution($N)
{
// Convert the number to a binary string
    $binaryStr = decbin($N);

    $maxZeros = 0;
    $currentCount = 0;
    $insideSequence = false;

    for ($i = 0; $i < strlen($binaryStr); $i++) {
        $char = $binaryStr[$i];

        if ($char === '1') {
            if ($insideSequence) {
                // End of a zero sequence bounded by 1s
                $maxZeros = max($maxZeros, $currentCount);
            } else {
                // Start of a new sequence
                $insideSequence = true;
            }
            $currentCount = 0;
        } elseif ($char === '0') {
            if ($insideSequence) {
                // Count zeros only if bounded by 1s
                $currentCount++;
            }
        }
        // Ignore other characters (not expected in binary)
    }

    return $maxZeros;
}


echo(solution(  51712  ));