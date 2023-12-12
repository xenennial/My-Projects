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
        <?php
        if(isset(($_GET['msg'])){
            $msg = $_GET['msg'];
            echo '<div class="alert-warning alert dismissible fade show" role="alert">
            '.$msg.'
            <button types="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>
        <a href="add_new.php" class="btn btn-dark mb-3">Register</a>
        <a href="port.html" class="btn btn-dark mb-3">Back</a>

        <table class="table tabel-hover text-center">
  <thead class="table-dark">
    <tr>
      <th scope="col">Student ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Age</th>
      <th scope="col">Gender</th>
      <th scope="col">Address</th>
      <th scope="col">Father</th>
      <th scope="col">Mother</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <?php
    include "index.php";
        $sql = "SELECT * FROM 'student'";
        $result = mysqli_query($koneksi, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            ?>
              <tr>
                <td><?php echo $row ['student_id'] ?></td>
                <td><?php echo $row ['first_name'] ?></td>
                <td><?php echo $row ['last_name'] ?></td>
                <td><?php echo $row ['age'] ?></td>
                <td><?php echo $row ['gender'] ?></td>
                <td><?php echo $row ['address'] ?></td>
                <td><?php echo $row ['father_name'] ?></td>
                <td><?php echo $row ['mother_name'] ?></td>
                <td><?php echo $row ['email'] ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['student_id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                    <a href="delete.php?id=<?php echo $row['student_id'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                </td>
            </tr>
            <?php
        }
    ?>
  </tbody>
</table>
    </div>
 
<!--Jquery-->
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<!--Bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>