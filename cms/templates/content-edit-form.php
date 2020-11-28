<form
	style="clear:both;"
	enctype="multipart/form-data"
	name="formularioedicion1"
	id="formularioedicion1"
	action="crud/content-update.php"
	method="post"
	>

	<?php foreach($content_update_form_fields['hidden-fields'] as $key => $val): ?>
    	<input type="hidden" name="<?php echo $key; ?>" value="<?php echo $val; ?>"/>
	<?php endforeach; ?>

	<?php foreach($content_update_form_fields['inputs'] as $key => $val): ?>
		<input name="<?php echo $key; ?>" type="text" id="titulo" value="<?php echo $val; ?>" />
	<?php endforeach; ?>

	<?php if (isset($content_update_form_fields['active_tags'])): ?>
		<div class="tags-wrapper">
			<?php for ($i = 0; $i < count($content_update_form_fields['active_tags']); $i++): ?>
				<label>
					<input class="checkbox"
						name="<?php echo $content_update_form_fields['active_tags'][$i]; ?>-tag"
						type="checkbox"
						<?php echo in_array(
							$content_update_form_fields['active_tags'][$i],
							$content_update_form_fields['selected_tags']) ? 'checked' : '' ?>
					/>
					<?php echo $content_update_form_fields['active_tags'][$i]; ?>
				</label>
			<?php endfor; ?>
		</div>
	<?php endif; ?>

	<div id="cnt_botonesedicion">
		<img class="intLink" title="Quitar Formato" onClick="qFormato('removeFormat');" src="edicion/iconos/formato1.png">
		<img class="intLink" title="Negrilla" onClick="formatDoc('bold');"     src="edicion/iconos/bold.png" />
		<img class="intLink" title="Enlazar"  onClick="linkear('createLink');" src="edicion/iconos/link.png" />
		<img class="intLink" title="Desenlazar"  onClick="formatDoc('unlink');" src="edicion/iconos/unlink.png" />
		<img class="intLink" title="Subrayar"  onClick="formatDoc('underline');"   src="edicion/iconos/underline.png" />
		<img class="intLink" title="Lista"  onClick="formatDoc('insertUnorderedList');" src="edicion/iconos/bullets.png" />
	</div>

	<!--
	<p id="editMode"><input type="checkbox" name="switchMode" id="switchBox" onChange="setDocMode(this.checked);" /> <label for="switchBox">ver en HTML</label></p>
	-->

	<?php if(isset($content_update_form_fields['text-area'])): ?>
		<textarea
			style="display:none;"
			name="areadetexto"
			id="areadetexto"
			cols="100"
			rows="14">
		</textarea>

		<div id="caja1" contenteditable="true">
			<?php echo $content_update_form_fields['text-area']; ?>
		</div>
		<br />
	<?php endif; ?>

    <input
        type="submit"
        name="submit-content"
        id="boton1"
        class="boton1"
        value="Guardar"
        onClick="javascript:submit_form();"
    />
</form>

