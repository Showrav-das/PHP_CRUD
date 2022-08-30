<?php
$_id=$_POST['id'];
$name=$_POST['catagory'];
$price=$_POST['price'];
if(array_key_exists('draft',$_POST)){
    $draft=1;
}

else{
    $draft=0;
}
$approot=$_SERVER['DOCUMENT_ROOT']."/crud/";
$img="IMG_" .time(). "_";
if($_FILES['picture']['name']!=''){
    $target=$_FILES['picture']['tmp_name'];
    $des=$approot."images/".$img.$_FILES['picture']['name'];
    $move=move_uploaded_file($target,$des);
    if($move){
        $picture=$img.$_FILES['picture']['name'];
    }
    else{
        $picture=null;
    }
}

else{
    $picture=$_POST['old_img'];

}


echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";

$servername= "localhost";
$username = "root";
$password = "";


$conn = new PDO("mysql:host=$servername;dbname=crud", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query="UPDATE `category` SET `name` = :catagory,`price`=:price, `is_draft`=:draft, `picture`=:picture  WHERE `category`.`id` = :id";

$stmt=$conn->prepare($query);

$stmt->bindParam(":id",$_id);
$stmt->bindParam(":catagory",$name);
$stmt->bindParam(":price",$price);
$stmt->bindParam(":draft",$draft);
$stmt->bindParam(":picture",$picture);

$r=$stmt->execute();

var_dump($r);


