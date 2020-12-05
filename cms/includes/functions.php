<?php

	function redirect_to($location = NULL){
		if ($location !=NULL){
			header("Location: {$location}");
			exit;
		}
	}

	function confirm_query($result_set){
		if (!$result_set) {
			die("La busqueda en la Base de Datos fallo: " . phpMethods('error', null));
		}
	}

	function todas_las_secciones(){
		global $connection;
		$query = "SELECT * FROM secciones ORDER BY id ASC";

		$grupo_secciones = mysql_query($query, $connection);
		confirm_query($grupo_secciones);
		return $grupo_secciones;
	}

	function traer_seccion_por_id($seccion_id){
		global $connection;
		$query = "SELECT * FROM secciones WHERE id=" . $seccion_id ." LIMIT 1";

		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);

		if($seccion = mysql_fetch_array($result_set)){
			return $seccion;
		}else{
			return NULL;
		}
	}

	function todas_las_noticias(){
		global $connection;
		$q = "SELECT * FROM noticias ORDER BY fecha DESC";
		$r = phpMethods('query', $q);

		confirm_query($r);
		return $r;
	}

	function get_all_entries(){
		global $connection;
		$q = "SELECT * FROM entries ORDER BY fecha DESC";
		$r = phpMethods('query', $q);

		confirm_query($r);
		return $r;
	}

	function traer_noticia_por_id($noticia_id){
		global $connection;
		$q = "SELECT * FROM noticias WHERE id =" . $noticia_id ." LIMIT 1";
		$r = phpMethods('query', $q);
		confirm_query($r);

		if ($contenido = phpMethods('fetch-array', $r)) {
			return $contenido;
		}

		return NULL;
	}

	function traer_noticia_seleccionada(){
		global $noticia_seleccionada;

		if(isset($_GET['noticia_id'])){
			$sel_noticia = $_GET['noticia_id'];
			$noticia_seleccionada = traer_noticia_por_id($sel_noticia);
		}
	}

	function traer_contenido_por_id($contenido_id){
		global $connection;
		$query = "SELECT * FROM contenidos WHERE id =" . $contenido_id ." LIMIT 1";

		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);

		if($contenido = mysql_fetch_array($result_set)){
			return $contenido;
		}else{
			return NULL;
		}
	}

	function encontrar_seccion_y_contenido_seleccionados(){

		global $seccion_seleccionada;
		global $contenido_seleccionado;

		if(isset($_GET['seccion'])){
			$sel_seccion = $_GET['seccion'];
			$seccion_seleccionada = traer_seccion_por_id($sel_seccion);

			$sel_contenido = "";
			$contenido_seleccionado = NULL;

		}elseif(isset($_GET['contenido_id'])){
			$sel_contenido = $_GET['contenido_id'];
			$contenido_seleccionado = traer_contenido_por_id($sel_contenido);

			$sel_seccion = "";
			$seccion_seleccionada = NULL;

		}else{
			$sel_seccion = "";
			$sel_contenido = "";
			$seccion_seleccionada = NULL;
			$contenido_seleccionado = NULL;
		}
	}
?>