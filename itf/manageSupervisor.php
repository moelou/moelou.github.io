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
include_once('db/db.php');
}
?>
<?php 

include_once('db/db.php');
  $id=$_GET['id'];
  $matricno=$_GET['matricno'];
  $query=mysqli_query($conn,"select *from student where id='$id'")or die(mysqli_error);
 while($rowfetch=mysqli_fetch_array($query))
 {
 
 $name=$rowfetch['name'];
  $idd=$rowfetch['id'];
  
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
	        $title=$_POST['title'];
	 
	
	$add=mysqli_query($conn,"INSERT INTO forms(title,file) values('$title','$thumbnails')")or die(mysqli_error);
    echo '<script type="text/javascript">alert("File Upload Successful")</script>';
	
	
?>
<script type="text/javascript">

window.location='manageSupervisor.php';
</script>
<?php }?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient" style="background:url('../img/5.jpeg');  background-repeat: no-repeat;
    background-position: 20% 10%;    background-size: cover;">
<br/>
<center><img name="logbook" src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"></center>
<div class="container">

  <div class="container">
   
    <hr>
	 <font color="white"><h5 style="background-color:white; color:black; width:70%">  </h5>
   
    <p><br>
	 <form id="assign" name="assign2" action="manageSupervisor.php" enctype="multipart/form-data"  method="post">
    
	  Title	
	  <input type="text" name="title"  class="form-control"  value="" required> 
    <br/>
	  Select File to Upload    
	  <input name="image" type="file" class="form-control"  required>
	  

      
    
	  <input type="submit" name="submit"  value="Upload" class="btn btn-success">
	  
	   </form>
      <br>
    </p>
  </div>
   <center> <h3 style=" color:black ;background-color:white" >Downloadable Materials</h3><center>
  <table align="left"  width="100%"  border="1" style=" color:black; background-color:white" >
          
		
                 <tr > 
				 
<th bgcolor="green" width="1%"><font size="2" COLOR="WHITE"> ID</th>
<th bgcolor="green"  width="20%"><font face="Albertus MT" size="2" COLOR="WHITE">Title </th>
<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE"><center>File</th>



<?php
include_once('db/db2.php');
$count =0;
$record=mysqli_query($conn,"select *from forms ")or die(mysqli_error);
    while($rowfetch=mysqli_fetch_assoc($record) ){
		$count++;

    echo "<tr>";
	 echo "<td><center> <font  size='2'>".$count."</td>";
     echo "<td> <font  size='2'>".strtoupper($rowfetch['title'])."</td>";
    ?>
	<td> <a href="<?php echo $rowfetch['file']; ?>">Download File</a>
	</td>
	<?php
	
     
	  
      	  echo "</tr>";  
	}		  
      	     ?>


</table>
<br/><br/>

   
  <a href="dashboard.php" class="btn btn-danger">Back</a>
</div>
</body>
</html>
<?php

?>
