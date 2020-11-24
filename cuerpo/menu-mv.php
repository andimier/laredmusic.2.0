

<div id="menu_mv">

	
	<div id="cnt_enlacesmv">

		<a class="enlaces_mv" href="index.php">INICIO</a>
		<a class="enlaces_mv" href="videos.php">VIDEOS</a>
		<a class="enlaces_mv" href="servicios.php">SERVICIOS</a>
		<a class="enlaces_mv" href="portafolio.php">PORTAFOLIO</a>
		<a class="enlaces_mv" href="noticias.php">NOTICIAS</a>
		<a class="enlaces_mv" href="#dialog" name="modal">CONTACTO</a>
	
	</div>
	
</div>

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
		
		if(abierto == true && $(window).width() > 801 ){
			$('#menu_mv').css('display', 'none');
			abierto = true;
			
		}else if( abierto == true && $(window).width() < 800 ){
			$('#menu_mv').css('display', 'block');
			abierto = true;
		}
		//console.log(abierto)

		
	}
	
	$('#boton_mv').click(function(){
		
		if(abierto == false){
			$(this).css('background-image','url(diseno/btn-mv2.png)');
			
			$('#menu_mv').css('display', 'block');
			
			abierto = true;
			
		}else{
			$(this).css('background-image','url(diseno/btn-mv1.png)');
			$('#menu_mv').css('display', 'none');
			abierto = false;
			
		}
		//console.log(abierto)
	});

	
	
	
	

</script>