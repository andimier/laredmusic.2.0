<?php //$message = ""; ?>

	<div id="cabezote">
		<div class="lineasuperior"></div>
		
		<div id="contenido-cabezote">
			<div id="logo"></div>
			
			<div id="contenedormenu">
			
				<!--<div class="guia"></div>-->
				
				<div class="enlaces"><a href="index.php">HOME</a></div>
				<div class="separador-rojo"></div>
				<div class="enlaces"><a href="servicios.php">SERVICES</a></div>
				<div class="separador-rojo"></div>
				<div class="enlaces"><a href="portafolio.php">PORTFOLIO</a></div>
				<div class="separador-rojo"></div>
				<div class="enlaces"><a href="noticias.php">NEWS</a></div>
				<div class="separador-rojo"></div>
				<div class="enlaces"><a href="#dialog" name="modal">CONTACT US</a></div>
                
			</div>
		</div>
		
		
		<div class="logosredes">
			<!--<div class="cambioidioma">CAMBIAR A INGLÉS</div>-->
			<div class="logored"><a href="https://www.facebook.com/pages/La-Red-Music-Entertainment/105440702821960" target="_blank" ><img src="diseno/inicio/facebook.png" width="32" /></a>
			</div>
			<div class="logored"><a href="https://twitter.com/#!/LaRedMusic" target="_blank"><img src="diseno/inicio/twitter.png" width="32" /></a></div>
           	<div class="logored"><a href="http://laredmusicentertainment.blogspot.com/" target="_blank"><img src="diseno/inicio/blogger.png" width="32" /></a></div>
        </div><!-- CIERRRE LOGOS REDES -->
            
        <!-- FORMULARIO DE CONTACTO -->
        <div id="boxes">
			<div id="dialog" class="window">
				<div class="titulo_formulario">
					CONTACT US
					<br />info@laredmusic.com
				</div>
			
				<br />
                
				<div class="mensaje">
					<?php 	require_once('contacto.php');
						//echo $message; 
					?>
				</div>
				<br />
			
				<form method="post">
					<div class="campos_formulario">NAME </div>
					<input type="text" name="nombre" class="form_nombre" size="65" ><br />
					<div class="campos_formulario">E-MAIL </div>
					<input type="text" name="mail" class="form_mail" size="65"><br />
					<div class="campos_formulario"> MESSAGE</div>
					<textarea rows="3" name="mensaje" class="form_mensaje" cols="50"></textarea><br /><br />
					&nbsp;<input type="submit" name="enviarcontacto" value="Enviar Datos" class="boton" />
				</form>
				<br />
				<br />
			
				<div class="cerrar_formulario"> <a href="#"class="close"/>CLOSE</a></div>
            </div>
            <div id="mask"></div>
        </div><!-- CIERRE FORMULARIO -->
		

	  <div class="lineasuperior"></div>
	</div><!-- CIERRE CABEZOTE -->