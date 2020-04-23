
  
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
	                       
	
	$orgname=$_POST['orgname'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	
 
	$type=$_POST['type'];
	$phone=$_POST['phone'];
    $username=$_POST['username'];
	$password=$_POST['password'];
     
	$add=mysql_query("INSERT INTO orgnize(orgname,address,email,phone,type,username,password) values('$orgname','$address','$email','$phone','$type','$username','$password')")or die(mysql_error);

	echo '<script>alert("Record Added")</script>';
	
?>	
	<script type="text/javascript">

window.location='manageorg.php';
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
<br/>
<div class="container">
  <form action="orgreg.php" name="registration" method="POST" enctype="multipart/form-data">
    <table width="100%" border="0" class="table">
      <tbody>
      <tr>
          <td><input name="orgname" type="text" class="form-control"  placeholder="Organization Name" required></td>
        </tr>
        <tr>
          <td><textarea name="address" rows="5" cols="120"   placeholder="address" required></textarea></td>
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
          <td><input name="username" type="text" class="form-control"  placeholder="Username" required></td>
        </tr>
		 <tr>
          <td><input name="password" type="password" class="form-control" placeholder="Password" ></td>
        </tr>
       
        <tr>
          <td><input type="submit" name="submit" id="btnSubmit" value="Register" class="btn btn-success">
            <a href="manageorg.php" class="btn btn-dark">Back</a></td>
        </tr>
      </tbody>
    </table>
      </form>
    
  </div>
  <p>&nbsp;</p>
</div>
</body>
</html>