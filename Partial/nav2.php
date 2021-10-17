<?php 
if(isset($_SESSION['email']) && $_SESSION['email']==true){
  $email= true;
}
else{
  $email = false;
}
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/Priyansh/view_user.php">CRUD App</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      ';

      if(!$email){
      echo '<li class="nav-item">
        <a class="nav-link" href="/Priyansh/admin.php">Admin Login</a>
      </li>';
      }
      if($email){
      echo '<li class="nav-item active">
      <a class="nav-link" href="/Priyansh/view_user.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="/Priyansh/add_user.php">Add User <span class="sr-only">(current)</span></a>
    </li>
      <li class="nav-item">
        <a class="nav-link" href="/Priyansh/adminlogout.php">Logout</a>
      </li>';
    }
       
      
    echo '
    </form>
  </div>
</nav>';
?>
