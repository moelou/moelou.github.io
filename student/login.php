

<?php
session_start();
error_reporting("E_All");
include_once('db/db.php');
?>

<?php
include_once('db/db.php');

if(isset($_POST['submit']))
{
$matricno=$_POST['matricno'];
$password=$_POST['password'];

$querylogin=mysqli_query($conn,"SELECT *FROM student WHERE matricno='$matricno' AND password='$password'")or die(mysqli_error);

if(mysqli_num_rows($querylogin))
{
$row=mysqli_fetch_array($querylogin);
$_SESSION['matricno']=$row['matricno'];
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
 alert("ACCESS DENIED")
 </script>
  

<?php
}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<br/>
<center><img name="logbook" src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"></center>
<br/>
<center><div class="container"  style=" border: 1px solid white; width:750px" >
  <h3 style="color:white">Student's Login</h3>
  <div class="container" >
  <form name="form1" method="post" action="login.php">
    <table width="55%" border="0"    	>
      <tbody>
        <tr>
          <td><input name="matricno" type="text" class="form-control" style="width:100%;"   placeholder="Matric No"></td>
        </tr>
        <tr>
          <td><input name="password" type="password" class="form-control"  style="width:100%;" placeholder="Password"></td>
        </tr>
        <tr>
          <td>&nbsp;
            </td>
        </tr>   <tr>
          <td>
            <a href="../index.html" class="btn btn-danger"> Back to Home Page </a>
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