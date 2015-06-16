<?php 
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/config.php');
// Variables globales
global $DB, $USER, $CFG, $comment, $color, $colorguardado;
require_once 'config.php';

$tbl_name="mdl_course"; // Table name
$user_facebook_info=$DB->get_record('facebook_user',array('facebookid'=> 2,'status'=>1));//Obtiene los datos de facebook del usuario
$moodle_id=$user_facebook_info->moodleid;
$user_info=$DB->get_record('user',array('id'=>$moodle_id));
$user_course = enrol_get_users_courses($moodle_id); // busca cursos del usuario
 foreach ($user_course as $course){
	$courseid=$course->id;
$prioridadguardada=$_REQUEST['curso'.$courseid.'']; //Pide la variable del formulario
$sql="UPDATE $tbl_name SET sortorder='$prioridadguardada' WHERE id=$courseid"; //Query que actualiza el color por el color guardado del formulario en index.php
$DB->execute($sql, array('id'=>1)); // Ejecuta la query sql
echo $prioridadguardada;
 }


header("Location: index.php"); //Redirecta a index.php
 die();
?>
