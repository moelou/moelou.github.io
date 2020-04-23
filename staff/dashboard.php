<?php
//Start session
session_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || (trim($_SESSION['username']) == '')) {
   header("location:login.php");
    exit();
}
else
{
include_once('db/db.php');
$username = $_SESSION['username'];
 
 $qq=mysqli_query($conn,"select *from supervisors where email='$username'")or die(mysqli_error);
 $data=mysqli_fetch_array($qq);
}
?>
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
 <h4 class="text-center" style=" color:black; background-color:white">Hi, <?php echo $data['name']; ?> WELCOME TO SIWES 2019</h4>
 <div class="container">
 <div class="row">
 <br/>
    <div class="col-lg-8 col-md-9 col-sm-12 hidden-xs">
   <br/>
    <div class="row" style="margin-bottom:10px; margin-left:50%">
    <a href="managestudent.php" class="btn btn-block btn-primary">Manage Student</a>
    </div> 
	<div class="row" style="margin-bottom:10px; margin-left:50%">
    <a href="view.php?id=<?php echo $_SESSION['id']; ?>" class="btn btn-block btn-success">View Profile</a>
    </div>
	<div class="row" style="margin-bottom:10px; margin-left:50%">
    <a href="editSupervisor.php?id=<?php echo $_SESSION['id']; ?>" class="btn btn-block btn-primary">Edit Profile</a>
    </div>
	<!--<div class="row" style="margin-bottom:10px; margin-left:50%">
    <a href="changePassword.php?id=<?php echo $_SESSION['id']; ?>" class="btn btn-block btn-warning">Change Password</a>
    </div>-->
	
	
	<div class="row" style="margin-bottom:10px; margin-left:50%">
	<a href="logout.php" onclick="return confirm('Are you Sure You want to Logout ?');" class="btn btn-block btn-danger">Logout</a>
     </div>
    </div>
    
    </div>
</div>
</div>
</body>
</html>

