<?php

// PHP code to determine Length of
// longest consecutive zeroes in the
// binary representation of a number.
function maxZeros($N) // TODO change
{
    // variable to store the length
    // of longest consecutive 0's
    $maxm = -1;

    // to temporary store the
    // of consecutive 0's
    $cnt = 0;

    while ($N) {
        if (!($N & 1)) {
            //echo $N,"/",$maxm,"/",$cnt,"\n";
            $cnt++;
            $N >>= 1;
            $maxm = max($maxm, $cnt);
        } else {
            //echo $N,"/",$maxm,"/",$cnt,"\n";
            $maxm = max($maxm, $cnt);
            $cnt = 0;
            $N >>= 1;
        }
    }
    return $maxm;
}

//$N = 2147483647;
$N = 1041;
$maxZeros = 0;
$value = 0;
for ($x = $N; $x > 0; $x--) {
    $max= maxZeros($x);
    if ($max >$maxZeros) {
        $value = $x;
        $maxZeros = $max;
    }
}
echo $value,"|",$maxZeros,"\n";
// Driver code
//$N = 2147483646;
echo(maxZeros($N));
