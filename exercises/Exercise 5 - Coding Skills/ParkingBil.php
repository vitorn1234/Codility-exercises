<?php

function solution($E, $L) {
    // Implement your solution here
    $entryTime = explode(':', $E);
    $totalMinutes = (int)$entryTime[0] * 60 + (int)$entryTime[1];
    $exitTime = explode(':', $L);
    $totalMinutes2 = (int)$exitTime[0] * 60 + (int)$exitTime[1];

    if ($totalMinutes2 < $totalMinutes) {
        $totalHours = (int)ceil((24*60 - $totalMinutes +  $totalMinutes2)/60);
    } else{
        $totalHours = (int)ceil(($totalMinutes2 - $totalMinutes)/60);
    }

    return 2 + $totalHours*4 -1;
}

echo solution('10:00', '13:21');
echo solution("09:42","11:42");
echo solution("23:42","01:42");