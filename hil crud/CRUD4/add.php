<?php
include "header.php";
include "config.php";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $language = implode(',',$_POST['language']);
    $city = $_POST['city'];
    $password = md5($_POST['password']);

    $file_name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];

    $file_path = "../image2/" . uniqid() . '-' . $file_name;

    move_uploaded_file($tmp_name,$file_path);

    $sql = "INSERT INTO crud3 (name,email,phone,address,gender,language,city,file,password) VALUES ('$name','$email','$phone','$address','$gender','$language','$city','$file_path','$password')";

    mysqli_query($conn,$sql);
    header("location:index.php");

    
}
?>
<div class="container">
    <h2>Form</h2>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="col mb-3">
                <label for="name">Name :</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
            </div>
            <div class="col mb-3">
                <label for="email">Email :</label>
                <input type="email" class="form-control" placeholder="Enter Email" name="email">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="phone">Phone :</label>
                <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone">
            </div>
            <div class="col mb-3">
                <label for="address">Address :</label>
                <input type="address" class="form-control" id="address" placeholder="Enter Address" name="address">
            </div>
        </div>

        <div class="row">
            <div class="col my-3">
                <label for="gender">Gender :</label>
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label>
            </div>
            <div class="col my-3">
                <label for="language">Language :</label>

                <input type="checkbox" name="language[]" id="gujarati" value="gujarati">
                <label for="gujarati" class="mr-2">Gujarati</label>

                <input type="checkbox" name="language[]" id="hindi" value="hindi">
                <label for="hindi" class="mr-2">Hindi</label>

                <input type="checkbox" name="language[]" id="english" value="english">
                <label for="english">English</label>

            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label for="city">City :</label>
                <select class="form-select form-control" id="city" name="city">
                    <option selected>Select Your City</option>
                    <option value="surat">Surat</option>
                    <option value="bhavnagar">Bhavnagar</option>
                    <option value="rajkot">Rajkot</option>
                    <option value="ahmedabad">Ahmedabad</option>
                </select>
            </div>
            <div class="col mb-3">
                <label for="file">Select a file :</label>
                <input type="file" class="form-control" id="file" name="file" style="padding: 3px 11px;">
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label for="password">Password :</label>
                <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
            </div>
            <div class="col mb-3">
            </div>
        </div>

        <button type="submit" class="btn btn-warning mt-3" name="submit">Submit</button>
    </form>
</div>