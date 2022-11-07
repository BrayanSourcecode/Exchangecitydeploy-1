<?php 
 /*"se crea la conexion ala base de datos"*/
$db=mysqli_connect("$_ENV["MYSQLHOST"]","$_ENV["MYSQLUSER"]","$_ENV["MYSQLPASSWORD"]","$_ENV["MYSQLDATABASE"]");
session_start();
?>
