<?php

//$is_deleted=1;
$servername = "localhost";
$username = "root";
$password = "";


  $conn = new PDO("mysql:host=$servername;dbname=crud", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query = "SELECT * FROM `crud1` WHERE is_deleted = 1";

  $stmt=$conn->prepare($query);
   $rst=$stmt->execute();
  $crud1= $stmt->fetchAll();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarash file</title>
</head>
<style>
        table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 5px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
    </style>
<body>
    
<tr>
<table>
<th>Id</th>
    <th>Title</th>
    <th>Active</th>
    <!--<th>Draft</th>-->
    <th>Details</th>
    <th>Link</th>
    <th>Picture</th>
    <th>Action</th>
  </tr>
  
<?php
    foreach($crud1 as $crud):
    ?>
    <td><?=$crud['id'];?></td>
    <td><?=$crud['title'];?></td>
    <td><?=$crud['active'];?></td>
    <!--<td><?=$crud['draft'];?></td>-->
    <td><?=$crud['description'];?></td>
    <td><?=$crud['link'];?></td>
    <td><?=$crud['picture'];?></td>
    <td><a href="delete.php?id=<?=$crud['id'];?>">delete</a> | <a href="restore.php?id=<?=$crud['id']?>" onclick="return confirm('Are you want to restore now?')" >Restore</a></td>
</tr>
<?php
endforeach;
?>
</table>




</body>
</html>