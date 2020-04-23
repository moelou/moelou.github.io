<?php
//Start session
session_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || (trim($_SESSION['username']) == '')) {
   header("location:login.php");
    exit();
}
else
{
include_once('db/db.php');
}
?>
<?php 
$id=0;
  include_once('db/db.php');
  $idd=$_GET['id'];
  $query=mysqli_query($conn,"select *from week where studentid='$idd'")or die(mysqli_error);
 while($rowfetch=mysqli_fetch_array($query))
 {
 
 $start=$rowfetch['start'];
 $end=$rowfetch['end'];
 $id=$rowfetch['studentid'];

 }
  $numb="";
 $qy=mysqli_query($conn,"select *from week where studentid='$idd'")or die(mysqli_error);
 while($row=mysqli_fetch_array($qy))
 {
 $numb = mysqli_num_rows($qy);
 }
 
  $qyq=mysqli_query($conn,"select *from student where id='$idd'")or die(mysqli_error);
  $rrow=mysqli_fetch_array($qyq);


?>

<?php 

  $query=mysqli_query($conn,"select *from student where id='$idd'")or die(mysqli_error);
 while($rowfetch=mysqli_fetch_array($query))
 {
 
 $name=$rowfetch['name'];
 $email=$rowfetch['email'];
 $phone=$rowfetch['phone'];
 $gender=$rowfetch['gender'];
 $department=$rowfetch['department'];
  
 $password=$rowfetch['password'];
 $image=$rowfetch['image'];
 
 
  
 }



?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>LogBook</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<center><img src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"/>
<div class="container">
   <h3 class="text-center" style=" color:black; width:100%;background-color:white">Final Accessment </h3>
  <div class="container"><div class="row">
    <div class="col-lg-12 col-md-8 col-sm-12 hidden-xs">
    <div class="row" style="margin-bottom:10px">
    
 <table width="40%" align="center"><tr><td>
 <center> <img src="<?php echo "../admin/".$image; ?>" height="150" style="border-radius:50%" width="150"> </td></tr></center>
  <tr><td><hr></td></tr>
  <tr style="background-color:white;"><td>Name&nbsp;: <?php echo $name ;?></td></tr>
  <tr style="background-color:white;"><td>Email&nbsp;: <?php echo $email ;?></td></tr>
  <tr style="background-color:white;"><td>Phone&nbsp;:<?php echo $phone ;?></td></tr>
  <tr style="background-color:white;"><td>Gender&nbsp;:<?php echo $gender ;?></td></tr>
  <tr style="background-color:white;"><td>Department&nbsp;: <?php echo $department ;?></td></tr>
 
  
  
  
  
  </table>  

<table class="table" style="color:black; background-color:white" width="70%" border="1">
    <tbody class="thead-dark">
      <tr>
      
        <th scope="col">S/N</th>
        <th scope="col">Dep. Coordinator Comment</th>
        <th scope="col">School Supervisor Comment</th>
        <th scope="col">Indus. Supervisor Comment</th>
        </tr>
    </tbody>
	
    <tbody class="table-striped">
     <?php
		include_once('db/db.php');
        $count =0;
		$record=mysqli_query($conn,"select * from student where id='$id' ")or die(mysqli_error);
		while($row=mysqli_fetch_assoc($record) ){
		$count++;

		  
	 ?>
        <tr>
          <td><?php echo $count; ?></td>
          <td><?php echo $row['cod_grade']; ?></td>
          <td><?php echo $row['sup_grade'] ?></td>
           
		  <td><?php echo $row['org_grade']; ?></td>
	   </tr>
        
    </tbody>
	  <?php  }?>
  </table>
  <h3 class="text-center" style=" color:black; width:100%;background-color:white">LOGBOOK ACTIVITY </h3>
  <table class="table" style="color:black; background-color:white" width="70%" border="1">
    <tbody class="thead-dark">
      <tr>
        <th scope="col">Week</th>
        <th scope="col">Start Week</th>
        <th scope="col">End Week</th>
        <th scope="col">View Activity</th>
        <th scope="col">Dep. Coordinator Comment</th>
        <th scope="col">School Supervisor Comment</th>
        <th scope="col">Indus. Supervisor Comment</th>
        </tr>
    </tbody>
	
    <tbody class="table-striped">
     <?php
		include_once('db/db.php');
        $count =0;
		$record=mysqli_query($conn,"select * from week where studentid='$id' ")or die(mysqli_error);
		while($row=mysqli_fetch_assoc($record) ){
		$count++;

		  
	 ?>
        <tr>
          <td><?php echo $count; ?></td>
          <td><?php echo $row['start']; ?></td>
          <td><?php echo $row['end'] ?></td>
          <td><a href="log_activity.php?id=<?php echo $row['id']; ?>&idd=<?php echo $idd;?>">View </a></td>
          <td><?php   echo $row['codcomment'];?></td>
          <td><?php   echo $row['supcomment'];?></td>
		  <td><?php echo $row['incomment']; ?></td>
	   </tr>
        
    </tbody>
	  <?php  }?>
  </table>
<a href="managestudent.php" class="btn btn-danger" style="width:25%">  Back   </a> &nbsp; <a href="#" onclick="window.print();" class="btn btn-warning" style="width:25%">  Print   </a></td>
    </div>
    
    </div>
    
    </div>
 
</div></div>
</div>
</body>
</html>

