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
error_reporting("E_All");

}
?>	

<?php 

include_once('db/db.php');
  $id=$_SESSION['id'];
  $query=mysqli_query($conn,"select *from student where id='$id'")or die(mysqli_error);
 while($rowfetch=mysqli_fetch_array($query))
 {
 
   $sup=$rowfetch['supervisor'];

 }

  $query1=mysqli_query($conn,"select *from supervisors where name='$sup'")or die(mysqli_error);
 while($rowfetch=mysqli_fetch_array($query1))
 {
 
   $phone=$rowfetch['phoneno'];
   $email=$rowfetch['email'];
   $image=$rowfetch['image'];
   $dept=$rowfetch['department'];

 }


?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Supervisor Details</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<center><img src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"/>

<div class="container">
  <h2 class="text-center" style=" color:black ;background-color:white">SCHOOL SUPERVISOR</h2>
  <div class="container"><div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12 hidden-xs">
    <div class="row" style="margin-bottom:10px">
	<table align="center"><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <img src="<?php echo "../admin/".$image; ?>" height="150" style="border-radius:50%" width="150"> </td></tr>
  
  </table>
  </div>
  </div>
      <table style=" color:black; background-color:white" width="70%" align="center" border="1">
        <tbody>
          <tr>
            <td align="right">Supervisor Name:</td>
            <td><strong><?php echo $sup; ?></strong></td>
          </tr>
          <tr>
            <td align="right">Phone:</td>
            <td><strong><?php echo $phone; ?></strong></td>
          </tr>
          <tr>
            <td align="right">Email Address:</td>
            <td><strong><?php echo $email; ?></strong></td>
          </tr>
		  <tr>
            <td align="right">Department:</td>
            <td><strong><?php echo $dept; ?></strong></td>
          </tr>
        </tbody>
      </table>
	  <br/>
	  <br/>
	  <br/> <br/> <br/>
	 
 
  
   
     
	 
    </div>
	 <center>  <a href="dashboard.php"style="width:40%;" class="btn btn-block btn-danger">Back</a> </center>
  </div></div>
</div>
</body>
</html>
<?php

?>
