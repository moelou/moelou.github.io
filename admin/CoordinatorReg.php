
  
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
if(isset($_POST['submit'])){
	                         
	
	$name=$_POST['name'];
	$username=$_POST['username'];
	$gender=$_POST['gender'];
	
    $department=$_POST['department'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
    
	$password=$_POST['password'];
   
	$app="0";
	$add=mysqli_query($conn,"INSERT INTO coordinators(name,username,password,gender,department,phone,email,app) values('$name','$username','$password','$gender','$department','$phone','$email','$app')")or die(mysqli_error);
	
	$record=mysqli_query($conn,"select max(id) as id from coordinators ")or die(mysqli_error);
    $rowfetch=mysqli_fetch_assoc($record);
	$rid = $rowfetch['id'];
	
	$add=mysqli_query($conn,"INSERT INTO login(username,password,type,acctid) values('$username','$password','cod','$rid')")or die(mysqli_error);

	echo '<script>alert("Record Added")</script>';
	
?>	
	<script type="text/javascript">

window.location='ManageCoordinator.php';
</script>
	
<?php 
}
?>
  
<!doctype html>
<html>
<head>
<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}



</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 

<meta charset="utf-8">
<title>Student Registration</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<br/>
<center><img name="logbook" src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"></center>
<br/>
<div class="container">
<div class="container">
  <center><h5 style="background-color:white">Coodinator Registration</h5></center>
  <div class="container">
  <form action="CoordinatorReg.php" name="registration" method="POST" enctype="multipart/form-data">
    <table width="75%" border="0" align="center">
      <tbody>
      <tr>
          <td><input name="name" type="text" class="form-control" id="st_fname" placeholder="Coordinator Name" required></td>
        </tr>
        <tr>
          <td><input name="username" type="text" class="form-control" id="st_matric" placeholder="Username" required></td>
        </tr>
        <tr>
          <td><input name="password" type="password" class="form-control" id="st_email" placeholder="Password" required></td>
        </tr>
       
         <tr>
          <td><select name="gender" id="gender" class="form-control">
          <option>Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          
          </select></td>
        </tr>
        <tr>
        <tr>
          <td><select name="department" id="st_depart" class="form-control">
         <option value="Computer Science">Computer Scince</option> 
         <option value="Mathematics">Mathematics</option> 
         <option value="Physics">Physics</option> 
          </select></td>
        </tr>
		 <tr>
          <td><input name="phone" type="tel" class="form-control" id="st_phone" maxlength="11" placeholder="Phone Number"  onkeypress="return isNumber(event)" required></td>
        </tr>
        
        <tr>
          <td><input name="email" type="email" class="form-control" id="txtPassword" placeholder="Email" required></td>
        </tr>
		
        
        <tr>
          <td><input type="submit" name="submit" id="btnSubmit" value="Register" class="btn btn-success">
            <a href="ManageCoordinator.php" class="btn btn-dark">Back</a></td>
        </tr>
      </tbody>
    </table>
    <input type="hidden" name="MM_insert" value="registration">
  </form>
    
  </div>
  <p>&nbsp;</p>
</div>
</body>
</html>