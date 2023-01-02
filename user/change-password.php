<?php include_once("common/header.php"); ?>

<?php
if(isset($_POST['change-btn'])){
    $current = $_POST['current-password'];
    $new_password = $_POST['new-password'];
    $check_password = "SELECT * FROM users WHERE password = '{$current}' AND id = {$_SESSION['user_id']}";
    $result = mysqli_query($conn, $check_password);

    if(mysqli_num_rows($result) > 0){
    $update_password = "UPDATE users SET password = '{$new_password}' WHERE id = {$_SESSION['user_id']}";
    $update_result = mysqli_query($conn, $update_password);

    if($update_result){
      $msg = "<div class='alert alert-success mt-2'>password changed successfully!</div>";
    }else{
        $msg = "<div class='alert alert-success mt-2'>Something went wrong</div>";
    }

    }else{
        $msg = "<div class='alert alert-danger mt-2'>Current password did'nt match!</div>";
    }
}
?>


<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6">
            <div class="cus-card">
                <h2 class="text-center">Update Password</h2>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validate();" method="POST">
                    <div class="form-group mb-4">
                        <label for="current-password">Current Password</label>
                        <input type="password" class="form-control" name="current-password" id="current-password">
                        <small class="text-danger text-white" id="current-password-error"></small>
                    </div>
                    <div class="form-group mb-3">
                        <label for="new-password">New Password</label>
                        <input type="password" class="form-control" name="new-password" id="new-password">
                        <small class="text-danger text-white" id="new-password-error"></small>
                    </div>
                    <div class="form-group mb-3">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm-password" id="confirm-password">
                        <small class="text-danger text-white" id="confirm-password-error"></small>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-primary mb-5" name="change-btn">Change</button>
                    </div>
                    <?php if(isset($msg))echo $msg; ?>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const validate = () => {
        const currentPassword = document.querySelector('#current-password');
        const newPassword = document.querySelector('#new-password');
        const confirmPassword = document.querySelector('#confirm-password');
        const currentPassError = document.querySelector('#current-password-error');
        const newPassError = document.querySelector('#new-password-error');
        const confirmPassError = document.querySelector('#confirm-password-error');

        // Check for value
        if (currentPassword.value === "") {
            currentPassError.innerHTML = "<i class='fa-solid fa-circle-info'>Current Password field is required!</i>";
            return false;
        } else if (newPassword.value === "") {
            currentPassError.innerText = "";
            newPassError. innerHTML = "<i class='fa-solid fa-circle-info'>Password field is required!</i>";
            return false;
        }else if(confirmPassword.value === ""){
            newPassError.innerText = "";
            confirmPassError.innerHTML = "<i class='fa-solid fa-circle-info'>Confirm Password field is required!</i>";

        }else if(newPassword.value !== confirmPassword.value){
            confimPassError.innerHTML = "<i class='fa-solid fa-circle-info'>Password didn't match!</i>";
        }
    }
</script>



</body>

</html>










<?php include_once("common/footer.php"); ?>