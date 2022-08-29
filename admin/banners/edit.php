<?php
$_id=$_GET['id'];

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
    <style>
        body{
            margin-left:400px;
        }
        img{
  width:20%;
  height:50px;
}
    </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <h2>Edit this file</h2>
    <form action="update.php" method="POST" enctype="multipart/form-data">
        <label for="">Id: </label>
    <input type="text" name="id" value="<?=$crud1['id']?>"> <br>
        <label for="">Title: </label>
    <input type="text" name="title" value="<?=$crud1['title']?>"> <br>
    <label for="">Active: </label>
        <?php
        if($crud1['active']==0){
                ?>
        <input type="checkbox" name="active" value=""> <br>
<?php
}
else{
?>   
   <input type="checkbox" checked name="active" value=""> <br>
<?php } ?>

    <!--<label for="">Draft: </label>
    <input type="checkbox" name="draft" value="1"> <br>-->
    <label for="">link: </label>
    <input type="text" name="inputLink" value="<?=$crud1['link'];?>"> <br>
    <label for="">Description:</label> <br>
     <textarea name="details" id="" value="<?=$crud1['description'] ?>" cols="40" rows="15"></textarea> <br>
     <label for="">Picture</label>
     <input type="file" name="picture"> 
     <img src="../../images/<?=$crud1['picture']?>" alt="">
     <input type="hidden" name="old_img" value="<?=$crud1['picture']?>">
    
     <br>
        <button type="submit">Submit</button>
    </form>

</body>
</html>