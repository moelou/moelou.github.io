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
<title>Manage Supervisor</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<br/>
<center><img name="logbook" src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"></center>
<div class="container">
 <h5 style="background-color:white">Spervisor List</h5>
  <a href="supervisorReg.php" class="btn btn-success">  ADD SUPERVISOR     </a></td>
  <a href="dashboard.php" class="btn btn-danger">  Back   </a></td><BR/><br/><br/>
 <table align="left" style="background-color:white" width="100%"  border="1" >
          
		
                 <tr > 
				 
<th bgcolor="green"  ><font size="2" COLOR="WHITE"> Id</th>
<th bgcolor="green"><font face="Albertus MT" size="2" COLOR="WHITE">Name</th>
<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE">Email</th>
<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE">Phone No</th>
<th bgcolor="green"  ><font face="Albertus MT" size="2" COLOR="WHITE">Gender</th>
<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE">Department</th>
<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE">Username</th>
<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE">Activate | Deactivate</th>
<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE">View</th>
<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE">Edit</th>
<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE">Delete</th>
<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE">Status</th>

<?php
include_once('db/db.php');
$count =0;
$record=mysqli_query($conn,"select * from supervisors ")or die(mysqli_error);
    while($rowfetch=mysqli_fetch_assoc($record) ){
		$count++;

    echo "<tr>";
	 echo "<td><center> <font  size='2'>".$count."</td>";
     echo "<td> <font  size='2'>".strtoupper($rowfetch['name'])."</td>";
	   echo "<td><font  size='2'>".$rowfetch['email']."</td>";
	     echo "<td><center><font  size='2'>".strtoupper($rowfetch['phoneno'])."</td>";
      	     echo "<td><center><font  size='2'>".strtoupper($rowfetch['gender'])."</td>";
      	
      	     echo "<td><center><font  size='2'>".strtoupper($rowfetch['department'])."</td>";
      	     echo "<td><center><font  size='2'>".$rowfetch['username']."</td>";
      	     ?>
			 <td><center><a href="activate.php?id=<?php echo $rowfetch['id'];?>" onclick="return confirm('Are you sure you want to Activate User?')"> Activate</a> | <a href="deactivate.php?id=<?php echo $rowfetch['id'];?>" onclick="return confirm('Are you sure you want to 	Deactivate User?')"> Deactivate</a></td>
			  <td><center><font  size="2"><a href="view.php?id=<?php echo $rowfetch['id'];?>">View</a></td>
			  <td><center><font  size="2"><a href="editSupervisor.php?id=<?php echo $rowfetch['id'];?>">Edit</a></td>
			  <td><a href="del.php?id=<?php echo $rowfetch['id'];?>" onclick="return confirm('Are you sure you want to Submit?')"> Delete</a></td>
			     
			 <?php
			 $st = $rowfetch['app'];
			 if($st == 1)
				 $status ="Activated";
				 else if($st == 0)
					 $status ="Deactivated";
					 
      	    echo "<td><center><font  size='2'>".$status."</td>";
	 echo "</tr>";
	  
	}
	
	 ?>
	 
	
	

</table>
 
  
</div>
</body>
</html>