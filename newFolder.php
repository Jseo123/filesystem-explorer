<?php

    $name = $_GET["folderName"];
    $path = "./root/$name";

    if(!is_dir($path)){
        if(mkdir($path, 0777)){
            echo "la carpeta fue creada<br>";
        }
        else{
            echo "la carpeta no fue creada<br>";
        }
        echo $path;
    }

    header("Location:./index.php");
