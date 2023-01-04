<?php
include('../db_config.php');
$userid = $_GET['userid'];
$status = $_GET['status'];

$sql = "UPDATE users SET status = {$status} WHERE id = {$userid}";

mysqli_query($conn, $sql);
header("Location: {$URL}/admin/users.php");
?>