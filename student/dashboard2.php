 <?php
//Start session
session_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || (trim($_SESSION['matricno']) == '')) {
   header("location:login.php");
    exit();
}
else
{
include_once('db/db.php');
}
?>

<?php 
  $matricno = $_SESSION['matricno'];
  include_once('db/db.php');
  $idd=$_SESSION['id'];
  $query=mysqli_query($conn,"select *from student where id='$idd'")or die(mysql_error);
 while($rowfetch=mysqli_fetch_array($query))
 {
 
 $matricno=$rowfetch['matricno'];
 $name=$rowfetch['name'];
 $depart=$rowfetch['department'];
 $org=$rowfetch['organization'];
 $supp=$rowfetch['supervisor'];


 
 }
   $st="";
  $q=mysqli_query($conn,"select *from  organization where matricno='$matricno'")or die(mysql_error);
  
  if(mysqli_num_rows($q))
      $st = 1;
  else
	   $st = 0;
	 
	 
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
 
<body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<center><img src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"/>
<div class="container">
 <h2 class="text-center" style=" color:black ;background-color:white">Hi, <?php echo $matricno; ?> WELCOME TO SIWES 2019</h2>
  <table style=" color:black; background-color:white" width="70%" border="1">
    <tbody>
      <tr>
        <td align="right" scope="col">Student's Name:</td>
        <td scope="col"><strong><?php echo ucwords($name); ?></strong></td>
		 <td align="right">Matric No:</td>
        <td><strong><?php echo $matricno; ?></strong></td>
      </tr>
      
      <tr>
        <td align="right">Department:</td>
        <td><strong><?php echo $depart; ?></strong></td>
		 <td align="right">Organization:</td>
        <td><strong><?php if($org == "")
			    echo "<font color='red' style=''>Not Yet Attach</font>";
			else echo ucwords($org);
 
?></strong></td>
      </tr>
	  
	  
	  <tr>
	  <td> &nbsp;
	  </td> <td> &nbsp;
	  </td>
       <td align="right">Assigned Supervisor:</td>    <td><strong><?php if($org == "")
			    echo "<font color='red' style=''>Not Yet Attach</font>";
			else echo ucwords($supp);
 
?></strong></td>
      </tr>
    </tbody>
  </table>
  <br/>
  </center>
  <div class="container"><div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12 hidden-xs">
   
    
    <div class="row" style="margin-bottom:10px; margin-left:50%">
	<?php if($st == 1){?>
    <a href="updattach.php" onclick="" class="btn btn-block btn-info">Fill Attachment Form</a>
	
	<?php }else{?>
	  <a href="attach.php"  class="btn btn-block btn-info">Fill Attachment Form</a>
	<?php }?>
    </div>
	<div class="row" style="margin-bottom:10px;  margin-left:50%">
    <a href="message.php" class="btn btn-block btn-primary">View Message</a>
    </div>
    <div class="row" style="margin-bottom:10px;  margin-left:50%">
    <a href="editStudent.php?id=<?php echo $idd;?>" class="btn btn-block btn-warning">Edit Profile</a>
    </div>
	<div class="row" style="margin-bottom:10px;  margin-left:50%">
	<a href="logout.php" class="btn btn-block btn-danger">Logout</a>
     </div>
    </div>
    
    </div>
</div></div>
</div>
</body>
 
</html>
