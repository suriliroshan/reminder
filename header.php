
<nav class="navbar navbar-light bg-light" style="  background-color: #4572ba !important;">
<div class="container-fluid">
<a class="navbar-brand" href="index.php" style="color:white;">Reminder</a>
<div class="d-flex regis">
  <?php
  if(isset($_SESSION['sno'])){
    $id=$_SESSION["sno"];
    $select_user="select * from user where sno='$id'";
    $result=mysqli_query($conn,$select_user);
    $fetch_user=mysqli_fetch_array($result,MYSQLI_BOTH);
      echo'<button class="btn">Hello ! '.$fetch_user['email'].'</button>';
        echo'<a class="btn" href="logout.php">Logout</a>';
  }else{
  echo '
    <a href="login.php"  class="btn btn-outline-success" style="color:white;" >Log in</a>';

  }
     ?>

</div>
</div>
</nav>
