<?php
include "connect.php";
 ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>

<link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <?php include"header.php"; ?>
  <?php
  if (isset($_POST['login'])) {
              $email = $_POST['email'];    // removes backslashes
              $password = $_POST['password'];
              $query   = "SELECT * FROM `user` WHERE Email='$email'
                           AND Password='$password'";
              $result = mysqli_query($conn,$query) or die(mysql_error());
              $fetch=mysqli_fetch_array($result,MYSQLI_BOTH);


              $rows = mysqli_num_rows($result);

              if ($rows == 1) {
                session_start();
                  $_SESSION['sno']=$fetch['sno'];
                  echo "<script>window.location.href='index.php'</script>";
              } else {
                  echo "<div class='form'>
                        <h3 class='link'>Incorrect Username/password.</h3><br/>
                        <p class='link'>Click here to <a href='registration.php'>Login</a> again.</p>
                        </div>";
              }
            }

   ?>
<!-- partial:index.partial.html -->
<div id="login-form-wrap" style="background-color:#4572ba;">
  <h2>Login</h2>
  <form id="login-form" method="post">
    <p>
    <input type="email"  name="email" placeholder="Enter your Email" required>
    </p>
    <p>
    <input type="password"  name="password" placeholder="Enter your Password" required>
    </p>
    <p>
    <input type="submit" id="login" value="Login" name="login">
    </p>
  </form>
  <div id="create-account-wrap" class="my-3">
    <p>Not an account? <a href="signup.php">Create Account</a><p>
  </div><!--create-account-wrap-->
</div><!--login-form-wrap-->
<!-- partial -->
<?php include"footer.php"; ?>
</body>
</html>
