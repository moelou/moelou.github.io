

<?php
session_start();
error_reporting("E_All");
include_once('db/db.php');
?>

<?php
include_once('db/db.php');

if(isset($_POST['submit']))
{
$username=$_POST['username'];
$password=$_POST['password'];

$querylogin=mysqli_query($conn,"SELECT *FROM login WHERE username='$username' AND password='$password' AND app ='1' limit 1")or die(mysqli_error);
 $check ="";
 $acctid ="";
if(mysqli_num_rows($querylogin) > 0)
{
	
   $row=mysqli_fetch_array($querylogin);
   $type = $row['type'];
   $acctid = $row['acctid'];
   
   if($type == "org")
   {
	   
	   $_SESSION['username']=$row['username'];
       $_SESSION['id']=$row['acctid'];
	   echo '<script type="text/javascript"> window.location="organisation/dashboard.php"; </script>';
	   
   }
	   
   else if($type == "sup")
   {
	   $_SESSION['username']=$row['username'];
       $_SESSION['id']=$row['acctid'];
	   echo '<script type="text/javascript"> window.location="staff/dashboard.php"; </script>';
   }
	   
   else if($type == "student"){
	   $_SESSION['matricno']=$row['username'];
       $_SESSION['id']=$row['acctid'];
	    
	   echo '<script type="text/javascript"> window.location="student/dashboard.php"; </script>';
   }
	   
   else if($type == "itf"){
	      $_SESSION['username']=$row['username'];
       $_SESSION['id']=$row['acctid'];
	   echo '<script type="text/javascript"> window.location="itf/dashboard.php"; </script>';
   }
	   
   else if($type == "cod"){
	   
	      $_SESSION['username']=$row['username'];
         $_SESSION['id']=$row['acctid'];
	   echo '<script type="text/javascript"> window.location="coordinator/dashboard.php"; </script>';
   }
   
    else if($type == "admin"){
	   
	      $_SESSION['username']=$row['username'];
       $_SESSION['id']=$row['id'];
	   echo '<script type="text/javascript"> window.location="admin/dashboard.php"; </script>';
   }
	   
}

else
{
	
	 echo '<script>alert("Invalid Login Details")</script>';
	
}
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('img/futict.Jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<br/>

<center><div class="container"  style=" border: 1px solid white; width:750px" >
  <h3 style="color:white">User Login</h3>
  <div class="container" >
  <form name="form1" method="post" action="login.php">
    <table width="55%" border="0">
      <tbody>
        <tr>
          <td><input name="username" type="text" class="form-control" style="width:100%;"   placeholder="Username" required></td>
        </tr>
        <tr>
          <td><input name="password" type="password" class="form-control"  style="width:100%;" placeholder="Password" required>
		  </td>
        </tr>
        <tr>
          <td>&nbsp;
            </td>
        </tr>   <tr>
          <td>
            <a href="index.html" class="btn btn-danger"> Back to Home Page </a>
			<input type="submit"  value="Login" name="submit" style="width:55%;" class="btn btn-success"></td>
        </tr>
		
        </tr>
      </tbody>
    </table></form>
  </div>
  <p>&nbsp;</p>
</div>
</center>
</body>
</html>