<?php
session_start();
include "connect.php";
$user_id = $_SESSION['sno'];
if(!isset($user_id)){
   header('location:login.php');
}
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
  if (isset($_POST['submit'])) {
    $id=$_GET['id'];
              $task = $_POST['task'];    // removes backslashes
              $venue = $_POST['venue'];
              $date=$_POST['task_date'];
              $time=$_POST['time'];

              $query   = "update task set task_details='$task',venue='$venue',date='$date',time='$time' where id='$id'";
              $result = mysqli_query($conn,$query) or die(mysql_error());

              if($result){
                  echo '<script>alert("Successfully Task updated")</script>';
                  echo '<script>location.href="index.php"</script>';
              }else{
                echo '<script>alert("Something went wrong")</script>';
                  echo '<script>location.href="task_edit.php"</script>';
              }
}

   ?>
<!-- partial:index.partial.html -->

<?php
$id=$_GET['id'];
$select_r="SELECT * FROM task where id='$id'";
$result = mysqli_query($conn,$select_r) or die(mysql_error());

$fetch_task=mysqli_fetch_array($result,MYSQLI_BOTH);
 ?>
<div id="login-form-wrap">
  <h2>Add Task</h2>
  <form method="post" class="task">
    <p>
    <input type="text"  name="task" placeholder="Enter the task details" required value="<?php echo $fetch_task['task_details'] ?>">
    </p>
    <p>
    <input type="text"  name="venue" placeholder="Enter the venue" required value="<?php echo $fetch_task['venue'] ?>">
    </p>
    <p>
    <input type="date"  name="task_date"  required value="<?php echo $fetch_task['date'] ?>">
    </p>
    <p>
    <input type="text"  name="time" placeholder="Enter the time" value="<?php echo $fetch_task['time'] ?>" required>
    </p>
    <p>
    <input type="submit" value="Update" name="Submit" class="btn-success">
    </p>
  </form>

</div><!--login-form-wrap-->
<!-- partial -->
<?php include"footer.php"; ?>
</body>
</html>
