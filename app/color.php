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

global $DB, $USER, $CFG, $ecolor;
require_once 'config.php';



$facebook = new Facebook($config);
$facebook_id= $facebook->getUser();

$app_name= $CFG->fbkAppNAME;
$app_email= $CFG->fbkemail;
$tutorial_name=$CFG->fbktutorialsN;
$tutorial_link=$CFG->fbktutorialsL;
$messageurl= new moodle_url('/message/edit.php');
$connecturl= new moodle_url('/local/facebook/connect.php');
$colorurl= new moodle_url('/local/facebook/app/color.php');
$prioridadurl=new moodle_url('/local/facebook/app/prioridad.php');
?>
<?php
session_start();
		$ecolor = $_SESSION['color'];
    
		?>


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

		<div class="cuerpo"><?php echo '<h1> Cambiar color</h1>
			<br>
		<H4>Selecciona el color de tu WEBC</h4>
		<br>
		<form action="index.php" method="GET"> 
		<input type="radio" name="color" value="color0" checked="checked" /><img src="images/colornegro.jpg"> Colores por defecto 
		<br>
        <input type="radio" name="color" value="color1" /><img src="images/colorazul.jpg"> Azul Oscuro WebC
		<br>
        <input type="radio" name="color" value="color2" /><img src="images/colorvioleta.jpg"> Violeta WebC
		<br>
        <input type="radio" name="color" value="color3" /><img src="images/colorgrafito.jpg"> Grafito WebC
		<br>
		<br>
		<input type="image" src="images/guardarcambios.jpg" value="Guardar cambios">
		
		
		
		
		'?>
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
