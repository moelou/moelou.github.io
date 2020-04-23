
  
  	 	   
					   
<?php
include_once('db/db.php'); 
if(isset($_POST['submit'])){
	                       
	
	$orgname=$_POST['orgname'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	
 
	$type=$_POST['type'];
	$phone=$_POST['phone'];
    $username=$email;
    $name=$_POST['fullname'];
	$password="00000";
     
	$add=mysqli_query($conn,"INSERT INTO orgnize(orgname,address,email,phone,type,username,password,names) values('$orgname','$address','$email','$phone','$type','$username','$password','$name')")or die(mysqli_error);
	
	$record=mysqli_query($conn,"select max(id) as id from orgnize ")or die(mysqli_error);
    $rowfetch=mysqli_fetch_assoc($record);
	$rid = $rowfetch['id'];
	
	$add=mysqli_query($conn,"INSERT INTO login(username,password,type,acctid) values('$username','$password','org','$rid')")or die(mysqli_error);

	echo '<script>alert("Registration Successfully: Your Login Details will be Send to you via Email By the Co-ordinator ")</script>';
	
	
	
?>	
	<script type="text/javascript">

window.location='../index.html';
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
<title>Industrial based supervisor's </title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<CENTER><img src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"/></div>
<div class="container">
  <h2 class="text-center" style=" color:black; background-color:white">Industrial based supervisor's  Registration</h2>
  <div class="container">
  <form action="orgreg.php" name="registration" method="POST" enctype="multipart/form-data">
      <table width="70%" border="0" class="">
      <tbody>
      <tr>
          <td><input name="orgname" type="text" class="form-control"  placeholder="Organization Name" required></td>
        </tr> 
		<tr>
          <td><input name="fullname" type="text" class="form-control"  placeholder="Full Name" required></td>
        </tr>
        <tr>
          <td><textarea name="address" rows="5" cols="120"   placeholder=" Address" required></textarea></td>
        </tr>
        <tr>
          <td><input name="email" type="email" class="form-control" id="st_email" placeholder="Email" required></td>
        </tr>
        <tr>
          <td><input name="phone" type="tel" class="form-control" id="st_phone" maxlength="11" placeholder="Phone Number"  onkeypress="return isNumber(event)" required></td>
        </tr>
         <tr>
          <td><select name="type" id="gender" class="form-control">
          <option>Select Type</option>
          <option value="ICT">ICT</option>
          <option value="AGRIC">AGRIC</option>
          <option value="FINANCE">FINANCE</option>
          <option value="EDUACTION">EDUCATION</option>
          <option value="OTHERS">OTHERS</option>
          
          </select></td>
        </tr>
        <tr>
      
       
       
        <tr>
          <td><input type="submit" name="submit" id="btnSubmit" value="Register" class="btn btn-success">
            <a href="../index.html" class="btn btn-danger">Back</a></td>
        </tr>
      </tbody>
    </table>
      </form>
    
  </div>
  <p>&nbsp;</p>
</div>
</body>
</html>