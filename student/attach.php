
  
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
}
?>   
					   
<?php
include_once('db/db.php'); 
if(isset($_POST['submit'])){
	                       
	
	$orgname=$_POST['orgname'];
	$address=$_POST['address'];
	$matricno=$_POST['matricno'];
	
 
	$type=$_POST['type'];

     
mysqli_query($conn,"INSERT INTO  organization(org_name,org_add,org_type,matricno) values('$orgname','$address','$type','$matricno')")or die(mysqli_error);
	
	 

	echo '<script>alert("Record Added")</script>';
	
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
  <form action="attach.php" name="registration" method="POST" enctype="multipart/form-data">
    <table width="70%" border="0" class="">
      <tbody>
      <tr>
          <td>
		  <input name="orgname" type="text" class="form-control"  placeholder="Organization Name" required>
		  <input name="matricno" type="hidden" value="<?php echo $matricno;?>" class="form-control"  placeholder="Organization Name" required>
		  </td>
        </tr>
        <tr>
          <td><textarea name="address" rows="5" cols="120"   placeholder="  Address" required></textarea></td>
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
        <tr> <td>&nbsp;</td></tr>
      
         
       
        <tr>
          <td><input type="submit" name="submit" id="btnSubmit" value="Add" class="btn btn-success">
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