var portafolio = [
	{
		"cliente": "Yuri",
		"alt": "Yuri - Ya no vives en mi",
		"src": "diseno/clientes/yuri-ya-no-vives-en-mi.jpg"
	},
	{
		"cliente":
		"Ricardo Arjona",
		"alt": "Ricardo Arjona - El Cielo a mi favor",
		"src": "diseno/clientes/ricardo-arjona-el-cielo-a-mi-favor.jpg"
	},
	{
		"cliente": "Vale Guinard",
		"alt": "Vale Guinard",
		"src": "diseno/clientes/vale-guinard"
	},
	{
		"cliente": "romeo santos",
		"alt": "romeo santos - bella y sensual",
		"src": "diseno/clientes/romeo-santos-bella-y-sensual.jpg"
	},
	{
		"cliente": "yuri",
		"alt": "yuri - perdón",
		"src": "diseno/clientes/yuri-perdon.jpg"
	},
	{
		"cliente": "Aleks Syntek",
		"alt": "Aleks Syntek - Trasatlantico",
		"src": "diseno/clientes/aleks-syntek-trasatlantico.jpg"
	},
	{
		"cliente": "Gabriel",
		"alt": "Pa ´Nosotros Dos- Gabriel",
		"src": "diseno/clientes/gabriel-pa-nosotros-dos.jpg"
	},
	{
		"cliente": "Caravanchela",
		"alt": "Caravanchela",
		"src": "diseno/clientes/caravanchela.jpg"
	},
	{
		"cliente": "Luis Enrique",
		"alt": "Luis Enrique - Cuando se juega con fuego",
		"src": "diseno/clientes/luis-enrique-cuando-se-juega-con-fuego.jpg"
	},
	{			"cliente": "Espinoza Paz",
		"alt": "No pongas esas canciones - Espinoza Paz",
		"src": "diseno/clientes/espinoza-paz.jpg"
	},
	{
		"cliente": "Julieta Venegas",
		"alt": "Algo Sucede - Julieta Venegas",
		"src": "diseno/clientes/julieta-venegas-algo-sucede.jpg"
	},
	{
		"cliente": "Iguales - Diego Torres",
		"alt": "Iguales - Diego Torres",
		"src": "diseno/clientes/diego-torres.jpg"
	},
	{
		"cliente": "Maná",
		"alt": "Ironía - Maná",
		"src": "diseno/clientes/mana-ironia.jpg"
	},
	{
		"cliente": "noel schajris",
		"alt":"noel schajris",
		"src": "diseno/clientes/noel-schajris.jpg"
	},
	{
		"cliente": "Pontificia Universidad Javeriana",
		"alt":"Pontificia Universidad Javeriana",
		"src": "diseno/clientes/universidad-javeriana.jpg"
	},
];

(function crearThumbsClientes() {
	var parent = document.getElementById("list-portafolio");
	var thumbnail_classname = "logo";

	for (var i = 0; i < portafolio.length; i++) {

		var link = document.createElement('A');
		link.href = "portafolio.php";

		var image = document.createElement('IMG');
		image.alt = portafolio[i].alt;
		image.src = portafolio[i].src;

		var thumbnail_container = document.createElement('LI');
		thumbnail_container.className = thumbnail_classname;
		thumbnail_container.setAttribute('cliente', portafolio[i].cliente);

		link.appendChild(image);
		thumbnail_container.appendChild(link);
		parent.appendChild(thumbnail_container);
	}
})();
