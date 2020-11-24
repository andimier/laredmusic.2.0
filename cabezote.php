<?php //$message = ""; ?>

	<div id="cabezote">
		
		
		<div id="contenido-cabezote">
		
			<div id="logo"><img alt="La Red Music Entertainment" src="diseno/inicio/logoinicio.jpg" /></div>
			
			<div id="contenedormenu">
			
				<!--<div class="guia"></div>-->
				
				<div class="enlaces"><a href="index.php">INICIO</a></div>
				<div class="separador-rojo"></div>
				<div class="enlaces"><a href="videos.php">VIDEOS</a></div>
				<div class="separador-rojo"></div>
				
				<div class="enlaces"><a href="servicios.php">SERVICIOS</a></div>
				<div class="separador-rojo"></div>
				
				<div class="enlaces"><a href="portafolio.php">PORTAFOLIO</a></div>
				<div class="separador-rojo"></div>
				<div class="enlaces"><a href="noticias.php">NOTICIAS</a></div>
				<div class="separador-rojo"></div>
				<div class="enlaces"><a href="#dialog" name="modal">CONTACTO</a></div>
				
				<!--<div class="google">
				<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
				<div class="g-plus" data-href="https://plus.google.com/102497778102576922152" rel="author" style="width:170px; height:69px;" ></div>
				-->
			</div>
                
			</div>
			
			
		</div>
		
		
		
            
        <!-- FORMULARIO DE CONTACTO -->
        <div id="boxes">
			<div id="dialog" class="window">
				<div class="titulo_formulario">
					CONTACTO
					<br />info@laredmusic.com
				</div>
			
				<br />
                
				<div class="mensaje">
					<?php 	require_once('contacto.php'); ?>
				</div>
				
				<br />
			
				<form method="post">
					<div class="campos_formulario">NOMBRE </div>
					<input type="text" name="nombre" class="form_nombre" size="65" ><br />
					<div class="campos_formulario">E-MAIL </div>
					<input type="text" name="mail" class="form_mail" size="65"><br />
					<div class="campos_formulario"> MENSAJE</div>
					<textarea rows="3" name="mensaje" class="form_mensaje" cols="50"></textarea><br /><br />
					&nbsp;<input type="submit" name="enviarcontacto" value="Enviar Datos" class="boton" />
				</form>
				<br />
				<br />
			
				<div class="cerrar_formulario"> <a href="#"class="close"/>CERRAR</a></div>
            </div>
            <div id="mask"></div>
        </div><!-- CIERRE FORMULARIO -->
		

	  
	</div><!-- CIERRE CABEZOTE -->