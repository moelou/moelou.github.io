
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

<!---Get DATA ---->

<?php 

include_once('db/db.php');
  $id=$_GET['id'];
  $query=mysqli_query($conn,"select * from supervisors where id='$id'")or die(mysqli_error);
 while($rowfetch=mysqli_fetch_array($query))
 {
 
 $name=$rowfetch['name'];
 $email=$rowfetch['email'];
 $phone=$rowfetch['phoneno'];
 $gender=$rowfetch['gender'];
 $department=$rowfetch['department'];
 $username=$rowfetch['username'];
 $password=$rowfetch['password'];
 $image=$rowfetch['image'];
 
 
  
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
	
	$name=$_POST['supname'];
    $department=$_POST['department'];
    $email=$_POST['email'];
	$phone=$_POST['phone'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$gender=$_POST['gender'];
	$id=$_POST['id'];
	
	

	$result=mysqli_query($conn,"UPDATE supervisors SET name='$name',email='$email',phoneno='$phone',gender='$gender',department='$department',username='$username',password='$password',image='$thumbnails' WHERE id='$id'")or die(mysqli_error); 
	
	 mysqli_query($conn,"UPDATE login SET username='$username',password='$password' WHERE acctid='$id'")or die(mysqli_error);	
	 
	echo '<script>alert("Record Updated")</script>';
	
?>	
	<script type="text/javascript">

window.location='manageSupervisor.php';
</script>
	
<?php 
}
?>




 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Upadte Supervisor Details </title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<br/>
<center><img name="logbook" src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"></center>
<br/>
<div class="container">
  <center><h5 style="color:white">Upadte Supervisor Details</h5></center>
  <div class="container">
  <form method="POST" action="editSupervisor.php"  enctype="multipart/form-data">
    <table width="75%" border="0" align="center" >
      <tbody>
        <tr>
          <td><input name="supname" type="text" class="form-control"  placeholder="Fullname" value="<?php echo $name;?>"required></td>
		<input name="id" type="hidden" class="form-control"  placeholder="Fullname" value="<?php echo $_GET['id'];?>"required>
	   </tr>
        <tr>
          <td><input name="email" type="email" class="form-control"  placeholder="Email" value="<?php echo $email;?>" required></td>
        </tr>
        <tr>
          <td><input name="phone" type="tel" class="form-control" placeholder="Phone Number" maxlength="11" value="<?php echo $phone;?>"required> </td>
        </tr>
         <tr>
          <td><select name="gender"  class="form-control">
          <option>
		  <?php 
			  echo $gender;
		  ?>
		  
		  </option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          
          </select></td>
        </tr>
        <tr>
        <tr>
          <td><select name="department"  class="form-control" required>
		           <option><?php echo $department;?></option> 

         <option value="Computer Science">Computer Scince</option> 
         <option value="Mathematics">Mathematics</option> 
         <option value="Physics">Physics</option> 
          </select></td>
        </tr>
         <tr>
          <td><input name="username" type="text" class="form-control"  value="<?php echo $username;?>" placeholder="Username" required></td>
        </tr>
        <tr>
          <td><input name="password" type="password" class="form-control" value="<?php echo $password;?>"  placeholder="Password" required></td>
        </tr>
        <tr>
          <td><input name="image" type="file" value="<?php echo $image;?>" class="form-control"></td>
        </tr>
        <tr>
          <td><input type="submit" name="submit" id="Sign In" value="Upadate Details" class="btn btn-success">
        <a href="manageSupervisor.php" class="btn btn-danger">Back</a></td>
        </tr>
      </tbody>
    </table>
   
  </form>
  </div>
  <p>&nbsp;</p>
</div>
</body>
</html>