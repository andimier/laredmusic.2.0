<?php // ======================================== ACTUALIZACION DE LOS CONTENIDOS ========================================
	/*
	if(isset($_POST['areadetexto'])){
		
		$errores = array();
		$required_fields = array('titulo');
		
		foreach($required_fields as $fieldname){
			if(!isset($_POST[$fieldname]) || (empty($_POST[$fieldname])  && !is_numeric($_POST[$fieldname]))){
				$errores[] = $fieldname;	
			}
		}
		
		
		if(empty($errores)){
			
			$tabla     = $_POST['tabla'];
			$id        = mysql_prep($_POST['id']);
			$titulo    = trim(mysql_prep($_POST['titulo']));
			$contenido = mysql_prep($_POST['areadetexto']);
			
			$query = "UPDATE $tabla SET  titulo = '{$titulo}', contenido = '{$contenido}' WHERE id = {$id}";
			$result = mysql_query($query, $connection);
			
			if(mysql_affected_rows() == 1){
				$mensaje = "<br /><div class=\"mensaje1\">La Sección fue actualizada correctamente!</div><br />";
			}else{
				$mensaje = "<br /><div class=\"mensaje\">La Sección NO fue actualizada. No hiciste ningún cambio.</div><br />";
			}
		}else{
			if(count($errores) == 1){
				 $mensaje = "Dejaste este campo vacío:" . $errores[0];
			}else if(count($errores) == 2){
				//$mensaje = "Dejaste " . count($errores) . " campos vacíos:";
				echo count($errores);
				foreach($errores as $error){
					$mensaje = "- " . $error . "<br />";
				}
				echo "</h4>-----------------------------------------------------------------------------------------------------------------";
			}
		}
	*/
	
	if( isset($_POST['areadetexto']) ){
			
		$tabla     = $_POST['tabla'];
		$id        = mysql_prep($_POST['id']);
		$fecha     = $_POST['fecha'];
		$titulo    = trim(mysql_prep($_POST['titulo']));
		$alt    = trim(mysql_prep($_POST['alt']));
		$contenido = mysql_prep($_POST['areadetexto']);
		
		/*
		echo $tabla . '<br />';
		echo $id . '<br />';
		echo $titulo . '<br />';
		*/
		
		$query = "
		UPDATE $tabla 
		SET  titulo = '{$titulo}', alt = '{$alt}', contenido = '{$contenido}', fecha = '{$fecha}' WHERE id = {$id}";
		
		
		$result = mysql_query($query, $connection);
		
		if(mysql_affected_rows() == 1){
			$mensaje = "<br /><div class=\"mensaje1\">El contenido fue actualizado correctamente!</div><br />";
		}else{
			$mensaje = "<br /><div class=\"mensaje\">No hiciste ningún cambio.</div><br />";
		}
	
	}else{
		//echo 'nada';
		//echo mysql_error();
	}
?>

