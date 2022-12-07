<?php
$day01 = fopen("day01.txt", "r");
$line = fgets($day01);
$chars = str_split($line);
$floor = 0;
foreach($chars as $char){
    if($char=="(") $floor+=1;
    if($char==")") $floor-=1;
}
echo "Santa is on floor: ".$floor;