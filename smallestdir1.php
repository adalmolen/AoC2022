<?php
$ls = fopen("ls.txt", "r");
$inlisting = FALSE;
$newfolder = "";
$folder = array();
$total = 0;
while(($line = fgets($ls)) !== FALSE){
    if (strstr($line, "ls")){ //command
        $inlisting=TRUE;
    }elseif (strstr($line, "cd ..")){
        $inlisting=FALSE;
        $newfolder=upDir($newfolder);
    }elseif (strstr($line, "cd ")){
        $temp = explode(" ", $line);
        $inlisting=FALSE;
        if (!strstr($line, "/")){
            if ($newfolder != "/"){
                $newfolder = $newfolder."/".substr($temp[2],0,strlen($temp[2])-1);
            } else {
                $newfolder = $newfolder.substr($temp[2],0,strlen($temp[2])-1);
            }
        } else {
            $newfolder = "/";
        }
        $folder[$newfolder] = 0;
    }
    if ($inlisting==TRUE){
        $checkline = explode(" ", $line);
        if (is_numeric($checkline[0])){
            if ($newfolder!="" && $newfolder!="/"){
                $folder[$newfolder]+=intval($checkline[0]);
                //$folder["/"]+=intval($checkline[0]);
                $tempdir = $newfolder;
                $folder["/"]+=intval($checkline[0]);
                $i=10;
                while ($i!=0) {
                    $tempdir=upDir($tempdir);
                    if ($tempdir != "/" && $tempdir != "") {
                        $folder[$tempdir]+=intval($checkline[0]);
                    }
                    $i--;
                }
            } else {
                $folder["/"]+=intval($checkline[0]);
            }
        }
    }
}
foreach($folder as $dirname => $value){
    if ($value<=100000){
        $total+=$value;
    }
}
echo $total."<br>";
$used = $folder["/"];
echo $used." Used space<br>";
$need = 30000000 - (70000000 - $used);
echo $need." need<br>";
asort($folder);
foreach($folder as $dirname => $value){
    if ($value>$need){
        echo $dirname." - ".$value." found it!<br>";
        break;
    }
}

function upDir($dir){
    $dir = substr($dir, 0, (strrpos($dir, "/")));
    return $dir;
}
//print_r($folder);
?>