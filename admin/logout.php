<?php
session_start();
include "../db_config.php";
session_unset();

session_destroy();

header("Location: {$URL}/admin");


?>