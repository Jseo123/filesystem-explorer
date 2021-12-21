<?php
$target_dir = $_POST["dir"];

$target_file = "./" . $target_dir ."/". basename($_FILES["file"]["name"]);
echo $target_file."<br>";

echo $_FILES["file"]["size"]. "<br>";
echo $_FILES['file']['tmp_name']. "<br>";
if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){
    echo "archivo subido!!";
}
else{
    error_reporting(E_ALL);
    echo "archivo no subido!!";
}


// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// // Check if image file is a actual image or fake image
// if (isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//     if ($check !== false) {
//         echo "&#60p>File is an image - " . $check["mime"] . ".&#60/p>";
//         $uploadOk = 1;
//         if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
//             echo "&#60p>El fichero es válido y se subió con éxito.&#60/p>";
//         } else {
//             echo "&#60p>¡Posible ataque de subida de ficheros!&#60/p>";
//         }
//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
// }