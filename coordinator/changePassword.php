 
<?php
include_once('db/db.php'); 

if(isset($_POST['submit'])){

	$username=$_POST['username'];
	$password=$_POST['password'];
	$id=$_POST['id'];
   
	$result=mysqli_query($conn,"UPDATE coordinators SET username='$username' , password='$password' WHERE id='$id'")or die(mysqli_error); 
	 mysqli_query($conn,"UPDATE login SET username='$username',password='$password' WHERE acctid='$id'")or die(mysqli_error);	

	echo '<script>alert("Password Updated")</script>';
	
?>	
<script type="text/javascript">

window.location='logout.php';
</script>
	
<?php 
}
?>
<?php 

include_once('db/db.php');
  $idd=$_GET['id'];
  $query=mysqli_query($conn,"select * from coordinators where id='$idd'")or die(mysqli_error);
 while($rowfetch=mysqli_fetch_array($query))
 {
 
 $username=$rowfetch['username'];
 $password=$rowfetch['password'];


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
<title>Change Password</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/futict.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<br/>
<center><img name="logbook" src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"></center>
<div class="container">
 <h4 class="text-center" style=" color:white; background-color:brown">Change Password</h4>
 <br/>
  <div class="container">
  <form action="changePassword.php"  method="POST" >
    <table width="75%" align="center" border="0" >
      <tbody>
      
        <tr>
          <td><input name="username" type="text" class="form-control" value="<?php echo $username;?>" placeholder="Username" required></td>
        <input name="id" type="hidden"  value="<?php echo $_GET['id'];?>" required></td>
        </tr>
        <tr>
          <td><input name="password" type="password" class="form-control" value="<?php echo $password;?>" placeholder="Password" required></td>
        </tr>
                     
        <tr>
          <td><input type="submit" name="submit" id="btnSubmit" value="Update" class="btn btn-success">
            <a href="dashboard.php" class="btn btn-danger">Back</a></td>
        </tr>
      </tbody>
    </table>
   
  </form>
    
  </div>
  <p>&nbsp;</p>
</div>
</body>
</html>