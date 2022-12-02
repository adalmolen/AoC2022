
<?php
$calories = fopen("elfs.txt", "r");
$elfcounter = 0;
$totalcalories = 0;
$elf = array();
if ($calories) {
    while (($line = fgets($calories)) !== false) {
        if (ord($line) != 10){
            $totalcalories = $totalcalories + intval($line);
        } else{
            $elf[$elfcounter] = $totalcalories;
            $elfcounter++;
            $totalcalories = 0;
            
        }
    }
    fclose($calories);
    //var_dump($elf);
    arsort($elf);
    //var_dump($elf);
    $top3 = array_slice($elf, 0, 3);
    $totaltop3 = 0;
    $i=0;
    foreach ($top3 as $key => $val) {
        $i++;
        echo "elf $i has $val calories.<br>";
        $totaltop3 = $totaltop3 + $val;
    }

    echo "Total calories of top 3 elf is: $totaltop3";
}
?>
