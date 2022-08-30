<?php

$webroot="http://localhost/crud/";
$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=crud", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query="SELECT * from `category`";
$stmt=$conn->prepare($query);
$stmt->execute();
$categoryAll=$stmt->fetchAll();
//var_dump($categoryAll);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index file</title>
    <style>
        body{
            display: flex;
            place-content: center;
            width: 100%;
            text-align: center;
        }
        th{
            padding: 20px;
        }
        td{
            padding: 20px;
        }
    </style>
</head>

<body>
<table>
    <thead>
   <tr>
       <th>Category Name</th>
       <th>Price</th>
       <th>Draft</th>
       <th>Picture</th>
       <th>Action</th>

   </tr>
    </thead>
    <?php
    foreach ($categoryAll as $category){


    ?>
        <tr>
            <td><?=$category['name']?></td>
            <td><?=$category['price']?></td>
            <td> <?=$category['is_draft']==1 ? 'Active' : 'diactivateed'?> </td>
            <td> <?=$category['picture']; ?>
            <img style="width: 100px; height: 100px" src="<?=$webroot;?>images/<?=$category['picture'];?>"></td>
            <td><a href="edit.php?id=<?=$category['id'];?>">Edit</a> || <a href="">Trash</a> </td>
        </tr>
    <?php
    }
    ?>
</table>

</body>
</html>