<?php
$score = 0;
$rps = fopen("rps.txt", "r");
while (($line = fgets($rps)) !== false) {
    $rpsarr = explode(" ", $line);
    //var_dump($rpsarr);
    $elf = $rpsarr[0];
    $me = substr($rpsarr[1], 0, 1);
    echo $elf." - ".$me;
    if ($me == "X") { //Lose!
        switch ($elf) {
            case "A":
                $me = "Z";
                break;
            case "B":
                $me = "X";
                break;
            case "C":
                $me = "Y";
        }
    } elseif ($me == "Y") { //tie!
        switch ($elf) {
            case "A":
                $me = "X";
                break;
            case "B":
                $me = "Y";
                break;
            case "C":
                $me = "Z";
        }
    } else { //win!
        switch ($elf) {
            case "A":
                $me = "Y";
                break;
            case "B":
                $me = "Z";
                break;
            case "C":
                $me = "X";
        }
    }
    if (($elf == "A" && $me == "X") || ($elf == "B" && $me=="Y") || ($elf[0] == "C" && $me=="Z")){ //on tie add 3
        echo " Tie!<br>";
        if ($me == "X") $score = $score+1+3;
        if ($me == "Y") $score = $score+2+3;
        if ($me == "Z") $score = $score+3+3;
    } elseif (($elf == "A" && $me == "Z") || ($elf == "B" && $me == "X") || ($elf == "C" && $me == "Y")) { //Me lose add 6
        echo " Lose<br>";
        if ($me == "X") $score = $score+1;
        if ($me == "Y") $score = $score+2;
        if ($me == "Z") $score = $score+3;
    } else { //on Win
        echo " Win<br>";
        if ($me == "X") $score = $score+1+6;
        if ($me == "Y") $score = $score+2+6;
        if ($me == "Z") $score = $score+3+6;
    }
}
echo $score;