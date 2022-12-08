<?php
$input = fopen("forrest.txt", "r");
$forrest = array();
$i=0;
$numtrees = 0;
while (($line = fgets($input)) !== false) {
    $forrest[$i] = str_split(substr($line, 0, strlen($line)-1));
    $i++;
}

$numtrees = $i*count($forrest[0])-(($i-2)*(count($forrest[0])-2));
echo $numtrees." num of trees on the edge<br>";

$rows = count($forrest);
$cols = count($forrest[0]);
for ($row = 1; $row < $rows-1; $row++) {
     $cols = count($forrest[$row]);
     for($col = 1; $col < $cols-1; $col++ ) {
        if (checkPrevRow($row,$col)==TRUE){
            $numtrees+=1;
        }elseif(checkNextRow($row,$col)==TRUE){
            $numtrees+=1;
        }elseif(checkPrevCol($row,$col)==TRUE){
            $numtrees+=1;
        }elseif(checkNextCol($row,$col)==TRUE){
            $numtrees+=1;
        }
     }
}
echo "Total visible trees: ".$numtrees."<br>";

function checkPrevRow($row, $col){
    global $forrest;
    $visible = FALSE;
    for($i=0; $i<$col; $i++){
        if ($forrest[$row][$i]<$forrest[$row][$col]){
            $visible = TRUE;
        } else {
            $visible = FALSE;
            break;
        }
    }
    return $visible;
}

function checkPrevCol($row, $col){
    global $forrest;
    $visible = FALSE;
    for($i=0; $i<$row; $i++){
        if ($forrest[$i][$col]<$forrest[$row][$col]){
            $visible = TRUE;
        } else {
            $visible = FALSE;
            break;
        }
    }
    return $visible;
}


function checkNextRow($row, $col){
    global $forrest;
    global $cols;
    $visible = FALSE;
    for($i=$cols-1; $i>$col; $i--){
        if ($forrest[$row][$i]<$forrest[$row][$col]){
            $visible = TRUE;
        } else {
            $visible = FALSE;
            break;
        }
    }
    return $visible;
}

function checkNextCol($row, $col){
    global $forrest;
    global $rows;
    $visible = FALSE;
    for($i=$rows-1; $i>$row; $i--){
        if ($forrest[$i][$col]<$forrest[$row][$col]){
            $visible = TRUE;
        } else {
            $visible = FALSE;
            break;
        }
    }
    return $visible;
}