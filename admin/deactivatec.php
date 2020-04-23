<?php 
include_once('db/db.php');

$id=$_GET['id'];
$app="0";


$result=mysqli_query($conn,"UPDATE coordinators SET app='$app' WHERE id='$id'")or die(mysqli_error); 
echo '<script type="text/javascript">alert("Succesfully Deactivated")</script>';

  $result=mysqli_query($conn,"UPDATE login SET app='$app' WHERE acctid='$id'")or die(mysqli_error); 
 
  ?>
  <script type="text/javascript">

window.location='ManageCoordinator.php';
</script>