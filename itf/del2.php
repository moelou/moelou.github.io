<?php 
include_once('db/db.php');

$id=$_GET['id'];

$result = mysqli_query($conn,"DELETE FROM student where id='$id'");


echo '<script type="text/javascript">alert("Succesfully Deleted")</script>';
  
  ?>
  <script type="text/javascript">

window.location='manageStudent.php';
</script>