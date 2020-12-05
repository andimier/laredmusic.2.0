<a href="<?php echo 'editar-imagen.php?contenido_id='.$id.'&src='.$content_update_form_fields['image']; ?>">
    <img src="<?php echo $content_update_form_fields['image']; ?>" width="165"/>
</a>

<div class="cnt_nuevo_archivo">
    <form enctype="multipart/form-data"
        method="post"
        action="crud/update-entry-image.php"
    >
        <input type="hidden" name="contenido_id" value="<?php echo $content_update_form_fields['id']; ?>" />
        <input type="hidden" name="tabla" value="<?php echo $content_update_form_fields['table']; ?>" />
        <input type="hidden" name="ruta" value="<?php echo $content_update_form_fields['image']; ?>" />

        <div id="fileUpload">
            <input id="btn_foto" type="button" value="escoge una imagen" class="mascara">
            <input id="foto" type="file" name="nombre_archivo"  class="upload" onchange="myFunction(this.value)" >
        </div>

        <p id='nm_imagen'></p>

        <input id="bsubirimg"
            class="fondo_negro"
            type="submit"
            name="update-entry-image"
            value=""
        />
    </form>
</div>

<script>
    function myFunction(val) {
        var rutaimagen = val.split('fakepath');
        var laimagen = rutaimagen[rutaimagen.length-1];
        $("#nm_imagen").text(laimagen);
        $("#bsubirimg").css('display', 'block');
        $(".cnt_nuevo_archivo").css('height', '150px');
    };
</script>
