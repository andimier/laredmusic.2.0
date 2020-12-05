<?php
    require_once("../cnx/session.php");
    require_once("../cnx/connection.php");
    require_once('../../utils/phpfunctions.php');

    if (!isset($_POST['delete-entry']) ||
        !isset($_POST['id']) ||
        !isset($_POST['table'])
    ) {
        echo 'no estamos borrando nada';
        return;
    }

    $id = $_POST['id'];
    $table = $_POST['table'];

    $can_delete_image = false;
    $default_images = [
        '../iconos/photo2.png',
        './iconos/photo.png',
        './iconos/default-image.png'
    ];

    if (isset($_POST['image']) &&
        !empty($_POST['image']) &&
        !in_array($_POST['image'], $default_images))
    {
        $can_delete_image = true;
    }

    if ($can_delete_image) {
        $image = $_POST['image'];
        $file_list = explode("/", $image);
        $file_to_delete  = $file_list[count($file_list) - 1];

        $small_image = "../imagenes/pequenas/" . $file_to_delete;
        $mediuml_image = "../imagenes/medianas/" . $file_to_delete;
        $large_image = "../imagenes/grandes/" . $file_to_delete;

        unlink($small_image);
        unlink($mediuml_image);
        unlink($large_image);
    }

    $query = "DELETE FROM $table WHERE id = {$id} LIMIT 1";

    try {
        $result = phpMethods('query', $query);
    } catch (Exeptin $error) {
        echo $error;
    }

    switch ($table) {
		case 'noticias':
			$location .= 'Location: ../noticias.php';
			break;
		case 'entries':
			$location .= 'Location: ../edit-section.php';
			break;
	}

    header($location);
?>
