<?php 
include_once('db/db.php');

$id=$_GET['id'];
$app="1";


$result=mysql_query("UPDATE supervisors SET app='$app' WHERE id='$id'")or die(mysql_error); 
echo '<script type="text/javascript">alert("Succesfully Activated")</script>';
  
  ?>
  <script type="text/javascript">

window.location='manageSupervisor.php';
</script>