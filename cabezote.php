<div id="cabezote">
	<div id="contenido-cabezote">
		<div id="logo">
			<img alt="La Red Music Entertainment" src="diseno/inicio/logoinicio.jpg" />
		</div>

		<nav>
			<ul id="contenedormenu">
				<li class="enlaces"><a href="index.php">INICIO</a></li>
				<li class="enlaces"><a href="musicmasters.php">MUSIC MASTERS</a></li>
				<li class="enlaces"><a href="videos.php">VIDEOS</a></li>
				<li class="enlaces"><a href="servicios.php">SERVICIOS</a></li>
				<li class="enlaces"><a href="portafolio.php">PORTAFOLIO</a></li>
				<li class="enlaces"><a href="noticias.php">NOTICIAS</a></li>
				<li class="enlaces"><a href="#dialog" name="modal">CONTACTO</a></li>
			</ul>
		</nav>
	</div>

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
	</div>
</div>