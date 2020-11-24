
function ajustarNoticias(){
	if(window.innerWidth>800){
		noticias.style.height = (cnt_quienes.offsetHeight - 46)+ 'px';
		//console.log(cnt_quienes.offsetHeight);
	}else{
		noticias.style.height = 'auto';
	}
}


function dimenciones(cuadrovideos, altura, dim1, dim2){

	for(var c =0; c < cuadrovideos.length; c++){
		cuadrovideos[c].style.height = altura + 'px';
	}

	cnt_videos1.style.height = dim1 + 'px';
	cnt_videos2.style.height = dim2 + 'px';
}


function Inicio() {

	w_cuadrovideos = cuadrovideos[0].offsetWidth;
	nuevah = w_cuadrovideos / ratio;

	w_videos = videos[0].offsetWidth;
	nuevah2 = w_videos / ratio;

	var altura = (nuevah + 50 * 2 ) + (nuevah2 + 50* 4);
	console.log(altura);

	if( window.innerWidth < 481 ){

		dim1 = (nuevah  + 30)* 2;
		dim2 = (nuevah2 + 25)* 4;
		dimenciones(cuadrovideos, nuevah, dim1, dim2);

	}else if( window.innerWidth > 480 && window.innerWidth < 801){

		dim1 = (nuevah  + 50)* 2;
		dim2 = (nuevah2 + 30)* 2;
		dimenciones(cuadrovideos, nuevah, dim1, dim2);

	}else{

		dim1 = 300;
		dim2 = 160;
		dimenciones(cuadrovideos, 254, dim1, dim2);
	}

	for(var v =0; v < videos.length; v++){
		videos[v].style.height = nuevah2 + 'px';
	}

}



var cnt_quienes = document.getElementById('cnt_quienes');
var noticias = document.getElementById('noticias_inicio');

var videoinicio = document.getElementById('videoinicio');

var cnt_videos1 = document.getElementById('cnt_videos1');
var cnt_videos2 = document.getElementById('cnt_videos2');


// var cuadrovideos = document.getElementsByClassName('cuadrovideo');
// //var w_cuadrovideos = cuadrovideos[0].offsetWidth;

// var videos = document.getElementsByClassName('videos');
// var w_videos = videos[0].offsetWidth;


var ratio = 1.65;

var nuevah;
var nuevah2;

function loadData() {
	if (homeData) {
		var text_container = document.querySelector('.textoquienessomos');

		homeData.forEach(function(el) {
			var p = document.createElement('P');
			p.innerHTML = el;
			text_container.appendChild(p);
		});
	}
}


var initi = (function() {
	// Inicio();
	loadData();

	window.addEventListener('resize', Ajustar, false);

	function Ajustar(){
		Inicio();
		// ajustarNoticias();
	}

	window.onload = function(){
		// TAMAÑO NOTICIAS INICIO
		// ajustarNoticias();
	}
})();


