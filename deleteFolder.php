<?php
$path = $_GET["dir"];

if (is_dir($path)){
if (isEmpty($path)){
    rmdir($path);
} else {
    foreach (glob("$path/**") as $f){
unlink($f);
    }
    rmdir($path);
}
}

else {
    echo "fuck you";
}

function isEmpty($path){
$res = scandir($path);
if ($res === false){
    return false;
}
return count($res) == 2;
}

header("Location:./index.php");