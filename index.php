<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="assets/styles.css">
</head>
<body>
<nav>
    
</nav>
<main class = "mainContainer">
    <div class = "flexBasis">
        <?php
            $path = "root/directory1/";
            if (is_dir($path)){
                if($dh = opendir($path)){
                    while(!($file = readdir($dh)) == false){
                        echo "filename:" . $file . "<br>";
                    }closedir($dh);
                }
            }

        ?>
        Mundo
    </div>
    <div class = "middleFlex">
        Caracola
    </div>
    <div class = "flexBasis">
        Holaaa
    </div>
</main>
    
</body>
</html>