<?php
	require_once('includes/connection.php');
	require_once('utils/phpfunctions.php');
	require_once('components/news.php');
	require_once('components/registro.php');

	$query = "SELECT * FROM noticias ORDER BY fecha DESC LIMIT 6";
	$noticias = phpMethods('query', $query);

	$news_group = new News;
	$isFeaturedNews = true;
	$noticias = $news_group->getAllNews(null, $isFeaturedNews);
	$news_section_link = 'noticias';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>La Red Music Entertainment, Bogot? Colombia</title>
		<meta name="description" content="La Red Music Entertainment es una empresa Colombo - Americana basada en Bogot?, Colombia y con afiliados en Estados Unidos, Puerto Rico y Sur Am?rica." />
		<meta name="keywords" content="Sello, Discografico, 360, entretenimiento, enfocado, m?sica, artistas, nacionales, internacionales" />
		<link rel="stylesheet" type="text/css"  media="screen"   href="estilos/inicio.css"/>
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:481px) and (max-width:800px)" href="estilos/inicio-md.css" />
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:50px) and (max-width:480px)" href="estilos/inicio-pq.css" />
		<?php require_once('includes/requeridos.php'); ?>
		<link rel="stylesheet" type="text/css" media="screen" href="estilos/noticias-gr.css"/>
		<link rel="stylesheet" type="text/css" href="estilos/music-masters-link-nav.css" />
		<link rel="stylesheet" type="text/css" href="estilos/split-section.css" />
	</head>

	<body>
		<?php require_once('cabezote.php'); ?>

		<main class="main-container">
			<?php require_once('cuerpo/logosredes.php'); ?>

			<div id="playlist">
				<div id="btn_mando" class="play"></div>
				<div id="ff"></div>

				<div id="output">
					<div id="cancion"></div>
					<div id="artista"></div>
				</div>

				<div id="time-display"></div>
			</div>

			<?php require_once('templates/music-masters-nav-section.php'); ?>

			<section class="split-section">
				<section class="split-section-text-wrapper">
					<h2 class="section-title news-section-title sub-title">¿QUIENES SOMOS?</h2>

					<p class="split-section-text">
						La Red Music es una compañía Colombo-Americana basada en Bogotá, Colombia y con afiliados en Estados Unidos,
						Puerto Rico y Sur Amárica.
						<br>
						<br>
						Sus fundadores tienen más de 17 años de experiencia en la industria del entretenimiento/música .
						Esto incluye áreas  como Gerencia de Proyectos, Marketing, Booking, Distribución, Publishing, Prensa &
						Publicidad (radio, prensa y TV) RRSS, Asesorías en Industrias Musicales, planeación de conciertos y eventos
						a gran escala, además de docencia en MUSIC BUSINESS.
						<br>
						<br>
						Hemos trabajado con más de 30 artistas de la talla de Romeo Santos, Ricardo Arjona, Maná, JulietaVenegas, Diego Torres, Don Omar,
						Luis Enrique, Yuri, Noel Schajris, Carlos Rivera, Illya Kuryaki & the Valderramas, Espinoza Paz, Bebe, Ricardo Montaner, Gustavo Cerati,
						Reykon, Diamante Eléctrico, Mauricio&PalodeAgua, Ilona, Bako, Adriana Bottina, Caravanchela, Duina del Mar, Uschi, Andee Zeta, entre otros.
						<br>
						<br>
						Además de marcas como Pontificia Universidad Javeriana, Teatro Colsubsidio, Sony / ATV, EMI Publishing, Cámara de Comercio
						de Bogotá, Casa Editorial El Tiempo, Bogotá Music Market, Bogotá Audiovisual Market, Universidad San Buenaventura, Thomas
						Gregg & Sons, Armando Records, Lipstick, entre muchos otros.
					</p>
				</section>

				<?php if (!empty($noticias)): ?>
					<section class="split-section-news">
						<h2 class="section-title news-section-title sub-title">Noticias</h2>
						<?php require_once('templates/news.php'); ?>
					</section>
				<?php endif; ?>
			</section>


			<div id="videoinicio">
				<div class="tt1 rojo "><a href="videos.php">videos</a></div>
				<div id="cnt_videos1">
					<div class="cuadrovideo">
						<iframe width="100%" height="100%" src="" frameborder="0" allowfullscreen></iframe>
					</div>
					<div class="cuadrovideo">
						<iframe width="100%" height="100%" src="" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>

				<div id="cnt_videos2">
					<div class="videos">
						<iframe width="100%" height="100%" src="" frameborder="0" allowfullscreen></iframe>
					</div>
					<div class="videos">
						<iframe width="100%" height="100%" src="" frameborder="0" allowfullscreen></iframe>
					</div>
					<div class="videos">
						<iframe width="100%" height="100%" src="" frameborder="0" allowfullscreen></iframe>
					</div>
					<div class="videos">
						<iframe width="100%" height="100%" src="" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
			</div>

			<div id="cnt_portafolio">
				<div class="tt1 negro"><a href="portafolio.php">PORTAFOLIO</a></div>

				<div class="cnt_logos">
					<ul id="list-portafolio"></ul>
				</div>
				<div class="vacio"></div>
			</div>

			<div id="cnt_servicios">
				<div class="tt1 rojo padd2">servicios</div>
				<div class="servicio">1. ASESORÍA A &amp; R (Artistas y repertorio) - Music Masters</div>
				<div class="servicio">2. GERENCIA DE PROYECTOS MUSICALES</div>
				<div class="servicio">3. ESTRATEGIAS DIGITALESS</div>
				<div class="servicio">4. CONSULTORÍAS EMPRESARIALES EN ARTES Y ENTRETENIMIENTO</div>
				<div class="masservicio"><a href="servicios.php">+ MAS SERVICIOS AQUÍ</a></div>
			</div>

			<?php require_once('templates/formularioregistro.php'); ?>

		</main>

		<?php require_once('footer.php'); ?>
		<?php require_once('cuerpo/menu-mv.php'); ?>
	</body>
	<script src="js/home-data.js"></script>
	<script src="js/inicio.js"></script>
	<script src="js/playlist.js"></script>
    <script src="js/videos.js"></script>
	<script src="js/portafolio-inicio.js"></script>
</html>

