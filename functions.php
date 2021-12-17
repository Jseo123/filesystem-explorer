<?php
            function callFolders(){
                $path = "root/";
                if (is_dir($path)){
                    if($dh = opendir($path)){
                        while(!($file = readdir($dh)) == false){
                            if ($file !== "." && $file !== ".."){
                                echo "<a href='index.php?file=$file'>" . $file . "</a>". "<br>";
                            }
                        }closedir($dh);
                    }
                }
            }
