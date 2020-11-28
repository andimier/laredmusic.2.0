<?php
    require_once("../cnx/session.php");
    require_once("../cnx/connection.php");
    require_once('../../utils/phpfunctions.php');

    if (!isset($_POST['delete-entry']) ||
        !isset($_POST['id']) ||
        !isset($_POST['table']) ||
        !isset($_POST['image'])

    ) {
        echo 'no estamos borrando nada';
        return;
    }

    $id = $_POST['id'];
    $tabla = $_POST['table'];
    $image = $_POST['image'];

    if (!empty($image) &&
        $image != '../iconos/photo2.png' &&
        $image != './iconos/photo.png' &&
        $image != './iconos/default-image.png'
    ) {
        $explotarnombre = explode("/", $image);
        $nombrearchivo  = $explotarnombre[2];

        $nombreA = "../imagenes/pequenas/" . $nombrearchivo;
        $nombreB = "../imagenes/medianas/" . $nombrearchivo;
        $nombreC = "../imagenes/grandes/"  . $nombrearchivo;

        unlink($nombreA);
        unlink($nombreB);
        unlink($nombreC);
    }

    try {
        $query = "DELETE FROM $tabla WHERE id = {$id} LIMIT 1";
        $result = phpMethods('query', $query);
        header("Location: ../noticias.php");
    } catch (Exeptin $error) {
        echo $error;
    }
?>
