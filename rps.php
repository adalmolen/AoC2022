<?php
$score = 0;
$rps = fopen("rps.txt", "r");
while (($line = fgets($rps)) !== false) {
    $rpsarr = explode(" ", $line);
    //var_dump($rpsarr);
    $elf = $rpsarr[0];
    $me = substr($rpsarr[1], 0, 1);
    echo $elf." - ".$me;
    if (($elf == "A" && $me == "X") || ($elf == "B" && $me=="Y") || ($elf[0] == "C" && $me=="Z")){ //on tie add 3
        echo " Tie!\n";
        if ($me == "X") $score = $score+1+3;
        if ($me == "Y") $score = $score+2+3;
        if ($me == "Z") $score = $score+3+3;
    } elseif (($elf == "A" && $me == "Z") || ($elf == "B" && $me == "X") || ($elf == "C" && $me == "Y")) { //Me wins add 6
        echo " Lose\n";
        if ($me == "X") $score = $score+1;
        if ($me == "Y") $score = $score+2;
        if ($me == "Z") $score = $score+3;
    } else { //on lose
        echo " Win\n";
        if ($me == "X") $score = $score+1+6;
        if ($me == "Y") $score = $score+2+6;
        if ($me == "Z") $score = $score+3+6;
    }
}
echo $score;