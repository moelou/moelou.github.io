<?php
//Start session
session_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || (trim($_SESSION['username']) == '')) {
    header("location:index.php");
    exit();
}
else
{
error_reporting("E_All");
include_once('db/db.php');
}
?>
<?php 

include_once('db/db.php');
  $id=$_GET['id'];
  $query=mysqli_query($conn,"select *from student where id='$id'")or die(mysqli_error);
 while($rowfetch=mysqli_fetch_array($query))
 {
 
 $name=$rowfetch['name'];
  $idd=$rowfetch['id'];
  
 }

?>
<?php

  $id=$_SESSION['id'];
  $query=mysqli_query($conn,"select *from coordinators where id='$id'")or die(mysqli_error);
 while($rowfetch=mysqli_fetch_array($query))
 {
 
 $department=$rowfetch['department'];

 }
 
 
 ?>
 
 <?php
include_once('db/db.php'); 
if(isset($_POST['submit'])){
	                        
	
	$sup=$_POST['sup'];
	$idd=$_POST['idd'];
	
	$result=mysqli_query($conn,"UPDATE student SET supervisor='$sup' WHERE id='$idd'")or die(mysqli_error); 
echo '<script type="text/javascript">alert("Succesfully Assigned")</script>';
	
	
?>
<script type="text/javascript">

window.location='manageStudent.php';
</script>
<?php }?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<br/>
<center><img name="logbook" src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"></center>
<div class="container">

  <div class="container">
   
    <hr>
	   <font color="white"><h5 style="background-color:white; color:black; width:70%"><tr><td>Assign Supervisor to&nbsp;: <?php echo $name ;?></td></tr>  </h5>
   
    <p><br>
	 <form id="assign" name="assign" method="post" action="assign.php">
     Select Supervisor      <select name="sup" id="select">
						<option> </option>
									<?php  
									//
							$rq=mysqli_query($conn,"select *from supervisors where department='$department'")or die(mysqli_error());
							while($row=mysqli_fetch_array($rq)){?>
							<option  value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
							<?php }?>
        
      
      </select>
	  <input type="submit" name="submit" id="btnSubmit" value="Assign" class="btn btn-success">
	  <input type="hidden" name="idd" value="<?php  echo $idd;?>">
	   </form>
      <br>
    </p>
  </div>
   
  <a href="manageStudent.php" class="btn btn-danger">Back</a></td>
</div>
</body>
</html>
<?php

?>
