<?php
    function getAllNews() {
        $q = "SELECT * FROM noticias ORDER BY fecha DESC";

        return phpMethods('query', $q);;
    }

    function getSingleNews($get) {
        $id = $get;
        $q = "SELECT * FROM noticias WHERE id = " . $id;

		return phpMethods('query', $q);
    }

    $selected_news_id = isset($_GET['noticia']) ? $_GET['noticia'] : null;

    if ($selected_news_id != null) {
		$noticias = getSingleNews($selected_news_id);
	} else {
        $noticias = getAllNews();
    }
?>
