<?php 
if(isset($_SESSION['email']) && $_SESSION['email']==true){
  $email= true;
}
else{
  $email = false;
}
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/Priyansh/home.php">CRUD App</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/Priyansh/home.php">Home <span class="sr-only">(current)</span></a>
      </li>';

      if(!$email){
      echo '<li class="nav-item">
        <a class="nav-link" href="/Priyansh/login.php">Login</a>
      </li>';
      }
      if($email){
      echo '<li class="nav-item">
        <a class="nav-link" href="/Priyansh/logout.php">Logout</a>
      </li>';
    }
       
      
    echo '
    </form>
  </div>
</nav>';
?>
