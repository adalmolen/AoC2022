<?php
$pairs = 0;
$clean = fopen("clean.txt", "r");
while (($line = fgets($clean)) !== false) {
    echo ($line);
    $areas = explode(',', $line);
    $group1 = explode('-', $areas[0]);
    $group2 = explode('-', $areas[1]);
    $g1 = range($group1[0], $group1[1]);
    $g2 = range($group2[0], $group2[1]);
    
    if (!array_diff($g2, $g1)){
        $pairs = $pairs+1;
        echo "YES! ";
    } elseif (!array_diff($g1, $g2)){
        $pairs = $pairs+1;
        echo "YES! ";
    } else {
        echo "NO! ";
    }
    echo $pairs."<br>";
}
echo $pairs;