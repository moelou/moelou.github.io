 
<?php
include_once('db/db.php'); 
if(isset($_POST['submit'])){
	                         
	
	$name=$_POST['name'];
	
	$gender=$_POST['gender'];
	 
	$email=$_POST['email'];
	$username=$email;
	$phone=$_POST['phone'];
    
	$password="00000";
   
	$app="0";
	$add=mysqli_query($conn,"INSERT INTO itf(name,username,password,gender,phone,email,app) values('$name','$username','$password','$gender','$phone','$email','$app')")or die(mysqli_error);
	
	$record=mysqli_query($conn,"select max(id) as id from itf ")or die(mysqli_error);
    $rowfetch=mysqli_fetch_assoc($record);
	$rid = $rowfetch['id'];
	
	$add=mysqli_query($conn,"INSERT INTO login(username,password,type,acctid) values('$username','$password','itf','$rid')")or die(mysqli_error);

	echo '<script>alert("Registration Successful")</script>';
	
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



<meta charset="utf-8">
<title>Student Registration</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/futict.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<br/>
<center><img name="logbook" src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"></center>

<div class="container">
<h4 class="text-center" style=" color:black; background-color:white"> ITF Registration </h4>
  <div class="container">
  <form action="itfreg.php" name="registration" method="POST" enctype="multipart/form-data">
    <table width="75%" border="0" align="center">
      <tbody>
      <tr>
          <td><input name="name" type="text" class="form-control" id="st_fname" placeholder="Full Name" required></td>
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
          <td><input name="phone" type="tel" class="form-control" id="st_phone" maxlength="11" placeholder="Phone Number"  onkeypress="return isNumber(event)" required></td>
        </tr>
        
        <tr>
          <td><input name="email" type="email" class="form-control" id="txtPassword" placeholder="Email" required></td>
        </tr>
		
        
        <tr>
          <td><input type="submit" name="submit" id="btnSubmit" style="width:25%" value="Register" class="btn btn-success">
            <a href="../index.html" class="btn btn-danger" style="width:25%">Back</a></td>
        </tr>
      </tbody>
    </table>
   
  </form>
    
  </div>
  <p>&nbsp;</p>
</div>
</body>
</html>