<?php require_once('contacto.php');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Clientes - La Red Music</title>
<?php require_once('includes/requeridos.php'); ?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33016105-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>

<body>
	<?php require_once('cabezote.php'); ?>

	<!--<div class="cambioidioma"><a href="english/portfolio.php">SWITCH TO ENGLISH</a></div>-->
	<div class="contenedor">

		<div class="pagina">
			<?php require_once('cuerpo/menunoticias.php'); ?>
			<div class="clientes">
             
				<div id="tituloclientes">NUESTROS CLIENTES</div>
				
				<?php include_once('cuerpo/portafolio.php'); ?>
			
				<div class="corte"></div>  
			
				<div id="tituloaliados">ALIADOS DIGITALES</div>
				
				<div class="contenedorlogos">
                    <div class="cuadrologo"><img src="diseno/clientes/5.jpg" /></div>
                	<div class="cuadrologo"><img src="diseno/clientes/1.jpg" /></div>
                    <div class="cuadrologo"><img src="diseno/clientes/2.jpg" /></div>
                    <div class="cuadrologo"><img src="diseno/clientes/3.jpg" /></div>
                    <div class="cuadrologo"><img src="diseno/clientes/4.jpg" /></div>
                        
					<div class="cuadrologo"><img src="diseno/clientes/6.jpg" /></div>
                    <div class="cuadrologo"><img src="diseno/clientes/7.jpg" /></div>
                    <div class="cuadrologo"><img src="diseno/clientes/8.jpg" /></div>
                    <div class="cuadrologo"><img src="diseno/clientes/9.jpg" /></div>
                    <div class="cuadrologo"><img src="diseno/clientes/10.jpg" /></div>
                    <div class="cuadrologo"><img src="diseno/clientes/11.jpg" /></div>
                    <div class="cuadrologo"><img src="diseno/clientes/12.jpg" /></div>
                    <div class="cuadrologo"><img src="diseno/clientes/13.jpg" /></div>
				</div>
                    
            </div><!--Ciere Clientes-->
			<div class="corte"></div> 
        
	  </div><!--CIERRE PAGINA-->
	</div><!--CIERRRE CONTENEDOR-->

	<?php require_once('footer.php'); ?>
    
</body>
</html>
