<?php
function callFolders()
{
    $path = "root/";
    if (is_dir($path)) {
        if ($dh = opendir($path)) {
            while (($file = readdir($dh)) !== false) {
                if ($file !== "." && $file !== ".." &&  !pathinfo($file, PATHINFO_EXTENSION)) {
                    $path2 = "root/$file";
                    echo "<div><a href='index.php?files=$path2'>" . $file . "</a></div>";
                if (is_dir($path2)) {
                    if ($dh2 = opendir($path2)) {
                        while (($file2 = readdir($dh2)) !== false) {
                            if ($file2 !== "." && $file2 !== ".." &&  !pathinfo($file2, PATHINFO_EXTENSION)) {
                                $path3 = "root/$file/$file2";
                                echo "<div  class='subdirectories'><a href='index.php?files=$path3' class='anchor'>" . $file2 . "</a></div>";
                            }
                        }
                        }
                    }
                }
            }
            closedir($dh);
        }
    }
};


function readDirect(){

     if(isset($_GET["files"])){
           
        $dir =  $_GET["files"];
     } 
     
     if(!isset($_GET["files"])){
         Echo "Please select a folder";
     }
};
