<?php


function groupByOwners(array $files): array
{
    $temp = array();
    foreach ($files as $key => $value) {
        $temp[$value][] = $key;
}

    return $temp;
}

$files = array(
    "Input.txt" => "Randy",
    "Code.py" => "Stan",
    "Output.txt" => "Randy"
);
var_dump(groupByOwners($files));