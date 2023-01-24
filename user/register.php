<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("common/links.php"); ?>
    <title>Register User</title>
</head>

<body>

    <?php

    if (isset($_POST['reg-btn'])) {
        include("../db_config.php");
        $user_name = $_POST['user_name'];
        $gender = $_POST['gender'];
        $email = htmlspecialchars( $_POST['email']);
        $password = md5($_POST['password']); // for security password it will create us 32 characters
        $fb = $_POST['fb'];
        $error = false;
        $instagram = $_POST['instagram'];
        $twitter = $_POST['twitter'];
        $regex = "#[A-Za-z0-9-_\.]+@[a-zA-z0-9]+.[a-zA-Z]{2,3}#";
        if (preg_match($regex, $_POST['email'], $_POST['password'])) {
            //Correct email address, you can send the email
        } else {
            echo "Incorrect email address, please enter a correct address.";
            $error = true;
        }
        $picture = $_FILES['picture']['name'];
        $extension = strtolower(pathinfo($picture, PATHINFO_EXTENSION));
        $size = $_FILES['picture']['size'] / 1024;
        $valid_extension = ['png', 'jpg', 'jpeg'];
        $new_name = time() . "." . $extension;
        if (in_array($extension, $valid_extension)) {
            if ($size > 5000) {
                $msg = "<div class='alert alert-danger mt-2'>Picture size must not be greater than 2MB</div>";
            } else {
                if (move_uploaded_file($_FILES['picture']['tmp_name'], "../assets/images/$new_name")) {

             // $sql = "INSERT INTO users (user_name, gender, email, password, fb, instagram , twitter, picture)VALUES('{$user_name}','{$gender}','{$email}','{$password}','{$fb}','{$instagram}','{$twitter}','{$new_name}')";

// <script>alert("coucou");</script>
                    // UPDATE QUERY
   $prep = mysqli_prepare($conn, "INSERT INTO users (user_name, gender, email, password, fb, instagram , twitter, picture) VALUES(?,?,?,?,?,?,?,?)");
   mysqli_stmt_bind_param($prep,"ssssssss", $user_name,$gender,$email,$password,$fb,$instagram,$twitter,$new_name);


                    // if (!$error && mysqli_query($conn, $sql)) {
                    //     header("Location:{$URL}/user/pending.php");
                    // } else {
                    //     $msg = '<div class="alert alert-danger">Internam error!</div>';
                    // }

                    if(!$error && mysqli_stmt_execute($prep)){
                        $msg = "<div class='alert alert-success' >Internam error!!</div>";
                        header("Location:{$URL}/user/pending.php");
                    }else{
                        $msg = "<div class='alert alert-danger' >Internam error!! </div>";
                    }



                }
            }
        } else {
            $msg = "<div class='alert alert-danger mt-2'>Invalid file type, please select (png, jpg, jpeg) </div>";
        }
    }


    ?>

    <div class="container">
        <div class="row mt-3">
            <div class="card p-3">
                <h3 style="text-align: center">Sign Up</h3>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validate();" method="POST" enctype="multipart/form-data" class="row mt-3">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Enter Your Name">
                        <small></small>
                    </div>
                    <div class="form-group col-md-6">
                        <select name="gender" class="form-control" id="gender">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Custom">Custom</option>
                        </select>
                        <small></small>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email Address">
                        <small></small>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password">
                        <small></small>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Your Password">
                        <small></small>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="fb" id="fb" placeholder="Enter Your Facebook">
                        <small></small>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Enter Your Instagram">
                        <small></small>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Enter Your Twitter">
                        <small></small>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="file" class="form-control" name="picture" id="picture">
                        <small></small>
                    </div>

                    <div class="form-group col-md-6">
                        <button name="reg-btn" class="btn btn-sm btn-outline-primary">Register</button>
                    </div>
                    <?php if (isset($msg)) echo $msg; ?>
                </form>
            </div>
        </div>
    </div>
    <script>
        const validate = () => {
            const input = document.querySelectorAll('.form-control');
            if (input[0].value === "") {
                input[0].nextElementSibling.innerHTML = "<i class='fa-solid fa-circle-info'>User Name is required!</i>";
                input[0].nextElementSibling.style.padding = "0px 5px";
                return false;
            } else if (input[1].value === "") {
                input[0].nextElementSibling.innerHTML = "";
                input[0].nextElementSibling.style.padding = "";
                input[1].nextElementSibling.innerHTML = "<i class='fa-solid fa-circle-info'>Gender is required!</i>";
                input[1].nextElementSibling.style.padding = "0px 5px";
                return false;
            } else if (input[2].value === "") {
                input[1].nextElementSibling.innerHTML = "";
                input[1].nextElementSibling.style.padding = "";
                input[2].nextElementSibling.innerHTML = "<i class='fa-solid fa-circle-info'>Your Email Address is required!</i>";
                input[2].nextElementSibling.style.padding = "0px 5px";
                return false;
            } else if (input[3].value === "") {
                input[2].nextElementSibling.innerHTML = "";
                input[2].nextElementSibling.style.padding = "";
                input[3].nextElementSibling.innerHTML = "<i class='fa-solid fa-circle-info'>Your Password is required!</i>";
                input[3].nextElementSibling.style.padding = "0px 5px";
                return false;
            } else if (input[4].value === "") {
                input[3].nextElementSibling.innerHTML = "";
                input[3].nextElementSibling.style.padding = "";
                input[4].nextElementSibling.innerHTML = "<i class='fa-solid fa-circle-info'>Confirm Password is required!</i>";
                input[4].nextElementSibling.style.padding = "0px 5px";
                return false;
            } else if (input[3].value != input[4].value) {
                input[4].nextElementSibling.innerHTML = "<i class='fa-solid fa-circle-info'> Password didn't Match!</i>";
                input[4].nextElementSibling.style.padding = "0px 5px";
                return false;
            } else if (input[5].value === "") {
                input[4].nextElementSibling.innerHTML = "";
                input[4].nextElementSibling.style.padding = "";
                input[5].nextElementSibling.innerHTML = "<i class='fa-solid fa-circle-info'>Your Facebook Acount is required!</i>";
                input[5].nextElementSibling.style.padding = "0px 5px";
                return false;
            } else if (input[6].value === "") {
                input[5].nextElementSibling.innerHTML = "";
                input[5].nextElementSibling.style.padding = "";
                input[6].nextElementSibling.innerHTML = "<i class='fa-solid fa-circle-info'>Your Instagram Acount is required!</i>";
                input[6].nextElementSibling.style.padding = "0px 5px";
                return false;
            } else if (input[7].value === "") {
                input[6].nextElementSibling.innerHTML = "";
                input[6].nextElementSibling.style.padding = "";
                input[7].nextElementSibling.innerHTML = "<i class='fa-solid fa-circle-info'>Your Twitter Acounts is required!</i>";
                input[7].nextElementSibling.style.padding = "0px 5px";
                return false;
            } else if (input[8].value === "") {
                input[7].nextElementSibling.innerHTML = "";
                input[7].nextElementSibling.style.padding = "";
                input[8].nextElementSibling.innerHTML = "<i class='fa-solid fa-circle-info'>Gender is required!</i>";
                input[8].nextElementSibling.style.padding = "0px 5px";
                return false;
            }
        }
    </script>

</body>

</html>