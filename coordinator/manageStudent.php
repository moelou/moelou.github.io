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
  echo $id;
 
 ?>

   
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manage Student</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<<body class="bg-gradient" style="background:url('../img/futict.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">


<div class="container" >
  <h4 class="text-center" style=" color:white; background-color:brown">Student List</h4>
  <a href="StudentRegistration.php" class="btn btn-success">  ADD STUDENT   </a></td>
  <a href="dashboard.php" class="btn btn-danger">  Back   </a></td><BR/><br/><br/>
 <table align="left" style="background-color:white" width="110%"  border="1" >
          
		
                 <tr > 
				 
<th bgcolor="brown"  ><font size="2" COLOR="WHITE"> Id</th>
<th bgcolor="brown"><font face="Albertus MT" size="2" COLOR="WHITE">Matric No.</th>
<th bgcolor="brown"><font face="Albertus MT" size="2" COLOR="WHITE">Name</th>
<th bgcolor="brown" ><font face="Albertus MT" size="2" COLOR="WHITE">Email</th>
<th bgcolor="brown" ><font face="Albertus MT" size="2" COLOR="WHITE">Phone No</th>
<th bgcolor="brown"  ><font face="Albertus MT" size="2" COLOR="WHITE">Gender</th>
<th bgcolor="brown" ><font face="Albertus MT" size="2" COLOR="WHITE">Department</th>


<th bgcolor="brown" ><font face="Albertus MT" size="2" COLOR="WHITE">View</th>
<th bgcolor="brown" ><font face="Albertus MT" size="2" COLOR="WHITE">Assign Supervisor</th>
<th bgcolor="brown" ><font face="Albertus MT" size="2" COLOR="WHITE">Assign Organization</th>


<th bgcolor="brown" ><font face="Albertus MT" size="2" COLOR="WHITE">Accessement</th>
<th bgcolor="brown" ><font face="Albertus MT" size="2" COLOR="WHITE">Status</th>

<?php
include_once('db/db.php');
$count =0;
$record=mysqli_query($conn,"select * from student where department='$department'")or die(mysqli_error);
    while($rowfetch=mysqli_fetch_assoc($record) ){
		$count++;

    echo "<tr>";
	 echo "<td><center> <font  size='2'>".$count."</td>";
     echo "<td> <font  size='2'>".strtoupper($rowfetch['matricno'])."</td>";
     echo "<td> <font  size='2'>".strtoupper($rowfetch['name'])."</td>";
	   echo "<td><font  size='2'>".$rowfetch['email']."</td>";
	     echo "<td><font  size='2'>".strtoupper($rowfetch['phone'])."</td>";
      	     echo "<td><font  size='2'>".strtoupper($rowfetch['gender'])."</td>";
      	
      	     echo "<td><font  size='2'>".strtoupper($rowfetch['department'])."</td>";
      	      $ids = $rowfetch['id'];
			 $qyq=mysqli_query($conn,"select *from student where id='$ids' ")or die(mysqli_error);
             $rrow=mysqli_fetch_array($qyq);
			 $grade = $rrow['cod_grade'];
      	     ?>
			 
			   <td><center><font  size="2"><a href="view2.php?id=<?php echo $rowfetch['id'];?>">View</a></td>
			  <td><center><font  size="2"><a href="assign.php?id=<?php echo $rowfetch['id'];?>">Assign</a></td>
			  <td><center><font  size="2"><a href="assign2.php?id=<?php echo $rowfetch['id'];?> & matricno=<?php echo $rowfetch['matricno'];?>">Assign</a></td>
			  
			
			<!--   <td><center><a href="activatec.php?id=<?php echo $rowfetch['id'];?>" onclick="return confirm('Are you sure you want to Activate User?')"> Activate</a> | <a href="deactivatec.php?id=<?php echo $rowfetch['id'];?>" onclick="return confirm('Are you sure you want to Deactivate User?')"> Deactivate</a></td>-->
			     <td>
			  <a href="logbook.php?id=<?php echo $rowfetch['id'];?> & matricno=<?php echo $rowfetch['matricno'];?>">Access</a>
			  </td>
			   <td>
			  <center><font  size="2"><?php if($grade == "") echo "In Complete"; else echo $grade;?>
			  
			  
			  </td>
			 <?php
      	    /* $st = $rowfetch['app'];
			 if($st == 1)
				 $status ="Activated";
				 else if($st == 0)
					 $status ="Deactivated";
					 
      	    echo "<td><center><font  size='2'>".$status."</td>";
	 echo "</tr>"; */
	  
	}
	
	 ?>
	 
	
	

</table>
 
  
</div>
</body>
</html>