<?php include_once("common/header.php"); ?>
<?php
// the Session start already link on common header
$sql = "SELECT * FROM admin WHERE id = {$_SESSION['admin_id']}";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

if ($row['status'] == 1) {
    $status = "Active";
} else {
    $status = "Inactive";
}
?>

<div class="row">
    <div class="col">
        <div class="user-thumb">
            <div class="user-img">
                <img src="../assets/images/<?php echo $row['picture']; ?>" alt="">
                <a href="edit-profile.php"><i class="fa-solid fa-pen-to-square"></i></a>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col">
        <div class="card p-3 user-info">
            <h3>User Information</h3>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span><i class="fa-solid fa-user me-2"></i>User Name:</span><?php echo $row['user_name']; ?></li>
                <li class="list-group-item"><span><i class="fa-solid fa-venus-mars me-2"></i>Gender:</span> <?php echo $row['gender']; ?></li>
                <li class="list-group-item"><span><i class="fa-solid fa-envelope me-2"></i>Email:</span><?php echo $row['email']; ?></li>
                <li class="list-group-item"><span><i class="fa-sharp fa-solid fa-circle-check me-2"></i>Status:</span> <span class="badge bg-success"><?php echo $status ?></span> </li>
                <li class="list-group-item"><span><i class="fa-solid fa-lock me-2"></i></i>Password:</span> <a href="change-password.php" class="btn btn-sm bg-warning">Chage password</a> </li>
            </ul>
        </div>
    </div>
</div>







<?php include_once("common/footer.php"); ?>