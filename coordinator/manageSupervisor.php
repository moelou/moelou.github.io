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
<?php

  $id=$_SESSION['id'];
  $query=mysqli_query($conn,"select *from coordinators where id='$id'")or die(mysqli_error);
 while($rowfetch=mysqli_fetch_array($query))
 {
 

 $department=$rowfetch['department'];
 

 }
 
 
 ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manage Supervisor</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/futict.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">

<center><img name="logbook" src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"></center>
<br/>
<div class="container">
 <h5 style="background-color:brown; color:white"><center>Supervisor List</h5>
  
  <a href="dashboard.php" class="btn btn-danger">  Back   </a></td><BR/><br/><br/>
 <table align="left"  style="background-color:white" width="110%"  border="1" >
          
		
                 <tr > 
				 
<th bgcolor="brown"  ><font size="2" COLOR="WHITE"> Id</th>
<th bgcolor="brown"><font face="Albertus MT" size="2" COLOR="WHITE">Name</th>
<th bgcolor="brown" ><font face="Albertus MT" size="2" COLOR="WHITE">Email</th>
<th bgcolor="brown" ><font face="Albertus MT" size="2" COLOR="WHITE">Phone No</th>
<th bgcolor="brown"  ><font face="Albertus MT" size="2" COLOR="WHITE">Gender</th>
<th bgcolor="brown" ><font face="Albertus MT" size="2" COLOR="WHITE">Department</th>
<th bgcolor="brown" ><font face="Albertus MT" size="2" COLOR="WHITE">Username</th>

<th bgcolor="brown" ><font face="Albertus MT" size="2" COLOR="WHITE">View</th>

<th bgcolor="brown" ><font face="Albertus MT" size="2" COLOR="WHITE">Status</th>

<?php
include_once('db/db.php');
$count =0;
$record=mysqli_query($conn,"select * from supervisors where department='$department'")or die(mysqli_error);
    while($rowfetch=mysqli_fetch_assoc($record) ){
		$count++;

    echo "<tr>";
	 echo "<td><center> <font  size='2'>".$count."</td>";
     echo "<td> <font  size='2'>".strtoupper($rowfetch['name'])."</td>";
	   echo "<td><font  size='2'>".$rowfetch['email']."</td>";
	     echo "<td><font  size='2'>".strtoupper($rowfetch['phoneno'])."</td>";
      	     echo "<td><center><font  size='2'>".strtoupper($rowfetch['gender'])."</td>";
      	
      	     echo "<td><font  size='2'>".strtoupper($rowfetch['department'])."</td>";
      	     echo "<td><font  size='2'>".strtoupper($rowfetch['username'])."</td>";
      	     ?>
			 
			  <td><center><font  size="2"><a href="view.php?id=<?php echo $rowfetch['id'];?>">View</a></td>
			
			  
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