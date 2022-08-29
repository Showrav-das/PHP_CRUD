<?php
echo "<pre>";
//echo $_created_at;
//print_r($_SERVER);
$approot=$_SERVER['DOCUMENT_ROOT']."/crud";
echo "</pre>";
//die();
$_title=$_POST['title'];
//$_active=$_POST['active'];
//$_link=$_POST['inputLink'];
$_details=$_POST['details'];
//$_picture=$_FILES['picture']['name'];

//else{
//  $_active=0;
//}


if(array_key_exists('active',$_POST)){
$_active=1;
}
else{
  $_active=0;
}

if(array_key_exists('inputLink',$_POST)){
  $_link=$_POST['inputLink'];
}
else{
  $_link=null;
}
$target=$_FILES['picture']['tmp_name'];
$destination=$approot.'/images/'.$_FILES['picture']['name'];

$move_img=move_uploaded_file($target,$destination);

if($move_img){
$_picture=$_FILES['picture'] ['name'];
}
else{
  $_picture=null;
}


echo "<pre>";
print_r($_POST);
echo "<pre>";
$_created_at=date("Y-m-d h:i:s");

$servername = "localhost";
$username = "root";
$password = "";


  $conn = new PDO("mysql:host=$servername;dbname=crud", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  $query="INSERT INTO `crud1` (`title`, `active`, `link`, `description`,`picture`,`created_at`) VALUES (:title, :active, :inputLink, :details,:picture, :crated_at)";


// 1.query 2.statement 3.prepare 4. execute 5.result
  $stmt=$conn->prepare($query);

//  $stmt->bindParam(':title',':active',':draft',':inputLink',':details': $_title,$_active,$_draft,$_link,$_details);


  $stmt->bindParam(':title',$_title);
  $stmt->bindParam(':active',$_active);
  //$stmt->bindParam(':draft',$_draft);
  $stmt->bindParam(':inputLink',$_link);
  $stmt->bindParam(':details',$_details);
  $stmt->bindParam(':picture',$_picture);
  $stmt->bindParam(':crated_at',$_created_at);
   $rst=$stmt->execute();
//   header('location:index.php');
   echo "<pre>";
//var_dump($_active);
//print_r($rst);
echo "<pre>";

  //header('location:index.php');
  
?>



