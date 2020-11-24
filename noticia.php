<?php
	require_once('includes/connection.php');
	require_once('utils/phpfunctions.php');
	require_once('modules/noticias.php');
	require_once('contacto.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Noticias - La Red Music</title>
		<link rel="stylesheet" type="text/css"  media="screen"   href="estilos/noticias-gr.css"/>
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:481px) and (max-width:650px)" href="estilos/noticias-md.css" />
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:50px) and (max-width:480px)" href="estilos/noticias-pq.css" />

		<?php require_once('includes/requeridos.php'); ?>
	</head>

	<body>
		<?php require_once('cabezote.php'); ?>

		<!--<div class="cambioidioma"><a href="english/news.php">SWITCH TO ENGLISH</a></div>-->
		<div class="contenedor">
			<?php require_once('cuerpo/logosredes.php'); ?>

			<div class="titulo_noticia">NOTICIAS</div>

			<?php while($noticia = phpMethods('fetch-array', $noticias)): ?>
				<div class="contenedor_noticia">
					<div class="titulonoticias">
						<h1>
							<?php echo $noticia['titulo']; ?>
						</h1>
					</div>

					<div class="fechanoticia2">
						<?php echo $noticia['fecha']; ?>
					</div>

					<div class="noticia">
						<div class="imagennoticia">ß
							<img src="cms/<?php echo $noticia['imagen3']; ?>" alt="<?php echo $noticia['alt']; ?>" />
						</div>
						<?php echo $noticia['contenido']; ?>
					</div>
				</div>
			<?php endwhile; ?>
		</div><!--CIERRRE CONTENEDOR-->

		<?php require_once('footer.php'); ?>
		<?php require_once('cuerpo/menu-mv.php'); ?>
	</body>
</html>
