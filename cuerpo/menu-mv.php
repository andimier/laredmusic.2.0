<nav id="menu_mv">
	<ul id="cnt_enlacesmv">
		<li><a class="enlaces_mv" href="index.php">INICIO</a></li>
		<li><a class="enlaces_mv" href="musicmasters.php">MUSIC MASTERS</a></li>
		<li><a class="enlaces_mv" href="videos.php">VIDEOS</a></li>
		<li><a class="enlaces_mv" href="servicios.php">SERVICIOS</a></li>
		<li><a class="enlaces_mv" href="portafolio.php">PORTAFOLIO</a></li>
		<li><a class="enlaces_mv" href="noticias.php">NOTICIAS</a></li>
		<li><a class="enlaces_mv" href="#dialog" name="modal">CONTACTO</a></li>
	</ul>
</nav>

<div id="boton_mv"></div>

<script>
	var abierto = false;

	InicioMenu();

	window.addEventListener('resize', AjustarMenu, false);

	function AjustarMenu() {
		InicioMenu();
	}

	function InicioMenu(){
		$('#menu_mv').css('height', '100%');

		if (abierto == true && $(window).width() > 1021) {
			$('#menu_mv').css('display', 'none');
			abierto = true;

		} else if (abierto == true && $(window).width() < 1020){
			$('#menu_mv').css('display', 'block');
			abierto = true;
		}
	}

	$('#boton_mv').click( function(){
		var btn_image = abierto ? 'url(diseno/btn-mv1.png)' : 'url(diseno/btn-mv2.png)';
		var display_type = abierto ? 'none' : 'block';

		$(this).css('background-image', btn_image);
		$('#menu_mv').css('display', display_type);

		abierto = !abierto;
	});
</script>
