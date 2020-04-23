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
  $query=mysqli_query($conn,"select *from student where id='$idd'")or die(mysql_error);
 while($rowfetch=mysqli_fetch_array($query))
 {
 
 $name=$rowfetch['name'];
 $id=$rowfetch['id'];

 }

?>
<?php
include_once('db/db.php'); 
if(isset($_POST['submit'])){
	                         
	
	$start=$_POST['start'];
	$end=$_POST['end'];
	$stid=$_POST['stid'];
	
 $query=mysqli_query($conn,"select *from week where studentid='$stid' and start='$start' and end='$end'")or die(mysql_error);

if(mysqli_num_rows($query))
{
		echo "<script>alert('Week Already Existed')
		 window.location='weekly.php';
		</script>";
		
}
	
	else{
	
	
   
	$add=mysqli_query($conn,"INSERT INTO week(studentid,start,end) values('$id','$start','$end')")or die(mysql_error);

	echo '<script>alert("Week Added")</script>';
	}
	
?>	
	<script type="text/javascript">

window.location='logbook.php';
</script>
	
<?php 
}
?>		




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Weeks</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<center><img src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"/>

<div class="container">
 <h2 class="text-center" style=" color:black ;background-color:white">Student Weekly Date (Monday) To (Friday)</h2>
  <div class="container">
  <form name="weekly" id="weekly" action="weekly.php" method="POST">
      <table width="70%" border="0" class="">
      <tbody>
        <tr>
          <td><label style="background-color:White;">Start Week  </label>
            <input name="start" type="date" id="wkl_st_idfk" placeholder="YYYY-MM-DD" class="form-control" >
            <input type="hidden" name="stid" id="wkl_start" value="<?php echo $id; ?>" class="form-control" ></td>
        </tr>
        <tr>
          <td><label style="background-color:White;">End Week  </label>
          <input type="date" name="end" id="wkl_end" class="form-control"placeholder="YYYY-MM-DD"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      
          <td>
		
		  <a href="dashboard.php" value="Back" class="btn btn-danger"> Back To Dashboard </a>
		    <input type="submit" name="submit" id="Post" value="Add Week" class="btn btn-success">
		  
          </td>
        </tr>
      </tbody>
    </table>
   
  </form>
  </div>
  <p>&nbsp;</p>
</div>
</body>
</html>
