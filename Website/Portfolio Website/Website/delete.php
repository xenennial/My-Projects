<?php
$id = $_GET['id'];
$sql = "DELETE FROM 'student' WHERE student_id = $student_id";
$result = mysqli_query($koneksi, $sql);
if (result){
    header("Location: success.php?msg=Record deleted successfully");   
}
else{
    echo "Failed: " . mysqli_error($koneksi);
}