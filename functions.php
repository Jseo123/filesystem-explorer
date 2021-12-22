<?php
function callFolders()
{
    $path = "root/";
    if (is_dir($path) && $dh = opendir($path)) {
        while (($file = readdir($dh)) !== false) {
            if ($file !== "." && $file !== ".." &&  !pathinfo($file, PATHINFO_EXTENSION)) {
                $path2 = "root/$file";
                echo "<div><a href='index.php?path=$path2'><i class='bi bi-folder-fill'></i>" . $file . "</a></div>";
                if (is_dir($path2) && $dh2 = opendir($path2)) {
                    while (($file2 = readdir($dh2)) !== false) {
                        if ($file2 !== "." && $file2 !== ".." &&  !pathinfo($file2, PATHINFO_EXTENSION)) {
                            $path3 = "root/$file/$file2";
                            echo "<div  class='subdirectories'><a href='index.php?path=$path3' class='anchor'><i class='bi bi-folder-fill'></i>" . $file2 . "</a></div>";
                        }
                    }
                }
            }
        }
        closedir($dh);
    }
};


function openFolders()
{
    if (isset($_GET["path"])) {
        $path =  $_GET["path"];
        if (is_dir($path) && $dh = opendir($path)) {
            while (($file = readdir($dh)) !== false) {
                if ($file !== "." && $file !== ".." &&  pathinfo($file, PATHINFO_EXTENSION)) {
                    echo "<form action='index.php?path=$path' method='post'class='middleDivs'>";
                    putIcons($file);
                    echo "<input type='hidden' id='fname' name='fname' value='$path/$file'></input>";
                    echo "<button type='submit' class='buttonFiles'>" . $file . "</button>";
                    echo "</form>";
                } else if ($file !== "." && $file !== ".." &&  !pathinfo($file, PATHINFO_EXTENSION)) {
                    echo "<div class = 'middleDivs'><a href='index.php?path=$path/$file'><i class='bi bi-folder-fill'></i>" . $file . "</a></div>";
                }
            }
        }
    }
    if (!isset($_GET["path"])) {
        echo "Please select a folder";
    }
};



function putIcons($file)
{
    $vari = pathinfo($file, PATHINFO_EXTENSION);
    switch ($vari) {
        case "pdf":
            echo "<i class='far fa-file-pdf'></i>";
            break;
        case "doc":
            echo "<i class='far fa-file-word'></i>";
            break;
        case "csv":
            echo "<i class='fas fa-file-csv'></i>";
            break;
        case "jpg":
            echo "<i class='far fa-file-image'></i>";
            break;
        case "JPG":
            echo "<i class='far fa-file-image'></i>";
            break;
        case "png":
            echo "<i class='fas fa-file-image'></i>";
            break;
        case "txt":
            echo "<i class='far fa-file-alt'></i>";
            break;
        case "ppt":
            echo "<i class='far fa-file-powerpoint'></i>";
            break;
        case "odt":
            echo "<i class='far fa-file-excel'></i>";
            break;
        case "zip":
            echo "<i class='far fa-file-archive'></i>";
            break;
        case "rar":
            echo "<i class='far fa-file-archive'></i>";
            break;
        case "exe":
            echo "<i class='fas fa-cogs'></i>";
            break;
        case "svg":
            echo "<i class='far fa-object-group'></i>";
            break;
        case "mp3":
            echo "<i class='fas fa-file-audio'></i>";
            break;
        case "mp4":
            echo "<i class='far fa-file-video'></i>";
            break;
        case "MP4":
            echo "<i class='far fa-file-video'></i>";
            break;
        case "php":
            echo "<i class='fab fa-php'></i>";
            break;
    }
}

function deleteFolders()
{
    if (isset($_GET["path"])) {
        $path = $_GET["path"];
        echo $path;
    } else {
        echo "Choose a folder to delete";
    }
}

function uploadFiles()
{
    if (isset($_GET["path"])) {
        $path = $_GET["path"];
        echo $path;
    } else {
        echo "Choose a folder";
    }
}

function displayRight()
{



    if (isset($_POST["fname"])) {
        $path = $_POST["fname"];
        if (is_file($path)) {
            if (filesize($path) >= 1000000) {
                $size = filesize($path) / 100000 . "MB";
            } else if (filesize($path) < 1000000 && filesize($path) > 0) {
                $size = filesize($path) / 1000 . "Kylobytes";
            } else {
                $size = "file has no data";
            }

            $fileDate = date(" F d Y H:i.", filemtime($path));
            $creationDate = date(" F d Y H:i.", filectime($path));

            $infoArray = pathinfo($path, PATHINFO_ALL);
            echo "<div class = 'infoContainer'>";
            echo "Folder direction: " . $infoArray["dirname"] . "<br>
    Name: " . $infoArray["filename"] . "<br>
    File Type: " . $infoArray["extension"] .
                "<br> File Size: $size" .
                "<br> Date modified: $fileDate" .
                "<br>File created: " . $creationDate;
            if ($infoArray["extension"] == "mp3") {
                echo "<div class = 'mediaContainer'><audio src='$path' controls>Your browser doesn´t support the audio</audio></div>";
            } elseif ($infoArray["extension"] == "mp4" || $infoArray["extension"] == "MP4") {
                echo "<div class = 'mediaContainer'><video width= '250px' height = '250px' controls> <source src='$path'> Your browser doesn´t support the video </video></div>";
            } elseif ($infoArray["extension"] == "jpg" || $infoArray["extension"] == "png" || $infoArray["extension"] == "JPG") {
                echo "<div class = 'mediaContainer'><img src='$path' width= '250px' height = '250px'></div>";
            }
            echo "</div>";
        }
    } else {
        echo  "Choose a file to display info";
    }
}

function searchBar(){
    if(isset($_POST["searcher"])){

    }
}

function changeFolderName(){
    if(isset($_GET["path"])){
    $path = $_GET["path"];
    echo "<form action='nameChange.php' method='post'>
    <input type='hidden' name='path' value='$path'>
    <button>change name</button>
    </form>";
}
}
