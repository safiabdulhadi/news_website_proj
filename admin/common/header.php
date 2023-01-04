<?php
session_start();
// IMPORT CONNECTION File
include "../db_config.php";

if(!isset($_SESSION['admin_id'])){

    header("Location:{$URL}/admin");
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- INCLUDES LINKS FILES -->
    <?php include("links.php"); ?>
    <title>DASHBOARD</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row sidebar-row">
            <!-- SidBar -->
            <div class="col-md-2">
                <div class="sidebar-header">
                    <div class="profile-thumb">
                        <img src="../assets/images/<?php echo $_SESSION['picture']?>" alt="">
                    </div>
                    <div class="profile-details">
                        <h5><?php echo $_SESSION['admin_name'];?></h5>
                        <p>(Admin)</p>
                    </div>
                </div>
                <div class="sidebar-body">
                    <ul>
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="posts.php">Posts</a></li>
                        <li><a href="categories.php">Categories</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="users.php">Users</a></li>
                    </ul>
                </div>
                <div class="sidebar-footer">
                    <ul>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
            <!-- Main Content -->
            <div class="col-md-10">