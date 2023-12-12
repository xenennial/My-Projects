<?php
include "index.php";
$id = $_GET['student_id'];

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $email = $_POST['email']; 

    $sql = "UPDATE 'register' SET 'first_name'='$first_name', 'last_name'='$last_name','age'='$age',
    'gender'='$gender','address'='$address','father_name'='$father_name','mother_name'='$mother_name','email'='$email' WHERE student_id=$student_id";

    $result = mysqli_query($koneksi, $sql);

    if($result) {
        header("Location: success.php?= Data Update Successfully");
    }
    else {
        echo "Failed: " . mysqli_error($koneksi);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Register</title>
    <link rel="shortcut icon" href="/image/magichat.png">
    
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #cd18e4;">
        Student Registration
    </nav>

    <div class="container">
        <div class="tect-center mb-4">
            <h3>Edit Student Infromation</h3>
            <p class="text-muted">Do not forget to save after changing any information</p>
        </div>

        <?php
        
        $sql = "SELECT * FROM 'student' WHERE student_id = $student_id LIMIT 1";
        $result = mysqli_query($koneksi, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">First Name: </label>
                        <input type="text" class="form-control" name="first_name" 
                        value="<?php echo $row['first_name']?>">
                    </div>
                    <div class="col">
                        <label class="form-label">Last Name: </label>
                        <input type="text" class="form-control" name="last_name" 
                        value="<?php echo $row['last_name']?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Age: </label>
                    <input type="number" class="form-control" name="age" 
                    value="<?php echo $row['age']?>">
                </div>

                <div class="form-group mb-3">
                    <label>Gender: </label> &nbsp;
                    <input type="radio" class="form-check-input" name="gender"
                    id="male" value="male" <?php echo ($row['gender']=="male")?"checked":""; ?>>
                    <label for="male" class="form-input-label">Male</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="gender"
                    id="female" value="female" <?php echo ($row['gender']=="female")?"checked":""; ?>>
                    <label for="female" class="form-input-label">Female</label>

                <div class="mb-3">
                    <label class="form-label">Address: </label>
                    <input type="text" class="form-control" name="address" 
                    value="<?php echo $row['address']?>">
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Father Name: </label>
                        <input type="text" class="form-control" name="father_name" 
                        value="<?php echo $row['father_name']?>">
                    </div>
                    <div class="col">
                        <label class="form-label">Mother Name: </label>
                        <input type="text" class="form-control" name="mother_name" 
                        value="<?php echo $row['mother_name']?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email: </label>
                    <input type="email" class="form-control" name="email" 
                    value="<?php echo $row['email']?>">
                </div>
                <div>
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                    <a href="index.php" class="btn btn-danger">Cancle</a>
                </div>
            </form>
        </div>
    </div>
 
<!--Jquery-->
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<!--Bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>