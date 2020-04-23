<?php 
include_once('db/db.php');

$id=$_GET['id'];
$app="0";


$result=mysql_query("UPDATE orgnize SET app='$app' WHERE id='$id'")or die(mysql_error); 
echo '<script type="text/javascript">alert("Succesfully Deactivated")</script>';
  
  ?>
  <script type="text/javascript">

window.location='manageorg.php';
</script>