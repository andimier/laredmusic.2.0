<?php
    function getAllNews() {
        $q = "SELECT * FROM noticias ORDER BY fecha DESC";
        $r = phpMethods('query', $q);

        return $r;
    }

    $noticias = getAllNews();
?>