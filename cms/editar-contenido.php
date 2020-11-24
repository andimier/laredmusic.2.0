<?php
	require_once("includes/requeridos.php");
	
	$mensaje = "";
			
	if(intval($_GET['contenido_id']) == 0){
		header("Location: content.php");	
		exit;
		
	}else{
		
	}

	require_once('edicion/cambioimagen1.php');	
	require_once("edicion/actualizaciondecontenidos.php");
	
	encontrar_seccion_y_contenido_seleccionados(); //Sí esto se pone al inicio del documento, al actualizar no se ven los cambios, pero sí se hacen 

	//========== PARAMETROS FORMULARIO ACTUALIZACION DE CONTENIDOS =================//
	
	$tabla 	   = "contenidos";
	$id        = $contenido_seleccionado['id'];
	$posicion   = $contenido_seleccionado['posicion'];
		
	$titulo    = $contenido_seleccionado['titulo']; 
	$contenido = $contenido_seleccionado['contenido'];
	$seccion   = $contenido_seleccionado['seccion_id'];

	$imagenprincipal = $contenido_seleccionado['imagen1'];
	$img = $contenido_seleccionado['imagen2'];
	
	
	//================= PARÁMETROS PARA EL ARCHIVO DE ELIMINAR =======================//
	
	$indice   = $contenido_seleccionado['indice'];
	$borrable  = $contenido_seleccionado['borrable'];
	
	$tituloboton = "Eliminar";
	$archivo_eliminar = 'edicion/eliminar-contenidos.php';
	
	require_once("cabeza.php");

?>

<div class="col2">

    <div class="titulos1"><?php echo $contenido_seleccionado['titulo'];?></div>
	<br />
	
	
	<?php if( $indice > 1 && $posicion == 1): ?>
	
	<?php else: ?>
		<div class="titulo-rojo">Editar en:
			<a href="puente.php?contenido_id=<?php echo $id; ?>&seccion=<?php echo $seccion; ?>&indice=<?php echo $indice; ?>"> Inglés</a> - 
			<a href="puente2.php?contenido_id=<?php echo $id; ?>&seccion=<?php echo $seccion; ?>&indice=<?php echo $indice; ?>"> Portugués</a>
		</div>
		
	<?php endif; ?>
	
	
    <div class="mensaje"> <?php echo $mensaje; ?></div>
	<br />	
	
	<div id="formulario">
    <?php require_once("edicion/formularioedicion1.php"); ?>
	<?php 
		
		if( $borrable == 1){
			require_once("edicion/formularioeliminar1.php"); 
		}else{
		
		}
		
		
	?>   
    </div>
</div>

<div class="col3" >
	<!-- ============================= IMAGEN PRINCIPAL DEL CONTENIDO =============================-->
	<?php require_once('edicion/imagenprincipal.php'); ?>
</div>

<?php require("includes/footer.php");?>
