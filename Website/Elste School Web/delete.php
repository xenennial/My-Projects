<?php
include "config1.php";

$id = $_GET['id'];

$result = mysqli_query($connection, "DELETE FROM register_form WHERE id=$id");

header("Location:student.php");
?>