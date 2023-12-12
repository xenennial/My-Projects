<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Elste: Students</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   
   <!-- box icon -->
   <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>
<body>
   
<!-- header section starts  -->

<section class="header">

   <a href="home.php" class="logo">ELSTE.</a>

   <nav class="navbar">
      <a href="home.php">Home</a>
      <a href="about.php">About</a>
      <a href="package.php">Package</a>
      <a href="book.php">Register</a>
      <a href="student.php">Student</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>

<div class="content">
    <div class="heading" style="background:url(images/header-bg-1.png) no-repeat">
        <h1>Students Information</h1>
    </div>
</div>

<!-- packages section starts  -->

<!-- header section ends -->

<!-- card section start-->

<section class="packages">

   <h1 class="heading-title">Students</h1>

   <div class="box-container">
      <?php
      include 'config1.php';
      
      $query ="SELECT * FROM register_form";
      $query_run = mysqli_query($connection, $query);
      $check_class= mysqli_num_rows($query_run) > 0;

      if ($check_class)
      {
        while($row = mysqli_fetch_assoc($query_run))
        {
            ?>
          
            <div class="box">
                <div class="image">
                    <img src="images/<?php echo $row['photo'];?>">
                </div>
                <div class="content">
                    <h3><?php echo $row['name'];?></h3>
                    <div class="reviews">
                        <div class="swiper-slide slide">
                            <span><?php echo $row ['class'];?></span>
                        </div>
                    </div>
                    <p><?php echo $row ['phone'];?>/<?php echo $row ['email'];?>/<?php echo $row ['birth'];?></p>
                                   
                    <a href="edit_form.php?id=<?php echo $row['id']?>"><button class="btn"><i class='bx bx-edit-alt'></i></button></a>
                    <a href="delete.php?id=<?php echo $row['id']?>"><button class="btn"><i class='bx bxs-trash'></i></button></a>   
                    
                </div>
            </div>
            <?php
        }
       } 
       else
       {
        echo "Oh no! No Students Have Registered. Be The First One";
       }
       ?>
       </div>
    </div>
</section>

<!-- footer section starts  -->

<section class="footer">

   <div class="box-container">

      <div class="box">
         <h3>quick links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
         <a href="package.php"> <i class="fas fa-angle-right"></i> package</a>
         <a href="book.php"> <i class="fas fa-angle-right"></i> register</a>
         <a href="logout.php"> <i class="fas fa-angle-right"></i> logout</a>
      </div>

      <div class="box">
         <h3>extra links</h3>
         <a href="#"> <i class="fas fa-angle-right"></i> ask questions</a>
         <a href="#"> <i class="fas fa-angle-right"></i> about us</a>
         <a href="#"> <i class="fas fa-angle-right"></i> privacy policy</a>
         <a href="#"> <i class="fas fa-angle-right"></i> terms of use</a>
      </div>

      <div class="box">
         <h3>contact info</h3>
         <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
         <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
         <a href="#"> <i class="fas fa-envelope"></i> elsteschool@mail.com </a>
         <a href="#"> <i class="fas fa-map"></i> Hogward, USA - 505550 </a>
      </div>

      <div class="box">
         <h3>follow us</h3>
         <a href="https://www.facebook.com/"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="https://twitter.com/login"> <i class="fab fa-twitter"></i> twitter </a>
         <a href="https://www.instagram.com/jungkook.97/"> <i class="fab fa-instagram"></i> instagram </a>
         <a href="https://www.linkedin.com/login/"> <i class="fab fa-linkedin"></i> linkedin </a>
      </div>

   </div>

   <div class="credit"> Copy Right <span> @Elste. </span> | all rights reserved! </div>

</section>

<!-- footer section ends -->

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
