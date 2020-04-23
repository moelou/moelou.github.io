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

}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Dashboard</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<br/>
<center><img name="logbook" src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"></center>

<div class="container">
<h4 class="text-center" style=" color:black; background-color:white">Hi, <?php echo $_SESSION['username']; ?> WELCOME TO SIWES 2019</h4>
 <div class="row">
 
 <br/>
    <div class="col-lg-8 col-md-9 col-sm-12 hidden-xs">
   <br/>
    <div class="row" style="margin-bottom:10px; margin-left:50%">
    <a href="ManageCoordinator.php" class="btn btn-block btn-info">Manage Cordinators</a>
    </div> 

	<div class="row" style="margin-bottom:10px; margin-left:50%">
   <a href="manageSupervisor.php" class="btn btn-block btn-primary">Manage Supervisor</a>
    </div>
	<div class="row" style="margin-bottom:10px; margin-left:50%">
    <a href="managestudent.php" class="btn btn-block btn-warning">Manage Student</a>
    </div>
	
	<div class="row" style="margin-bottom:10px; margin-left:50%">
    <a href="manageorg.php" class="btn btn-block btn-primary">Manage Organization</a>
    </div>
	
	<div class="row" style="margin-bottom:10px; margin-left:50%">
    <a href="manageitf.php" class="btn btn-block btn-success">Manage ITF Officer</a>
    </div>
 
	 
	<div class="row" style="margin-bottom:10px; margin-left:50%">
	<a href="logout.php" onclick="return confirm('Are you Sure You want to Logout ?');" class="btn btn-block btn-danger">Logout</a>
     </div>
    </div>
    
    </div>
</div>
</body>

</html>