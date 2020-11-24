

<div id="registro">

	<!--<div class="rec_rojo"></div>-->

	<div class="tt1 negro">REGISTRO</div>
  
	<? require_once('registro.php'); ?>

 
	<form  method="post">
	
		<div id="cnt_campos1">
	
			<div class="frm-nombrecampo">NOMBRE</div>
			<div class="frm-campo"><input type="text" name="nombre" class="form_nombre" ></div>
			<br />
			
			<div class="frm-nombrecampo">E- MAIL </div>
			<div class="frm-campo"><input type="text" name="mail" class="form_mail" ></div>
			<br />
		
			<div class="frm-nombrecampo">CIUDAD </div>
			<div class="frm-campo"><input type="text" name="nacionalidad" class="form_asunto"  ></div>
			
		</div>	
		
		
		
		<div id="cnt_campos2">
		
			<div class="frm-campofijo">
				SEXO : 				
				M
				<input type="checkbox" name="sexom" value="hombre" class="select" />
				F
				<input type="checkbox" name="sexof" value="mujer" class="select" />
			</div>
			
			
			<div class="f_comocampo">
				<div class="f_comotitulo">¿CÓMO NOS ENCONTRASTE?</div>
				<textarea id="caja" rows="3" name="fuente" class="form_mensaje" ></textarea>
			</div>
	
		</div>
		
		<input type="submit" name="enviarregistro" value="Enviar Datos" id="boton" />
	</form>

	
	
	<!--<div id="muneco"></div>-->
</div> <!-- CIERRRE REGISTRO -->