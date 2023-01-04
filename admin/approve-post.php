<?php
include('../db_config.php');
$postid = $_GET['postid'];
$status = $_GET['status'];

$sql = "UPDATE posts SET status = {$status} WHERE id = {$postid}";

mysqli_query($conn, $sql);
header("Location: {$URL}/admin/posts.php");
?>