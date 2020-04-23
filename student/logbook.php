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
$id=0;
  include_once('db/db.php');
  $idd=$_SESSION['id'];
  $numb="";
  $query=mysqli_query($conn,"select *from week where studentid='$idd'")or die(mysqli_error);
 while($rowfetch=mysqli_fetch_array($query))
 {
 
 $start=$rowfetch['start'];
 $end=$rowfetch['end'];
 $id=$rowfetch['studentid'];
 $numb = mysqli_num_rows($query);


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
<h2 class="text-center" style=" color:black ;background-color:white">LOGBOOK ACTIVITY </h2>
  <div class="container"><div class="row">
    <div class="col-lg-12 col-md-8 col-sm-12 hidden-xs">
    <div class="row" style="margin-bottom:10px">
   <?Php if($numb == 24){
	   ?> 
  <div class="alert alert-danger alert-heading">If You didn't add any week in your log <a href="#" onclick="return confirm('No more Week  Required')" class="btn btn-danger">Add Week </a></div>
  
   <?php } else {?>
    <div class="alert alert-danger alert-heading">If You didn't add any week in your log <a href="weekly.php" class="btn btn-danger">Add Week </a></div>
     <?php }?>

  <table class="table" style="color:black; background-color:white" width="70%" border="1">
    <tbody class="thead-light">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Start Week</th>
        <th scope="col">End Week</th>
        <th scope="col">Add Activity</th>
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
          <td><a href="log_activity.php?id=<?php echo $row['id']; ?>">Add Details </a></td>
        </tr>
        
    </tbody>
	  <?php  }?>
  </table>


<BR/><br/><br/>
    </div>
    
    </div>
	<a href="dashboard.php" class="btn btn-danger">  Back </a>
    
    </div>
</div></div>
</div>
</body>
</html>

