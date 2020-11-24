<?php 

	require_once("includes/sesion.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	
	encontrar_seccion_y_contenido_seleccionados();


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">


	<head>
		<?php include_once('includes/tags.php'); ?>
	</head>
	
	

	<body>

		<?php include_once('includes/cabezote.php'); ?>
		
		<?php include_once('includes/navegacion.php'); ?>
		
		<div id="cnt_edicion">
			<div id="col2"></div>
		</div>
		
		<script src="js/general.js" type="text/javascript"></script>
		<br />
		<br />
		

		<div id="footer"></div>
		
		
	</body>
	
</html>


<?php 
	if(isset($connection)){
		mysql_close($connection);
	}
?>


