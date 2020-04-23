<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_loogbok = "localhost";
$database_loogbok = "logbook";
$username_loogbok = "root";
$password_loogbok = "";
$loogbok = mysql_pconnect($hostname_loogbok, $username_loogbok, $password_loogbok) or trigger_error(mysql_error(),E_USER_ERROR); 
?>