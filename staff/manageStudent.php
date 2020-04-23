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
  $query=mysqli_query($conn,"select *from supervisors where id='$id'")or die(mysqli_error);
 while($rowfetch=mysqli_fetch_array($query))
 {
 
 $name=$rowfetch['name'];
 
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
<center><img src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"/>
<br/>
<div class="container">
  <h3 class="text-center" style=" color:black; width:100%;background-color:white">Student List</h3>
 
  <a href="dashboard.php" class="btn btn-danger">  Back   </a> 
  <a href="#" onclick="window.print()" class="btn btn-warning">  Print   </a>
  </td>
  
  <BR/><br/><br/>
 <table align="left"  style="background-color:white;"width="100%"  border="1" >
          
		
                 <tr > 
				 
<th bgcolor="green"  ><font size="2" COLOR="WHITE"> Id</th>
<th bgcolor="green"><font face="Albertus MT" size="2" COLOR="WHITE">Matric No.</th>
<th bgcolor="green"><font face="Albertus MT" size="2" COLOR="WHITE">Name</th>
<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE">Email</th>
<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE">Phone No</th>
<th bgcolor="green"  ><font face="Albertus MT" size="2" COLOR="WHITE">Gender</th>
<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE">Department</th>


<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE">View</th>

<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE">LogBook</th>
<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE">Accessment</th>
<?php
include_once('db/db.php');
$count =0;
$record=mysqli_query($conn,"select * from student where supervisor='$name'")or die(mysqli_error);
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
			 $grade = $rrow['sup_grade'];
      	     ?>
			 
			   <td><center><font  size="2"><a href="view2.php?id=<?php echo $rowfetch['id'];?>">View Profile</a></td>
			  
			  <td><center><font  size="2"><a href="logbook.php?id=<?php echo $rowfetch['id'];?>">View LogBook</a></td>
			    <td>
			  <center><font  size="2"><?php if($grade == "") echo "In Complete"; else echo $grade;?>
			  
			  
			  </td>
			 
			 <?php
      	    
					 
      	  
	 echo "</tr>";
	  
	}
	
	 ?>
	 
	
	

</table>
 
  
</div>
</body>
</html>