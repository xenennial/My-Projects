<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

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

<!-- header section ends -->

<!-- home section starts  -->

<section class="home">

   <div class="swiper home-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide" style="background:url(images/home-slide-1.jpg) no-repeat">
            <div class="content">
               <span>Veni, Vidi, Vici</span>
               <h3>Learn something new everyday</h3>
               <a href="package.php" class="btn">discover more</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/home-slide-2.jpg) no-repeat">
            <div class="content">
               <span>Veni, Vidi, Vici</span>
               <h3>Discover a new way to learn</h3>
               <a href="package.php" class="btn">discover more</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/home-slide-3.jpg) no-repeat">
            <div class="content">
               <span>Veni, Vidi, Vici</span>
               <h3>Be the best of you</h3>
               <a href="package.php" class="btn">discover more</a>
            </div>
         </div>
         
      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>

   </div>

</section>

<!-- home section ends -->

<!-- services section starts  -->

<section class="services">

   <h1 class="heading-title"> our services </h1>

   <div class="box-container">

      <div class="box">
         <img src="images/icon-1.png" alt="">
         <h3>Certified</h3>
      </div>

      <div class="box">
         <img src="images/icon-2.png" alt="">
         <h3>E-books</h3>
      </div>

      <div class="box">
         <img src="images/icon-3.png" alt="">
         <h3>Laboratory</h3>
      </div>

      <div class="box">
         <img src="images/icon-4.png" alt="">
         <h3>Extracurricular</h3>
      </div>

      <div class="box">
         <img src="images/icon-5.png" alt="">
         <h3>Tour</h3>
      </div>

   </div>

</section>

<!-- services section ends -->

<!-- home about section starts  -->

<section class="home-about">

   <div class="image">
      <img src="images/about.jpg" alt="">
   </div>

   <div class="content">
      <h3>about us</h3>
      <p>We are Elste, a school for everyone. Teaching Is Our Passion. We teach sincerely to develop our students' potential. We have a variety of learning methods that always keep up with the times and are adapted to the subjects studied. OUR STUDENTS ARE OUR PRIDE.</p>
      <a href="about.php" class="btn">read more</a>
   </div>

</section>

<!-- home about section ends -->

<!-- home packages section starts  -->

<section class="home-packages">

   <h1 class="heading-title"> our class packages </h1>

   <div class="box-container">

      <div class="box">
         <div class="image">
            <img src="images/math.jpg" alt="">
         </div>
         <div class="content">
            <h3>Math</h3>
            <p>A fun math class that will never make you bored!</p>
            <a href="book.php" class="btn">register now</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/programming.jpg" alt="">
         </div>
         <div class="content">
            <h3>Programming</h3>
            <p>Learn programming with experienced educators!</p>
            <a href="book.php" class="btn">register now</a>
         </div>
      </div>
      
      <div class="box">
         <div class="image">
            <img src="images/art.jpg" alt="">
         </div>
         <div class="content">
            <h3>Art</h3>
            <p>Explore your imagination in extraordinary ways!</p>
            <a href="book.php" class="btn">register now</a>
         </div>
      </div>

   </div>

   <div class="load-more"> <a href="package.php" class="btn">load more</a> </div>

</section>

<!-- home packages section ends -->

<!-- home offer section starts  -->

<section class="home-offer">
   <div class="content">
      <h3>upto 50% off</h3>
      <p>Get upto 50% registration fee off. Register yourself now!<br>Untill 31st December 2222</br></p>
      <a href="book.php" class="btn">book now</a>
   </div>
</section>

<!-- home offer section ends -->

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