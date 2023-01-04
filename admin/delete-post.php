<?php
include "../db_config.php";

    $post_id = $_GET['id'];

    $sql = "DELETE FROM posts WHERE id = {$post_id}";

    if(mysqli_query($conn, $sql)){

        header("Location:{$URL}/admin/posts.php");
    }
?>