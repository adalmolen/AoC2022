<?php
$rucksack = fopen("rucksack.txt", "r");
$sum = 0;
$i = 0;
while (($line = fgets($rucksack)) !== false) {
    $ruck[$i] = $line;
    if ($i==2){
        $chararr = str_split($ruck[0]);
        foreach($chararr as $letter) {
            if ((str_contains($ruck[1], $letter)) && (str_contains($ruck[2], $letter))){
                if (preg_match('~^\p{Lu}~u', $letter)){ //true on upper, false on lower
                    $sum = $sum+(ord($letter)-64+26); //minus 64 (ASCII value) and add 26 (A=27)
                } else {
                    $sum = $sum+(ord($letter)-96); // minus 96 (ASCII value)
                }
                break;
            }
        }
        $i=0;
    } else {
        $i++;
    }
}
echo $sum;