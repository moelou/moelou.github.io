
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
	                         $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                             $image_name = addslashes($_FILES['image']['name']);
                             $image_size = getimagesize($_FILES['image']['tmp_name']);

             move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);
            $thumbnails = "uploads/" . $_FILES["image"]["name"];
	
	$name=$_POST['supname'];
    $department=$_POST['department'];
    $email=$_POST['email'];
	$phone=$_POST['phone'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$gender=$_POST['gender'];
	
	$approved="0";
	$add=mysqli_query($conn,"INSERT INTO supervisors(name,email,phoneno,gender,department,username,password,image,app) values('$name','$email','$phone','$gender','$department','$username','$password','$thumbnails','$app')")or die(mysqli_error);
	
	$record=mysqli_query($conn,"select max(id) as id from supervisors ")or die(mysqli_error);
    $rowfetch=mysqli_fetch_assoc($record);
	$rid = $rowfetch['id'];
	
	$add=mysqli_query($conn,"INSERT INTO login(username,password,type,acctid) values('$username','$password','sup','$rid')")or die(mysqli_error);
	
	

	echo '<script>alert("Record Added")</script>';
	
?>	
	<script type="text/javascript">

window.location='manageSupervisor.php';
</script>
	
<?php 
}
?>

 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Supervisor Registration </title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<br/>
<center><img name="logbook" src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"></center>
<div class="container">
  <h5 style="background-color:white">Supervisor Registration</h5>
  <div class="container">
  <form method="POST" action="supervisorReg.php"  enctype="multipart/form-data">
    <table width="75%" border="0" align="center">
      <tbody>
        <tr>
          <td><input name="supname" type="text" class="form-control"  placeholder="Fullname" required></td>
        </tr>
        <tr>
          <td><input name="email" type="email" class="form-control"  placeholder="Email" required></td>
        </tr>
        <tr>
          <td><input name="phone" type="tel" class="form-control" placeholder="Phone Number" maxlength="11" required> </td>
        </tr>
         <tr>
          <td><select name="gender"  class="form-control">
          <option>Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          
          </select></td>
        </tr>
        <tr>
        <tr>
          <td><select name="department"  class="form-control" required>
		           <option>====Select====</option> 

         <option value="Computer Science">Computer Scince</option> 
         <option value="Mathematics">Mathematics</option> 
         <option value="Physics">Physics</option> 
          </select></td>
        </tr>
         <tr>
          <td><input name="username" type="text" class="form-control"  placeholder="Username" required></td>
        </tr>
        <tr>
          <td><input name="password" type="password" class="form-control"  placeholder="Password" required></td>
        </tr>
        <tr>
          <td><input name="image" type="file" class="form-control"></td>
        </tr>
        <tr>
          <td><input type="submit" name="submit" id="Sign In" value="Register" class="btn btn-success">
            <a href="manageSupervisor.php" class="btn btn-danger"> Back</a></td>
        </tr>
      </tbody>
    </table>
   
  </form>
  </div>
  <p>&nbsp;</p>
</div>
</body>
</html>