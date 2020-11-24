<?php
$mensaje2 = "";
$message = "";

if(isset($_POST['enviarcontacto'])) {
	
	$errores = array();
	$required_fields = array('nombre','mail','mensaje');
	
	foreach($required_fields as $fieldname){
		if(!isset($_POST[$fieldname]) || (empty($_POST[$fieldname])  && !is_numeric($_POST[$fieldname]))){
			$errores[] = $fieldname;	
		}
	}
	if(empty($errores)){
		//$to = "info@laredmusic.com";
		$to = "amdisartec@yahoo.com";
		$subject = "Info Contacto";
		$nombre = $_POST['nombre'];
		$mail   = $_POST['mail'];
		$mensaje = $_POST['mensaje'];

		$body = "INFO REGISTRO
		
Nombre: $name1
e-mail: $email
Teléfono: $telefono
Nacionalidad: $nacion
Sexo
m: $sexom
f: $sexof
		
Cómo se enteraron de La Red:
$fuente";
		
$message = "Tus datos han sido enviados correctamente !!";

$headers = "From: <{$mail}>\r\n";
$headers .= "X-Mailer: PHP/" .phpversion(). "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=iso-8859-1\r\n";

mail($to, $subject, $body, $headers);

///// Respuesta Automática //////////////////////////////////////
$asunto="Gracias por enviarnos tus datos!";
$respuesta="Gracias por tu tiempo.\n
Estaremos respondiendo tu solicitud prontamente.\n
LA RED MUSIC ENTERTAINMENT info@laredmusic.com";

$cabeza = "From: La Red Music <info@laredmusic.com>\r\n";
$cabeza .= "X-Mailer: PHP/" .phpversion(). "\r\n";
$cabeza .= "MIME-Version: 1.0\r\n";
$cabeza .= "Content-Type: text/plain; charset=iso-8859-1\r\n";

mail($mail, $asunto, $respuesta, $cabeza);

}else{
	$message = "<a href=\"#clase\">Datos incompletos, por favor completa tus datos e inténtalo de nuevo !!</a>";
}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link type='text/css' href='css/demo.css'       rel='stylesheet' media='screen' />
<link type='text/css'  href='estilos/basic.css' rel='stylesheet' media='screen' />
</head>

<body>

<div class="contacto"><a href='#' class='basic'>CONTACTO</a></div>

<div id='content'>
		<div id='basic-modal'>
			<h3>Basic Modal Dialog</h3>
			<p>A basic modal dialog with minimal styling and no additional options. There are a few CSS properties set internally by SimpleModal, however, SimpleModal relies mostly on style options and/or external CSS for the look and feel.</p>
			<input type='button' name='basic' value='Demo' class='basic'/> or <a href='#' class='basic'>Demo</a>
		</div>
		
		<!-- modal content -->
		<div id="basic-modal-content">
			<form method="post">
							<div class="f_nombrecampo" >NOMBRE 
							<input type="text" name="nombre" class="form_nombre" size="65" ></div>
							
                            <div class="f_mailcampo">E-MAIL &nbsp;&nbsp;
							<input type="text" name="mail" class="form_mail" size="65"></div>
							
                                                                                
                            <div class="f_comocampo">
                            	<div class="f_comotitulo">MENSAJE</div>
                           		<textarea rows="3" name="mensaje" class="form_mensaje" cols="60"></textarea>
                            </div>
													
							<div class="f_boton">
                            	<input type="submit" name="enviarcontacto" value="Enviar Datos" class="boton" />
                            </div>
							
						</form>
                        <? echo $message ?>
		</div>
		
		<!-- preload the images -->
		<div style='display:none'>
			
            <img src='img/basic/x.png' alt='' />
		</div>
	</div>
        
        <script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/basic.js'></script>
</body>
</html>
