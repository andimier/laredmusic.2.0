<?php
	function checkErrors($post) {
		$errors = array();
		$required_fields = [
			'titulo',
			'fecha',
			'contenido'
		];

		foreach($required_fields as $fieldname){
			if (!isset($post[$fieldname]) || (empty($post[$fieldname]) && is_numeric($post[$fieldname]))){
				$errors[] = $fieldname;
			}
		}

		return $errors;
	}

	function updateContent($post) {

		if (!empty(checkErrors($post))) {
			throw new Exception('Campos requeridos no pasados');
		}

		$tabla = $post['tabla'];
		$id = mysql_prep($post['id']);
		$fecha = $post['fecha'];
		$titulo = trim(mysql_prep($post['titulo']));
		$alt = trim(mysql_prep($post['alt']));
		$contenido = mysql_prep($post['areadetexto']);

		$query = "UPDATE $tabla SET  titulo = '{$titulo}', alt = '{$alt}', contenido = '{$contenido}', fecha = '{$fecha}' WHERE id = {$id}";
		$result = mysql_query($query, $connection);

		if (mysql_affected_rows() < 1) {
			throw new Exception('No se actualizó pla base de datos');
		}
	}

	if (!isset($_POST['areadetexto'])) {
		echo 'error';
	}

	try {
		updateContent($_POST);
		// return to contet with success query param
	} catch (Exception $e) {
		// return to content with fail query param
	}

	// move this to edit-content file
	// if (mysql_affected_rows() == 1) {
	// 	$mensaje = "<br /><div class=\"mensaje1\">El contenido fue actualizado correctamente!</div><br />";
	// } else {
	// 	$mensaje = "<br /><div class=\"mensaje\">No hiciste ning�n cambio.</div><br />";
	// }
?>
