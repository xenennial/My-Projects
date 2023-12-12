<?php

   include 'config1.php';

   if(isset($_POST['send'])){
      $name = $_POST['name'];
      $gender = $_POST['gender'];
      $phone = $_POST['phone'];
      $alamat = $_POST['alamat'];
      $class = $_POST['class'];
      $email = $_POST['email'];
      $birth = $_POST['birth'];
      $photo = $_POST['photo'];
      

      $request = " insert into register_form(name, gender, phone, alamat, class, email, birth, photo) values('$name','$gender','$phone','$alamat','$class','$email','$birth','$photo') ";
      mysqli_query($connection, $request);

      header('location:book.php'); 

   }else{
      echo 'something went wrong please try again!';
   }

?>