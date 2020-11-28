<?php
	require_once("../cnx/session.php");
	require_once("../cnx/connection.php");
	require_once('../../utils/phpfunctions.php');
	require_once('../includes/functions.php');

	$contentUpdated = 'false';

	function checkErrors($post) {
		$errors = array();
		$required_fields = [
			'titulo',
			'fecha',
		];

		foreach($required_fields as $fieldname) {
			if (!isset($post[$fieldname]) || (empty($post[$fieldname]) && is_numeric($post[$fieldname]))){
				$errors[] = $fieldname;
			}
		}

		return $errors;
	}

	function updateContent($post) {
		global $contentUpdated;

		$table = $post['table'];
		$fecha = $post['creation-date'];
		$titulo = trim(mysql_prep($post['title']));
		$alt = trim(mysql_prep($post['alt']));
		$contenido = mysql_prep($post['text-area']);

		// A string e.g. music-masters,news,cars...
		// TODO: in the future, many more tags couls be added to news
		$tags = "";

		if (isset($post['music-masters-tag'])) {
			$tags .= "music-masters";
		}

		$q = "UPDATE $table SET";
		$q .= " fecha = '{$fecha}',";
		$q .= " titulo = '{$titulo}',";
		$q .= " alt = '{$alt}',";
		$q .= " tags = '{$tags}',";
		$q .= " contenido = '{$contenido}'";
		$q .= " WHERE id = " . $post['id'];

		$r = phpMethods('query', $q);

		if ($r == false) {
			throw new Exception('Hubo un error al actualizar la base de datos. '. phpMethods('error', null));
		}

		// if (phpMethods('affected-rows', null) == 1) {
		// 	throw new Exception('No se actualizó la base de datos, los datos son iguales. '. phpMethods('error', null));
		// }

		if (phpMethods('affected-rows', null) == 1) {
			$contentUpdated = 'true';
		}
	}

	if (!isset($_POST['areadetexto']) || !empty(checkErrors($_POST))) {
		echo 'error';
	}

	try {
		updateContent($_POST);
		header('Location: ../editar-noticia.php?noticia_id=' . $_POST['id'] . '&contentUpdated=' . $contentUpdated);
	} catch (Exception $e) {
		echo $e;
	}
?>
