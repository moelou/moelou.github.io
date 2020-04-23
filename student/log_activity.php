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
include_once('db/db.php');
}
?>
<?php 
  $start="";
  $end="";
  $getid="";
  include_once('db/db.php');
  $idd=$_SESSION['id'];
  $getid=$_GET['id'];
  $query=mysqli_query($conn,"select *from week where studentid='$idd' and id='$getid'")or die(mysqli_error);
 while($rowfetch=mysqli_fetch_array($query))
 {
 
 $start=$rowfetch['start'];
 $end=$rowfetch['end'];
 $id=$rowfetch['studentid'];
 $day1=$rowfetch['day1'];
 $day2=$rowfetch['day2'];
 $day3=$rowfetch['day3'];
 $day4=$rowfetch['day4'];
 $day5=$rowfetch['day5'];
 $up1=$rowfetch['up1'];
 $up2=$rowfetch['up2'];
 $up3=$rowfetch['up3'];
 $up4=$rowfetch['up4'];
 $up5=$rowfetch['up5'];
 $sup=$rowfetch['supcomment'];
 $inc=$rowfetch['incomment'];

 }

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log Activity</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<center>
<img src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"/></center>
<div class="container">
  <h2 class="text-center" style=" color:black ;background-color:white">Activity</h2>
  <p style="color:white">You are commenting for <?php echo $start; ?> to <?php echo $end; ?></p>
      <div class="col-lg-12 col-md-8 col-sm-12 hidden-xs">
    <div class="row" style="margin-bottom:10px">
	
	<br/>
	<!--Save Entries -->
	<?php
	if(isset($_POST['Add1'])){
		
	     $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
         $image_name = addslashes($_FILES['image']['name']);
         $image_size = getimagesize($_FILES['image']['tmp_name']);
		 move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);
         $thumbnails = "uploads/" . $_FILES["image"]["name"];
		 
			$desc1=$_POST['desc1'];
			$id=$_POST['id'];
			
			 if( $thumbnails == "uploads/"){
		 
			 $result=mysqli_query($conn,"UPDATE week SET day1='$desc1' WHERE id='$id'")or die(mysqli_error); 
		        }
			else{
			
			$result=mysqli_query($conn,"UPDATE week SET day1='$desc1', up1='$thumbnails' WHERE id='$id'")or die(mysqli_error); 
		 
			}          
    
	echo '<script>alert("Record Added")</script>';
	
?>	
	<script type="text/javascript">

window.location='log_activity.php?id=<?php echo $id;?>';
</script>
	
<?php 
}
?>

<?php
if(isset($_POST['Add2'])){
		
	     $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
         $image_name = addslashes($_FILES['image']['name']);
         $image_size = getimagesize($_FILES['image']['tmp_name']);
		 move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);
         $thumbnails = "uploads/" . $_FILES["image"]["name"];
		 
			$desc2=$_POST['desc2'];
			$id=$_POST['id'];
			
			 if( $thumbnails == "uploads/"){
		 
			 $result=mysqli_query($conn,"UPDATE week SET day2='$desc1' WHERE id='$id'")or die(mysqli_error); 
		        }
			else{
			
			$result=mysqli_query($conn,"UPDATE week SET day2='$desc2', up2='$thumbnails' WHERE id='$id'")or die(mysqli_error); 
		 
			}          
    
	echo '<script>alert("Record Added")</script>';
	
?>	
	<script type="text/javascript">

window.location='log_activity.php?id=<?php echo $id;?>';
</script>
	
<?php 
}
?>


<?php
if(isset($_POST['Add3'])){
		
	     $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
         $image_name = addslashes($_FILES['image']['name']);
         $image_size = getimagesize($_FILES['image']['tmp_name']);
		 move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);
         $thumbnails = "uploads/" . $_FILES["image"]["name"];
		 
			$desc3=$_POST['desc3'];
			$id=$_POST['id'];
			
			 if( $thumbnails == "uploads/"){
		 
			 $result=mysqli_query($conn,"UPDATE week SET day3='$desc3' WHERE id='$id'")or die(mysqli_error); 
		        }
			else{
			
			$result=mysqli_query($conn,"UPDATE week SET day3='$desc3', up3='$thumbnails' WHERE id='$id'")or die(mysqli_error); 
		 
			}          
    
	echo '<script>alert("Record Added")</script>';
	
?>	
	<script type="text/javascript">

window.location='log_activity.php?id=<?php echo $id;?>';
</script>
	
<?php 
}
?>
<?php
if(isset($_POST['Add4'])){
		
	     $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
         $image_name = addslashes($_FILES['image']['name']);
         $image_size = getimagesize($_FILES['image']['tmp_name']);
		 move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);
         $thumbnails = "uploads/" . $_FILES["image"]["name"];
		 
			$desc4=$_POST['desc4'];
			$id=$_POST['id'];
			
			 if( $thumbnails == "uploads/"){
		 
			 $result=mysqli_query($conn,"UPDATE week SET day4='$desc4' WHERE id='$id'")or die(mysqli_error); 
		        }
			else{
			
			$result=mysqli_query($conn,"UPDATE week SET day4='$desc4', up4='$thumbnails' WHERE id='$id'")or die(mysqli_error); 
		 
			}          
    
	echo '<script>alert("Record Added")</script>';
	
?>	
	<script type="text/javascript">

window.location='log_activity.php?id=<?php echo $id;?>';
</script>
	
<?php 
}
?>

<?php
if(isset($_POST['Add5'])){
		
	     $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
         $image_name = addslashes($_FILES['image']['name']);
         $image_size = getimagesize($_FILES['image']['tmp_name']);
		 move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);
         $thumbnails = "uploads/" . $_FILES["image"]["name"];
		 
			$desc5=$_POST['desc5'];
			$id=$_POST['id'];
			
			 if( $thumbnails == "uploads/"){
		 
			 $result=mysqli_query($conn,"UPDATE week SET day5='$desc5' WHERE id='$id'")or die(mysqli_error); 
		        }
			else{
			
			$result=mysqli_query($conn,"UPDATE week SET day5='$desc5', up5='$thumbnails' WHERE id='$id'")or die(mysqli_error); 
		 
			}          
    
	echo '<script>alert("Record Added")</script>';
	
?>	
	<script type="text/javascript">

window.location='log_activity.php?id=<?php echo $id;?>';
</script>
	
<?php 
}
?>
	
	
    
      <table  style=" color:black; background-color:white" width="100%" border="1">
	    <tr>
		<th>Days</th>
		<th>Activity</th>
		<th>File or Document</th>
		<th>Action</th>
		<th>File</th>
		</tr>
	    <tbody>
		<form action="log_activity.php" Method="POST" enctype="multipart/form-data">
          <tr>
                      
             <td>Monday </td>
			 <td> <textarea name="desc1" rows="4"  <?php if($inc == "") $inc =""; else echo "readonly"?> cols="50" placeholder="Comment" required><?php echo $day1;?></textarea>
			 </td>
			 <td> &nbsp; Add File :<input type="file" name="image" ></td>
			 <td>
			  <?php if($inc == "") {
				?>
			 <input name="Add1" type="submit" class="btn btn-success" value="ADD">
			  <?php  }else{ echo "";}?>
			 </td>
			 <td>&nbsp;&nbsp;<a href="<?php echo $up1; ?>">view file</a></td>
			 <input type="hidden" name="id" value="<?php echo $getid;?>">
			 
		 </tr>
		 </form>
		   <form action="log_activity.php" Method="POST"  enctype="multipart/form-data">
		   <td>Tuesday </td>
		  <td> <textarea name="desc2" rows="4"  cols="50"  <?php if($inc == "") $inc =""; else echo "readonly"?> placeholder="Comment" required><?php echo $day2;?></textarea>
			 </td>
			  <td> &nbsp; Add File :<input type="file" name="image" id="upload"></td>
			  <td>
			    <?php if($inc == "") {
				?>
			  <input name="Add2" type="submit" class="btn btn-success"  value="ADD">
			  <?php  }else{ echo "";}?>
			  </td>
			  <td>&nbsp;&nbsp;<a href="<?php echo $up2; ?>">view file</a></td>
			   <input type="hidden" name="id" value="<?php echo $getid;?>">
	       </tr>
		   </form>
		   <form action="log_activity.php" Method="POST" enctype="multipart/form-data">
		   <tr>
			 <td>Wednesday </td>
			 <td> <textarea name="desc3" rows="4"  cols="50"  <?php if($inc == "") $inc =""; else echo "readonly"?> placeholder="Comment" required><?php echo $day3;?></textarea>
			 </td>
			 <td> &nbsp; Add File :<input type="file" name="image" id="upload"></td>
			 <td>
			  <?php if($inc == "") {
				?>
			 <input name="Add3" type="submit" class="btn btn-success"  value="ADD">
			 <?php  }else{ echo "";}?>
			 </td>
			 <td>&nbsp;&nbsp;<a href="<?php echo $up3; ?>">view file</a></td>
			 <input type="hidden" name="id" value="<?php echo $getid;?>">
			</tr>
			</form>
			<form action="log_activity.php" Method="POST" enctype="multipart/form-data">
			<tr>
			 <td>Thursday </td>
			<td> <textarea name="desc4" rows="4"  cols="50"  <?php if($inc == "") $inc =""; else echo "readonly"?> placeholder="Comment" required><?php echo $day4;?></textarea>
			 </td>
			 <td> &nbsp; Add File :<input type="file" name="image" id="upload"></td>
			 <td>
			  <?php if($inc == "") {
				?>
			 <input name="Add4" type="submit" class="btn btn-success" id="Add Comment" value="ADD">
			 <?php  }else{ echo "";}?>
			 </td>
			 <input type="hidden" name="id" value="<?php echo $getid;?>">
			 <td>&nbsp;&nbsp;<a href="<?php echo $up4; ?>">view file</a></td>
			 </tr>
			 </form>
			 <form action="log_activity.php" Method="POST" enctype="multipart/form-data">
			 <tr>
			 <td>Friday </td>
			 <td> <textarea name="desc5" rows="4"   cols="50"  <?php if($inc == "") $inc =""; else echo "readonly"?> placeholder="Comment" required><?php echo $day5;?></textarea>
			 </td>
			 <td> &nbsp; Add File :<input type="file" name="image" id="upload"></td>
			 
			 <input type="hidden" name="id" value="<?php echo $getid;?>">
			 
			 <td>
			  <?php if($inc == "") {
				?>
			 <input name="Add5" type="submit" class="btn btn-success"  value="ADD">
			 <?php  }else{ echo "";}?>
			 </td>
			 <td>&nbsp;&nbsp;<a href="<?php echo $up5; ?>">view file</a></td>
            </tr>
			</form>
			
		       
	   </tbody>
      </table>

		  <br/>
     
    </div>
           Supervisor Comment:&nbsp;<?php echo strtoupper($sup);?>
  </div> <a href="dashboard.php" class="btn btn-danger">Back</a></div>
</div>
</body>
</html>