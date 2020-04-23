
  
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
	
	$matricno=$_POST['matricno'];
	$name=$_POST['name'];
	$gender=$_POST['gender'];
	
    $department=$_POST['department'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
  
	
	$password=$_POST['password'];
     //image
	
	$app="0";
	$add=mysqli_query($conn,"INSERT INTO student(name,matricno,gender,department,email,phone,password,image,app) values('$name','$matricno','$gender','$department','$email','$phone','$password','$thumbnails','$app')")or die(mysqli_error);
	
	$record=mysqli_query($conn,"select max(id) as id from student ")or die(mysqli_error);
    $rowfetch=mysqli_fetch_assoc($record);
	$rid = $rowfetch['id'];
	
	$add=mysqli_query($conn,"INSERT INTO login(username,password,type,acctid) values('$matricno','$password','student','$rid')")or die(mysqli_error);


	echo '<script>alert("Registration Successful")</script>';
	
?>	
	<script type="text/javascript">

window.location='manageStudent.php';
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
<script type="text/javascript">
    $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#txtPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>


<meta charset="utf-8">
<title>Student Registration</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/futict.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">

<center><img name="logbook" src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"></center>
<div class="container">
   <h4 class="text-center" style=" color:white; background-color:brown">Student's Registration</h4>
  <div class="container">
  <form action="StudentRegistration.php" name="registration" method="POST" enctype="multipart/form-data">
    <table width="75%" align="center" border="0" >
      <tbody>
      <tr>
          <td><input name="name" type="text" class="form-control" id="st_fname" placeholder="Student Name" required></td>
        </tr>
        <tr>
          <td><input name="matricno" type="text" class="form-control" id="st_matric" placeholder="Matric No" required></td>
        </tr>
        <tr>
          <td><input name="email" type="email" class="form-control" id="st_email" placeholder="Email" required></td>
        </tr>
        <tr>
          <td><input name="phone" type="tel" class="form-control" id="st_phone" maxlength="11" placeholder="Phone Number"  onkeypress="return isNumber(event)" required></td>
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
          <option>Computer Science</option> 
         <option>Cyber Security Science</option> 
         <option>Information and Media Technology</option> 
         <option>Library Information Technology</option>
          </select></td>
        </tr>
        
        <tr>
          <td><input name="password" type="password" class="form-control" id="txtPassword" placeholder="Password" required></td>
        </tr>
		 <tr>
          <td><input name="confirm_password" type="password" class="form-control" id="txtConfirmPassword" placeholder="Confirm Password" ></td>
        </tr>
        <tr>
          <td><input name="image" type="file" class="form-control"  required></td>
        </tr>
        <tr>
          <td><input type="submit" name="submit" id="btnSubmit" value="Register" class="btn btn-success">
            <a href="manageStudent.php" class="btn btn-danger">Back</a></td>
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