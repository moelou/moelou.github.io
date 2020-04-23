				   
<?php
include_once('db/db.php'); 
if(isset($_POST['submit'])){
	                         $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                             $image_name = addslashes($_FILES['image']['name']);
                             $image_size = getimagesize($_FILES['image']['tmp_name']);

             move_uploaded_file($_FILES["image"]["tmp_name"], "../admin/uploads/" . $_FILES["image"]["name"]);
            $thumbnails = "uploads/" . $_FILES["image"]["name"];
	
	$name=$_POST['supname'];
    $department=$_POST['department'];
    $email=$_POST['email'];
	$phone=$_POST['phone'];
	$username=$email;
	$password="00000";
	$gender=$_POST['gender'];
	$rank=$_POST['rank'];
	
	$app="0";
	$add=mysqli_query($conn,"INSERT INTO supervisors(name,email,phoneno,gender,department,username,password,image,app,rank) values('$name','$email','$phone','$gender','$department','$username','$password','$thumbnails','$app','$rank')")or die(mysqli_error);
	
	$record=mysqli_query($conn,"select max(id) as id from supervisors ")or die(mysqli_error);
    $rowfetch=mysqli_fetch_assoc($record);
	$rid = $rowfetch['id'];
	
	$add=mysqli_query($conn,"INSERT INTO login(username,password,type,acctid) values('$username','$password','sup','$rid')")or die(mysqli_error);

	echo '<script>alert("Record Added")</script>';
	
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
<meta charset="utf-8">
<title>Supervisor Registration </title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

 <body class="bg-gradient" style="background:url('../img/futict.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<CENTER><img src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"/></div>
<div class="container">
  <h2 class="text-center" style=" color:black; background-color:white">Supervisor Registration</h5>
  <div class="container">
  <form method="POST" action="supervisorReg.php"  enctype="multipart/form-data">
     <table width="70%" border="0" class="">
      <tbody>
        <tr>
          <td><input name="supname" type="text" class="form-control"  placeholder="Fullname" required></td>
        </tr>
        <tr>
          <td><input name="email" type="email" class="form-control"  placeholder="Email" required></td>
        </tr>
		<tr>
          <td><input name="rank" type="text" class="form-control"  placeholder="Rank" required></td>
        </tr>
        <tr>
          <td><input name="phone" type="tel" class="form-control" placeholder="Phone Number" maxlength="11" required> </td>
        </tr>
         <tr>
          <td><select name="gender"  class="form-control">
          <option>Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          
          </select></td>
        </tr>
        <tr>
        <tr>
          <td><select name="department"  class="form-control" required>
		           <option>====Select====</option> 

         <option>Computer Science</option> 
         <option>Cyber Security Science</option> 
         <option>Information and Media Technology</option> 
         <option>Library Information Technology</option> 
          </select></td>
        </tr>
         
        
        <tr>
          <td><input name="image" type="file" class="form-control"></td>
        </tr>
        <tr>
          <td><input type="submit" name="submit" id="Sign In" value="Register" class="btn btn-success">
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