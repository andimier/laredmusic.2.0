<form style="clear:both;" enctype="multipart/form-data" name="formularioedicion1" id="formularioedicion1" method="post">
	<input type="hidden" name="id"     value="<?php echo $id;?>"/>
	<input type="hidden" name="tabla"  value="<?php echo $tabla;?>"/>
	<input name="titulo" type="text" id="titulo" value="<?php echo $titulo ?>" />
	<input name="fecha"  type="text" id="fecha"  value="<?php echo $fecha ?>"  size="50" maxlength="50" />

	<br />
	<br />

	Descripcion Imagen:
	<br />
	<br />
	<input name="alt" type="text" id="titulo"  value="<?php echo $alt; ?>" size="50" maxlength="50"/>
	<br />
	<br />
	<br />

	<label>
		<input class="checkbox" name="music-masters" type="checkbox"/>Music Masters
	</label>

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

	<textarea style="display:none;" name="areadetexto" id="areadetexto" cols="100" rows="14"></textarea>
	<div id="caja1" contenteditable="true"><?php echo $contenido; ?></div>
	<br />

	<input type="submit" name="boton1" id="boton1" class="boton1" value="Guardar" onClick="javascript:submit_form();"/>
</form>

