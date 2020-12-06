<?php
	require_once('includes/connection.php');
	require_once('utils/phpfunctions.php');
	require_once('components/news.php');
	require_once('components/video-entries.php');
    require_once('contacto.php');

    $news_group = new News;
	$noticias = $news_group->getAllNews('music-masters');

	$video_entries = new VideoEntries;
	$video_entries_group = $video_entries->get_video_entries();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Music Masters - La Red Music</title>

		<?php require_once('includes/requeridos.php'); ?>

		<link rel="stylesheet" type="text/css" media="screen" href="estilos/noticias-gr.css"/>
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:481px) and (max-width:650px)" href="estilos/noticias-md.css" />
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:480px)" href="estilos/noticias-pq.css" />
		<link rel="stylesheet" type="text/css" href="estilos/music-masters.css" />
		<link rel="stylesheet" type="text/css" href="estilos/f-box.css" />
	</head>

	<body>
		<?php require_once('cabezote.php'); ?>
		<!--<div class="cambioidioma"><a href="english/news.php">SWITCH TO ENGLISH</a></div>-->
		<div class="contenedor music-masters">
			<?php require_once('cuerpo/logosredes.php'); ?>
			<h1 class="section-title">MUSIC MASTERS</h1>

			<section>
				<?php require_once('templates/music-masters-videos.php'); ?>
			</section>

			<?php if (!empty($video_entries_group)): ?>
				<section>
					<?php require_once('templates/video-entries.php'); ?>
				</section>
			<?php endif; ?>

			<?php if (!empty($noticias)): ?>
				</section>
					<?php require_once('templates/news.php'); ?>
				</section>
			<?php endif; ?>
		</div>

		<?php require_once('footer.php'); ?>
		<?php require_once('cuerpo/menu-mv.php'); ?>
		<div id="fbox-display-container"></div>
	</body>

	<script async src="js/f-box.js"></script>
</html>
