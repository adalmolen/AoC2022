<?php
$day01 = fopen("day01.txt", "r");
$line = fgets($day01);
$chars = str_split($line);
$floor = 0;
$position = 1;
foreach($chars as $char){
    if($char=="(") $floor+=1;
    if($char==")") $floor-=1;
    if($floor == -1){
        echo "Santa hit basement on position: ".$position."<br>";
        break;
    } else {
        $position++;
    }
}
echo "Santa is on floor: ".$floor;