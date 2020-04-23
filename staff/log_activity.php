<?php
//Start session
session_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || (trim($_SESSION['username']) == '')) {
   header("location:login.php");
    exit();
}
else
{
include_once('db/db.php');
$getid="";
}
?>
<?php 
  $start="";
  $end="";
  
  include_once('db/db.php');
  
  $getid=$_GET['id'];
  $query=mysqli_query($conn,"select *from week where  id='$getid'")or die(mysqli_error);
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
   <h2 class="text-center" style=" color:black ;background-color:white">Activity</h3>
  <p style="color:white">From <?php echo $start; ?> to <?php echo $end; ?></p><a class="btn btn-danger" href="logbook.php?id=<?php echo $id;?>">Back</a>
    <div class="col-12">
    <div class="row" style="margin-bottom:10px">
	
	<br/>
	<!--Save Entries -->




<?php
if(isset($_POST['submit'])){
		
	    		 
	$comment=$_POST['comment'];
	$id=$_POST['id'];
	$idd=$_POST['idd'];
	
			
$result=mysqli_query($conn,"UPDATE week SET supcomment='$comment' WHERE id='$id'")or die(mysqli_error); 
		 
		         
    
	echo '<script>alert("Comment Added")</script>';
	
?>	
	<script type="text/javascript">

window.location='logbook.php?id=<?php echo $idd;?>';
</script>
	
<?php 
}
?>
	
	
    
    <table  style=" color:black; background-color:white" width="100%" border="1">
	    <tr>
		<th>Days</th>
		<th>Activity</th>
		<th>File or Document</th>
		
		
		</tr>
	    <tbody>
		
          <tr>
                      
             <td>Monday </td>
			 <td> <textarea name="desc1" rows="4"  cols="50"   placeholder="Comment" required readonly><?php echo $day1;?></textarea>
			 </td>
			 
			 <td>&nbsp;&nbsp;<a href="<?php echo "../student/".$up1; ?>">view file</a></td>
			 
			 
		 </tr>
		
		 
		   <td>Tuesday </td>
		  <td> <textarea name="desc2" rows="4"  cols="50"   placeholder="Comment" required readonly><?php echo $day2;?></textarea>
			 </td>
			  
			   <td>&nbsp;&nbsp;<a href="<?php echo "../student/".$up2; ?>">View File</a></td>
			   
	       </tr>

		   
		   <tr>
			 <td>Wednesday </td>
			 <td> <textarea name="desc3" rows="4"  cols="50"   placeholder="Comment" required readonly><?php echo $day3;?></textarea>
			 </td>
			
			 
			 <td>&nbsp;&nbsp;<a href="<?php echo "../student/".$up3; ?>">view file</a></td>
			 
			</tr>
		
			
			<tr>
			 <td>Thursday </td>
			<td> <textarea name="desc4" rows="4"  cols="50"  placeholder="Comment" required readonly><?php echo $day4;?></textarea>
			 </td>
			 
			 
			  <td>&nbsp;&nbsp;<a href="<?php echo "../student/".$up4; ?>">view file</a></td>
			 </tr>
			 
			 
			 <tr>
			 <td>Friday </td>
			 <td> <textarea name="desc5" rows="4"  cols="50"  placeholder="Comment" required readonly><?php echo $day5;?></textarea>
			 </td>
			 
			 
			 
			 
			
			 <td>&nbsp;&nbsp;<a href="<?php echo "../student/".$up5; ?>">view file</a></td>
            </tr>
			  
		       
	   </tbody>
      </table>
	  
       
		  <br/>
     
    </div>
    <table>
	  <form action="log_activity.php" Method="POST"  enctype="multipart/form-data">
			  <tr> Add Comment:
			  <td><textarea name="comment" rows="3"  placeholder="Add Comment" value="" required><?php echo $sup;?></textarea></td>
			  <input type="hidden" name="id" value="<?php echo $getid;?>">
			  <input type="hidden" name="idd" value="<?php echo $_GET['idd'];?>">
			  <td>
			  <?php if($sup == ""){?>
			  <input name="submit" type="submit" class="btn btn-success"  value="ADD">
			   <?php } else {}?>
			  </td>
			  </tr>
			  </form>
	  </table>
	  <br>
  </div> </div>
</div>
</body>
</html>