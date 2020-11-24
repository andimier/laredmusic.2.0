<?php require_once('contacto.php');?>

<!DOCTYPE html">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Videos - La Red Music Entertainment</title>

		<link rel="stylesheet" type="text/css"  media="screen"   href="estilos/videos-gr.css"/>
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:50px) and (max-width:480px)" href="estilos/videos-pq.css" />
		<?php require_once('includes/requeridos.php'); ?>
	</head>

	<body>
		<?php require_once('cabezote.php'); ?>
		
		<!--<div class="cambioidioma"><a href="english/services.php">SWITCH TO ENGLISH</a></div>-->
		<div class="contenedor">
			<?php require_once('cuerpo/logosredes.php'); ?>
			<?php //require_once('cuerpo/menunoticias.php'); ?>
			<br />
            <br />
			
			<div class="tt_servicios negro">Videos |</div>
			<div id="cnt_videos"></div>
			<div class="remate"></div>
		</div>
        <script src="js/videos.js"></script>
		<?php require_once('footer.php'); ?>
		<?php require_once('cuerpo/menu-mv.php'); ?>
	</body>
</html>
