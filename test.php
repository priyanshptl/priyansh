<body>
<br><br>
<div class="container">
<?php require 'Partial/nav2.php'  ?>
  <h2>Edit User Details</h2>
  <?php
        include 'connect.php';
        if(isset($_GET['edit'])){

            $edit_id = $_GET['edit'];
            $select1 = "SELECT * FROM user WHERE user_id='$edit_id'";
            $runn = mysqli_query($conn, $select1);
            
            $row_user = mysqli_fetch_array($runn);
            $user_id = $row_user["user_id"];
            $user_fname = $row_user["user_fname"];
            $user_lname = $row_user["user_lname"];
            $user_email = $row_user["user_email"];
            $user_password = $row_user["user_password"];
            $user_img = $row_user["user_img"];
            $user_dob= $row_user["user_dob"]; 
       }

    ?>
  <form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
      <label >First Name:</label>
      <input type="text" class="form-control"  value="<?php  echo $user_fname; ?>" placeholder="First Name" name="user_fname">
    </div>
    <div class="form-group">
      <label >Last Name:</label>
      <input type="text" class="form-control" value="<?php  echo $user_lname; ?>" placeholder="Last Name" name="user_lname">
    </div>
    
    
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control"  value="<?php  echo $user_email; ?>" placeholder="Enter email" name="user_email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" value="<?php  echo $user_password; ?>" placeholder="Enter password" name="user_password">
    </div>
    <div class="form-group">
      <label >Profile Picture</label>
      <input type="file" class="form-control"  placeholder="Image" name="user_img">
    </div>
    <div class="mb-3">
        <label>Date of Birth</label>
        <input type="date" class="form-control" value="<?php  echo $user_dob; ?>" id="dob" name="user_dob">
    </div>

    <input type="submit" name="insert-btn" class="btn btn-primary"/>
  </form>
  <?php

        include 'connect.php';
        if(isset($_POST['insert-btn'])){
        $euser_fname = $_POST['user_fname'];
        $euser_lname = $_POST['user_lname'];
        $euser_email = $_POST['user_email'];
        $euser_password = $_POST['user_password'];
        $euser_dob = $_POST['user_dob'];
        $euser_img = $_FILES['user_img']['name'];
        $euser_tmp_img = $_FILES['user_img']['tmp_name'];
        

        if(empty($euser_img)){
            $euser_img = $user_img;
        }
        $update = "UPDATE user SET user_fname='$euser_fname', user_lname='$euser_lname', user_email='$euser_email', user_password='$euser_password', user_dob='$euser_dob', user_img='$euser_img' WHERE user_id='$edit_id'";
        
        $run_update = mysqli_query($conn, $update);
        if($run_update == True){
            echo "Saved";
            move_uploaded_file($euser_tmp_img, "upload/$euser_img");

        }else{
            echo "failed";
        }

    }

   


?><a class="btn btn-primary" href="view_user.php">View User</a>
</div>


</body>