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

}
?>

<?php 

include_once('db/db.php');
  $idd=$_SESSION['id'];
  $query=mysqli_query($conn,"select * from coordinators where id='$idd'")or die(mysqli_error);
 while($rowfetch=mysqli_fetch_array($query))
 {
 
 $name=$rowfetch['name'];

 }
 ?>
<?php
$dt = new DateTime();
  $date= $dt->format('Y-m-d H:i:s');
?>
	

<?php
include_once('db/db.php'); 
if(isset($_POST['submit'])){
	                         
	
	$msg=$_POST['msg'];
	$date=$_POST['date'];
	$name=$_POST['name'];
   
	$add=mysqli_query($conn,"INSERT INTO msg(msg,date,name) values('$msg','$date','$name')")or die(mysqli_error);

	echo '<script>alert("Message Sent")</script>';
	
?>	
	<script type="text/javascript">

window.location='dashboard.php';
</script>
	
<?php 
}
?>		

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title  >SEND MESSAGE</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/futict.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">

<div class="container">
  <h5 style="background-color:brown; color:white"><center>SEND MESSAGE</h5>
  <div class="container">
  <form action="send.php"  method="POST" id="registration">
    <table width="100%" border="0" class="table">
      <tbody>
      
          <td><textarea name="msg" class="form-control" id="st_email" placeholder="Message to Students" row="7"required/ ></textarea></td>
        <input type="hidden" value="<?php echo $date;?>" name="date" />
        <input type="hidden" value="<?php echo $name;?>" name="name" />
		</tr>
        
        </tr>
        <tr>
          <td><input type="submit" name="submit" id="Update" value="Send Message" class="btn btn-success">
		  <a href="dashboard.php" class="btn btn-danger">  Back   </a>
           </td>
        </tr>
      </tbody>
    </table>
     </form>
    
  </div>
  <p>&nbsp;</p>
</div>
</body>
</html>

