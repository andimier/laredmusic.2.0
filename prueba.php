
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta name="viewport" content="width=device-width , initial-scale=1 , user-scalable=no"/>
		<script type="text/javascript" src="js/jquery-1.6.3.min.js"></script>
		<style>
			
			body{
				margin:0;
				
			}
			#output{
				width:200px;
				height:200px;
				background-color:#f00;
				font-size:26px;
			}
			#output2{
				width:200px;
				height:200px;
				background-color:#ff0;
				font-size:26px;
			}
			
			#cosa{
				width:100%;
				height:1000px;
				background-color:#f00;
				font-size:26px;
			}
		</style>
	</head>

	<body>

		<div id="output"></div>
		<div id="output2"></div>
		
		<div id="cosa"></div>
		
		<script>
			//document.getElementById('output').innerHTML = window.innerWidth +' x '+ window.innerHeight;
			document.getElementById('output').innerHTML = $('#cosa').width();
			var output = document.getElementById('output');
			
			$('#output2').text($(window).width() +' x ' +$(window).height());
			
			window.addEventListener('resize', function(){
				$('#output2').text($(window).width() +' x ' +$(window).height());
			});
			
			
			// PLAYLIST
			//
			
			var canciones = new Array('media/vau.mp3','media/2800.mp3','media/blondie.mp3');
			console.log(canciones.length)
			//var songName = e.target.getAttribute('data-src');
			

			var audioPlayer = document.createElement('audio');
			var numero = 0;
			
			//Rep();
			
			
			function Rep(){
				
				if(numero == 0){
					cancion = canciones[0];
				}else if(numero < canciones.lenght -1){
					audioPlayer.stop();
				}else{
					cancion = canciones[numero];
				}
				
				
				audioPlayer.id = 'player';
				//audioPlayer.src = songName;
				audioPlayer.src = cancion;
				
				document.body.appendChild(audioPlayer);
				audioPlayer.play();
				
				output.innerHTML = cancion;
				
				
			}
			
			/*
			audioPlayer.addEventListener('ended', function() {
			
				if(numero > canciones.length-2){
					audioPlayer.parentNode.removeChild(audioPlayer);
					//console.log('termino');
				}else{
					numero += 1;
					Rep();
				}
				
			}, false);
			
			
			
			output.addEventListener('click', function() {
				
				if( audioPlayer.paused ){
					
					audioPlayer.play();
					
				}else{
					
					audioPlayer.pause();
					
				}
			}, false);
			*/	
				
			

		</script>
	</body>

</html>
