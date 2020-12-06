<?php
	if (!isset($_SESSION)) {
		session_start();
	}

	$mensaje = "";
	$mensaje1 = "";
	$mensaje2 = "";
	$mensaje3 = "";
	$mensaje4 = "";

	require_once("cnx/connection.php");
	require_once("../utils/phpfunctions.php");
	require_once("includes/functions.php");

	function getUser($username, $hashed_password) {
		$q = "SELECT id, username FROM usuarios WHERE username = '{$username}' AND hashed_password = '{$hashed_password}'";
		$r = phpMethods('query', $q);

		if ($r == null || $r == false || phpMethods('num-rows', $r) == 0) {
			return null;
		}

		return $r;
	}

	function getErrors() {
		$errors = array();
		$required_fields = array(
			'usuario',
			'contrasena'
		);

		//$errors = array_merge($errors, $required_fields);
		//$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		foreach($required_fields as $fieldname){
			if (!isset($_POST[$fieldname]) ||
				(
					empty($_POST[$fieldname])  &&
					!is_numeric($_POST[$fieldname])
				)
			) {
				$errors[] = $fieldname;
			}
		}

		return $errors;
	}

	function getHash($password) {
		//algoritmos de incriptacion
		//$hashed_password = md5($password);
		//$hashed_password = hash($password);
		return sha1($password);
	}

	if (!isset($_POST['submit'])) {
		if (isset($_GET['logout']) && $_GET['logout'] == 1) {
			$mensaje = "Has cerrado tu sesión. "	;
		}

		$username = "";
		$password = "";

		return;
	}

	if (!empty(getErrors())) {
		$mensaje2 = "Por favor ingresa los siguientes campos:<br />";

		foreach($errors as $error) {
			$mensaje3 = " <li> " . $error . "</li><br/>";
		}

		if (count($errors) ==1) {
			$mensaje4 = "Hubo un error en el formulario.<br /><br />";
		} else {
			$mensaje4 = "Hubo " . count($errors) . " errors en el formulario.<br /><br />" ;
		}

		return;
	}

	$username = trim(mysql_prep($_POST['usuario']));
	$password = trim(mysql_prep($_POST['contrasena']));
	$hashed_password = getHash($password);
	$user = getUser($username, $hashed_password);

	if ($user == null) {
		$mensaje1 = "El nombre de usuario o contraseña pueden estar errados.";
		return;
	}

	$usuario_encontrado = phpMethods('fetch-array',$user);
	$_SESSION['user_id'] = $usuario_encontrado['id'];
	$_SESSION['username'] = $usuario_encontrado['username'];

	header("Location: noticias.php");
	exit;
?>
