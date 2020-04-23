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

  include_once('db/db.php');
  $idd=$_SESSION['id'];
  $query=mysqli_query($conn,"select *from student where id='$idd'")or die(mysqli_error);
 while($rowfetch=mysqli_fetch_array($query))
 {
 
 $matricno=$rowfetch['matricno'];
 $name=$rowfetch['name'];
 $depart=$rowfetch['department'];
 $org=$rowfetch['organization'];
 $supp=$rowfetch['supervisor'];
 

 
 }
 $numb="";
 $qy=mysqli_query($conn,"select *from week where studentid='$idd'")or die(mysqli_error);
 while($row=mysqli_fetch_array($qy))
 {
 $numb = mysqli_num_rows($qy);
 }
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<?php if($org == "" || $supp == "" ){
 header ("Location: dashboard2.php");
?>

<?php }else{?>
<body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<CENTER><img src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"/></div>
<div class="container"    style=" border: 0px solid #000";>
 <h2 class="text-center" style=" color:black; background-color:white">Hi, <?php echo $matricno; ?> WELCOME TO SIWES 2019</h2>
  <table style=" color:black; background-color:white" width="70%" border="1">
    <tbody>
      <tr>
        <td align="right" scope="col">Student's Name:</td>
        <td scope="col"><strong><?php echo $name; ?></strong></td>
		 <td align="right">Matric No:</td>
        <td><strong><?php echo $matricno; ?></strong></td>
      </tr>
      
      <tr>
        <td align="right">Department:</td>
        <td><strong><?php echo $depart; ?></strong></td>
		 <td align="right">Organization:</td>
        <td><strong><?php if($org == "")
			 echo "<font color='red' style=''>Not Yet Attach</font>";
			else echo $org;
 
?></strong></td>
      </tr>
	  <tr>
	  <td> &nbsp;
	  </td> <td> &nbsp;
	  </td>
       <td align="right">Assigned Supervisor:</td>    <td><strong><?php if($supp == "")
			    echo "<font color='red' style=''>Not Yet Attach</font>";
			else echo ucwords($supp);
 
?></strong></td>
      </tr>
    </tbody>
  </table>
  <br/>
  <div class="container"><div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12 hidden-xs">
    <div class="row" style="margin-bottom:10px; margin-left:50%">
    <a href="view_supervisor.php" class="btn btn-block btn-success">View Supervisor</a>
    </div>
    <div class="row" style="margin-bottom:10px; margin-left:50%">
	  <?Php if($numb == 24){
	   ?> 
    
	<?php } else {?>
	  <a href="weekly.php" class="btn btn-block btn-primary">Add Week</a>
	 <?php }?>
    </div>
    
     <div class="row" style="margin-bottom:10px; margin-left:50%">
    <a href="logbook.php" class="btn btn-block btn-primary">View Logbook</a>
    </div>
    <div class="row" style="margin-bottom:10px; margin-left:50%">
    <a href="message.php" class="btn btn-block btn-info">View Message</a>
    </div>
    <div class="row" style="margin-bottom:10px; margin-left:50%">
    <a href="editStudent.php?id=<?php echo $idd;?>" class="btn btn-block btn-warning">Edit Profile</a>
    </div>
	  <div class="row" style="margin-bottom:10px; margin-left:50%">
    <a href="downloadS.php" class="btn btn-block btn-primary">Download Forms </a>
    </div>
	
	<div class="row" style="margin-bottom:10px; margin-left:50%">
	<a href="logout.php" class="btn btn-block btn-danger">Logout</a>
     </div>
    </div>
    
    </div>
</div></div>
</div>
</body>
<?php }?>
</html>
