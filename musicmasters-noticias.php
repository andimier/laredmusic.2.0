<?php
	require_once('includes/connection.php');
	require_once('utils/phpfunctions.php');
	require_once('components/news.php');
	require_once('contacto.php');

	$news_group = new News;
	$isFeaturedNews = false;
    $noticias = $news_group->getAllNews('music-masters', $isFeaturedNews);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Music Masters Noticias - La Red Music</title>
		<?php require_once('includes/requeridos.php'); ?>

		<link rel="stylesheet" type="text/css"  media="screen"   href="estilos/noticias-gr.css"/>
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:481px) and (max-width:650px)" href="estilos/noticias-md.css" />
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:50px) and (max-width:480px)" href="estilos/noticias-pq.css" />
		<link rel="stylesheet" type="text/css" href="estilos/music-masters-link-nav.css" />
	</head>

	<body>
		<?php require_once('cabezote.php'); ?>

		<main class="main-container">
			<?php require_once('cuerpo/logosredes.php'); ?>
			<?php require_once('templates/news.php'); ?>
		</main>

		<?php require_once('footer.php'); ?>
		<?php require_once('cuerpo/menu-mv.php'); ?>
	</body>
</html>
