/*
    1. The container of all the gallery elements must have th ef-box-gallery class name.
    2. Each image or video element must have the "f-box" class to properly launch the gallery.
    3. The main image of the project will not attach the controllers. (f-box-main-image).
    4. Define a gallery container to append the gallery to.
    5. Set type (image or video) to each item.
    6. Link the f-box.css stylesheet in the html page.
*/

var fboxConfig = {
    "buildElementContainer": function(clickedElementID) {

        // *** Styles are set in f-box.css
        var display = document.getElementById('fbox-display-container')
        display.setAttribute('fbox-element-id', clickedElementID);
        display.classList.add('active');
    },
    "manageListeners": function(removeListener) {
        if (!removeListener) {
            document.addEventListener('keydown', FBox.prototype.fBoxKeyControllerPress, false);
        } else {
            document.removeEventListener('keydown', FBox.prototype.fBoxKeyControllerPress, false);
        }
    },
    "getFBoxGalleryWrapper": function() {
        return document.getElementById('footer');
    },
    // The element to contain the element once clicked on
    // This has to be created somewhere in the DOM
    "display": document.getElementById('fbox-display-container'),
    "screen": document.getElementById('fbox-screen'),
    "getFBoxScreenElement": function() {
        return document.getElementById('fbox-screen')
    },
    "controllers": {
        backController: "required/assets/flecha-anterior.png",
        forwardController: "required/assets/flecha-siguiente.png",
        closeButton: "required/assets/cerrar.png"
    },
    "animationDuration": 500,
    "isTikTok": true,
};

var FBox = function(fboxClickedElement) {
    this.config = Object.assign({}, fboxConfig);
    this.isVideo = fboxClickedElement.getAttribute('type') === 'video';
    this.fboxClickedElement = fboxClickedElement;
    this.setElements();

    var self = this;

    if (!this.isVideo) {
        this.config.fboxElement.addEventListener('load', function() {
            self.setImageDimensions();
        }, false);
    } else {
        self.setImageDimensions();
    }

    var isSingleImage = fboxClickedElement.classList.value.indexOf('f-box-main-image') !== -1;

    if (!isSingleImage && !this.config.isTikTok) {
        this.attachControllers();
    }

    this.appendFBoxElementsToDOM();
    this.openFBox();
};

FBox.prototype.setElements = function() {

    this.baseMobileDeviceHeight = 420;

    this.config.fboxElement = !this.isVideo ?
        this.buildfboxClickedElement(this.fboxClickedElement.href, fboxConfig.elementId) :
        // Enable for Vimeo
        // this.buildVideoElement(this.fboxClickedElement.getAttribute('video-src'), elementId);
        this.buildTikTokVideoElement(this.fboxClickedElement.getAttribute('video-src'), fboxConfig.elementId);

    this.config.bkScreen = this.buildWindowScreen();
    this.config.closeButton = this.getCloseButtonElement();
    this.config.imageFootnoteText = this.fboxClickedElement.getAttribute('texto');
    this.config.fboxGalleryWrapper = this.config.getFBoxGalleryWrapper();

    var self = this;

    this.config.callBack = function() {
        self.closeAndRemoveFBox(self.config);
    }
};

FBox.prototype.setImageDimensions = function() {
    var config = this.config;
    var isTiktok = true;

    if (!isTiktok) {
        config.display.style.height = this.getElementDimension()['height'] + 'px';
        config.display.style.width = this.getElementDimension()['width'] + 'px';
        config.fboxElement.style.width = '100%';

        this.centerImage(
            config.display,
            this.getElementDimension()['width'],
            this.getElementDimension()['height']
        );
    }

    if (config.fbox_texto) {
        this.setTextDimensions();
    }
};

FBox.prototype.getElementDimension = function() {
    var image = this.config && this.config.fboxElement || this.fboxClickedElement,
        ratio = !this.isVideo ? (image.height / image.width) : (720 / 1280),
        height = this.getImageHeight(!this.isVideo ? image.height : 720),
        width = height / ratio,
        imageNewFittedWidth;

    imageNewFittedWidth = this.getImageWidth(width);

    return {
        "width": imageNewFittedWidth || width,
        "height": imageNewFittedWidth ? (imageNewFittedWidth * ratio) : height
    };
};

FBox.prototype.appendFBoxElementsToDOM = function() {

    this.config.fboxGalleryWrapper.appendChild(this.config.bkScreen);
    this.config.display.appendChild(this.config.fboxElement);
    this.config.display.appendChild(this.config.closeButton);

    if (this.config.imageFootnoteText) {
        fbox_texto = this.buildFotoTextElementContainer(this.config.imageFootnoteText);
        this.config.display.appendChild(fbox_texto);
    }

    setTimeout(function() {
        var tiktokScript = document.createElement('SCRIPT');
        tiktokScript.id = 'tiktok-script';
        tiktokScript.src = 'https://www.tiktok.com/embed.js';
        document.body.appendChild(tiktokScript)

    }, 1000);
};

FBox.prototype.openFBox = function() {
    var config = this.config;
    var options = {
        opacity: 1
    };

    $(config.display).animate(options, config.animationDuration, function() {
        config.closeButton.addEventListener('click', config.callBack, false);
        config.bkScreen.addEventListener('click', config.callBack, false);
    });
};

FBox.prototype.fBoxKeyControllerPress = function(event) {
    console.log('KEY PRESSED ', event.key);

    if (event.key === 'ArrowRight') {
        keyBoardClickedController = 'fbox-right-controller';
        FBox.prototype.changeElementSRC(event, keyBoardClickedController);
    }
    else if (event.key === 'ArrowLeft') {
        keyBoardClickedController = 'fbox-left-controller';
        FBox.prototype.changeElementSRC(event, keyBoardClickedController);
    }
    else if (event.key === 'Escape') {
        FBox.prototype.closeAndRemoveFBox();
    }
};

FBox.prototype.closeAndRemoveFBox = function() {
    var config = this.config;

    var fboxGalleryWrapper = config.fboxGalleryWrapper;
    var display = config.display;
    var screen = config.getFBoxScreenElement();
    var duration = config.animationDuration;

    $(display).animate({opacity: 0}, duration, function() {
        display.innerHTML = '';
        display.removeAttribute('style');
        fboxGalleryWrapper.removeChild(screen);

        // Remove Tik Tok things
        document.body.removeChild(document.getElementById('tiktok-script'));
        document.body.removeChild(document.getElementById('ttEmbedLibScript'));
        display.classList.remove('active');
    });

    fboxConfig.manageListeners('removeListener');
};

FBox.prototype.getIsMobileDisplay = function() {
    return window.innerWidth < 500 || window.innerHeight < this.baseMobileDeviceHeight + 1;
};

FBox.prototype.getImageHeight = function (imageHeight) {
    var windowInnerHeight = window.innerHeight,
        imageHeight = imageHeight,
        height = imageHeight,
        heightDifference,
        topGap = this.getTopGap();

    if (imageHeight < windowInnerHeight) {
        heightDifference = windowInnerHeight - imageHeight;
    }

    if (imageHeight >= windowInnerHeight || heightDifference <= topGap) {
        height = windowInnerHeight - topGap;
    }

    return height;
};

FBox.prototype.getTopGap = function() {
    var isMobileDisplay = this.getIsMobileDisplay();

    if (isMobileDisplay && window.innerHeight < this.baseMobileDeviceHeight + 1) {
        return 75;
    } else if (isMobileDisplay && window.innerHeight > this.baseMobileDeviceHeight) {
        return 150;
    }

    return 200;
};

FBox.prototype.getImageWidth = function (elementWidth) {
    var windowInnerWidth = window.innerWidth,
        isMobileDisplay = this.getIsMobileDisplay(),
        widthDifference,
        widthGap;

    if (elementWidth < windowInnerWidth) {
        widthDifference = windowInnerWidth - elementWidth;
    }

    widthGap = isMobileDisplay ? 80 : 150;

    if (elementWidth >= window.innerWidth || widthDifference < widthGap){
        return windowInnerWidth - widthGap;;
    }
};

FBox.prototype.setTextDimensions = function() {
    var w_ventana = window.innerWidth,
        h_ventana = window.innerHeight;

    if (w_ventana < 700 && w_ventana > 500){
        fbox_texto.style.fontSize = '12px';
    } else if (w_ventana < 501){
        fbox_texto.style.fontSize = '11px';
    }

    if (h_ventana < 500){
        fbox_texto.style.fontSize = '11px';
    }
};

FBox.prototype.centerImage = function(imageContainer, width, height) {
    var windowInnerWidth = window.innerWidth,
        windowInnerHeight = window.innerHeight,
        bottomPosition,
        topPosition;

    topPosition = windowInnerHeight - height;
    bottomPosition = windowInnerWidth - width;

    imageContainer.style.top = Math.floor(topPosition) / 2 + 'px';
    imageContainer.style.left = Math.floor(bottomPosition) / 2 + 'px';
};

FBox.prototype.buildWindowScreen = function() {
    var screen = document.createElement('div');

    screen.id = 'fbox-bkScreen';
    screen.style.position = 'fixed';
    screen.style.top = 0;
    screen.id = 'fbox-screen';
    screen.style.width = '100%';
    screen.style.height = '100%';
    screen.style.backgroundColor = 'black';
    screen.style.opacity = .8;
    screen.style.cursor = 'pointer';

    return screen;
};

FBox.prototype.attachControllers = function() {
    var i = 0,
        self = this;

    while (i < 2) {
        var controller = document.createElement('DIV');

        controller.id = i === 0 ? 'fbox-right-controller' : 'fbox-left-controller';
        controller.style.backgroundColor = 'black';
        controller.style.cursor = 'pointer';
        controller.style.position = 'absolute';
        controller.style.left = i === 0 ? '100%' : 0;
        controller.style.backgroundSize = '100%';
        controller.style.zIndex = i === 0 ? 2 : 3;
        controller.style.opacity = 0.8;
        controller.style.backgroundImage = i === 0 ?
            'url('+fboxConfig.controllers.forwardController+')' :
            'url('+fboxConfig.controllers.backController+')';

        self.setControllersDimensions(i, controller);
        controller.addEventListener('click', self.changeElementSRC.bind(self));
        self.config.display.appendChild(controller);

        i++;
    }
};

FBox.prototype.setControllersDimensions = function(i, controller) {
    var widthHeight = window.innerWidth < 801 ? '30px' : '40px';

    controller.style.top = '50%';
    controller.style.width = widthHeight;
    controller.style.height = widthHeight;
    controller.style.marginTop = window.innerWidth < 801 ? '-15px' : '-20px';;
    controller.style.marginLeft = i === 0 ? '-55px' : '15px';

    if (window.innerWidth < 801) {
        controller.style.marginLeft = i === 0 ? '-35px' : '5px';
    }
};

FBox.prototype.changeElementSRC = function(event, controller) {
    var clickedController = controller || event.target.id,
        collectionLastElementID = fboxConfig.collection.length - 1,
        currentElemetID = fboxConfig['clickedElementID'],
        nextElementId;

    nextElementId = currentElemetID === 0 ? collectionLastElementID : currentElemetID - 1;

    if (clickedController === 'fbox-right-controller') {
        nextElementId = currentElemetID === collectionLastElementID ? 0 : currentElemetID + 1;
    }

    fboxConfig['clickedElementID'] = nextElementId;
    document.getElementById('fbox-img').src = fboxConfig.collection[nextElementId].getAttribute('video-src');
};

FBox.prototype.buildFotoTextElementContainer = function(textNode) {
    var fbox_texto = document.createElement("div"),
        eltexto = document.createTextNode(textNode);

    fbox_texto.id = 'fbox-texto';
    fbox_texto.style.width = '96%';
    fbox_texto.style.height = 'auto';
    fbox_texto.style.padding = '15px 2% 15px 2%';
    fbox_texto.style.textAlign = 'center';
    fbox_texto.style.fontFamily = 'Arial';
    fbox_texto.style.fontSize = '13px';
    fbox_texto.style.fontWeight = 100;
    fbox_texto.style.color = 'white';

    fbox_texto.appendChild(eltexto);

    return fbox_texto;
};

FBox.prototype.buildVideoElement = function(videoSRC, elementId) {
    var fboxElement = document.createElement("IFRAME");

    fboxElement.id = 'fbox-img';
    fboxElement.setAttribute('element-id', elementId);
    fboxElement.src = videoSRC;
    fboxElement.width = this.getElementDimension().width;
    fboxElement.height = this.getElementDimension().height;
    fboxElement.setAttribute('webkitallowfullscreen', '');
    fboxElement.setAttribute('mozallowfullscreen', '');
    fboxElement.setAttribute('allowfullscreen', '');
    fboxElement.setAttribute('frameborder', 0);

    return fboxElement;
};

FBox.prototype.buildTikTokVideoElement = function(videoSRC, elementId) {
    var fboxElement = document.createElement("BLOCKQUOTE");
    var section = document.createElement('SECTION');
    var tiktokUser = '@maisadelosrios';
    var cite = "https://www.tiktok.com/" + tiktokUser + "/video/" + videoSRC;

    fboxElement.className = 'tiktok-embed';
    fboxElement.setAttribute('cite', cite);
    fboxElement.setAttribute('data-video-id', videoSRC);
    fboxElement.style = "max-width: 605px; min-width: 300px; width: 90%;";
    fboxElement.appendChild(section);

    return fboxElement;
}

FBox.prototype.buildfboxClickedElement = function(imageSource) {
    var fboxElement = document.createElement("img");

    fboxElement.id = 'fbox-img';
    fboxElement.src = imageSource;
    fboxElement.style.position = 'relative';

    return fboxElement;
};

FBox.prototype.getCloseButtonElement = function() {
    var closeButton = document.createElement("div");

    closeButton.className = 'fbox-close-button';
    closeButton.style.backgroundImage = 'url(' + fboxConfig.controllers.closeButton + ')';
    closeButton.style.backgroundSize = '100%';

    return closeButton;
};

function buildFBox(event) {
    var fbox = event.target;

    if (fbox.nodeName == 'IMG') {
        fbox = fbox.parentElement;
    }

    var clickedElementID = Number(fbox.getAttribute('fbox-element-id'));

    fboxConfig.collection = event.currentTarget.querySelectorAll('.f-box');

    event.preventDefault();
    fboxConfig.buildElementContainer(clickedElementID);
    fboxConfig['clickedElementID'] = clickedElementID;
    fboxConfig.itemsLength = '';

    new FBox(fbox);
    fboxConfig.manageListeners();
}

(function loadFBox() {
    var fBoxGalleryCollection = document.getElementsByClassName("f-box-gallery");

	for (i = 0; i < fBoxGalleryCollection.length; i++) {
		fBoxGalleryCollection[i].addEventListener('click', buildFBox, false);
	}
})();

window.addEventListener('resize', function(){
    var screen = document.getElementById('fbox-screen');

    if (screen) {
        var display = document.getElementById('fbox-element-container');
        var fboxGalleryWrapper = fboxConfig.getFBoxGalleryWrapper();

        // document.removeChild(display);
        // fboxGalleryWrapper.removeChild(screen);
    }
}, false);


