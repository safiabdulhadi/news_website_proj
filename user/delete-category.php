<?php
include "../db_config.php";

    $cat_id = $_GET['id'];

    $sql = "DELETE FROM categories WHERE id = {$cat_id}";

    if(mysqli_query($conn, $sql)){

        header("Location:{$URL}/user/categories.php");
    }
?>