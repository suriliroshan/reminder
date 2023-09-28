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
  if (isset($_POST['signup'])) {
              $email = $_POST['email'];    // removes backslashes
              $password = $_POST['password'];
              $select_user="SELECT * FROM USER where email='$email'";
                $res = mysqli_query($conn,$select_user) or die(mysql_error());
                $num=mysqli_num_rows($res);
                if ($num>0) {
                  echo '<script>alert("Email already registered!")</script>';
                }else{
              $query   = "INSERT INTO user(email,password,status)values('$email','$password','1')";

              $result = mysqli_query($conn,$query) or die(mysql_error());


              if ($result) {
                  echo "<script>alert('Successfully Registered')</script>";
                  echo "<script>window.location.href='login.php'</script>";
              } else {
                echo "<script>alert('Something Went Wrong')</script>";
                echo "<script>window.location.href='signup.php'</script>";
              }
            }
            }

   ?>
<!-- partial:index.partial.html -->
<div id="login-form-wrap">
  <h2>Sign Up</h2>
  <form method="post" class="task">
    <p>
    <input type="email"  name="email" placeholder="Enter Email" required>
    </p>
    <p>
    <input type="password"  name="password" placeholder="Enter Password" required>
    </p>
    <p>
    <input type="submit"  value="Sign up" name="signup">
    </p>
  </form>
  <div id="create-account-wrap" class="my-3">
    <p>Already account? <a href="login.php">Login</a><p>
  </div><!--create-account-wrap-->
</div><!--login-form-wrap-->
<!-- partial -->
<?php include"footer.php"; ?>
</body>
</html>
