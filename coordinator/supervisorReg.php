
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
	$add=mysql_query("INSERT INTO supervisors(name,email,phoneno,gender,department,username,password,image,app) values('$name','$email','$phone','$gender','$department','$username','$password','$thumbnails','$app')")or die(mysql_error);

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

<body>
<br/>
<center><img src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"/></center>
<br/>
<div class="container">
  <h5>Supervisor Registration</h5>
  <div class="container">
  <form method="POST" action="supervisorReg.php"  enctype="multipart/form-data">
    <table width="100%" border="0" class="table">
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
            <a href="manageSupervisor.php" class="btn btn-dark"> Back</a></td>
        </tr>
      </tbody>
    </table>
   
  </form>
  </div>
  <p>&nbsp;</p>
</div>
</body>
</html>