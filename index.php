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
    <div class = "flexBasis leftSideCon">
        <?php
            require_once "functions.php";
            callFolders();

        ?>
    </div>
    <div class = "middleFlex">
        <?php
    readDirect();
        ?>
    </div>
    <div class = "flexBasis">
        Holaaa
    </div>
</main>
    
</body>
</html>