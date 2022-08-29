<?php
$_id=$_GET['id'];
//echo $_id;

$servername = "localhost";
$username = "root";
$password = "";


  $conn = new PDO("mysql:host=$servername;dbname=crud", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query="DELETE FROM `crud1` WHERE `crud1`.`id` = $_id";

  $stmt=$conn->prepare($query);
//  $stmt->bindParam(':id',$_id);
   $rst=$stmt->execute();
  $crud1= $stmt->fetch();
  echo "<pre>";
var_dump($crud1);
echo "</pre>";

header('location:index.php');
?>
