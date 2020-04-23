<?php require_once('../Connections/loogbok.php'); ?>
<?php require_once('../Connections/loogbok.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

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
    if (($strUsers == "") && true) { 
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE weekly SET wkl_comt=%s WHERE wkl_id=%s",
                       GetSQLValueString($_POST['textarea'], "text"),
                       GetSQLValueString($_POST['wkl_id'], "int"));

  mysql_select_db($database_loogbok, $loogbok);
  $Result1 = mysql_query($updateSQL, $loogbok) or die(mysql_error());

  $updateGoTo = "dashboard.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_user_act = "-1";
if (isset($_GET['act_wkl_idfk'])) {
  $colname_user_act = $_GET['act_wkl_idfk'];
}
mysql_select_db($database_loogbok, $loogbok);
$query_user_act = sprintf("SELECT act_pos_idfk, act_descrp, act_date, act_wkl_idfk, act_img FROM activities WHERE act_wkl_idfk = %s", GetSQLValueString($colname_user_act, "int"));
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
<div class="container"><form action="<?php echo $editFormAction; ?>" id="updatecomment" name="form1" method="POST" style="padding-top:20px">
  <h5>Organization Student's Acivity <?php echo $row_user_act['act_wkl_idfk']; ?></h5>
  <div class="container">
    <p>Comment</p>
    <table class="table table-bordered table-striped">
      <tbody>
        <tr>
          <th scope="col">Day</th>
          <th scope="col">Description Work done</th>
        </tr> <?php do { ?>
        <tr>
         
          <td><strong><?php echo date("l",strtotime($row_user_act['act_date'])); ?></strong><br>
            <?php echo date("j-n-Y",strtotime($row_user_act['act_date'])); ?></td>
          <td><?php echo strtolower($row_user_act['act_descrp']); ?></td>
        </tr>
        <?php } while ($row_user_act = mysql_fetch_assoc($user_act)); ?>
        <tr>
          <td>&nbsp;</td>
          <td><p><strong><em>Industrial Supervisor Comment</em></strong></p>
          <p>&nbsp;</p></td>
        </tr>
    </tbody></table>
    
    
      <textarea name="textarea" rows="7" class="form-control" id="textarea" placeholder="Supervisor Comment"></textarea>
      <input name="submit" type="submit" class="btn btn-info" id="submit" value="Comment" style="margin-top:10px">
      <input name="wkl_id" type="hidden" id="wkl_id" value="<?php echo $row_user_act['act_wkl_idfk']; ?>">
      <input type="hidden" name="MM_update" value="form1">
</form></div>
    </p>
  

</body>
</html>
<?php
mysql_free_result($user_act);
?>
