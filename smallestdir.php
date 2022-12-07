<?php
$ls = fopen("ls.txt", "r");
$dir = array();
$level = 0;
$uparray = array();
$filetotal = array();
$dir = array();
$maindir = "/";
$maindirtotal = 0;
$less = 0;
while(($line = fgets($ls)) !== FALSE){
    if (strpos($line, "cd ..") !== FALSE){
        echo "going down!\n";
        if ($dir[$maindir]<100000){
            echo $dir[$maindir]." in total of $maindir\n";
            $less+=$dir[$maindir];
        }
        $level-=1;
    }else if (strpos($line, "cd /") !== FALSE) {
        echo "To root!\n";
        $level = 0;
        $down=true;
        $up=false;
    } elseif (strpos($line, "dir") !== FALSE){
       
    } elseif (strpos($line, "cd ") !== FALSE){
        echo "level up! -> ";
        $level+=1;
        //if ($level == 1){
            echo "first level! - ";
            $dirname = explode(" ", $line);
            echo $dirname[2]." - ".$level."\n";
            $maindir = $dirname[2];
            $dir[$dirname[2]]=0;
            $uparray[$level] = $dirname[2];
        //}
        echo " ".$line;
        echo " ".$level;
        echo "\n";
    } else {
        $fileinfo = explode(" ", $line);
        if (is_numeric($fileinfo[0])) {
            if ($level>0){
                echo "file found! - ".$fileinfo[0];
                $dir[$maindir]+=intval($fileinfo[0]);
                echo " - ".$maindir." - ".$dir[$maindir];
                echo "\n";
            }
        }
    }
}
print_r($dir);
echo $less;
?>