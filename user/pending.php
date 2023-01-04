<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("common/links.php");?>
    <title>Document</title>
</head>
<body>
  <?php include('../db_config.php');?>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card p-4 text-center">
                    <p><img src="../assets/images/icon.jpg" width="15%" alt=""></p>
                    <h2>Please wait approve your request. </h2>
                    <a href="<?php echo $URL ;?>" class="btn btn-sm btn-info">Back Home</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>