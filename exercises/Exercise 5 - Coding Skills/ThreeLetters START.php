<?php

function solution($A, $B)
{
    // Implement your solution here
    $final = "";
    //$max =float($B -$A)/2;
    while ($A>0 || $B>0) {
        $last = !empty($final) ? substr($final, -1) : ($A >= $B ? "b" : "a");
        if ($A > 0 &&
            ($last != "a" || $B == 0)) {
            //echo "---A---",$A ,"---", $B,"--l-",$last,"-f---",$final,"\n";
            $final .= "a";$A = $A - 1;
            if ($A > $B && $A >0) {
                $final .= "a";
                $A = $A - 1;
            }

        } else if ($B > 0 &&
            ($last != "b" || $A == 0)) {
            //echo "---B---",$A ,"---", $B,"--l-",$last,"-f---",$final,"\n";
            $final .= "b";
            $B = $B - 1;
            if ($B > $A && $B >0) {
                $final .= "b";
                $B = $B - 1;
            }

        }
    }
    return $final;
}


echo solution(5, 3);
echo "\n";
echo solution(3, 3);
echo "\n";
echo solution(1, 4);
echo "\n";
echo solution(1, 9);
echo "\n";
echo solution(3, 1);
