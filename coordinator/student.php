
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
  <h5>List of Staff</h5>
  <h6>in-Active Student's</h6>
  <div class="container">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <th scope="col">Staff Name</th>
          <th scope="col">Phone No</th>
          <th scope="col">&nbsp;</th>
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_staff['st_fname']; ?></td>
            <td><?php echo $row_staff['st_phone']; ?></td>
            <td><a href="edit_student.php?st_id=<?php echo $row_inactive_student['st_id']; ?>">Activate</a></td>
          </tr>
          <?php } while ($row_staff = mysql_fetch_assoc($staff)); ?>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
    <h6>Active Student's</h6>
    <div class="container">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <th scope="col">Staff Name</th>
            <th scope="col">Phone No</th>
            <th scope="col">&nbsp;</th>
          </tr>
          <?php do { ?>
          <tr>
            <td><?php echo $row_inactive_student['st_fname']; ?></td>
            <td><?php echo $row_inactive_student['st_phone']; ?></td>
            <td><a href="assign.php?st_id=<?php echo $row_inactive_student['st_id']; ?>">Assign Supervisor</a></td>
          </tr>
          <?php } while ($row_inactive_student = mysql_fetch_assoc($inactive_student)); ?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </tbody>
      </table>
    </div>
    <p><br>
    </p>
  </div>
</div>
</body>
</html>
<?php
mysql_free_result($staff);

mysql_free_result($inactive_student);
?>
