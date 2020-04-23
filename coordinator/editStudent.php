
  
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
	                         $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                             $image_name = addslashes($_FILES['image']['name']);
                             $image_size = getimagesize($_FILES['image']['tmp_name']);

             move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);
            $thumbnails = "uploads/" . $_FILES["image"]["name"];
	
	$matricno=$_POST['matricno'];
	$name=$_POST['name'];
	$gender=$_POST['gender'];
	
    $department=$_POST['department'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
    
	
	$password=$_POST['password'];
     //image
	 $id=$_POST['id'];
	
	$result=mysql_query("UPDATE student SET name='$name',matricno='$matricno',gender='$gender',department='$department',email='$email',phone='$phone',password='$password',image='$thumbnails' WHERE id='$id'")or die(mysql_error); 

	echo '<script>alert("Record Updated")</script>';
	
?>	
	<script type="text/javascript">

window.location='manageStudent.php';
</script>
	
<?php 
}
?>
<?php 

include_once('db/db.php');
  $id=$_GET['id'];
  $query=mysql_query("select * from student where id='$id'")or die(mysql_error);
 while($rowfetch=mysql_fetch_array($query))
 {
 
 $name=$rowfetch['name'];
 $matricno=$rowfetch['matricno'];
 $email=$rowfetch['email'];
 $phone=$rowfetch['phone'];
 $gender=$rowfetch['gender'];
 $department=$rowfetch['department'];
 
 $password=$rowfetch['password'];
 $image=$rowfetch['image'];
 
 
  
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

<body>
<div class="row"><img src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"/></div>
<div class="container">
  <h5>Update Student Details</h5>
  <div class="container">
  <form action="editStudent.php" name="registration" method="POST" enctype="multipart/form-data" id="registration">
    <table width="100%" border="0" class="table">
      <tbody>
      <tr>
          <td><input name="name" type="text" class="form-control"  placeholder="Student Name" value="<?php echo $name;?>" required></td>
        <input name="id" type="HIDDEN" class="form-control"  placeholder="Student Name" value="<?php echo $_GET['id'];?>" required></td>
		</tr>
        <tr>
          <td><input name="matricno" type="text" class="form-control" id="st_matric" placeholder="Matric No" value="<?php echo $matricno ;?>" required></td>
        </tr>
        <tr>
          <td><input name="email" type="email" class="form-control" id="st_email" placeholder="Email" value="<?php echo $email;?>" required></td>
        </tr>
        <tr>
          <td><input name="phone" type="tel" class="form-control" id="st_phone" maxlength="11" placeholder="Phone Number"  onkeypress="return isNumber(event)" value="<?php echo $phone;?>" required></td>
        </tr>
         <tr>
          <td><select name="gender" id="gender" class="form-control">
          <option><?php echo $gender;?></option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          
          </select></td>
        </tr>
        <tr>
        <tr>
          <td><select name="department" id="st_depart" class="form-control">
		   <option><?php echo $department;?></option>
         <option value="Computer Science">Computer Scince</option> 
         <option value="Mathematics">Mathematics</option> 
         <option value="Physics">Physics</option> 
          </select></td>
        </tr>
        
        <tr>
          <td><input name="password" type="password" class="form-control" id="txtPassword" placeholder="Password" value="<?php echo $password;?>" required></td>
        </tr>
		 <tr>
          <td><input name="confirm_password" type="password" class="form-control" id="txtConfirmPassword" placeholder="Confirm Password" ></td>
        </tr>
        <tr>
          <td><input name="image" type="file" class="form-control"  required></td>
        </tr>
        <tr>
          <td><input type="submit" name="submit" id="btnSubmit" value="Update Details" class="btn btn-success">
            <a href="manageStudent.php" class="btn btn-dark">Back</a></td>
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