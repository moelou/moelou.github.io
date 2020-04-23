<?php
//Start session
session_start();
include_once('db/db.php');
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || (trim($_SESSION['username']) == '')) {
    header("location:login.php");
    exit();
}
else
{
error_reporting("E_All");
$username = $_SESSION['username'];
 
 $qq=mysqli_query($conn,"select *from coordinators where email='$username'")or die(mysqli_error);
 $data=mysqli_fetch_array($qq);
}
?>	

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/futict.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<br/>
<center><img name="logbook" src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"></center>
<div class="container">
<h4 class="text-center" style=" color:white; background-color:brown">Hi, <?php echo $data['name']; ?> WELCOME TO SIWES 2019</h4>
 <div class="row">
 
 <br/>
    <div class="col-lg-8 col-md-9 col-sm-12 hidden-xs">
   <br/>
    <div class="row" style="margin-bottom:10px; margin-left:50%">
     <a href="send.php" class="btn btn-block btn-danger">Send Message</a>
	 
    </div> 

	<div class="row" style="margin-bottom:10px; margin-left:50%">
    <a href="managestudent.php" class="btn btn-block btn-danger">Manage Student</a></p>
	
    </div>
	<div class="row" style="margin-bottom:10px; margin-left:50%">
    <a href="ChangePassword.php?id=<?php echo $_SESSION['id'];?>" class="btn btn-block btn-danger">Change Password</a>
    </div>
	<div class="row" style="margin-bottom:10px; margin-left:50%">
   <a href="viewc.php?id=<?php echo $_SESSION['id'];?>" class="btn btn-block btn-danger">View Profile</a>
    </div>	
		<div class="row" style="margin-bottom:10px; margin-left:50%">
   
   <a href="manageSupervisor.php" class="btn btn-block btn-danger">View Supervisor</a>
    </div>
	<div class="row" style="margin-bottom:10px; margin-left:50%">
  <a href="manageorg.php" class="btn btn-block btn-danger">View Organizations</a>
    </div>
	
	
	<div class="row" style="margin-bottom:10px; margin-left:50%">
	<a href="logout.php" onclick="return confirm('Are you Sure You want to Logout ?');" class="btn btn-block btn-success">Logout</a>
     </div>
    </div>
    
    </div>
</div>
</body>
</html>

