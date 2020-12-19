<?php
	require_once('contacto.php');
	require_once('utils/phpfunctions.php');
	require_once('components/featured-news-widget.php');
?>

<!DOCTYPE html">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Videos - La Red Music Entertainment</title>

		<link rel="stylesheet" type="text/css"  media="screen"   href="estilos/videos-gr.css"/>
		<?php require_once('includes/requeridos.php'); ?>
		<link rel="stylesheet" type="text/css" href="estilos/music-masters-link-nav.css" />
	</head>

	<body>
		<?php require_once('cabezote.php'); ?>


		<main class="main-container">
			<?php require_once('cuerpo/logosredes.php'); ?>
			<?php require_once('templates/music-masters-nav-section.php'); ?>
			<?php require_once('templates/featured-news-widget.php'); ?>

			<section class="videos-section-wrapper">
				<div class="tt_servicios negro">Videos </div>
				<div id="cnt_videos"></div>
				<div class="remate"></div>
			</section>
		</main>

        <script src="js/videos.js"></script>
		<?php require_once('footer.php'); ?>
		<?php require_once('cuerpo/menu-mv.php'); ?>
	</body>
</html>
