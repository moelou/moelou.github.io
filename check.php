<?php 

if (isset($_POST['create']))
{
	$type= $_POST['type'];
	if($type == "1")
		header("Location:organisation/orgreg.php");
	else if($type == "2")
		header("Location:staff/supervisorReg.php");
	else if($type == "3")
		header("Location:coordinator/CoordinatorReg.php");
	else if($type == "4")
		header("Location:itf/itfreg.php");
	
	
}

?>