<?php
$_id=$_GET['id'];

$webroot="http://localhost/crud/";
$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=crud", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query="SELECT * from `category` where id= $_id";
$stmt=$conn->prepare($query);
$stmt->execute();
$category= $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index file</title>
    <style>
        body {
            display: flex;
            place-content: center;
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
<form action="update.php" method="POST" enctype="multipart/form-data">
    <h1>Edited a Category</h1>
    <input name="id" type="hidden" value="<?=$category['id'];?>">
    <label>Category Name:</label>
    <input type="text" value="<?=$category['name'];?>" name="catagory"> <br> <br>
    <label>Price:</label>
    <input type="number" value="<?=$category['price'];?>" name="price"> <br> <br>
    <?php
    if($category['is_draft']==0){
        ?>

        <input type="checkbox" name="draft" value="">
        <?php
    }
    else{
    ?>

        <input type="checkbox" checked name="draft" value="">
    <?php
    }
    ?>
    <label>:Is Draft</label> <br> <br>
    <label>Picture:</label>
    <input type="file"  name="picture"><br> <br>
    <img src="<?=$webroot;?>images/<?=$category['picture'];?>">

    <input type="hidden" name="old_img" value="<?=$category['picture'];?>">
    <button type="submit">Submit</button>
</form>
</body>
</html>


