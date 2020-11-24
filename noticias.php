<?php 

	require_once('includes/connection.php'); 
	$query = "SELECT * FROM noticias ORDER BY fecha DESC";
	$noticias = mysql_query($query, $connection);

	require_once('contacto.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

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
		
			<div class="titulo_noticia">NOTICIAS</div>
			
			<?php while($noticia = mysql_fetch_array($noticias)): ?>
			
				<div class="cnt_noticias">
				
					<div class="cnt_imgnoticia">
						<img src="cms/<?php echo $noticia['imagen1']; ?>"  />
					</div>
					
					<div class="cnt_noticia">
					
						<h2><?php echo $noticia['fecha']; ?></h2>
					
						<h1>
						
							<a href="noticia.php?noticia=<?php echo $noticia['id']; ?>">
								<?php echo $noticia['titulo']; ?>
							</a>
						</h1>
					</div>
					
					
				</div>
				 
			<?php endwhile; ?>
			
			 
		</div><!--CIERRRE CONTENEDOR-->
		

		<?php require_once('footer.php'); ?>
		
		<?php require_once('cuerpo/menu-mv.php'); ?>
		
	</body>
</html>
