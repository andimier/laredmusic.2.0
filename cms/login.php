<?php
	require_once("includes/login.php");
	require_once("../utils/phpfunctions.php");
	require_once("includes/functions.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<?php include_once('includes/tags.php'); ?>
	</head>

	<body>
		<div id="cnt_login">
			<div id="mensaje_login">
				<?php
					echo $mensaje;
					echo $mensaje4;
					echo $mensaje1;
					echo $mensaje2;
					echo $mensaje3;
				?>
			</div>

			<form id="frm-login" action="login.php" method="post">
				<label for="campo_usuario" id="labe">Nombre de Usuario</label>
				<input type="text" name="usuario" id="campo_usuario"  />

				<label for="password" id="label">Tu Contraseña</label>
				<input type="password" name="contrasena" id="password" maxlength="50" />
				<br />
				<br />
				<br />

				<input type="submit" name="submit" class="boton_entrar fondo_verde" value="Ingresar" />
			</form>
		</div>
		<div id="cabezote" ></div>
	</body>
</html>

<?php
	if (isset($connection)) {
		phpMethods('close', $connection);
	}
?>
