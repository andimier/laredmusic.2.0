	var cntVideos = document.getElementById('cnt_videos'),
		videos,
		w_videos,
		ratio = 1.65,
		nuevah = w_videos / ratio,
		seccion = 'videos',
		listado;

	function AjustarContenedoresVideosOnResize(){
		ajustarDimensionesContenedoresVideos();
	}

	function ajustarDimensionesContenedoresVideos() {
		videos = document.getElementsByClassName('videoV');
		w_videos = videos[0].offsetWidth;
		nuevah = w_videos / ratio;

		for (var i = 0; i < videos.length; i++) {
			videos[i].style.height = nuevah + 'px';
		}
	}

    function fijarAtributos(elemento, opciones) {
        $.each(opciones, function(key, value) {
           elemento.setAttribute(key, value);
        });
    }

	function obtenerJson() {
		return $.ajax({
			dataType: "json",
			type: "GET",
			url: "js/videos.json",
			error: function(jqXHR, textStatus, error){
				console.log(textStatus);
				console.log(error);
			}
		});
	}

	var Listado = function(seccion, contenedor) {
		var videosJson = obtenerJson();

		this.seccion = seccion;
		this.contenedor = contenedor;
		this.fijarrDatosDeVideosPorSeccion(videosJson);
	};

	Listado.prototype.fijarrDatosDeVideosPorSeccion = function(videosJson) {
		var self = this,
            pathname = window.location.pathname;

		videosJson.done(function(data) {
            if (pathname === '/' || pathname === "/laredmusic/index.php") {
                self.fijarVideosDelInicio(data);
            } else {
                self.videos = data;
                self.crearVideos();
                window.addEventListener('resize', AjustarContenedoresVideosOnResize, false);
            }
		});
	}

    Listado.prototype.fijarVideosDelInicio = function(data) {
        var videosInicio = [];

        $.each(data, function(i, value) {
            if (value.seccion && value.seccion === 'inicio') {
                videosInicio.push(value);
            }
        });

        this.crearVideosInicio(videosInicio);
    };

    Listado.prototype.crearVideosInicio = function(videosInicio) {
        var contenedorVideos = $('#videoinicio');

        $.each(videosInicio, function(index, item) {
            contenedorVideos.find('iframe').eq(index).attr('src', 'https://www.youtube.com/embed/' + item.video);
        });
    };

	Listado.prototype.crearVideos = function(obj) {
		var self = this,
            listadoVideos = this.videos;

		$.each(listadoVideos, function(i, value){
			var div,
                iFrame;

            div = self.crearContenedorDelVideo(value);
            iFrame = self.crearIframeVideo(value.video);
			div.appendChild(iFrame);
			self.contenedor.appendChild(div);
		});

		ajustarDimensionesContenedoresVideos();
	}

    Listado.prototype.crearContenedorDelVideo = function(value) {
        var div = document.createElement('DIV'),
            opciones = {
                'class': 'videoV',
                'artista': value.artista,
                'titulo-video': value.titulo
            };

        fijarAtributos(div, opciones);

        return div;
    };

    Listado.prototype.crearIframeVideo = function(videoKey) {
        var iFrame = document.createElement('IFRAME'),
            opciones = {
                'width': '100%',
                'height': '100%',
                'src': 'https://www.youtube.com/embed/' + videoKey,
                'frameborder': 0
            };

        fijarAtributos(iFrame, opciones);

        return iFrame;
    };

	listado = new Listado(seccion, cntVideos);

