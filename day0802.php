<?php
$input = fopen("forrest.txt", "r");
$forrest = array();
$i=0;
$j=0;
$numtrees = array();
while (($line = fgets($input)) !== false) {
    $forrest[$i] = str_split(substr($line, 0, strlen($line)-1));
    $i++;
}

$rows = count($forrest);
$cols = count($forrest[0]);
echo "Rows : ".$rows."<br>";
echo "Cols : ".$cols."<br>";
for ($row = 0; $row < $rows; $row++) {
    $cols = count($forrest[$row]);
    for($col = 0; $col < $cols; $col++ ) {
        $numtrees[$j]=checkPrevRow($row,$col)*checkNextRow($row,$col)*checkPrevCol($row,$col)*checkNextCol($row,$col);
        $j++;
    }
}
echo max($numtrees);

function checkPrevCol($row, $col){
    global $forrest;
    $trees = 0;
    if(!$row==0){
        for($r=$row-1; $r>=0; $r--){
            if ($forrest[$r][$col]<$forrest[$row][$col]){
                $trees+=1;
            } else {
                $trees+=1;
                break;
            }
        }
    }
    return $trees; 
}

function checkPrevRow($row, $col){
    global $forrest;
    $trees = 0;
    if (!$col==0){
        for($c=$col-1; $c>=0; $c--){
            if ($forrest[$row][$c]<$forrest[$row][$col]){
                $trees+=1;
            } else {
                $trees+=1;
                break;
            }
        }
    }
    return $trees;
}

function checkNextRow($row, $col){
    global $forrest;
    global $cols;
    $trees = 0;
    if(!($col==$cols)){
        for($c=$col+1; $c<$cols; $c++){
            if ($forrest[$row][$c]<$forrest[$row][$col]){
                $trees+=1;
            } else {
                $trees+=1;
                break;
            }
        }
    }
    return $trees;
}

function checkNextCol($row, $col){
    global $forrest;
    global $rows;
    $trees = 0;
    if(!($row==$rows)){
        for($r=$row+1; $r<$rows; $r++){
            if ($forrest[$r][$col]<$forrest[$row][$col]){
                $trees+=1;
            } else {
                $trees+=1;
                break;
            }
        }
    }
    return $trees;
}