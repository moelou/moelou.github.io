
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

}
?>	

<?php 

include_once('db/db.php');
  $id=$_GET['id'];
  $query=mysqli_query($conn,"select * from coordinators where id='$id'")or die(mysqli_error);
 while($rowfetch=mysqli_fetch_array($query))
 {
 
 $name=$rowfetch['name'];
 $email=$rowfetch['email'];
 $phone=$rowfetch['phone'];
 $gender=$rowfetch['gender'];
 $department=$rowfetch['department'];
 $username=$rowfetch['username'];
 $password=$rowfetch['password'];
 $image=$rowfetch['image'];
 
 
  
 }



?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Profile</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<br/>
<center><img name="logbook" src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"></center>
<br/>
  <table align="center" width="40%"><tr><td></td></tr>
  <tr><td><hr></td></tr>
  <tr style="background-color:white"><td>Name&nbsp;: <?php echo $name ;?></td></tr>
  <tr style="background-color:white"><td>Email&nbsp;: <?php echo $email ;?></td></tr>
  <tr style="background-color:white"><td>Phone&nbsp;:<?php echo $phone ;?></td></tr>
  <tr style="background-color:white"><td>Gender&nbsp;:<?php echo $gender ;?></td></tr>
  <tr style="background-color:white"><td>Department&nbsp;: <?php echo $department ;?> :</td></tr>
  <tr style="background-color:white"><td>Username&nbsp;:<?php echo $username ;?></td></tr>
  
  
  
  
  </table>  

 <center> <a href="managecoordinator.php" class="btn btn-danger">  Back   </a></center>
          
</body>
</html>