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
		$to = "info@laredmusic.com";
		//$to = "amdisartec@yahoo.com";
		$subject = "Info Contacto";
		$nombre = $_POST['nombre'];
		$mail   = $_POST['mail'];
		$mensaje = $_POST['mensaje'];

		$body = "INFO DE CONTACTO
		
		Nombre: $nombre
		Correo: $mail

		Mensaje: 
		$mensaje";

				
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
		$message = "Datos incompletos, por favor completa tus datos e inténtalo de nuevo !!";
	}
}


?>