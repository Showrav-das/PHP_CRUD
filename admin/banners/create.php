<?php

?>

<!DOCTYPE html>
<html lang="en">
    <style>
        body{
            margin-left:400px;
        }
    </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Create a field</h2>
    <form action="store.php" method="POST" enctype="multipart/form-data">
        <label for="">Title: </label>
    <input type="text" name="title" > <br>
    <label for="">Active: </label>
    <input type="checkbox" name="active" value=""> <br>
    <!--<label for="">Draft: </label>
    <input type="checkbox" name="draft" value="1"> <br>-->
    <label for="">link: </label>
    <input type="text" name="inputLink"> <br>
    <label for="">Description:</label> <br>
     <textarea name="details" id="" cols="40" rows="15"></textarea> <br>
     <label for="">Picture</label>
     <input type="file" name="picture"> <br>
        <button type="submit">Submit</button>
    </form>

</body>
</html>