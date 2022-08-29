<?php
$is_deleted=0;
$_id=$_GET['id'];

$servername = "localhost";
$username = "root";
$password = "";


  $conn = new PDO("mysql:host=$servername;dbname=crud", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query= "UPDATE `crud1` SET `is_deleted` = :is_deleted WHERE `crud1`.`id`= :id";

  $stmt=$conn->prepare($query);
  $stmt->bindParam('is_deleted',$is_deleted);
  $stmt->bindParam('id',$_id);
  $rr=$stmt->execute();
   var_dump($rr);



