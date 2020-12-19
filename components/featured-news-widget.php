<?php
	require_once('includes/connection.php');
	$query = "SELECT * FROM noticias ORDER BY fecha DESC LIMIT 2";
	$noticias = phpMethods('query', $query);
?>
