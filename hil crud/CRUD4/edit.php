<?php
include "header.php";
include "config.php";

if(isset($_GET['id'])){
    $get_id =  $_GET['id'];

    $sql = "SELECT * FROM crud3 WHERE id = '$get_id'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $gender = $row['gender'];
            $language = explode(',',$row['language']);
            $city = $row['city'];
            ?>

    <div class="container">
    <h2>Edit Form</h2>
    <form action="update.php" method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="col mb-3">
                <label for="name">Name :</label>
                <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>"> 
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
            </div>
            <div class="col mb-3">
                <label for="email">Email :</label>
                <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="phone">Phone :</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>">
            </div>
            <div class="col mb-3">
                <label for="address">Address :</label>
                <input type="address" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col my-3">
                <label for="gender">Gender :</label>
                <input type="radio" id="male" name="gender" value="male" <?php if($row['gender'] == "male") { echo "checked"; } ?>>
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female" <?php if($row['gender'] == "female") { echo "checked"; } ?>>
                <label for="female">Female</label>
            </div>
            <div class="col my-3">
                <label for="language">Language :</label>

                <input type="checkbox" name="language[]" id="gujarati" value="gujarati" <?php if(in_array("gujarati",$language)) { echo "checked"; } ?>>
                <label for="gujarati" class="mr-2">Gujarati</label>

                <input type="checkbox" name="language[]" id="hindi" value="hindi" <?php if(in_array("hindi",$language)) { echo "checked"; } ?>>
                <label for="hindi" class="mr-2">Hindi</label>

                <input type="checkbox" name="language[]" id="english" value="english" <?php if(in_array("english",$language)) { echo "checked"; } ?>>
                <label for="english">English</label>

            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label for="city">City :</label>
                <select class="form-select form-control" id="city" name="city">
                    <option selected>Select Your City</option>
                    <option value="surat" <?php if($row['city'] == "surat") { echo "selected"; } ?> >Surat</option>
                    <option value="bhavnagar" <?php if($row['city'] == "bhavnagar") { echo "selected"; } ?> >Bhavnagar</option>
                    <option value="rajkot" <?php if($row['city'] == "rajkot") { echo "selected"; } ?> >Rajkot</option>
                    <option value="ahmedabad" <?php if($row['city'] == "ahmedabad") { echo "selected"; } ?> >Ahmedabad</option>
                </select>
            </div>
            <div class="col mb-3">
                <label for="file">Select a file :</label>
                <div class="d-flex">
                <input type="file" class="form-control" id="file" name="file" style="padding: 3px 11px;">
                <img src="<?php echo $row['file']; ?>" alt="" width="70" height="70">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label for="password">Password :</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>">
            </div>
            <div class="col mb-3">
            </div>
        </div>

        <button type="submit" class="btn btn-warning mt-3" name="submit">Submit</button>
    </form>
</div>
<?php
        }
    }
}
?>