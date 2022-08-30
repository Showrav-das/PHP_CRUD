<?php

//function is_empty($value){
//    if($value==''){
//        return true;
//    }
//    else{
//        return false;
//    }
//}

if($_POST['price']==''){
    session_start();
    $_SESSION['message']="Please enter a valid price";
    header('location:create.php');
}

else{

    $approot=$_SERVER['DOCUMENT_ROOT'].'/crud/';
//$id=$_POST['id'];
    $category_name=$_POST['catagory'];

    $price=$_POST['price'];

    if(array_key_exists('draft',$_POST)){
        $draft=1;
    }
    else{
        $draft=0;
    }

    $target=$_FILES['picture']['tmp_name'];
    $destination=$approot.'images/'."IMG_" .time(). "_".$_FILES['picture']['name'];
    $move_file=move_uploaded_file($target,$destination);
    if($move_file){
        $picture="IMG_" .time(). "_".$_FILES['picture']['name'];
    }

    else{
        $picture=null;
    }
    echo "<pre>";
    print_r($_POST);
    $servername = "localhost";
    $username = "root";
    $password = "";


    $conn = new PDO("mysql:host=$servername;dbname=crud", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query="INSERT INTO `category` ( `name`, `price`, `is_draft`, `picture`) VALUES (:catagory, :price, :draft, :picture)";

    $stmt=$conn->prepare($query);
//$stmt->bindParam(':id',$id);
    $stmt->bindParam(':catagory',$category_name);
    $stmt->bindParam(':price',$price);
    $stmt->bindParam(':draft',$draft);
    $stmt->bindParam(':picture',$picture);
    $rr=$stmt->execute();
//header('location:index.php');
    var_dump($rr);
}

?>

