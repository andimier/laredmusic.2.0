<form enctype="multipart/form-data" action="crud/create-content.php" method="post">
    <input type="hidden"
        name="table"
        value="<?php echo $content_creation_form_props['table']; ?>"
    />

    <?php foreach($content_creation_form_props['required-fields'] as $field): ?>
        <label>
            <div><?php echo $field; ?></div>
            <input type="text"
                name="<?php echo $field; ?>"
                value="" size="50"
                maxlength="50"
                required
            />
        </label>
    <?php endforeach; ?>
    <br>

    <input type="submit"
        name="create-content"
        id="insertar_contenido"
        class="fondo_azul"
        value="<?php echo $content_creation_form_props['input-text']; ?>"
    />
</form>