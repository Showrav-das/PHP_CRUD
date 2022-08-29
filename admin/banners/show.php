<?php

$_id=$_GET['id'];
//echo $_id;
$approot="http://localhost/CRUD";

$servername = "localhost";
$username = "root";
$password = "";


  $conn = new PDO("mysql:host=$servername;dbname=crud", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query="SELECT * FROM `crud1`WHERE id=$_id";

  $stmt=$conn->prepare($query);
//  $stmt->bindParam(':id',$_id);
   $rst=$stmt->execute();
  $crud1= $stmt->fetch();
  echo "<pre>";
print_r($crud1);
echo "</pre>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show data</title>
    <style>
        table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

table tr img{
  width:20%;
  height:50px;
}
    </style>
</head>
<body>
<table>

    <tr>
    <th>Id</th>
    <th>Title</th>
    <th>Active</th>
    <!--<th>Draft</th>-->
    <th>Link</th>
    <th>Details</th>
    <th>Picture</th>
    <th>Action</th>
  </tr>
 <tr>

 <?php
  if(!empty($crud1)):
    ?>
    <td><?=$crud1['id'];?></td>
     <td><?=$crud1['title'];?></td>
     <td><?=$crud1['active'];?></td>
     <!--<td><?=$crud1['draft'];?></td>-->
     <td><?=$crud1['link'];?></td>
     <td><?=$crud1['description'];?></td>
     <td><?=$crud1['picture'];?>
     <img src="<?=$approot;?>/images/<?=$crud1['picture'];?>" alt="">
    </td>
     <td><a href="delete.php?id=<?=$crud1['id'];?>">Delete</a> </td>
  <?php else:
  ?>

        <h1>There is no data</h1>
 </tr>

 <?php
  endif;
  ?>
  <div>
  
  </div>
</table>
</body>
</html>