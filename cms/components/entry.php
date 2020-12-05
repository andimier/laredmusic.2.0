<?php
	function getTags($current_new) {
		$tags = explode(',', $current_new['tags']);

		return $tags;
	}

	function get_content_update_form_fields($selected_entry) {
		return [
			'id' => $selected_entry['id'],
			'table' => 'entries',
			'hidden-fields' => [
				'id' => $selected_entry['id'],
				'table' => 'entries',
			],
			'inputs' => [
                'title' => $selected_entry['title'],
				'video' => $selected_entry['video'],
			],
			'delete-entry-button-text' => "Eliminar Video",
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

	if (intval($_GET['entry_id']) == 0) {
		header("Location: noticias.php");
	}

	$id = $_GET['entry_id'];
	$selected_entry = EntriesReader::get_selected_entry('entries', $id);
	$content_update_form_fields = get_content_update_form_fields($selected_entry);
?>
