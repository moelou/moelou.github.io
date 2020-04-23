<?php 
include_once('db/db.php');

$id=$_GET['id'];
$app="0";


$result=mysqli_query($conn,"UPDATE student SET app='$app' WHERE id='$id'")or die(mysqli_error); 
echo '<script type="text/javascript">alert("Succesfully Deactivated")</script>';
  
  ?>
  <script type="text/javascript">

window.location='ManageStudent.php';
</script>