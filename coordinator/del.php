<?php 
include_once('db/db.php');

$id=$_GET['id'];

$result = mysql_query("DELETE FROM supervisors where id='$id'");


echo '<script type="text/javascript">alert("Succesfully Deleted")</script>';
  
  ?>
  <script type="text/javascript">

window.location='manageSupervisor.php';
</script>