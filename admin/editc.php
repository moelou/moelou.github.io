
  
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
	$id=$_POST['id'];
   
	
	$result=mysqli_query($conn,"UPDATE coordinators SET name='$name',username='$username',password='$password',gender='$gender',department='$department',phone='$phone',email='$email' WHERE id='$id'")or die(mysqli_error);

    mysqli_query($conn,"UPDATE login SET username='$username',password='$password' WHERE acctid='$id'")or die(mysqli_error);	
	
	
	

	echo '<script>alert("Record Updated")</script>';
	
?>	
	<script type="text/javascript">

window.location='ManageCoordinator.php';
</script>
	
<?php 
}
?>

<?php 

include_once('db/db.php');
  $id=$_GET['id'];
  $query=mysqli_query($conn,"select * from coordinators where id='$id'")or die(mysqli_error);
 while($rowfetch=mysqli_fetch_array($query))
 {
 
 $name=$rowfetch['name'];
 $username=$rowfetch['username'];
 $pass=$rowfetch['password'];
 $email=$rowfetch['email'];
 $phone=$rowfetch['phone'];
 $gender=$rowfetch['gender'];
 $department=$rowfetch['department'];
 
 
 
  
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
<title>Coordinator Registration</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

 <body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<br/>
<center><img name="logbook" src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"></center>
<br/>
<div class="container">
 <center> <h5 style="background-color:white">Update</h5></center>
  <div class="container">
  <form action="editc.php" name="registration" method="POST" enctype="multipart/form-data">
    <table width="75%" border="0" align="center">
      <tbody>
      <tr>
          <td><input name="name" type="text" class="form-control" id="st_fname" value="<?php echo $name; ?>" placeholder="Coordinator Name" required></td>
			<input name="id" type="hidden" class="form-control" id="st_fname" value="<?php echo $_GET['id']; ?>" placeholder="Coordinator Name" required></td>
	   </tr>
        <tr>
          <td><input name="username" type="text" class="form-control" id="st_matric" value="<?php echo $username; ?>" placeholder="Username" required></td>
        </tr>
        <tr>
          <td><input name="password" type="password" class="form-control" id="st_email"value="<?php echo $pass; ?>" placeholder="Password" required></td>
        </tr>
       
         <tr>
          <td><select name="gender" id="gender" class="form-control">
          <option><?php echo $gender; ?></option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          
          </select></td>
        </tr>
        <tr>
        <tr>
          <td><select name="department" id="st_depart" class="form-control">
		  
         <option value="<?php echo $department; ?>"><?php echo $department; ?></option> 
         <option value="Computer Science">Computer Scince</option> 
         <option value="Mathematics">Mathematics</option> 
         <option value="Physics">Physics</option> 
          </select></td>
        </tr>
		 <tr>
          <td><input name="phone" type="tel" class="form-control" id="st_phone" maxlength="11" value="<?php echo $phone; ?>" placeholder="Phone Number"  onkeypress="return isNumber(event)" required></td>
        </tr>
        
        <tr>
          <td><input name="email" type="email" class="form-control" id="txtPassword" value="<?php echo $email; ?>" placeholder="Email" required></td>
        </tr>
		
        
        <tr>
          <td><input type="submit" name="submit" id="btnSubmit" value="Update Details" class="btn btn-success">
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