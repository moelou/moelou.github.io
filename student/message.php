
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
  $id=$_SESSION['id'];
  $query=mysqli_query($conn,"select *from student where id='$id'")or die(mysqli_error);
 while($rowfetch=mysqli_fetch_array($query))
 {
 
   $dept=$rowfetch['department'];

 }
 $name="";

  $query1=mysqli_query($conn,"select *from coordinators where department='$dept'")or die(mysqli_error);
 while($rowfetch=mysqli_fetch_array($query1))
 {
 
   $name=$rowfetch['name'];
   

 }


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Message</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
 
<center><img src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"/>
<div class="container">
  <h2 class="text-center" style=" color:black ;background-color:white">STUDENT'S MESSAGES </h2>
  
    <div class="col-12">
    <div class="row" style="margin-bottom:10px">
<div class="alart alart-danger">

</div>  
  <table align="left"  width="100%"  border="1" style=" color:black; background-color:white" >
          
		
                 <tr > 
				 
<th bgcolor="green" width="1%"><font size="2" COLOR="WHITE"> ID</th>
<th bgcolor="green"  width="20%"><font face="Albertus MT" size="2" COLOR="WHITE">Date & Time</th>
<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE"><center>Message</th>


<?php
include_once('db/db.php');
$count =0;
$record=mysqli_query($conn,"select * from msg where name='$name'")or die(mysqli_error);
    while($rowfetch=mysqli_fetch_assoc($record) ){
		$count++;

    echo "<tr>";
	 echo "<td><center> <font  size='2'>".$count."</td>";
     echo "<td> <font  size='2'>".strtoupper($rowfetch['date'])."</td>";
     echo "<td> <font  size='2'>".strtoupper($rowfetch['msg'])." >> BY:".strtoupper($rowfetch['name'])."</td>";
	  
      	  echo "</tr>";  
	}		  
      	     ?>


</table>
<br/>


    </div>
	<a href="dashboard.php" Class="btn btn-success">Back</a>
    
  </div></div>
</div>
</body>
</html>

