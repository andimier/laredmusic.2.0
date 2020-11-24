<?php
	require_once("includes/requeridos.php");
	require_once("../utils/phpfunctions.php");

	$mensaje = "";
	$mensaje2 = "";
	$mensaje_img = "";
	$mensajeimagen = "";

	if (intval($_GET['noticia_id']) == 0) {
		header("Location: noticias.php");
	}

	$id = $_GET['noticia_id'];
	require_once('edicion/edc_imagenes/img_cambio.php');
	traer_noticia_seleccionada();

	$tabla = "noticias";
	$id = $noticia_seleccionada['id'];
	$fecha = $noticia_seleccionada['fecha'];
	$titulo = $noticia_seleccionada['titulo'];
	$alt = $noticia_seleccionada['alt'];
	$contenido 	= $noticia_seleccionada['contenido'];
	$imagenprincipal = $noticia_seleccionada['imagen1'];
	$tituloboton = "Eliminar";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php include_once('includes/tags.php'); ?>
	</head>

	<body>
		<div id="col2">
			<div id="cnt_edicion">
				<h3>
					<?php echo $noticia_seleccionada['titulo'];?>
				</h3>
				<br />

				<?php echo $mensaje; ?>
				<?php $archivo_eliminar = 'edicion/eliminarnoticia.php'; ?>
				<?php require_once('edicion/edc_imagenes/img_principal.php'); ?>
				<?php require_once("components/content-edit-form.php");	?>
				<br />
				<br />

				<div id="col4" >
					<?php require_once("edicion/formularioeliminar1.php"); ?>
				</div>
			</div>
		</div>

		<div id="footer"></div>

		<?php include_once('includes/cabezote.php'); ?>
		<?php include_once('includes/navegacion.php'); ?>

		<script src="js/general.js" type="text/javascript"></script>
	</body>
<html>

<?php
	if (isset($connection)) {
		phpMethods('close', $connection);
	}
?>