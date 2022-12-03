<?php
$rucksack = fopen("rucksack.txt", "r");
$sum = 0;
while (($line = fgets($rucksack)) !== false) {
    $ruck = str_split($line, (strlen($line)-1)/2);
    $chararr = str_split($ruck[0]);
    echo $ruck[0]." - ".$ruck[1];
    foreach($chararr as $letter) {
        if (str_contains($ruck[1], $letter)){
            if (preg_match('~^\p{Lu}~u', $letter)){ //true on upper, false on lower
                $sum = $sum+(ord($letter)-64+26); //minus 64 (ASCII value) and add 26 (A=27)
            } else {
                $sum = $sum+(ord($letter)-96); // minus 96 (ASCII value)
            }
            break;
        }
    }
}
echo $sum;