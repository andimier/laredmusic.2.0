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

			<div class="music-masters-logo-wrapper">
				<img src="diseno/clientes/music-masters.jpg" />
			</div>

			<h1 class="music-masters section-title ">MUSIC MASTERS</h1>

			<nav>
				<ul>
					<li>Videos</li>
					<li>Tik Tik</li>
					<li>Noticias</li>
				</ul>
			</nav>

			<section>
				<p class="music-masters-text">
				Music Masters, es el diplomado pionero en Colombia sobre el Music Business o Negocios de la Música en formato de
				128 horas. Con 7 años en el mercado, ha sido dictado en la Universidad de los Andes; bajo el formato de Negocios
				de la Música en la facultad de Música, en la Universidad Javeriana; en el departamento de Educación Continua como
				parte del facultad de Economía y Administración, en formato diplomado de 128 horas, como curso independiente
				(en varias ediciones) y en la Universidad San Buenaventura en la especialización de Ingeniería de Sonido.
				Actualmente @musicmasters2.0 se realiza en formato  VITUAL  con la Universidad Javeriana, en una intensidad de 60
				horas- Music Masters 2.0

				Así mismo, Music Masters es la base de las asesorías personales que realizamos para músicos y actores de la industria
				de la música de todas las categorías y en distintas escalas de su carrera, así como para las
				</p>
			</section>

			<section>
			<h2 class="section-title">Videos</h2>
				<?php require_once('templates/music-masters-videos.php'); ?>
			</section>

			<?php if (!empty($video_entries_group)): ?>
				<h2 class="section-title">Tik Tok</h2>
				<section>
					<?php require_once('templates/video-entries.php'); ?>
				</section>
			<?php endif; ?>

			<?php if (!empty($noticias)): ?>
				<h2 class="section-title news-section-title">NOTICIAS</h2>
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
