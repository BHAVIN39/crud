<?php
include "header.php";
include "config.php";

$id = $_GET['id'];

$sql = "DELETE FROM crud3 WHERE id = '$id'";

mysqli_query($conn,$sql);
header("location:index.php");
?>