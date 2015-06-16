<?php 
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/config.php');
// Variables globales
global $DB, $USER, $CFG, $comment, $color, $colorguardado;
require_once 'config.php';

$tbl_name="mdl_facebook_user"; // Table name
$colorguardado=$_REQUEST['color']; //Pide la variable del formulario
$sql="UPDATE $tbl_name SET color='$colorguardado' WHERE id=1"; //Query que actualiza el color por el color guardado del formulario en index.php
$DB->execute($sql, array('id'=>1)); // Ejecuta la query sql
header("Location: index.php"); //Redirecta a index.php
die();
?>
