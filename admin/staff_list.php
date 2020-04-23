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

$colname_staff_list = "-1";
if (isset($_GET['stf_depart'])) {
  $colname_staff_list = $_GET['stf_depart'];
}
mysql_select_db($database_loogbok, $loogbok);
$query_staff_list = sprintf("SELECT stf_id, stf_fname, stf_depart, stf_email, stf_phone, stf_psw, stf_ia, stf_gender, stf_photo FROM staff WHERE stf_depart = %s", GetSQLValueString($colname_staff_list, "text"));
$staff_list = mysql_query($query_staff_list, $loogbok) or die(mysql_error());
$row_staff_list = mysql_fetch_assoc($staff_list);
$totalRows_staff_list = mysql_num_rows($staff_list);

$colname_user = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_user = $_SESSION['MM_Username'];
}
mysql_select_db($database_loogbok, $loogbok);
$query_user = sprintf("SELECT * FROM `coordinator` WHERE adm_email = %s", GetSQLValueString($colname_user, "text"));
$user = mysql_query($query_user, $loogbok) or die(mysql_error());
$row_user = mysql_fetch_assoc($user);
$totalRows_user = mysql_num_rows($user);
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
  <h5>Admin/Co-ordinator Dashboard</h5>
  <p><strong>LIST OF REGISTERED STAFF BASED ON DEPARTMENT</strong></p>
  <div class="container">
    <table width="100%" border="0">
      <tbody>
        <tr>
          <th scope="col">Staff ID</th>
          <th scope="col">Full Name</th>
          <th scope="col">Active</th>
        </tr>
        <tr>
          <?php do { ?>
            <td><?php echo $row_staff_list['stf_id']; ?></td>
            <td><?php echo $row_staff_list['stf_fname']; ?></td>
            <td>Activate/Deactivate</td>
            <?php } while ($row_staff_list = mysql_fetch_assoc($staff_list)); ?>
        </tr>
      </tbody>
    </table>
    <p>&nbsp;</p>
</p>
  </div>
</div>
</body>
</html>
<?php
mysql_free_result($staff_list);

mysql_free_result($user);
?>