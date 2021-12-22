<?php
if (isset($_POST["path"])){
$old_name = $_POST["path"];

$name = explode("/", $old_name);

echo $old_name . "<br>";

echo "Your old name is: " . end($name) . "<br>";

if(!isset($_POST["newName"])){

echo "<form action='nameChange.php?oldName=$old_name' method='post'>
<label for='newName'>Please enter the new folder Name</label>
<input type='text' id='newName' name='newName'>
<button>change</button>
</form>";
}


}

if(isset($_POST["newName"])){
    echo $_POST["newName"] . "<br>";
    $newName = $_POST["newName"];
    $old_name = $_GET["oldName"];
    $name = explode("/", $old_name);
    echo $old_name . "<br>";
    $oldName = end($name);
    echo $oldName . "<br>";
    $a = array_pop($name);
    echo "<br>";
    $b= [];
foreach ($name as $a){
    $c = "$a/";
    array_push($b, $c);
}
echo "<br";
array_push($b, $newName);
print_r($b);
echo "<br>";
$test = null;
foreach($b as $parts){
   $test .= "$parts";
}
rename($old_name, $test);
header("Location:./index.php");

}