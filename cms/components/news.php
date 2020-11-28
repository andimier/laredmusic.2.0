<?php
	function getTags($current_new) {
		$tags = explode(',', $current_new['tags']);

		return $tags;
	}

	function get_content_update_form_fields($selected_entry) {
		return [
			'id' => $selected_entry['id'],
			'table' => 'noticias',
			'hidden-fields' => [
				'id' => $selected_entry['id'],
				'table' => 'noticias',
			],
			'inputs' => [
				'creation-date' => $selected_entry['fecha'],
				'title' => $selected_entry['titulo'],
				'alt' => $selected_entry['alt'],
			],
			'text-area' => $selected_entry['contenido'],
			'image' => $selected_entry['imagen1'],
			'active_tags' => [
				'music-masters'
			],
			'selected_tags' => getTags($selected_entry),
			'delete-entry-button-text' => "Eliminar",
		];
	}

	function get_content_update_message() {
		$message = null;

		if (isset($_GET['contentUpdated'])) {
			$message = $_GET['contentUpdated'] == 'true' ?
				"¡El contenido fue actualizado correctamente!" :
				"No hiciste ningún cambio.";
		}

		return $message;
	}

	function get_content_update_message_class() {
		$class = "";

		if (isset($_GET['contentUpdated'])) {
			$class = $_GET['contentUpdated'] == 'true' ? "mensaje1" : "mensaje";
		}

		return $class;
	}

	$mensaje = "";
	$mensaje2 = "";
	$mensaje_img = "";
	$mensajeimagen = "";

	$content_update_message = get_content_update_message();
	$content_update_message_class = get_content_update_message_class();

	if (intval($_GET['noticia_id']) == 0) {
		header("Location: noticias.php");
	}

	$id = $_GET['noticia_id'];
	$selected_entry = EntriesReader::get_selected_entry('noticias', $_GET['noticia_id']);
	$content_update_form_fields = get_content_update_form_fields($selected_entry);
?>
