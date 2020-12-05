<?php
    require_once("../cnx/session.php");
    require_once("../cnx/connection.php");

    require_once("../../utils/phpfunctions.php");

    require_once("../components/image-resize.php");

	if (!isset($_POST['update-entry-image'])) {
        header('Location: ../editar-noticia.php?noticia_id=' . $id  . '&errorMessage=Error. no se entregó el id');
        exit;
    }

    $tabla  = $_POST['tabla'];
    $id = $_POST['contenido_id'];
    $ruta = $_POST['ruta'];

    // SI LA IMAGEN VIENE DE UN SUBCONTENIDO
    if (isset($_POST['texto_id'])) {
        $contenido = $_POST['contenido'];
        $texto_id = $_POST['texto_id'];
    }

    if (isset($_POST['sub-contenido'])) {
        $subcontenido = $_POST['sub-contenido'];
    }

    $archivo = $_FILES['nombre_archivo'];  // ==> ARRAY !!!
    $temp_path = $archivo['tmp_name'];

    $nombre_archivo = basename($archivo['name']);

    // FILTRO Y REMPLAZO DENOMBRE DEL ARCHIVO ORIGINAL
    $nombre_archivo = preg_replace('#[^a-z.0-9_-]#i', "-", $nombre_archivo);

    $ex_ext = explode('.', $nombre_archivo);
    $extension = end($ex_ext);

    $error_message = '';

    if ($_FILES['nombre_archivo']['error'] == 1) {
        $error_message .= 'El archivo que seleccionaste es demasiado grande';
    }

    if ($_FILES['nombre_archivo']['error'] == 4) {
        $error_message .= 'No has seleccionado una imagen. ';
    }

    if (file_exists('../imagenes/pequenas/' . $nombre_archivo)) {
        $error_message .= 'El archivo ya existe, seleciona otro diferente o cambia el nombre. ';
    }

    $valid_file_extensions = [
        'jpg',
        'png'
    ];

    if ($extension != $valid_file_extensions[0] && $extension != $valid_file_extensions[1]) {
        $error_message .= 'El tipo de archivos no es valido';
    }

    if (!empty($error_message)) {
        header('Location: ../editar-noticia.php?noticia_id=' . $id  . '&errorMessage=' . $error_message);
        exit;
    }

    $arr = explode('/', $ruta);
    $file_for_deletion = $arr[count($arr) - 1];

    $current_small_file = "../imagenes/pequenas/" . $file_for_deletion;
    $current_medium_file = "../imagenes/medianas/" . $file_for_deletion;
    $current_large_file = "../imagenes/grandes/"  . $file_for_deletion;

    $default_files = [
        'photo.png',
        'photo2.png',
        'default-image.png'
    ];

    if (!in_array($file_for_deletion, $default_files) && file_exists($current_small_file)) {
        unlink($current_small_file);
        unlink($current_medium_file);
        unlink($current_large_file);
    }

    $target_file = "../imagenes/grandes/"  . $nombre_archivo;

    $is_file_uploaded = false;

    try {
        move_uploaded_file($temp_path, $target_file);
        $is_file_uploaded = true;
    } catch (Exception $e) {
        echo $error_message . $e;
    }

    if (!$is_file_uploaded) {
        $error_message .= 'No se pudo subir el archivo. ' . phpMethods('error', null);
        header('Location: ../editar-noticia.php?noticia_id=' . $id  . '&errorMessage=' . $error_message);
        exit;
    }

    $base_path = "./imagenes/";
    $large = $base_path . "grandes/" . $nombre_archivo;
    $medium = $base_path . "medianas/" . $nombre_archivo;
    $small = $base_path . "pequenas/" . $nombre_archivo;

    if ($tabla == 'textos_contenidos') {
        $q_txt  = "UPDATE textos_contenidos SET imagen1 = '{$small}', imagen2 = '{$medium}', imagen3 = '{$large}' WHERE texto_id = $id";
        $u_txt = mysql_query($q_txt, $connection);
    }

    $q = "UPDATE $tabla SET imagen1 = '{$small}', imagen2 = '{$medium}', imagen3 = '{$large}' WHERE id = $id";
    $r = phpMethods('query', $q);

    if (!$r) {
        $error_message .= 'Falló la actualización de la base de datos' . phpMethods('error', null);
        header('Location: ../editar-noticia.php?noticia_id=' . $id  . '&errorMessage=' . $error_message);
        exit;
    }

    $ruta1 = "../imagenes/pequenas/" . $nombre_archivo;
    $ruta2 = "../imagenes/medianas/" . $nombre_archivo;
    $ruta3 = $target_file;

    reducir_imagen($ruta3, $ruta2, $extension, $ruta1);
    header('Location: ../editar-noticia.php?noticia_id=' . $id  . '&contentUpdate=true');
?>

