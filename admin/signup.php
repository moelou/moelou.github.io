<?php require_once('../Connections/loogbok.php'); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "admin_signup")) {
  $insertSQL = sprintf("INSERT INTO coordinator (adm_fname, adm_phone, adm_email, adm_psw) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['adm_fname'], "text"),
                       GetSQLValueString($_POST['adm_phone'], "text"),
                       GetSQLValueString($_POST['adm_email'], "text"),
                       GetSQLValueString($_POST['adm_psw'], "text"));

  mysql_select_db($database_loogbok, $loogbok);
  $Result1 = mysql_query($insertSQL, $loogbok) or die(mysql_error());

  $insertGoTo = "../student/login.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
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
  <h5>Admin Sign Up</h5>
  <div class="container">
  <form method="POST" action="<?php echo $editFormAction; ?>" name="admin_signup" id="admin_signup">
    <table width="100%" border="0" class="table">
      <tbody>
        <tr>
          <td><input name="adm_fname" type="text" class="form-control" id="adm_fname" placeholder="Username"></td>
        </tr>
        <tr>
          <td><input name="adm_email" type="email" class="form-control" id="adm_email" placeholder="Email"></td>
        </tr>
        <tr>
          <td><input name="adm_phone" type="tel" class="form-control" id="adm_phone" placeholder="Phone Number"></td>
        </tr>
        <tr>
          <td><input name="adm_psw" type="password" class="form-control" id="adm_psw" placeholder="Password"></td>
        </tr>
        <tr>
          <td><input type="submit" name="Sign In" id="Sign In" value="Register" class="btn btn-success">
            <a href="signup.php" class="btn btn-dark">            Sign In</a></td>
        </tr>
      </tbody>
    </table>
    <input type="hidden" name="MM_insert" value="admin_signup">
  </form>
  </div>
  <p>&nbsp;</p>
</div>
</body>
</html>