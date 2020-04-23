
  
  	<?php
//Start session
session_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || (trim($_SESSION['matricno']) == '')) {
   header("location:login.php");
    exit();
}
else
{
	$matricno = $_SESSION['matricno'];
include_once('db/db.php');

 $qq=mysqli_query($conn,"select *from  organization where matricno='$matricno'")or die(mysql_error);
 $data=mysqli_fetch_array($qq);
}
?>   
					   
<?php
include_once('db/db.php'); 
if(isset($_POST['submit'])){
	                       
	
	$orgname=$_POST['orgname'];
	$address=$_POST['address'];
	$matricno=$_POST['matricno'];
	
 
	$type=$_POST['type'];

     
mysqli_query($conn," update  organization set org_name='$orgname',org_add='$address',org_type='$type' where matricno='$matricno'" );

	
	 

	echo '<script>alert("Update Successful")</script>';
	
?>	
	<script type="text/javascript">

window.location='dashboard2.php';
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

<body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<center><img src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"/></center>
<div class="container">
  <center> <h3 style=" color:black ;background-color:white" >Organization Registration</h3><center>
  <div class="container">
  <form action="updattach.php" name="registration" method="POST" enctype="multipart/form-data">
    <table width="70%" border="0" class="">
      <tbody>
      <tr>
          <td>
		  <input name="orgname" type="text" class="form-control"  value="<?php echo $data['org_name'];?>" required>
		  <input name="matricno" type="hidden" value="<?php echo $matricno;?>" class="form-control"  placeholder="Organization Name" required>
		  </td>
        </tr>
        <tr>
          <td><textarea name="address" rows="5" cols="120"   placeholder="  Address" required><?php echo $data['org_add'];?></textarea></td>
        </tr>
        
         <tr>
          <td><select name="type" id="gender" class="form-control">
          <option><?php echo $data['org_type'];?></option>
          <option value="ICT">ICT</option>
          <option value="AGRIC">AGRIC</option>
          <option value="FINANCE">FINANCE</option>
          <option value="EDUACTION">EDUCATION</option>
          <option value="OTHERS">OTHERS</option>
          
          </select></td>
        </tr>
        <tr> <td>&nbsp;</td></tr>
      
         
       
        <tr>
          <td><input type="submit" name="submit" id="btnSubmit" value="Change" class="btn btn-success">
            <a href="dashboard2.php" class="btn btn-dark">Back</a></td>
        </tr>
      </tbody>
    </table>
      </form>
    
  </div>
  <p>&nbsp;</p>
</div>
</body>
</html>