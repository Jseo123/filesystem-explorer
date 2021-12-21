<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="assets/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>
<body>
<nav>
    <div><form action="deleteFolder.php" method="get">
        <label for="dir">Please enter the directory from the root to delete</label>
        <input type="text" id="dir" name="dir" value="<?php require_once "functions.php";
    deleteFolders();?>">
        <button type="submit">delete</button>
    </form></div>
</nav>
<main class = "mainContainer">
    <div class = "flexBasis leftSideCon">
        <?php
            require_once "functions.php";
            callFolders();

        ?>
        <form action="newFolder.php">
            <input type="text" name = "folderName">
            <button type="submit"><i class="fas fa-plus"></i></button>
        </form>
    </div>
    <div class = "middleFlex">
        <?php
            openFolders();
        ?>
    </div>
    <div class = "flexBasis">
        Holaaa
    </div>
</main>
    
</body>
</html>