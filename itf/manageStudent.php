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
include_once('db/db.php');
}
?>


   
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manage Student</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<br/>
<center><img name="logbook" src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"></center>
<div class="container">
 <h5 style="background-color:white"><center>Student List</h5>
  
  <a href="dashboard.php" class="btn btn-danger">  Back   </a></td><BR/><br/><br/>
 <table align="left"  style="background-color:white" width="100%"  border="1" >
          
		
                 <tr > 
				 
<th bgcolor="green"  ><font size="2" COLOR="WHITE"> Id</th>
<th bgcolor="green"><font face="Albertus MT" size="2" COLOR="WHITE">Name</th>
<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE">Email</th>
<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE">Phone No</th>
<th bgcolor="green"  ><font face="Albertus MT" size="2" COLOR="WHITE">Gender</th>
<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE">Department</th>



<th bgcolor="green"  ><center><font face="Albertus MT" size="2" COLOR="WHITE">Accessement</center></th>


<?php
include_once('db/db.php');
$count =0;
$record=mysqli_query($conn,"select * from student ")or die(mysqli_error);
    while($rowfetch=mysqli_fetch_assoc($record) ){
		$count++;

    echo "<tr>";
	 echo "<td><center> <font  size='2'>".$count."</td>";
     echo "<td> <font  size='2'>".strtoupper($rowfetch['name'])."</td>";
	   echo "<td><font  size='2'>".$rowfetch['email']."</td>";
	     echo "<td><font  size='2'>".strtoupper($rowfetch['phone'])."</td>";
      	     echo "<td><font  size='2'>".strtoupper($rowfetch['gender'])."</td>";
      	
      	     echo "<td><font  size='2'>".strtoupper($rowfetch['department'])."</td>";
      	     
      	     ?>
			
			  <td>
			  <a href="logbook.php?id=<?php echo $rowfetch['id'];?> & matricno=<?php echo $rowfetch['matricno'];?>"><center> View Accessments</a>
			  </td>
			 <?php
			 
      	    
	 echo "</tr>";
	  
	}
	
	 ?>
	 
	
	

</table>
 
  
</div>
</body>
</html>