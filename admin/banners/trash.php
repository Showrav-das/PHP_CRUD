<?php

$_id=$_GET['id'];
$is_delete=1;

$servername = "localhost";
$username = "root";
$password = "";


  $conn = new PDO("mysql:host=$servername;dbname=crud", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query= "UPDATE `crud1` SET `is_deleted` = :is_delete WHERE `crud1`.`id`= :id";
$stmt=$conn->prepare($query);
$stmt->bindParam(':id', $_id);
$stmt->bindParam(':is_delete', $is_delete);
$rst=$stmt->execute();

var_dump($rst);


?>