 
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
   
    
  </div>
   <center> <h3 style=" color:black ;background-color:white" >Downloadable Materials</h3><center>
  <table align="left"  width="100%"  border="1" style=" color:black; background-color:white" >
          
		
                 <tr > 
				 
<th bgcolor="green" width="1%"><font size="2" COLOR="WHITE"> ID</th>
<th bgcolor="green"  width="20%"><font face="Albertus MT" size="2" COLOR="WHITE">Title </th>
<th bgcolor="green" ><font face="Albertus MT" size="2" COLOR="WHITE"><center>File</th>



<?php
include_once('db/db.php');
$count =0;
$record=mysqli_query($conn,"select *from forms ")or die(mysqli_error);
    while($rowfetch=mysqli_fetch_assoc($record) ){
		$count++;

    echo "<tr>";
	 echo "<td><center> <font  size='2'>".$count."</td>";
     echo "<td> <font  size='2'>".strtoupper($rowfetch['title'])."</td>";
    ?>
	<td> <a href="<?php echo "../ITF/".$rowfetch['file']; ?>">Download File</a>
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
