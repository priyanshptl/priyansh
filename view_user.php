<?php
    session_start();
    include 'connect.php';

    if(!isset($_SESSION['email'])){
        echo "<scrpit>window.open('admin.php','_self')</script>";
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>View User</title>
  </head>
  <body>
  <body>
<?php require 'Partial/nav2.php'  ?>
<div class="container">
  <h2>DASHBOARD</h2>
  <?php
        include 'connect.php';
        if(isset($_GET['del'])){

            $del_no = $_GET['del'];
            $delete = "DELETE FROM user WHERE user_id='$del_no'";
            $run_delete = mysqli_query($conn,$delete);
            if($run_delete == true){
                echo "Record has been deleted";

            }else{
                echo "Failed, Try again";
            }
       }

    ?>
      
  <table class="table table-bordered ">
    <thead>
      <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Password</th>
        <th>Date of Birth</th>
        <th>Profile Pic</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        <?php

        include 'connect.php';
        $select = "SELECT * FROM user";
        $run = mysqli_query($conn,$select);
        while ($row_user = mysqli_fetch_array($run)){
        $user_id = $row_user['user_id'];
        $user_fnam = $row_user['user_fname'];
        $user_lname = $row_user['user_lname'];
        $user_email = $row_user['user_email'];
        $user_passord = $row_user['user_password'];
        $user_dob = $row_user['user_dob'];
        $user_img = $row_user['user_img'];
        


        ?>
      <tr>
      <td><?php  echo $user_id?></td>
      <td><?php  echo $user_fnam ?></td>
      <td><?php  echo $user_lname ?></td>
      <td><?php  echo $user_email ?></td>
      <td><?php  echo $user_passord ?></td>
      <td><?php  echo $user_dob ?></td>
      <td><img src="upload/<?php echo $user_img;?>"  alt="upload/<?php echo $user_img;?>" height="70px;"></td>
      <td><a class = "btn btn-success" href="edit_user.php?edit=<?php  echo $user_id ?>">Edit</a></td>
    <td><a class = "btn btn-danger" href="view_user.php?del=<?php  echo $user_id ?>">Delete</a></td>
      </tr>
      
     <?php } ?>
    </tbody>
  </table>
</div>

</body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>