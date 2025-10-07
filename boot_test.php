<?php
// https://www.testdome.com/library?page=1&term=PHP&questionId=134849

/**
 * @param array $gameMatrix
 * @param int $fromRow
 * @param int $fromColumn
 * @param int $toRow
 * @param int $toColumn
 * @return boolean The destination is reachable or not
 */
function canTravelTo(array $gameMatrix, int $fromRow, int $fromColumn,
                     int $toRow, int $toColumn) : bool
{
    // Check if start and end are land or outside bound
    if ( !isset($gameMatrix[$fromRow][$fromColumn]) || !isset($gameMatrix[$toRow][$toColumn])) {
       // echo "out of bound";
        return false;
    }

    if ($fromRow == $toRow) {
        $direction =  $toColumn > $fromColumn ? 1: -1;
        $finish= $toColumn;
        $i= $fromColumn;
        echo $direction,"\n",$i,"\n",$finish,"\n";
        while ($i-$direction != $finish){
            $i = $i+$direction;
            echo "\n",$fromRow,":",$i,"::",$finish,"\n";
            if (!isset($gameMatrix[$fromRow][$i]) || !$gameMatrix[$fromRow][$i]) return false;
        }
    }

    if ($fromColumn == $toColumn) {
        $direction =  $toRow > $fromRow ? 1: -1;
        $finish= $toRow;
        $i=  $fromRow;
        //echo $direction,"\n",$i,"\n",$finish,"\n";
        while ($i != $finish){
            $i = $i+$direction;
            //echo "\n",$fromColumn,":",$i,"::",$finish,"\n";
            if ( !isset($gameMatrix[$i][$fromColumn]) || !$gameMatrix[$i][$fromColumn]) return false;
        }
    }

    return true;
}

$gameMatrix = [
    [false, true,  true,  false, false, false],
    [true,  true,  true,  false, false, false],
    [true,  true,  true,  true,  true,  true],
    [false, true,  true,  false, true,  true],
    [false, true,  true,  true,  false, true],
    [false, false, false, false, false, false],
];

//echo $gameMatrix[0][1] ? 'true' : 'false';
//echo canTravelTo($gameMatrix, 3, 2, 2, 2) ? "true\n" : "false\n"; // true, Valid move
echo canTravelTo($gameMatrix, 3, 2, 3, 4) ? "true\n" : "false\n"; // false, Can't travel through land
//echo canTravelTo($gameMatrix, 3, 2, 6, 2) ? "true\n" : "false\n"; // false, Out of bounds
//echo canTravelTo($gameMatrix, 3, 2, 5, 2) ? "true\n" : "false\n"; // false,  Can't travel through land
//echo canTravelTo($gameMatrix, 3, 2, 3, 6) ? "true\n" : "false\n"; // false,  Can't travel through land
