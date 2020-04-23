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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "registration")) {
  $updateSQL = sprintf("UPDATE student SET st_fname=%s, st_matric=%s, st_email=%s, st_ia=%s WHERE st_id=%s",
                       GetSQLValueString($_POST['st_fname'], "text"),
                       GetSQLValueString($_POST['st_matric'], "text"),
                       GetSQLValueString($_POST['st_email'], "text"),
                       GetSQLValueString($_POST['st_ia'], "int"),
                       GetSQLValueString($_POST['st_id'], "int"));

  mysql_select_db($database_loogbok, $loogbok);
  $Result1 = mysql_query($updateSQL, $loogbok) or die(mysql_error());

  $updateGoTo = "dashboard.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_student = "-1";
if (isset($_GET['st_id'])) {
  $colname_student = $_GET['st_id'];
}
mysql_select_db($database_loogbok, $loogbok);
$query_student = sprintf("SELECT * FROM student WHERE st_id = %s", GetSQLValueString($colname_student, "int"));
$student = mysql_query($query_student, $loogbok) or die(mysql_error());
$row_student = mysql_fetch_assoc($student);
$totalRows_student = mysql_num_rows($student);
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
  <h5>Activate Student</h5>
  <div class="container">
  <form action="<?php echo $editFormAction; ?>" name="registration" method="POST" id="registration">
    <table width="100%" border="0" class="table">
      <tbody>
      <tr>
          <td><input name="st_fname" type="text" class="form-control" id="st_fname" placeholder="Username" value="<?php echo $row_student['st_fname']; ?>">
            <input name="st_id" type="hidden" id="st_id" value="<?php echo $row_student['st_id']; ?>"></td>
        </tr>
        <tr>
          <td><input name="st_matric" type="text" class="form-control" id="st_matric" placeholder="Matric No" value="<?php echo $row_student['st_matric']; ?>"></td>
        </tr>
        <tr>
          <td><input name="st_email" type="email" class="form-control" id="st_email" placeholder="Email" value="<?php echo $row_student['st_email']; ?>"></td>
        </tr>
        <tr>
          <td><p>
            <label>
              <input type="radio" name="st_ia" value="1" id="st_ia_0">
              Activate</label>
           
            <label>
              &nbsp; &nbsp;<input type="radio" name="st_ia" value="0" id="st_ia_1">
              Deactivate</label>
            <br>
          </p></td>
        </tr>
        <tr>
          <td><input type="submit" name="Update" id="Update" value="Update" class="btn btn-success">
           </td>
        </tr>
      </tbody>
    </table>
    <input type="hidden" name="MM_update" value="registration">
  </form>
    
  </div>
  <p>&nbsp;</p>
</div>
</body>
</html>
<?php
mysql_free_result($student);
?>
