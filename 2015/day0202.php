<?php
$day02 = fopen("day02.txt", "r");
$total = 0;
$ribbon = 0;
while(($line = fgets($day02)) !== FALSE){
    $dimensions = explode("x",str_replace(array("\r", "\n"), '', $line)); //l,w,h
    $lw = $dimensions[0]*$dimensions[1];
    $wh = $dimensions[1]*$dimensions[2];
    $hl = $dimensions[2]*$dimensions[0];
    $low = min($lw,$wh,$hl);
    $total += (2*$lw)+(2*$wh)+(2*$hl)+$low;
    $length = min(2*$dimensions[0]+2*$dimensions[1],2*$dimensions[1]+2*$dimensions[2],2*$dimensions[2]+2*$dimensions[0]);
    $bow = $dimensions[0]*$dimensions[1]*$dimensions[2];
    $ribbon += $length+$bow;
}
echo $total." square feet paper<br>";
echo $ribbon." feet ribbon<br>";