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
<?php 

if(isset($_POST['grade'])){
		$let = $_POST['letter'];
		$id = $_POST['id'];
		
		mysqli_query($conn,"UPDATE student SET cod_grade='$let' WHERE id='$id'")or die(mysqli_error); 
	    echo "<script>alert('Student Grading Complete')
		 window.location='logbook.php?id=$id';
		</script>";
		 
		
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
   <h3 class="text-center" style=" color:black; width:100%;background-color:white">LOGBOOK ACTIVITY </h3>
  <div class="container"><div class="row">
    <div class="col-lg-12 col-md-8 col-sm-12 hidden-xs">
    <div class="row" style="margin-bottom:10px">
    
 <table width="40%" align="center">
 
  <tr style="background-color:white;"><td>Name&nbsp;: <?php echo $name ;?></td></tr>
  <tr style="background-color:white;"><td>Email&nbsp;: <?php echo $email ;?></td></tr>
  <tr style="background-color:white;"><td>Phone&nbsp;:<?php echo $phone ;?></td></tr>
  <tr style="background-color:white;"><td>Gender&nbsp;:<?php echo $gender ;?></td></tr>
  <tr style="background-color:white;"><td>Department&nbsp;: <?php echo $department ;?></td></tr>
 
  
  
  
  
  </table>  

<table class="table" style="color:black; background-color:white" width="70%" border="1">
    <tbody class="thead-dark">
      <tr>
        <th scope="col">Week</th>
        <th scope="col">Start Week</th>
        <th scope="col">End Week</th>
        <th scope="col">View Activity</th>
        <th scope="col">Comment</th>
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
<a href="managestudent.php" class="btn btn-danger" style="width:25%">  Back   </a></td>
    </div>
    
    </div>
    
    </div>
<?php 
	$check = $rrow['sup_grade'];
	
	if($numb == 24 & $check == "")
	{
		?>
		 <h4 style="color:red; background-color:white;">Gradding can be done Only Once Be sure of your Selection</h4>
		
		 <form action="logbook.php" method="Post">
		 
		 <table  style="width:50%" border="0"  >
		
      <tbody>
	   <tr>
	   <td>&nbsp;
	   </td>
	   </tr>
      <tr>
	  
          <td><select name="letter"  class="form-control">
          
          <option>F (10%)</option>
          <option>F (20%)</option>
          <option>E (30%)</option>
          <option>D (40%)</option>
          <option>CD (50%)</option>
          <option>C (60%)</option>
          <option>BC (70%)</option>
          <option>B (80%)</option>
          <option>AB (90%)</option>
          <option> A (100%)</option>
          
          
          </select></td>
        </tr>
       
       
        <tr>
          <td>
		  <input type="submit" name="grade" id="btnSubmit" value="GRADE STUDENT" class="btn btn-success">
		  <input type="hidden" value="<?php echo $idd;?>" name="id">
          </td>
        </tr>
      </tbody>
    </table>
	</form>
		<?php
		
	}?>
    
</div></div>
</div>
</body>
</html>

