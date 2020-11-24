<?php
$mensaje2 = "";
$message = "";

if(isset($_POST['enviarregistro'])) {
	
	if(empty($_POST['sexom'])){
		$sexom = "";
	}else{
		$sexom = $_POST['sexom'];
	}
	if(empty($_POST['sexof'])){
		$sexof = "";
	}else{
		$sexof = $_POST['sexof'];
	}
	
	$errores = array();
	$required_fields = array('nombre','mail','nacionalidad');
	
	foreach($required_fields as $fieldname){
		if(!isset($_POST[$fieldname]) || (empty($_POST[$fieldname])  && !is_numeric($_POST[$fieldname]))){
			$errores[] = $fieldname;	
		}
	}
	if(empty($errores)){
		$to = "info@laredmusic.com";
		//$to = "amdisartec@yahoo.com";
		$subject = "Info Registro";
		$nombre = $_POST['nombre'];
		$mail   = $_POST['mail'];
		$nacion = $_POST['nacionalidad'];
		
		$fuente = $_POST['fuente'];
	
		$body = "INFO REGISTRO
		
Nombre: $nombre
Correo: $mail 
Ciudad: $nacion
Sexo: $sexom $sexof
		
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
	//echo "nada";
	//$message = "<a href=\"#clase\">Datos incompletos, por favor completa tus datos e inténtalo de nuevo !!</a>";
}
}else{
	//echo "NO SE ENVIO NADA";
}
?>