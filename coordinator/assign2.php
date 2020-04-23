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

include_once('db/db.php');
  $id=$_GET['id'];
  $matricno=$_GET['matricno'];
  $query=mysqli_query($conn,"select *from student where id='$id'")or die(mysqli_error);
 while($rowfetch=mysqli_fetch_array($query))
 {
 
 $name=$rowfetch['name'];
  $idd=$rowfetch['id'];
  
 }

?>

 
 <?php
include_once('db/db.php'); 
if(isset($_POST['submit'])){
	                        
	
	$sup=$_POST['sup'];
	$idd=$_POST['idd'];
	
	$result=mysqli_query($conn,"UPDATE student SET organization='$sup' WHERE id='$idd'")or die(mysqli_error); 
echo '<script type="text/javascript">alert("Succesfully Assigned")</script>';
	
	
?>
<script type="text/javascript">

window.location='manageStudent.php';
</script>
<?php }?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<br/>
<center><img name="logbook" src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"></center>
<div class="container">

  <div class="container">
   
    <hr>
	 <font color="white"><h5 style="background-color:white; color:black; width:70%"><tr><td>Name&nbsp;: <?php echo $name ;?></td></tr>  </h5>
   
    <p><br>
	 <form id="assign" name="assign2" action="assign2.php" method="post">
      Select Organization     <select name="sup" id="select">
						<option> </option>
									<?php  
									//
							$rq=mysqli_query($conn,"select *from orgnize ")or die(mysql_error());
							while($row=mysqli_fetch_array($rq)){?>
							<option  value="<?php echo $row['orgname'];?>"><?php echo $row['orgname'];?></option>
							<?php }?>
        
      
      </select>
	  <input type="submit" name="submit" id="btnSubmit" value="Assign" class="btn btn-success">
	  <input type="hidden" name="idd" value="<?php  echo $idd;?>">
	   </form>
      <br>
    </p>
  </div>
   <center> <h3 style=" color:black ;background-color:white" >Student requested Placement Information</h3><center>
  <table align="left"  width="100%"  border="1" style=" color:black; background-color:white" >
          
		
                 <tr > 
				 
<th bgcolor="green" width="1%"><font size="2" COLOR="WHITE"> ID</th>
<th bgcolor="green"  width="20%"><font face="Albertus MT" size="2" COLOR="WHITE">	Organization Name </th>
<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE"><center>Address</th>
<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE"><center>Organization Type</th>


<?php
include_once('db/db2.php');
$count =0;
$record=mysqli_query($conn,"select *from organization where matricno='$matricno'")or die(mysqli_error);
    while($rowfetch=mysqli_fetch_assoc($record) ){
		$count++;

    echo "<tr>";
	 echo "<td><center> <font  size='2'>".$count."</td>";
     echo "<td> <font  size='2'>".strtoupper($rowfetch['org_name'])."</td>";
     echo "<td> <font  size='2'>".strtoupper($rowfetch['org_add'])."</td>";
     echo "<td> <font  size='2'>".strtoupper($rowfetch['org_type'])."</td>";
	  
      	  echo "</tr>";  
	}		  
      	     ?>


</table>
<br/><br/>

   
  <a href="manageStudent.php" class="btn btn-danger">Back</a>
</div>
</body>
</html>
<?php

?>
