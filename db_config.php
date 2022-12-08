<?php

// Connection Variables
$host = "localhost";
$user = "root";
$password = "Safi1994?";
$db_name = "9pm_news";

// create database connection
$conn = mysqli_connect($host,$user, $password, $db_name) OR die ("Connection failed");

// create url connection
$URL = "http://localhost/news_website_proj";

?>