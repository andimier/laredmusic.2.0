<?php
	require_once("cnx/session.php");
	require_once("cnx/connection.php");

	require_once("crud/entries-reader.php");

	require_once("../utils/phpfunctions.php");

	require_once("components/nav.php");

	$content_update_message = null;
	$content_update_message_class = "";

	if (isset($_GET['contentCreated'])) {
		$content_update_message = $_GET['contentCreated'] == 'true' ?
			"¡El contenido fue creado correctamente!" :
			"No hiciste ningún cambio.";

		$content_update_message_class = $_GET['contentCreated'] == 'true' ? "mensaje1" : "mensaje";
	}

	$content_creation_form_props = array(
		'input-text' => 'Inserta nuevo video',
		'redirect-page' => 'edit-section.php',
		'required-fields' => array(
			'title',
			'video'
		),
		'table' => 'entries',
	);

	$nav = new Nav;
	$sections = $nav->getSections();
	$entries_list = EntriesReader::get_all_entries();
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
				<h4>Insertar nueva entry</h4>

				<?php require('templates/create-content-form.php'); ?>
				<br>

				<?php require_once('templates/create-content-message.php') ?>

				<strong>Haz click sobre el titulo del contenido para editarlo.</strong>
				<br />
				<br />
				<br />

				<ul id="draggables-container">
					<?php while($entry = phpMethods('fetch-array', $entries_list)): ?>
						<li class="content-item draggable"
							draggable="true"
							data-id="<?php echo$entry["id"]; ?>"
							ondragover="dragover_handler(event)"
							ondrop="drop_handler(event)"
						>
							<a href="edit-entry.php?entry_id=<?php echo urlencode($entry["id"]); ?> ">
								<p><?php echo $entry["creation_date"]; ?></p>
								<h3>
									<strong>Título:<?php echo $entry["title"]; ?></strong>
								</h3>
								<p>Video: <?php echo $entry['video']; ?></p>
							</a>
						</li>
					<?php endwhile; ?>
			    </ul>

				<button onclick="setOrder(event)">Guardar orden</button>
			</div>
		</div>

		<?php include_once('includes/cabezote.php'); ?>
		<?php include_once('includes/navegacion.php'); ?>

		<script src="js/drag-drop.js"></script>
	</body>
</html>

<?php
	if (isset($connection)) {
		phpMethods('close', $connection);
	}
?>
