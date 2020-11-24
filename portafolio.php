<?php require_once('contacto.php');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Portafolio Clientes - La Red Music</title>
		<meta name="description" content="Gerenciamos tu proyecto musical igual que lo hará una disquera, con la diferencia de que tu música, sigue siendo tuya!">
		<meta name="keywords" content="Nuestros clientes, nacionales, internacionales, américa latina, sello 360">
		<?php require_once('includes/requeridos.php'); ?>
		<link rel="stylesheet" type="text/css"  media="screen"   href="estilos/portafolio-gr.css"/>
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:481px) and (max-width:650px)" href="estilos/portafolio-md.css" />
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:50px) and (max-width:480px)" href="estilos/portafolio-pq.css" />
	</head>

	<body>
		<?php require_once('cabezote.php'); ?>

		<!--<div class="cambioidioma"><a href="english/portfolio.php">SWITCH TO ENGLISH</a></div>-->
		<div class="contenedor">
			<?php require_once('cuerpo/logosredes.php'); ?>

			<div class="pagina">
				<?php require_once('cuerpo/menunoticias.php'); ?>

				<div class="clientes">

					<br />
					<div class="tt_servicios rojo">NUESTROS CLIENTES</div>

					<br />
					<br />
					<div class="contenedorlogos"></div>

					<div class="corte"></div>

					<div class="tt_servicios negro">ALIADOS DIGITALES</div>

					<div class="contenedorlogos">

						<div class="cuadrologo"><img src="diseno/clientes/5.jpg" /></div>
						<div class="cuadrologo"><img src="diseno/clientes/1.jpg" /></div>
						<div class="cuadrologo"><img src="diseno/clientes/2.jpg" /></div>
						<div class="cuadrologo"><img src="diseno/clientes/3.jpg" /></div>
						<div class="cuadrologo"><img src="diseno/clientes/4.jpg" /></div>

						<div class="cuadrologo"><img src="diseno/clientes/6.jpg" /></div>
						<div class="cuadrologo"><img src="diseno/clientes/7.jpg" /></div>
						<div class="cuadrologo"><img src="diseno/clientes/8.jpg" /></div>
						<div class="cuadrologo"><img src="diseno/clientes/9.jpg" /></div>
						<div class="cuadrologo"><img src="diseno/clientes/10.jpg" /></div>
						<div class="cuadrologo"><img src="diseno/clientes/11.jpg" /></div>
						<div class="cuadrologo"><img src="diseno/clientes/12.jpg" /></div>
						<div class="cuadrologo"><img src="diseno/clientes/13.jpg" /></div>
					</div>

				</div>

				<div class="corte"></div>
		  </div>
		</div>
		<?php require_once('footer.php'); ?>
		<?php require_once('cuerpo/menu-mv.php'); ?>
		<script src="js/portafolio.js"></script>
	</body>
</html>
