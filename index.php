<?php
	require_once('includes/connection.php');
	require_once('utils/phpfunctions.php');
	require_once('components/registro.php');

	$query = "SELECT * FROM noticias ORDER BY fecha DESC LIMIT 6";
	$noticias = phpMethods('query', $query);
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
	</head>

	<body>
		<?php require_once('cabezote.php'); ?>

		<div class="contenedor">
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

			<section class="info-wrapper music-masters-link-wrapper grid-display">
				<div class="logo music-masters-logo-wrapper">
					<img src="diseno/musicmasters-logo.png" />
				</div>

				<div>
					<p>
					Music Masters, es el diplomado pionero en Colombia sobre el Music Business o Negocios de la Música en formato de
					128 horas.
					</p>
					<a href="musicmasters.php">conoce más acá</a>
				</div>
			</section>

			<div class="info-wrapper grid-display">
				<div id="cnt_quienes" class="grid-item">
					<div class="tt1 negro">QUIENES SOMOS</div>
					<div class="textoquienessomos"></div>
					<div class="vacio"></div>
				</div>

				<div class="noticias_inicio grid-item">
					<h2 class="ultimasnoticias_inicio">
						ÚLTIMAS NOTICIAS
					</h2>

					<?php $i=0;?>
					<?php while($noticia = phpMethods('fetch-array', $noticias)): ?>
						<div class="cnt-noticia-inicio <?php echo $i == 0 ? 'main-item': ''; ?>">
							<div class="thumb-noticia-inicio">
								<img src="cms/<?php echo $noticia['imagen1']; ?>"/>
							</div>

							<div class="noticia_inicio">
								<div class="fechanoticia_inicio">
									<?php echo $noticia['fecha']; ?>
								</div>

								<div class="titulonoticia_inicio">
									<a href="noticias.php">
										<?php echo $noticia['titulo']; ?>
									</a>
								</div>
							</div>
						</div>

						<?php $i++; ?>
					<?php endwhile; ?>

					<div class="masnoticias_inicio">
						<a href="noticias.php">MÁS NOTICIAS AQUÍ + </a>
					</div>
				</div>
			</div>


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

		</div>

		<?php require_once('footer.php'); ?>
		<?php require_once('cuerpo/menu-mv.php'); ?>
	</body>
	<script src="js/home-data.js"></script>
	<script src="js/inicio.js"></script>
	<script src="js/playlist.js"></script>
    <script src="js/videos.js"></script>
	<script src="js/portafolio-inicio.js"></script>
</html>

