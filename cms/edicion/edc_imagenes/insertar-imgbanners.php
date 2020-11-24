<?php
	$message = "";
	//============================= INSERCION DE LA IMAGEN ========================================
	
	if(isset($_POST['insertarimagen'])){
		
		$variacion = 0;
				
		$tabla   = $_POST['tabla'];
		$id      = $_POST['campo_id'];
		$campo 	 = $_POST['campo'];
		$idioma  = $_POST['idioma'];
		
		
		$archivo = $_FILES['nombre_archivo'];  // ==> ARRAY !!
		
		$temp_path      = $archivo['tmp_name'];
		$tamano_archivo = $archivo['size'];
		$error_archivo  = $archivo['error'];
		
		$nombre_archivo = basename($archivo['name']);
			
		//echo $temp_path;
		//echo $tamano_archivo;
		//echo $error_archivo;
		
		$randomdigit = rand(0000,9999);
		$nombre_archivo = $randomdigit . $nombre_archivo;
		
		// $max_file_size = 1048576; 1 mega
		$max_file_size = 5242880; //5 megas
		
	
		if( !$archivo ){
		
			$mensaje = "ERROR: No se ha subido ningun archivo! <br /><br />";
			
		}else if( $tamano_archivo > 5242880 ) { // if file size is larger than 5 Megabytes
		
			$mensaje = "ERROR: El archivo supera las 5megas de peso  <br /><br />";
			//unlink($temp_path); // Remove the uploaded file from the PHP temp folder
			//exit();
			
		}else if( $error_archivo !=0 ){
			
			$mensaje = "ERROR: Es posible que la imagen supere las 5megas de peso o sea muy grande. <br />
						Por favor reduce la imagen e inténtalo de nuevo.  <br /><br />";
					
		}else{
			
			$kaboom = explode(".", $nombre_archivo); 
			$ext_archivo = $kaboom[1];
		
			$destino = "imagenes/grandes/"  . $nombre_archivo;
			
			$ruta1   = "imagenes/pequenas/" . $nombre_archivo;
			$ruta2   = "imagenes/medianas/" . $nombre_archivo;
			$ruta3   = "imagenes/grandes/"  . $nombre_archivo;
			
			if(move_uploaded_file($temp_path, $destino)){
				//echo "SIII";
				$sql  = "INSERT INTO $tabla ($campo, idioma, imagen1, imagen2, imagen3) VALUES ($id, '$idioma', '$ruta1', '$ruta2', '$ruta3')";
				
				if($update = mysql_query($sql, $connection)){
					
					if(mysql_affected_rows()==1){
						$mensaje = 'Imagen insertada correctamete! <br /><br />';
						//header('Location: '. $redireccion);
					}else{
						$mensaje = "Falló!!<br />" . mysql_error();
					}
						
					//======== REDUCCION DE IMAGEN ======================================================
					
					require_once("reduccionimagenes.php");
				
					$archivo_origen   =  $ruta3;
					$destino_medianas =  $ruta2;
					$ruta_pequenas = $ruta1;
					
					//Estos valores son para las imagenes medianas.
					$wmax = 960;
					$hmax = 404;
					reducir_imagen($archivo_origen, $destino_medianas, $wmax, $hmax, $ext_archivo, $ruta_pequenas);
					
				}else{
					echo mysql_error();
				}
				
			}else{
				//$mensajeimagen = "NADA" . mysql_error();
			}
		}
	}
	
	
?>

