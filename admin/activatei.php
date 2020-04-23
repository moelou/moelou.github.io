<?php 
include_once('db/db.php');

$id=$_GET['id'];
$app="1";


$result=mysqli_query($conn,"UPDATE itf SET app='$app' WHERE id='$id'")or die(mysqli_error); 

$result=mysqli_query($conn,"UPDATE login SET app='$app' WHERE acctid='$id'")or die(mysqli_error); 

echo '<script type="text/javascript">alert("Succesfully Activated")</script>';
  
  ?>
  <script type="text/javascript">

window.location='manageitf.php';
</script>