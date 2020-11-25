<?php
    require_once("cnx/session.php");
	require_once("includes/requeridos.php");
	require_once("../utils/phpfunctions.php");

	function getTags($current_new) {
		$tags = explode(',', $current_new['tags']);

		return $tags;
	}

	$mensaje = "";
	$mensaje2 = "";
	$mensaje_img = "";
	$mensajeimagen = "";

	$content_update_message = null;
	$content_update_message_class = "";

	if (intval($_GET['noticia_id']) == 0) {
		header("Location: noticias.php");
	}

	if (isset($_GET['contentUpdated'])) {
		$content_update_message = $_GET['contentUpdated'] == 'true' ?
			"¡El contenido fue actualizado correctamente!" :
			"No hiciste ningún cambio.";

		$content_update_message_class = $_GET['contentUpdated'] == 'true' ? "mensaje1" : "mensaje";
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

	$active_tags = ['music-masters'];
	$selected_tags = getTags($noticia_seleccionada);

    $tituloboton = "Eliminar";
?>