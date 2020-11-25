<?php
	require_once('includes/connection.php');
	require_once('utils/phpfunctions.php');
	require_once('components/news.php');
    require_once('contacto.php');

    $news_group = new News;
    $noticias = $news_group->getAllNews('music-masters');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Noticias - La Red Music</title>
		<?php require_once('includes/requeridos.php'); ?>

		<link rel="stylesheet" type="text/css"  media="screen"   href="estilos/noticias-gr.css"/>
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:481px) and (max-width:650px)" href="estilos/noticias-md.css" />
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:50px) and (max-width:480px)" href="estilos/noticias-pq.css" />
	</head>

	<body>
		<?php require_once('cabezote.php'); ?>
		<!--<div class="cambioidioma"><a href="english/news.php">SWITCH TO ENGLISH</a></div>-->
		<div class="contenedor">
			<?php require_once('cuerpo/logosredes.php'); ?>

			<h1 class="titulo_noticia">NOTICIAS</h1>

			<?php require_once('templates/news.php'); ?>
		</div>

		<?php require_once('footer.php'); ?>
		<?php require_once('cuerpo/menu-mv.php'); ?>
	</body>
</html>
