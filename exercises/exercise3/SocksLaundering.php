<?php

function solution($K, $C, $D) {
    // Implement your solution here
    $wash = 0;
    $clean=count($C);
    $cleanPair = 0;
    $cleanArray=[];
    for ($i = 0; $i < $clean; $i++) {
        if (!isset($cleanArray[$C[$i]])) {
            $cleanArray[$C[$i]] = 0;
        }
        $cleanArray[$C[$i]]++;
        if ($cleanArray[$C[$i]] >= 2) {
            $cleanPair++;
            $cleanArray[$C[$i]] = $cleanArray[$C[$i]] -2;
        }
    }

    $dirtyArray= array();
    $dirty=count($D);
    for ($i = 0; $i < $dirty; $i++) {
        if (!isset($dirtyArray[$D[$i]])) {
            $dirtyArray[$D[$i]] = 0;
        }
        $dirtyArray[$D[$i]]++;
    }

    foreach ($cleanArray as $key => $clean) {
        if ($clean == 0) { continue;}
        if ($wash == $K) { break;}
        if(isset($dirtyArray[$key]) && $dirtyArray[$key] > 0){
            $dirtyArray[$key]--;
            $cleanPair++;
            $wash++;
        }
    }

    if($K-$wash <2){
        return $cleanPair;
    }
    foreach ($dirtyArray as $dirty) {
        if ($wash == $K) { break;}
        while ($dirty >= 2 && ($K-$wash >=2)) {
            $wash= $wash+2;
            $dirty = $dirty -2;
            $cleanPair++;
        }
        if ($K-$wash <2){
            break;
        }
    }

    return $cleanPair;
}


echo solution(2,[1,2,1,1],[1,4,3,2,4]);
echo "\n";
echo solution(6,[1,2,1,1],[1,4,3,2,4]);
echo "\n";
echo solution(1, [1], [4]);
echo "\n";