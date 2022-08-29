<?php
$_title=$_POST['title'];
$_id=$_POST['id'];
//$_active=$_POST['active'];
//$_draft=$_POST['draft'];
$_link=$_POST['inputLink'];
$_details=$_POST['details'];

//$_active=1;
if(array_key_exists('active',$_POST)){
    $_active=1;
}
else{
    $_active=0 ;
}
$approot=$_SERVER['DOCUMENT_ROOT'].'/crud';
if($_FILES['picture']['name']!=""){
        $file_name=$_FILES['picture']['name'];
        $target=$_FILES['picture']['tmp_name'];

        echo $target; echo "<br>";
        $destination=$approot.'/images/'.$_FILES['picture']['name'];
        echo $destination;
        $move=move_uploaded_file($target,$destination);
        if($move){
            $_picture=$file_name;
        }
    
    else{
        $_picture=null;
    }
}

else{
    $_picture=$_POST['old_img'];
}

$modified_at=date("Y-m-d h:i:s");
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";

$servername= "localhost";
$username = "root";
$password = "";


$conn = new PDO("mysql:host=$servername;dbname=crud", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query="UPDATE `crud1` SET `title` = :title, `active` = :active, `link` = :inputLink, `description` = :details, `picture`= :picture, `modified_at`=:modified_at WHERE `crud1`.`id` = :id";
$stmt=$conn->prepare($query);

$stmt->bindParam('id',$_id);
$stmt->bindParam('title',$_title);
$stmt->bindParam('active',$_active);
$stmt->bindParam('inputLink',$_link);
$stmt->bindParam('details',$_details);
$stmt->bindParam('picture',$_picture);
$stmt->bindParam('modified_at',$modified_at);
$result=$stmt->execute();
//var_dump($result);

?>