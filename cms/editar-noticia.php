<?php
	require_once("includes/requeridos.php");
	
	$mensaje = "";
	$mensaje2 = "";
	$mensaje_img = "";
	$mensajeimagen = "";
		
	if(intval($_GET['noticia_id']) == 0){
		header("Location: noticias.php");	
		
	}else{
		$id = $_GET['noticia_id'];
		//$grupo_imagenes = traer_imagenes_publicacion_por_id($id); 
	}
	
	require_once('edicion/edc_imagenes/img_cambio.php');
	require_once("edicion/act_contenidos.php");
	
	traer_noticia_seleccionada(); 
	//Sí esto se pone al inicio del documento, al actualizar no se ven los cambios, pero sí se hacen 
	
	//========== PARAMETROS FORMULARIO ACTUALIZACION DE CONTENIDOS =================//
	
	$tabla      = "noticias";
	$id        	= $noticia_seleccionada['id'];
	$fecha     	= $noticia_seleccionada['fecha'];
	$titulo    	= $noticia_seleccionada['titulo']; 
	$alt    	= $noticia_seleccionada['alt']; 
	$contenido 	= $noticia_seleccionada['contenido'];
	
	$imagenprincipal = $noticia_seleccionada['imagen1'];
	
	$tituloboton = "Eliminar";

	
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">


	<head>

		<?php include_once('includes/tags.php'); ?>

	</head>
	
	<body>
	
		

		<div id="col2">
			<div id="cnt_edicion">
				
				<h3><?php echo $noticia_seleccionada['titulo'];?></h3>
				<br />
				<?php echo $mensaje; ?>	
				<?php $archivo_eliminar = 'edicion/eliminarnoticia.php'; ?>
				<?php require_once('edicion/edc_imagenes/img_principal.php'); ?>
				<?php require_once("edicion/formularioedicion1.php");	?>
				
				<br />
				<br />
				
				
				
				<div id="col4" >
				<?php require_once("edicion/formularioeliminar1.php"); ?>
				</div>
				
			</div>
			
   
			
			
			
		</div>	
		
		<div id="footer"></div>
		
		<?php include_once('includes/cabezote.php'); ?>
		<?php include_once('includes/navegacion.php'); ?>
		<script src="js/general.js" type="text/javascript"></script>
		
		
	</body>
<html>

<?php 
	if(isset($connection)){
		mysql_close($connection);
	}
?>