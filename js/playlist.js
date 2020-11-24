
// PLAYLIST
//
var btn_mando = document.getElementById('btn_mando');
var forward_btn = document.getElementById('ff');
var songIndex = 0;
var audioPlayer;
var mp3_20200618 = [
	'hongos_arjona.mp3',
	'no-ha-parado-de-llover_mana-y-sebastian-yatra.mp3',
	'lo-mejor-de-mi_noel-schajris.mp3',
	'bella-y-sensual_romeo-santos-daddy-yankee-nicky-jam.mp3',
	'ya-no-vives-en-mi_yuri-ft-carlos-rivera.mp3',
	'nunca-sola_vale-guinard.mp3',
	'el-amor-que-me-tenia_arjona.mp3',
	'friendzone_vale-guinard.mp3',
	'el-cielo-a-mi-favor_arjona.mp3',
	'no-se-puede-olvidar_vale-guinard.mp3',
];

var prod_list = [
	'pa-nosotros-dos_gabriel.mp3',
	'ella_arjona.mp3',
	'funky-feeling_caravanchela.mp3',
	'cuando-se-juega-con-fuego_luis-enrique.mp3',
	'nada-es-como-tu_arjona.mp3',
	'que-mal-te-ves-sin-mi_espinoza-paz.mp3',
	'selfie_reykon.mp3',
	'iguales_diego-torres.mp3',
	'ironia_mana.mp3',
	'ese-camino_julieta-venegas.mp3',
	'buenas-noches_julieta-venegas.mp3',
	'no-te-pertenece_noel-schajris.mp3',
	'cavernicolas_arjona.mp3',
	'lo-poco-que-tengo_arjona.mp3',
	'apnea_arjona.mp3',
];

var test_songsList = [
	'pa-nosotros-dos_gabriel.mp3',
	'funky-feeling_caravanchela.mp3',
];

songs_list = mp3_20200618.concat(prod_list);

function setSongInfoOnPlayer (song) {
	var info = song.split('_');
	var track = info[0];
	var artista = info[1].split(".")[0];

	$('#cancion').text(track.replace(/-/gi, ' '));
	$('#artista').text(artista.replace(/-/gi, ' '));
}

function toggleReproductionOnSongChange() {
	var isPlaying = btn_mando.className == 'pausa';

	if (isPlaying) {
		audioPlayer.play();
	}
}

function toggleReproduction() {
	if (btn_mando.className == 'play') {
		audioPlayer.play();
		btn_mando.className = 'pausa';
	} else {
		audioPlayer.pause();
		btn_mando.className = 'play';
	}
}

function setSongInPlayer() {
	var song = songs_list[songIndex];
	var songsFolder = 'media/';

	audioPlayer.src = songsFolder + song;

	setSongInfoOnPlayer(song);
}

var initAudioPlayer = (function() {
	var player = document.createElement('AUDIO');
	player.id = 'player';
	player.load();

	audioPlayer = player;

	document.body.appendChild(audioPlayer);

	setSongInPlayer();
})();

audioPlayer.addEventListener('ended', function() {
	console.log('Se terminó la canción');
	songIndex += 1;

	if (songIndex == songs_list.length){
		songIndex = 0;
	}

	setSongInPlayer();
}, false);

forward_btn.addEventListener('click', function() {

	if (songIndex < songs_list.length - 1) {
		songIndex += 1;
	} else {
		songIndex = 0;
	}

	setSongInPlayer();
	toggleReproductionOnSongChange();
},false);

btn_mando.addEventListener('click', function() {
	toggleReproduction();
}, false);
