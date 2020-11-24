<?php 
	
	$mensaje = '';
	
	date_default_timezone_set('America/Bogota');
	$fecha = date("Y-m-d");

	if(isset($_POST['insertar_contenido'])){
		$titulo = $_POST['titulo'];
		
		$errores = array();
		$required_fields = array('titulo');
		$imagenprovisional = "iconos/photo2.png";
		
		foreach($required_fields as $fieldname){
			if(!isset($_POST[$fieldname]) || (empty($_POST[$fieldname])  && !is_numeric($_POST[$fieldname]))){
				$errores[] = $fieldname;	
			}
		}
		
		if(empty($errores)){
			$query = "INSERT INTO noticias (titulo, fecha, imagen1, imagen2, imagen3) VALUES ('$titulo', '$fecha', '$imagenprovisional', '$imagenprovisional', '$imagenprovisional')";
			if($result = mysql_query($query, $connection)){
				$mensaje = '<div class="mensaje1">El contenido se ha creado correctamente</div><br />';	
			}
		}else{
			$mensaje = "Debes ingresar un titulo!!";
		}
	}
	
?>