<?php
include "header.php";
include "config.php";

if(isset($_POST['submit'])){
    $get_id = $_POST['id'];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $language = implode(',',$_POST['language']);
    $city = $_POST['city'];
    $password = md5($_POST['password']);

    $file_name = $_FILES['file']['name'];

    if($file_name > 1){

        $tmp_name = $_FILES['file']['tmp_name'];

        $file_path = "../image2/" . uniqid() . '-' . $file_name;

        move_uploaded_file($tmp_name,$file_path);

        $sql = "UPDATE crud3 SET name='$name', email='$email', phone='$phone', address='$address', gender='$gender', language='$language', city='$city', file='$file_path', password='$password' WHERE id = '$get_id'";
    } else{
        $sql = "UPDATE crud3 SET name='$name', email='$email', phone='$phone', address='$address', gender='$gender', language='$language', city='$city', password='$password' WHERE id = '$get_id'";

    }
    
    mysqli_query($conn,$sql);
    header("location:index.php");

}
?>