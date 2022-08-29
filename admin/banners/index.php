<?php
$servername = "localhost";
$username = "root";
$password = "";


  $conn = new PDO("mysql:host=$servername;dbname=crud", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query="SELECT * FROM `crud1` WHERE is_deleted=0";

  $stmt=$conn->prepare($query);
   $rst=$stmt->execute();
  $crud1= $stmt->fetchAll();

echo "<pre>";
//  var_dump($crud1);
echo "</pre>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index file</title>
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
</head>
<body>
<table>
   
  <?php
  if(empty($crud1)):
    ?>
    <h1>There is no data</h1>
 
  <?php else:
  ?>
    <tr>
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
  endif;
  ?>
  <a href="trash_index.php">Trash Items</a> <br>
  <a href="create.php">Create</a>
<tr>
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
    <td><a href="delete.php?id=<?=$crud['id'];?>">Delete</a> | <a href="show.php?id=<?=$crud['id'];?>">Show</a> | <a href="edit.php?id=<?=$crud['id'];?>">Edit</a> | <a href="trash.php?id=<?=$crud['id'];?>" onclick="return confirm('Are you sure want to trash?')" >Trash</a> </td>
</tr>
<?php
endforeach;
?>
  
</table>
</body>
</html>