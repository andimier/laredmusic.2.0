<?php 

	require_once("includes/sesion.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	
	encontrar_seccion_y_contenido_seleccionados();
	
	require_once("edicion/noticias.php");
	

?>  


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">  

	<head>

		<?php include_once('includes/tags.php'); ?>

	</head>
	
	<body>
	
		
		
		
			
		<div id="col2">
			<div id='cnt_edicion'>
			
				<h3>Noticias</h3>
				
				
				<h4>Insertar nueva noticia</h4>
				
				Titluo:
				
				<form enctype="multipart/form-data" method="post">
					<input type="hidden" name="tabla"   value="imagenes_publicaciones" />
					<input type="text"   name="titulo"  value="" size="50" maxlength="50" />
					<br>
					<input type="submit" name="insertar_contenido" id="insertar_contenido" class="fondo_azul" value="Insertar Noticia"/>
				</form>
				<br>
				<div class="mensaje" style="color:#F00"> <?php echo $mensaje; ?></div>
				<br>
				<strong>Haz click sobre el titulo del contenido para editarlo.</strong>
				<br />
				<br />
				<br />
				
				
				<?php $grupo_noticias = todas_las_noticias(); ?>
				
				<ul>
					<?php while($not = mysql_fetch_array($grupo_noticias)): ?>
						<li>
						<a href="editar-noticia.php?noticia_id=<?php echo urlencode($not["id"]); ?> ">
							<?php echo $not["fecha"] . '<br /> <strong>' . $not["titulo"] . '</strong>'; ?>
						</a>
						</li>
		
					<?php endwhile; ?>
			    </ul>
	
			</div>
		</div>
		
		<?php require("includes/footer.php");?>
		
		<?php include_once('includes/cabezote.php'); ?>
		<?php include_once('includes/navegacion.php'); ?>
		
		<script src="js/general.js" type="text/javascript"></script>

	</body>
</html>


