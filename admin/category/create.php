<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Create Category</h1>
    <form action="store.php" method="POST" enctype="multipart/form-data">
        <!--<input type="hidden" name="id">-->
        <label>Category Name:</label>
        <input type="text" name="catagory"> <br> <br>
        <label>Price:</label>
        <?php
        if(array_key_exists('message',$_SESSION) &&$_SESSION['message']!=''):
        ?>
        <span style="color: red">
        <?php
            echo $_SESSION['message'];
            $_SESSION['message']='';
        ?>
        </span>
        <?php
        endif;
        ?>

        <input type="number" name="price"> <br> <br>
        <input type="checkbox" name="draft" value="">
        <label>Is Draft</label> <br> <br>
        <label>Picture:</label>
        <input type="file" name="picture"><br> <br>
        <button type="submit">Submit</button>
    </form>


</body>
</html>