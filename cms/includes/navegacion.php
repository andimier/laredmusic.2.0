<div id="navegacion">
	<div class="etiquetalogout">
		<a href="logout.php"
			onclick="return confirm('estas a punto de cerrar sesion, se perderan los cambios que no hayas guardado!')"
			>
				CERRAR SESIÓN
			</a>
	</div>
	<br />

	<div id="nav_fecha">
		<?php
			date_default_timezone_set('America/Bogota');
			$hoy = date("F j, Y, g:i a");
			echo $hoy;
		?>
	</div>
	<br />

	<div id="sitioyusuario">WWW.LAREDMUSIC.COM</div>

	<div id="usuario">
		<?php echo $_SESSION['username']; ?>
	</div>
	<br />
	<br />

	<div class="secciones">
		<?php echo $sections; ?>
	</div>

	<script>
		var navegacion = document.getElementById('navegacion');
		var margen = navegacion.offsetWidth;
		var col2 = document.getElementById('col2');

		col2.style.width = $(window).width() - margen + 'px';
		col2.style.marginLeft =  margen + 'px';
	</script>
</div>
