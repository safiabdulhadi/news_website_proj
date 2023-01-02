<?php include_once("common/header.php"); ?>

<?php
$sql = "SELECT * FROM users WHERE id = {$_SESSION['user_id']}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


if (isset($_POST['update-btn'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $fb = $_POST['fb'];
    $instagram = $_POST['instagram'];
    $twitter = $_POST['twitter'];

    if ($_FILES['new-picture']['name'] == "") {
        $picture = $_POST['old-picture'];
    } else {
        $new_pic_name = $_FILES['new-picture']['name'];
        $ext = strtolower(pathinfo($new_pic_name, PATHINFO_EXTENSION));
        $size = $_FILES['new-picture']['size'] / 1024;
        $valid_ext = ['png', 'jpg', 'jpeg'];

        if (in_array($ext, $valid_ext)) {
            if ($size > 2048) {
                $msg = "<div class='alert alert-danger mt-3'>Picture size must not be greater than 2MB</div>";
            } else {
                $picture = time() . "." . $ext;
                move_uploaded_file($_FILES['new-picture']['tmp_name'], "../assets/images/$picture");
            }
        } else {
            $msg = "<div class='alert alert-danger mt-3'>Invalid file type , please choose (png, jpg, jpeg)</div>";
        }

        // UPDATE QUERY
        $update = "UPDATE users SET user_name = '{$name}', gender = '{$gender}' , email = '{$email}', fb = '{$fb}', instagram = '{$instagram}', twitter = '{$twitter}' , picture = '{$picture}' WHERE id = {$_SESSION['user_id']}";

        if (mysqli_query($conn, $update)) {
            header("Location:{$URL}/user/profile.php");
        }
    }
}
?>

<h3 class="mt-4">Update Profile</h3>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="row mt-3">
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" value="<?php echo $row['user_name']; ?>">
        <small></small>
    </div>

    <div class="form-group col-md-6">
        <select class="form-control" name="gender" id="gender">
            <option value="">Select Gender</option>

            <?php
            if ($row['gender']  == "Male") {
                echo "
                <option selected value='Male'>Male</option>
                <option value='Female'>Female</option>
                <option value='Custom'>Custom</option>
                ";
            } else if ($row['gender'] == "Female") {
                echo "
                <option value='Male'>Male</option>
                <option selected  value='Female'>Female</option>
                <option value='Custom'>Custom</option>
                ";
            } else if ($row['gender'] == "Custom") {
                echo "
                <option value='Male'>Male</option>
                <option value='Female'>Female</option>
                <option  selected  value='Custom'>Custom</option>
                ";
            }
            ?>


        </select>
        <small></small>
    </div>
    <div class="form-group col-md-6">
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" value="<?php echo $row['email']; ?>">
        <small></small>
    </div>
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="fb" id="facebook" placeholder="Enter your Facebook" value="<?php echo $row['fb']; ?>">
        <small></small>
    </div>
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Enter your Instagram" value="<?php echo $row['instagram']; ?>">
        <small></small>
    </div>
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Enter your Twitter" value="<?php echo $row['twitter']; ?>">
        <small></small>
    </div>
    <div class="form-group col-md-12">
        <input type="hidden" name="old-picture" value="<?php echo $row['picture']; ?>">
        <input type="file" class="form-control" name="new-picture" id="picture">
        <img src="../assets/images/<?php echo $row['picture']; ?>" class="img-thumbnail mt-3" width="140px" alt="">
        <small></small>
    </div>

    <div class="form-group col-md-6">
        <button class="btn btn-success" name="update-btn" id="update-btn">Update</button>
        <small></small>
    </div>
</form>
<?php if (isset($msg)) echo $msg ?>


<?php include_once("common/footer.php"); ?>