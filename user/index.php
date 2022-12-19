<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootsrap Links -->

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <!-- Fontawsome Link -->
  <link rel="stylesheet" href="../assets/css/all.min.css">

  <!-- Custom Link -->
  <link rel="stylesheet" href="../assets/css/style.css">


  <title>NEWS SITE</title>
</head>

<body class="login-body">

  <?php
  // IMPORT CONNECTION File
  include "../db_config.php";
  if (isset($_POST['login-btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '{email}'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

      $row = mysqli_fetch_assoc($result);
      if ($password == $row['password']) {

        if ($row['status'] == 1) {
          $_SESSION['user_id'] = $row['id'];
          $_SESSION['user_name'] = $row['user_name'];
          $_SESSION['gender'] = $row['gender'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['picture'] = $row['picture'];

          header("Location:{URL}/user/dashboard.php ");
        } else {
          $msg = "<div class='alert alert-danger py-2 mt-3'> Your account has been disabled, Contact Admin !</div>";
        }
      } else {
        $msg = "<div class='alert alert-danger py-2 mt-3'> Incorrect password!</div>";
      }
    } else {

      $msg = "<div class='alert alert-danger  py-2 mt-3'> Incorrect Email!</div>";
    }
  } ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="cus-card">
          <h2 class="text-center">Login</h2>

          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validate()" method="POST">
            <div class="form-group mb-4">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email">
              <small class="text-danger" id="email-error"></small>
            </div>
            <div class="form-group mb-3">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password">
              <small class="text-danger" id="password-error"></small>
            </div>
            <div class="form-group">
              <button class="btn btn-outline-primary mb-5" name="login-btn">Login</button>
            </div>
            <div class="text-center">
              <a href="" class="badge bg-info text-decoration-none text-white">Back to Home Page</a>
            </div>
            <?php if (isset($msg)) echo $msg; ?>
          </form>

        </div>
      </div>
    </div>
  </div>

  <script>
    const validate = () => {
      const email = document.querySelector('#email');
      const password = document.querySelector('#password');
      const emailError = document.querySelector('#email-error');
      const passwordError = document.querySelector('#password-error');

      // Check for value
      if (email.value === "") {
        emailError.innerText = "Email field is required!";
        return false;
      } else if (password.value === "") {
        emailError.innerText = "";
        passwordError.innerText = "Password field is required!";
        return false;
      }
    }
  </script>




  <!-- Customs js  -->
  <script src="../assets/js/app.js"></script>
  <!-- Bootstraps js -->
  <script src="../assets/js/bootstrap.bundle.js"></script>

</body>

</html>