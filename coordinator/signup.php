
  
					   
<?php
include_once('db/db.php'); 
if(isset($_POST['submit'])){
	                         $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                             $image_name = addslashes($_FILES['image']['name']);
                             $image_size = getimagesize($_FILES['image']['tmp_name']);

             move_uploaded_file($_FILES["image"]["tmp_name"], "../admin/uploads/" . $_FILES["image"]["name"]);
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
	$add=mysql_query("INSERT INTO student(name,matricno,gender,department,email,phone,password,image,app) values('$name','$matricno','$gender','$department','$email','$phone','$password','$thumbnails','$app')")or die(mysql_error);

	echo '<script>alert("Record Added")</script>';
	
?>	
	<script type="text/javascript">

window.location='login.php';
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

<body>
<div class="row"><img src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"/></div>
<div class="container">
  <h5>Student's Registration</h5>
  <div class="container">
  <form action="signup.php" name="registration" method="POST" enctype="multipart/form-data">
    <table width="100%" border="0" class="table">
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
         <option value="Computer Science">Computer Scince</option> 
         <option value="Mathematics">Mathematics</option> 
         <option value="Physics">Physics</option> 
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
            <a href="login.php" class="btn btn-dark">Back</a></td>
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