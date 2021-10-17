<?php
    session_start();
    include 'connect.php';

    if(!isset($_SESSION['email'])){
        echo "<scrpit>window.open('admin.php','_self')</script>";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php require 'Partial/nav2.php'  ?>
<br><br>
<div class="container">
  <h2>ADD user</h2>
  <form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
      <label >First Name:</label>
      <input type="text" class="form-control"  placeholder="First Name" name="user_fname">
    </div>
    <div class="form-group">
      <label >Last Name:</label>
      <input type="text" class="form-control"  placeholder="Last Name" name="user_lname">
    </div>
    
    
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control"  placeholder="Enter email" name="user_email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control"  placeholder="Enter password" name="user_password">
    </div>
    <div class="form-group">
      <label >Profile Picture</label>
      <input type="file" class="form-control"  placeholder="Image" name="user_pic">
    </div>
    <div class="mb-3">
        <label>Date of Birth</label>
        <input type="date" class="form-control" id="dob" name="user_dob">
    </div>

    <input type="submit" name="insert-btn" class="btn btn-primary"/>
  </form>
  <?php

    $server ="localhost";
    $username = "root";
    $password = "";
    $database = "new_user";


$conn = mysqli_connect($server, $username, $password, $database);



    if(isset($_POST['insert-btn'])){
        $user_fname = $_POST['user_fname'];
        $user_lname = $_POST['user_lname'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_pic = $_FILES['user_pic']['name'];
        $user_tmp_pic = $_FILES['user_pic']['tmp_name'];
        $user_dob = $_POST['user_dob'];

        $insert = "INSERT INTO `user`(`user_fname`, `user_lname`, `user_email`, `user_password`, `user_dob`, `user_img`) VALUES ('$user_fname','$user_lname ','$user_email','$user_password',' $user_dob','$user_pic')";
        
        $run_insert = mysqli_query($conn, $insert);
        if($run_insert == True){
            echo "Saved";
            move_uploaded_file($user_tmp_pic,"upload/$user_pic");

        }else{
            echo "failed";
        }

    }

   


?>
</div>


</body>
</html>
