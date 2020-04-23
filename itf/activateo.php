<?php 
include_once('db/db.php');

$id=$_GET['id'];
$app="1";

$result=mysqli_query($conn,"UPDATE orgnize SET app='$app' WHERE id='$id'")or die(mysqli_error); 
$result=mysqli_query($conn,"UPDATE login SET app='$app' WHERE acctid='$id'")or die(mysqli_error); 
echo '<script type="text/javascript">alert("Succesfully Activated : A Default Password (00000) as been sent...")</script>';
  
  ?>
  <script type="text/javascript">

window.location='manageorg.php';
</script>