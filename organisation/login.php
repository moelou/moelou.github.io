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

$querylogin=mysqli_query($conn,"SELECT *FROM orgnize WHERE username='$username' AND password='$password' and app='1'")or die(mysql_error);

if(mysqli_num_rows($querylogin))
{
$row=mysqli_fetch_array($querylogin);
$_SESSION['username']=$row['username'];
$_SESSION['id']=$row['id'];


?>
<script type="text/javascript">
 
 window.location='dashboard.php';
 </script>

 <?php
  
}


else
{
?>
 <script type="text/javascript">
 alert("ACCESS DENIED : Invalid Usernae or Password (Your account is not Active, Contact the Departmental Coordinator)")
 </script>
  

<?php
}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Organization</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/futict.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<br/>
<center><img name="logbook" src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"></center>
<br/>
<center><div class="container"  style=" border: 1px solid white; width:750px" >
  <h3 style="color:white">Industrial based supervisor's Login</h3>
  <div class="container" >
  <form name="form1" method="post" action="login.php">
    <table width="55%" border="0">
      <tbody>
        <tr>
          <td><input name="username" type="text" class="form-control" style="width:100%;"   placeholder="Username/Email"></td>
        </tr>
        <tr>
          <td><input name="password" type="password" class="form-control"  style="width:100%;" placeholder="Password"></td>
        </tr>
        <tr>
          <td>&nbsp;
            </td>
        </tr>   <tr>
          <td>
            <a href="orgreg.php" class="btn btn-primary" style="width:45%"> Register </a>
			<input type="submit"  value="Login" name="submit" style="width:50%;" class="btn btn-success"></td>
			
        </tr>
		<tr>
		<td>  <a href="../index.html" style="width:45%; color:red"> Back To Home Page</a>
		</td>
        </tr>
      </tbody>
    </table></form>
  </div>
  <p>&nbsp;</p>
</div>
</center>
</body>
</html>