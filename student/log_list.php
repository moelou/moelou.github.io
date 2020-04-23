<?php require_once('../Connections/loogbok.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "1";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "login.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_user_act = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_user_act = $_SESSION['MM_Username'];
}
mysql_select_db($database_loogbok, $loogbok);
$query_user_act = sprintf("SELECT st_id, st_fname, st_matric, st_depart, st_email, st_psw, st_ia, st_phone, st_yoc, st_photo, st_gender, act_descrp, act_date, wkl_start, wkl_end, act_wkl_idfk FROM activities INNER JOIN posting ON activities.act_pos_idfk=posting.pos_id INNER JOIN weekly ON activities.act_wkl_idfk=wkl_id INNER JOIN student ON posting.pos_st_idfk=student.st_id WHERE st_matric = %s", GetSQLValueString($colname_user_act, "text"));
$user_act = mysql_query($query_user_act, $loogbok) or die(mysql_error());
$row_user_act = mysql_fetch_assoc($user_act);
$totalRows_user_act = mysql_num_rows($user_act);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="row"><img src="../img/logbook.png" width="750" height="150" alt="" class="img-fluid"/></div>
<div class="container">
  <h5>Student Logbook Activities</h5>
  <p>Student's Log based on Weekly Report</p>
  <table class="table" >
    <tbody>
      <tr>
        <td align="right" scope="col">Student's Name:</td>
        <td scope="col"><strong><?php echo strtoupper($row_user_act['st_fname']); ?></strong></td>
      </tr>
      <tr>
        <td align="right">Matric No:</td>
        <td><strong><?php echo $row_user_act['st_matric']; ?></strong></td>
      </tr>
      <tr>
        <td align="right">Department:</td>
        <td><strong><?php echo $row_user_act['st_depart']; ?></strong></td>
      </tr>
    </tbody>
  </table>
  <table class="table table-bordered table-striped">
    <tbody>
      <tr>
        <th scope="col">Day</th>
        <th scope="col">Description Work done</th>
      </tr>
      <?php do { ?>
        <tr>
          <td><strong><?php echo date("l",strtotime($row_user_act['act_date'])); ?></strong><br>
<?php echo date("j-n-Y",strtotime($row_user_act['act_date'])); ?></td>
          <td><?php echo strtolower($row_user_act['act_descrp']); ?></td>
        </tr>
        <?php } while ($row_user_act = mysql_fetch_assoc($user_act)); ?>
    </tbody>
  </table>
 <a href="dashboard.php" class="btn btn-block btn-danger">Back</a>
</div>
</body>
</html>
<?php
mysql_free_result($user_act);
?>
