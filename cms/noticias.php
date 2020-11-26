<?php
	require_once("cnx/session.php");
	require_once("cnx/connection.php");
	require_once("../utils/phpfunctions.php");
	require_once("includes/functions.php");
	require_once("components/nav.php");

	encontrar_seccion_y_contenido_seleccionados();

	$content_update_message = null;
	$content_update_message_class = "";

	if (isset($_GET['contentCreated'])) {
		$content_update_message = $_GET['contentCreated'] == 'true' ?
			"¡El contenido fue creado correctamente!" :
			"No hiciste ningún cambio.";

		$content_update_message_class = $_GET['contentCreated'] == 'true' ? "mensaje1" : "mensaje";
	}

	$content_creation_form_props = [
		'tabla' => 'noticias',
		'required-fields' => ['titulo'],
		'input-text' => 'Crear nueva noticia',
	];

	$nav = new Nav;
	$sections = $nav->getSections();

	$grupo_noticias = todas_las_noticias()
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php include_once('includes/tags.php'); ?>
	</head>

	<body>
		<div id="col2">
			<div id='cnt_edicion'>
				<h3>Noticias</h3>
				<h4>Insertar nueva noticia</h4>

				<?php require('templates/create-content-form.php'); ?>
				<br>

				<?php require_once('templates/create-content-message.php') ?>

				<strong>Haz click sobre el titulo del contenido para editarlo.</strong>
				<br />
				<br />
				<br />

				<ul>
					<?php while($noticia = phpMethods('fetch-array', $grupo_noticias)): ?>
						<li>
							<a href="editar-noticia.php?noticia_id=<?php echo urlencode($noticia["id"]); ?> ">
								<?php echo $noticia["fecha"] . '<br /> <strong>' . $noticia["titulo"] . '</strong>'; ?>
							</a>
						</li>
					<?php endwhile; ?>
			    </ul>
			</div>
		</div>

		<?php require("includes/footer.php");?>
		<?php include_once('includes/cabezote.php'); ?>
		<?php include_once('includes/navegacion.php'); ?>

		<script src="js/general.js" type="text/javascript"></script>
	</body>
</html>
