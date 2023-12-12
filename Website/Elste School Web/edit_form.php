<?php
// include database connection file
include 'config1.php';
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
   $id = $_POST['id'];
    
   $name = $_POST['name'];
   $gender = $_POST['gender'];
   $phone = $_POST['phone'];
   $alamat = $_POST['alamat'];
   $class = $_POST['class'];
   $email = $_POST['email'];
   $birth = $_POST['birth'];
   $photo = $_POST['photo'];
        
    // update user data
    $result = mysqli_query($connection, "UPDATE register_form SET name='$name',gender='$gender', phone='$phone', alamat='$alamat', class='$class', email='$email', birth='$birth', photo='$photo' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: student.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
   $id = $_GET['id'];
 
   // Fetech user data based on id
   $result = mysqli_query($connection, "SELECT * FROM register_form WHERE id=$id");
 
   while($register_form = mysqli_fetch_array($result))
   {
      $name = $register_form['name'];
      $gender = $register_form['gender'];
      $phone = $register_form['phone'];
      $alamat = $register_form['alamat'];
      $class = $register_form['class'];
      $email = $register_form['email'];
      $birth = $register_form['birth'];
      $photo = $register_form['photo'];
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Elste: Update Information</title>

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

<div class="heading" style="background:url(images/header-bg-3.png) no-repeat">
   <h1>Update Information</h1>
</div>

<!-- booking section starts  -->

<section class="booking">

   <h1 class="heading-title">Update Yours!</h1>

   
   <form name="update" method="post" class="book-form" action="edit_form.php">
      <div class="flex">
         <div class="inputBox">
            <span>name :</span>
            <input type="text" placeholder="enter your name" name="name" value=<?php echo $name;?>>
         </div>
         <div class="inputBox">
            <span>gender :</span>
            <input type="text" placeholder="enter your gender: female/male" name="gender" value=<?php echo $gender;?>>
         </div>
         <div class="inputBox">
            <span>phone :</span>
            <input type="number" placeholder="enter your number" name="phone" value=<?php echo $phone;?>>
         </div>
         <div class="inputBox">
            <span>address :</span>
            <input type="text" placeholder="enter your address" name="alamat" value=<?php echo $alamat;?>>
         </div>
         <div class="inputBox">
            <span>class :</span>
            <input type="text" placeholder="class you want to register" name="class" value=<?php echo $class;?>>
         </div>
         <div class="inputBox">
            <span>email :</span>
            <input type="email" placeholder="Enter your email" name="email"value=<?php echo $email;?>>
         </div>
         <div class="inputBox">
            <span>Birth Date :</span>
            <input type="date" name="birth" value=<?php echo $birth;?>>
         </div>
         <div class="inputBox">
            <span>Pass Photo :</span>
            <input type="file" placeholder="photo.jpg" name="photo" value=<?php echo $photo;?>>
         </div> 
      </div>

      <a href="student.php" class="btn">Cancel</a>
      <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
      <input type="submit" value="Update" class="btn" name="update">

   </form>

</section>

<!-- booking section ends -->

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
</section>

<!-- footer section ends -->

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>