<?php
include "header.php";
include "config.php";

?>
<style>
    table,th,td{
        border: 1px solid black;
        border-collapse: collapse;
    }
    th,td{
        padding: 12px;
        text-align: center;
    }
    img{
        border-radius: 50%;
    }
</style>
<div class="container">
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Language</th>
            <th>City</th>
            <th>File</th>
            <th>Action</th>
        </tr>
        <tr>
            <?php
            $sql = "SELECT * FROM crud3 ORDER BY id DESC";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){

            ?>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['phone'] ?></td>
            <td><?php echo $row['address'] ?></td>
            <td><?php echo $row['gender'] ?></td>
            <td><?php echo $row['language'] ?></td>
            <td><?php echo $row['city'] ?></td>
            <td><img src="<?php echo $row['file'] ?>" alt="" width="70" height="70"></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id'] ?>"><kbd>Edit</kbd></a>
                <a href="delete.php?id=<?php echo $row['id'] ?>"><kbd>Delete</kbd></a>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</div>