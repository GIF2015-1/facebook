<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="style.css">
<script src="js/jquery.js"></script>
<script src="js/java.js"></script>

	<script>
			$(document).ready(function(){							
				$(window).resize(function(){
					$("#container1").width($(document).width()-10);
					$("#cuerpo").width($(document).width()-10);
					
					}
				);
				$("#container1").width($(document).width()-10);
				$("#cuerpo").width($(document).width()-10);
				$("#wrapper,#lateral,#cuerpo").height($(document).height()-100);
				
			});
		</script>
		<div id="fb-root"></div>
<script>

	(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=559078344137958";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php
// This file is part of Moodle - http://moodle.org/ ---
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.


/**
 * 
 *
 * @package    local
 * @subpackage facebook
 * @copyright  2013 Francisco GarcÃ­a Ralph (francisco.garcia.ralph@gmail.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/config.php');

global $DB, $USER, $CFG, $ecolor;//variables globales
require_once 'config.php';



$facebook = new Facebook($config);
$facebook_id= $facebook->getUser();

$app_name= $CFG->fbkAppNAME;
$app_email= $CFG->fbkemail;
$tutorial_name=$CFG->fbktutorialsN;
$tutorial_link=$CFG->fbktutorialsL;
// moodle_url de php necesarios
$messageurl= new moodle_url('/message/edit.php');
$connecturl= new moodle_url('/local/facebook/connect.php');
$colorurl= new moodle_url('/local/facebook/app/color.php');
$prioridadurl=new moodle_url('/local/facebook/app/prioridad.php');
?>

<?php
	// Variable con eleccion de color 
	$ecolor='color0';
	$ecolor=$_REQUEST['color'];
?>
<!--Inicio barra lateral!-->
<div id="wrapper">
	<div id="container1" class="clearfix">
		<br>
		
		<div class="lateral">
			<br>
			
			<div class="box">
				<div class=titulo>
				<img src="images/logo.png" height="25" width="20" align="left">WebCursos UAI
				</div>
				<div class="linea">
				</div>
				<div class="links">
					<table width="100%" height="100%" cellspacing="5px">		
					<tr>
						<td>
							<img src="images/lista.png">
						</td>
						<td>
							<a href="<?php echo $messageurl; ?>" target=â€�_blankâ€�><?php echo get_string('notificationsettings', 'local_facebook');?></a>
						</td>
					</tr>	
					<tr>
						<td>
							<img src="images/lista.png">
						</td>
						<td>
							<a href="<?php echo $connecturl; ?>" target=â€�_blankâ€�><?php echo get_string('connectheading', 'local_facebook'); ?></a> 
						</td>
					</tr>	
					<tr>
					<td>
							<img src="images/lista.png">
						</td>
						<td>
							<a href="<?php echo $colorurl; ?>" target=â€�_blankâ€�><?php echo 'Cambia el color'; ?></a>
						</td>
						</tr> 
						<tr>
						<td>
							<img src="images/lista.png">
						</td>
						<td>
							<a href="<?php echo $prioridadurl; ?>" target=â€�_blankâ€�><?php echo 'Cambia tu prioridad'; ?></a>
						</td>
						
					</tr>   
					</table>
				</div>
			</div>
			<div class="box">
				<div class=titulo>
				<img src="images/logo.png" height="25" width="20" align="left"><?php echo get_string('help', 'local_facebook');?>
				</div>
				<div class="linea">
				</div>
				<div class="links">
					<table width="100%" height="100%" cellspacing="5px">		
					<tr>
						<td>
							<img src="images/lista.png">
						</td>
						<td>
							<a href="<?php echo $tutorial_link; ?>" target=â€�_blankâ€� ><?php echo $tutorial_name; ?></a>
						</td>
					</tr>	
					<tr>
						<td>
							<img src="images/lista.png">
						</td>
						<td>
							<?php echo $app_email;?>
						</td>
					</tr>	
					</table> 
				</div>
			</div>
		<br><br>
		<center><div class="fb-like" data-href="http://apps.facebook.com/webcursosuai" 
				data-width="175"  data-layout="box_count" data-show-faces="false" data-send="false"></div><center>
		
		</div>
		<!-- FIN BARRA LATERAL !-->
<?php
		
$user_facebook_info=$DB->get_record('facebook_user',array('facebookid'=> 2,'status'=>1));

if($user_facebook_info!=false){
$moodle_id=$user_facebook_info->moodleid;
$lastvisit=$user_facebook_info->lasttimechecked;
$user_info=$DB->get_record('user',array('id'=>$moodle_id));
$user_course = enrol_get_users_courses($moodle_id); // busca cursos del usuario
		
		 echo'
<div class="cuerpo">
<h1>Prioridad</h1>
							<h2>Cambia tu prioridad</h2>
							

 <ul id="cursos">';

 
//muestra todos los cursos con un formulario para asignarle la prioridad
foreach($user_course as $courses){
	$fullname=$courses->fullname;
	$courseid=$courses->id;
	$shortname=$courses->shortname;
echo'	<li>
	<p class="'.$ecolor.'"><img src="images/lista_curso.png"> '.$fullname.'<br></p>';

echo '<form action="index.php" method="post">
Prioridad <input type="text" name="prioridad" value="prioridad" checked="checked" /> 
		<br><br>';
  }
// Boton Guardar prioridades
echo '<input type="image" src="images/guardarprioridad.jpg" value="Guardar prioridades">';''
		
?>
 </ul>

 </tbody>
 
		</div>
	</div>
<div id="separador">
	<br>
</div>
<div id="<?php echo $ecolor ?>">
	<br>
</div>
<div id="container2">
	<table width="100%">
 
	 <tr>
		 <td align="left"><img  src="images/logo_webcursos_abajo.png"> </td>
		 <td align="right"><img  src="images/logo_abajo.png"></td>
	</tr>
	 </table>
</div>
</div>
<div id="overlay"></div>
<?php
$user_facebook_info->lasttimechecked=time();
$DB->update_record('facebook_user', $user_facebook_info);
}
else{	echo'
<div class="cuerpo">
		 <h1>'.get_string('existtittle', 'local_facebook').'</h1>
		<p>'.get_string('existtext', 'local_facebook').'<a href="'.$connecturl.'" >'.get_string('existlink', 'local_facebook').'</a></p>
		</div>
		'; ?>
<div id="separador">
	<br>
</div>
<div id="container2
<table width="100%">
 
 	<tr>
 		<td align="left"><img  src="images/logo_webcursos_abajo.png"> </td>
	 	<td align="right"><img  src="images/logo_abajo.png"></td>
  	</tr>
 </table>
</div>
</div>

 
 <?php 
   }
 
 function record_sort($records, $field, $reverse=false)
 {
 	$hash = array();
 	foreach($records as $record)
 	{
 		$hash[$record[$field]] = $record;
 	}
 	($reverse)? krsort($hash) : ksort($hash);
 	$records = array();
 	foreach($hash as $record)
 	{
 		$records []= $record;
 	}
 	return $records;
 }
?>
