<?php 
	require_once('includes/connection.php'); 
	$query = "SELECT * FROM noticias ORDER BY fecha DESC LIMIT 6";
	$noticias = mysql_query($query, $connection);

?>

	<div id="quienessomos">
	
		<div class="tituloquienessomos"><a name="quienes" >QUIENES SOMOS</a></div>
	
		<div class="cuadronegro">
		
			<!-- VIDEO -->
			<!--<div class="titulovideo2"><img src="../diseno/inicio/titulovideo.jpg" /></div>-->
			<!--<div class="reel">
				<a class="preview2" href="diseno/inicio/comingsoon.jpg">
				<img alt="gallery thumbnail" src="diseno/inicio/marcovideo3.png" />
				</a>
			</div>-->
			<!-- VIDEO -->
						
			<div class="textoquienessomos">
				La Red Music Entertainment es una empresa Colombo- Americana basada en Bogot�, 
				Colombia y con afiliados en Estados Unidos, Puerto Rico y Sur Am�rica. Manejada por dos 
				profesionales con amplia experiencia en la industria de la musica Internacional.<br /><br />

				Hemos trabajado con m�s de 60 artistas del la talla de: Ricardo Arjona, Illya Kuryaki & the Valderramas, 
				Juan Luis Guerra, Carlos Vives, Julieta Venegas, Fonseca, RBD, Bebe, Diego Torres, Ricardo Montaner, 
				Gustavo Cerati, Mauricio & Palo de Agua, Ilona, Jerau, Golpe a Golpe, Adriana Bottina, 
				Sebasti�n Yepes, entre otros..<br /><br />

				Con m�s de 15 a�os de experiencia en �reas como: Marketing, Gerencia de Proyectos, 
				Booking y Eventos a Gran Escala, Emprendimiento y Formaci�n en Industrias, Administracion de Publishing, 
				Comunicaciones Estrat�gicas, Asesorias de A&R. <br /><br />

				Entendemos el valor de la m�sica y tambi�n las necesidades de un artista. 
				Ofrecemos servicios que las grandes disqueras ofrecen y, contamos con una red 
				de profesionales de la industria que trabajan con nostoros constantemente 
				en proyectos de diferente indole.<br /><br />

				No solo nos enfocamos en el desarollo del artista, si no tambi�n trabajamos 
				con marcas reconocidas para asistirlas en la b�squeda de talento para sus estrategias 
				de mercadeo. Tambi�n ofrecemos servicios de consultor�a empresarial para ayudar evualuar 
				y desarollar estrategias adaptadas a las necesidades de nuestros clientes.

			</div><!--CIERRE TEXTOQUIENESOMOS-->
		</div><!--CIERRE CUADRONEGRO-->
	</div><!--CIERRRE QUIENES SOMOS-->
	
	
	
	

	<div class="noticias_inicio">
		<div class="ultimasnoticias_inicio">�LTIMAS NOTICIAS</div>
		<div class="masnoticias_inicio"><a href="noticias.php">M�S NOTICIAS AQU� + </a></div>
		
		<!--==================== Comienzo Noticias ==========================-->
        <?php while($noticia = mysql_fetch_array($noticias)): ?>
		
			<div class="cnt-noticia-inicio">
			
				<div class="thumb-noticia-inicio"><img src="cms/<?php echo $noticia['imagen1']; ?>" width="40" height="40"/></div>
				<div class="noticia_inicio">         
					<div class="fechanoticia_inicio"><?php echo $noticia['fecha']; ?></div>
					<div class="titulonoticia_inicio"><a href="noticias.php"><?php echo $noticia['titulo']; ?></a></div>
				</div>
				
			</div>
			
		<?php endwhile; ?>
		
		
		   
        
        <!-- LOGO MICROFONO CON NOTICIAS -->
		<div id="micro"><img src="diseno/inicio/micro.jpg" width="130" /></div> 
		<div class="masnoticias_inicio2"><a href="noticias.php">+MAS NOTICIAS AQUI</a></div>
	</div><!--CIERRE NOTICIAS-->
	
	
