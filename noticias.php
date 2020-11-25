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

			<ul>
				<?php while($noticia = phpMethods('fetch-array', $noticias)): ?>
					<li class="cnt_noticias">
						<a href="noticia.php?noticia=<?php echo $noticia['id']; ?>">
							<div class="cnt_imgnoticia">
								<img src="cms/<?php echo $noticia['imagen1']; ?>"  />
							</div>

							<div class="cnt_noticia">
								<p><?php echo $noticia['fecha']; ?></p>
								<h2><?php echo $noticia['titulo']; ?></h2>
								<p><?php echo $noticia['music_masters_tag'] == 1 ? 'Music Masters' : ''; ?></p>
							</div>
						</a>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>

		<?php require_once('footer.php'); ?>
		<?php require_once('cuerpo/menu-mv.php'); ?>
	</body>
</html>
