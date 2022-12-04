<?php
$overlap = 0;
$clean = fopen("clean.txt", "r");
while (($line = fgets($clean)) !== false) {
    echo ($line);
    $areas = explode(',', $line);
    $group1 = explode('-', $areas[0]);
    $group2 = explode('-', $areas[1]);
    $g1 = range($group1[0], $group1[1]);
    $g2 = range($group2[0], $group2[1]);
    $c =  array_intersect($g1, $g2);
    if (count($c) > 0) {
        $overlap = $overlap +1;
    }
}
echo $overlap;