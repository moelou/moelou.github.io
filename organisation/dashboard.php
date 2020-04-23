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
 
 $qq=mysqli_query($conn,"select *from orgnize where email='$username'")or die(mysqli_error);
 $data=mysqli_fetch_array($qq);
}
?>	

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Industrial Supervisor Dashboard</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<center><img src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"/></center>
  <h3 class="text-center" style=" color:black; background-color:white">Hi, <?php echo $data['names']; ?> WELCOME TO SIWES 2019</h3>
 <div class="container">
 <div class="row">
 <br/>
    <div class="col-lg-8 col-md-9 col-sm-12 hidden-xs">
   <br/>
    <div class="row" style="margin-bottom:10px; margin-left:50%">
    <a href="manageStudent.php" class="btn btn-block btn-warning">Manage Student</a>
    </div>
	<div class="row" style="margin-bottom:10px; margin-left:50%">
	<a href="logout.php" onclick="return confirm('Are you Sure You want to Logout ?');" class="btn btn-block btn-danger">Logout</a>
     </div>
    </div>
    
    </div>
</div>
</div>
</body>
</html>

