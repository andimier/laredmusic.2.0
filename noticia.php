<?php
	require_once('includes/connection.php');
	require_once('utils/phpfunctions.php');
	require_once('components/news.php');
	require_once('contacto.php');

	$news_group = new News;
    $noticias = $news_group->getSingleNews($_GET['noticia']);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Noticias - La Red Music</title>
		<link rel="stylesheet" type="text/css"  media="screen"   href="estilos/noticias-gr.css"/>
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:481px) and (max-width:650px)" href="estilos/noticias-md.css" />
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:50px) and (max-width:480px)" href="estilos/noticias-pq.css" />

		<?php require_once('includes/requeridos.php'); ?>
	</head>

	<body>
		<?php require_once('cabezote.php'); ?>

		<main class="main-container">
			<?php require_once('cuerpo/logosredes.php'); ?>

			<section class="news-component-wrapper">
				<?php while($noticia = phpMethods('fetch-array', $noticias)): ?>
					<div class="single-news-wrapper">
						<p><?php echo $noticia['fecha']; ?></p>
						<h1><?php echo $noticia['titulo']; ?></h1>

						<div class="noticia news-body">
							<div class="imagennoticia">
								<img src="cms/<?php echo $noticia['imagen3']; ?>" alt="<?php echo $noticia['alt']; ?>" />
							</div>

							<p>
								<?php echo $noticia['contenido']; ?>
							</p>
						</div>
					</div>
				<?php endwhile; ?>
			</section>
		</main>

		<?php require_once('footer.php'); ?>
		<?php require_once('cuerpo/menu-mv.php'); ?>
	</body>
</html>
