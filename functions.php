<?php
function callFolders()
{
    $path = "root/";
    if (is_dir($path) && $dh = opendir($path)) {
        while (($file = readdir($dh)) !== false) {
            if ($file !== "." && $file !== ".." &&  !pathinfo($file, PATHINFO_EXTENSION)) {
                $path2 = "root/$file";
                echo "<div><a href='index.php?files=$path2'><i class='bi bi-folder-fill'></i>" . $file . "</a></div>";
                if (is_dir($path2) && $dh2 = opendir($path2)) {
                    while (($file2 = readdir($dh2)) !== false) {
                        if ($file2 !== "." && $file2 !== ".." &&  !pathinfo($file2, PATHINFO_EXTENSION)) {
                            $path3 = "root/$file/$file2";
                            echo "<div  class='subdirectories'><a href='index.php?files=$path3' class='anchor'><i class='bi bi-folder-fill'></i>" . $file2 . "</a></div>";
                        }
                    }
                }
            }
        }
        closedir($dh);
    }
};


function readDirect()
{
    if (isset($_GET["files"])) {
        $path =  $_GET["files"];
        if (is_dir($path) && $dh = opendir($path)) {
            while (($file = readdir($dh)) !== false) {
                if ($file !== "." && $file !== ".." &&  pathinfo($file, PATHINFO_EXTENSION)) {
                    echo "<div class = 'middleDivs'><a href='index.php?files=$path'>" . $file . "</a></div>";
                } else if ($file !== "." && $file !== ".." &&  !pathinfo($file, PATHINFO_EXTENSION)) {
                    echo "<div class = 'middleDivs'><a href='index.php?files=$path/$file'><i class='bi bi-folder-fill'></i>" . $file . "</a></div>";
                }
            }
        }
    }
    if (!isset($_GET["files"])) {
        echo "Please select a folder";
    }
};
