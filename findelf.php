
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
    $value = max($elf);
    $key = array_search($value, $elf);
    echo "elf ".$key." carries most calories with ".$value." calories in total";
}
?>
