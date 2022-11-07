<?php 
 /*"se crea la conexion ala base de datos"*/
$db=mysqli_connect("$_ENV["DB_NAME"]","$_ENV["DB_USER"]","$_ENV["DB_PASSWORD"]","$_ENV["DB_DATABASE"]");
session_start();
?>
