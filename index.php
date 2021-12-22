<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File System Explorer</title>
    <link rel = "stylesheet" href="assets/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src = "assets/script.js" defer></script>
</head>
<body>
<header class = "header">
    <i class="fab fa-google-drive"></i>
    <form action="index.php" method="post" class= "searcherNav">
        <label for="searcher"></label>
        <input type="text" id="searcher" name="searcher" class = "searcher"placeholder="Search something...">
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
</header>
<main class = "mainContainer">
    <div class = "flexBasis leftSideCon">
        <?php
            require_once "functions.php";
            callFolders("root");

        ?>
        <form action="newFolder.php" class = "newFolder">
            <h5>Create new Folder:</h5>
            <input type="text" name = "folderName" placeholder="New folder name...">
            <button type="submit"><i class="fas fa-plus"></i></button>
        </form>
    </div>
    <div class = "middleFlex">
        <?php
            searchBar("root");
            openFolders();
        ?>
        <div class="lowButtons">
            <form action="deleteFolder.php" method="get">
                <input type="hidden" id="dir" name="dir" value="<?php require_once "functions.php";
                deleteFolders();?>">
                <button type="submit">delete folder</button>
                <button id="myBtn">Upload File</button>
            </form>
            <?php changeFoldername(); ?>
        </div>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name = "file" id = "fileToUpload">
                    <input type="hidden" id="dir" name="dir" value="<?php require_once "functions.php";
                    uploadFiles();?>">
                    <input type="submit" value="submit">
                </form>
            </div>
        </div>
    </div>
    <div class = "flexBasis">
        <?php require_once "functions.php";
        displayRight(); ?>
    </div>
</main>
</body>
</html>