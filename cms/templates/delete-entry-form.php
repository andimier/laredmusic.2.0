<form action="crud/delete-entry.php" enctype="multipart/form-data" method="post">
    <input type="hidden" name="id" value="<?php echo $content_update_form_fields['id']; ?>"/>
    <input type="hidden" name="table" value="<?php echo $content_update_form_fields['table']; ?>"/>

    <?php if (isset($content_update_form_fields['image'])): ?>
        <input type="hidden" name="image" value="<?php echo $content_update_form_fields['image']; ?>"/>
    <?php endif; ?>

    <input type="submit"
        name="delete-entry"
        id="btn_eliminar1"
        value="<?php echo $content_update_form_fields['delete-entry-button-text']; ?>"
        onClick="return confirm('Esta acción eliminará definitivamente este contenido. ¿Quieres continuar?')"/>
</form>