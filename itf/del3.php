<?php 
include_once('db/db.php');

$id=$_GET['id'];

$result = mysqli_query($conn,"DELETE FROM coordinators where id='$id'");
$result = mysqli_query($conn,"DELETE FROM login where acctid='$id'");

echo '<script type="text/javascript">alert("Succesfully Deleted")</script>';
  
  ?>
  <script type="text/javascript">

window.location='ManageCoordinator.php';
</script>