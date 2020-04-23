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
  $query=mysqli_query($conn,"select *from orgnize where id='$id'")or die(mysqli_error);
 while($rowfetch=mysqli_fetch_array($query))
 {
 
 $name=$rowfetch['orgname'];
 
 }
 
 
 ?>

   
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manage Student</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/futict.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<center><img src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"/></center>
<br/>
<div class="container">
   <h3 class="text-center" style=" color:white; background-color:brown">Student List</h3>
 
  <a href="dashboard.php" class="btn btn-success">  Back   </a></td><BR/><br/><br/>
 <table align="left" style="background-color:white" width="100%"  border="1" >
          
		
                 <tr > 
				 
<th bgcolor="brown"  ><font size="2" COLOR="WHITE"> Id</th>
<th bgcolor="brown"><font face="Albertus MT" size="2" COLOR="WHITE">Matric No.</th>
<th bgcolor="brown"><font face="Albertus MT" size="2" COLOR="WHITE">Name</th>
<th bgcolor="brown" ><font face="Albertus MT" size="2" COLOR="WHITE">Email</th>
<th bgcolor="brown" ><font face="Albertus MT" size="2" COLOR="WHITE">Phone No</th>
<th bgcolor="brown"  ><font face="Albertus MT" size="2" COLOR="WHITE">Gender</th>
<th bgcolor="brown" ><font face="Albertus MT" size="2" COLOR="WHITE">Department</th>


<th bgcolor="brown" ><font face="Albertus MT" size="2" COLOR="WHITE">View</th>

<th bgcolor="brown" ><font face="Albertus MT" size="2" COLOR="WHITE">LogBook</th>
<th bgcolor="brown" ><font face="Albertus MT" size="2" COLOR="WHITE">Accessment</th>

<?php
include_once('db/db.php');
$count =0;

 
  
$record=mysqli_query($conn,"select * from student where organization='$name'")or die(mysqli_error);
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
			 $grade = $rrow['org_grade'];
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