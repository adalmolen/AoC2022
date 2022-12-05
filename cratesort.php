<?php
$crate[1] = array("S","L","F","Z","D","B","R","H");
$crate[2] = array("R","Z","M","B","T");
$crate[3] = array("S","N","H","C","L","Z");
$crate[4] = array("J","F","C","S");
$crate[5] = array("B","Z","R","W","H","G","P");
$crate[6] = array("T","M","N","D","G","Z","J","V");
$crate[7] = array("Q","P","S","F","W","N","L","G");
$crate[8] = array("R","Z","M");
$crate[9] = array("T","R","V","G","L","C","M");
$moves = fopen("cratemoves.txt", "r");
while (($line = fgets($moves)) !== false) {
    $move = explode(",", $line); // $move[0] = amount, $move[1] = from, $move[2] = destination
    $to=substr($move[2],0,1); // be sure there is no \n at the end of the line...
    for($j=0; $j<$move[0]; $j++) {
        $newvalue = $crate[$move[1]][0]; // store value
        array_unshift($crate[$to], $newvalue); //add to destination array
        $removed = array_shift($crate[$move[1]]); //remove from source array
    }
}
for($i=1; $i<=9; $i++){
    print_r($crate[$i][0]);
}
?>