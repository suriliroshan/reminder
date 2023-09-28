<?php
session_start();
include "connect.php";
$user_id = $_SESSION['sno'];
if(!isset($user_id)){
   header('location:login.php');
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reminder</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <style media="screen">
    #delete_btn{
      padding: 10px;
      color:white;
      border-radius: 10px;
    }
  </style>
  <body>
  <?php include"header.php"; ?>

<div class="reminder">
<h1>Reminder for the Day</h1>
<div class="reminder_form" >
  <div class="my-5">
    <a href="task.php" style="text-decoration:none;padding:0.5rem;border-radius:10px;" class="btn-success">Add New Task</a>
  </div>
  <table class="table" style="background-color:#0c9af3 !important";>
  <thead>
    <tr>
      <th scope="col">Serial no.</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Task</th>
      <th scope="col">Venue</th>
      <th scope="col">Delete</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
$select_r="SELECT * FROM task where status=1 and user_id='$user_id'";
$result = mysqli_query($conn,$select_r) or die(mysql_error());
$row=mysqli_num_rows($result);
  if($row>0) {
    $i=1;
while($fetch_task=mysqli_fetch_array($result,MYSQLI_BOTH)){
 ?>

    <tr>
      <th scope="row"><?php echo $i; ?></th>
          <td><?php echo $fetch_task['date']; ?></td>
          <td><?php echo $fetch_task['time']; ?></td>
          <td><?php echo $fetch_task['task_details']; ?></td>
          <td><?php echo $fetch_task['venue']; ?></td>
      <?php echo "<td><a href='delete.php?sno=".$fetch_task['id']."' id='delete_btn'>Delete</a></td>";?>

        <?php echo "<td><a href='task_edit.php?id=".$fetch_task['id']."' id='delete_btn'>Edit</a></td>";?>
    </tr>
<?php ++$i;}} ?>
  </tbody>
</table>
</div>
</div>
<?php include"footer.php"; ?>
  </body>
</html>
