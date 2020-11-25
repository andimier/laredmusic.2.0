<?php require_once('components/news.php'); ?>

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

				<?php if ($content_update_message != null): ?>
					<br />
					<div class="<?php echo $content_update_message_class; ?>">
						<?php echo $content_update_message; ?>
					</div>
					<br />
				<?php endif; ?>

				<?php $archivo_eliminar = 'edicion/eliminarnoticia.php'; ?>
				<?php require_once('edicion/edc_imagenes/img_principal.php'); ?>
				<?php require_once("templates/content-edit-form.php"); ?>
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