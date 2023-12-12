<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "register_db";

$connection = mysqli_connect($server, $user, $pass, $database);

if (!$connection) {
    die("<script>alert('Connection Failed.')</script>");
}

?>