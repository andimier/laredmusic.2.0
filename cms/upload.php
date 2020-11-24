
	<form enctype="multipart/form-data" method="post">
	
		
		
		<input type="file" 	 name="nombre_archivo" />
		
		<input type="submit" name="btn_upload" value="Subir Imagen"/>
	</form>
	



<?php



	if(isset($_POST['btn_upload']) ){
			
	
		$archivo = $_FILES['nombre_archivo'];  // ==> ARRAY !!!
		echo $archivo[0];
		$temp_path = $archivo['tmp_name'];
		
		echo $temp_path .'<br>';
	
		
		$nombre_archivo = basename($archivo['name']);
		$destino = "imagenes/"  . $nombre_archivo;
		
		
		echo $destino;
		
		if(move_uploaded_file($temp_path, $destino)){
	
		}else{
			echo "NADA" . mysql_error();
		}
		
		
	}
	
	
?>