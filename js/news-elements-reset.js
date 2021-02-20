(function elementsReset() {
    var tables = document.querySelectorAll('table')
    var isInsertedMaulTemplate = tables.length > 0;

    if (isInsertedMaulTemplate) {
        var elements_with_text = [];
        var elements_with_images = [];

        document.querySelectorAll('td').forEach((el) => {
            var html = el.innerHTML;

            if (el.classList.length) {
                if (!html.length) {
                    return;
                }
                // contiene texto
                if (el.className.includes('TextContent')) {
                    elements_with_text.push(html)
                }

                // contiene image
                if (el.className.includes('mcnImageCardBottomImageContent')) {
                    elements_with_images.push(html);
                }
            }
        });

        var heading_container = document.querySelector('.single-news-text-heading');
        var text_container = document.querySelector('.single-news-body-text');

        // add new texts
        if (elements_with_text.length) {
            var headings = "";
            var content = "";

            elements_with_text.forEach(function(el, i) {
                if (
                    (elements_with_text.length > 1 && i < elements_with_text.length - 1) &&
                    (!el.includes('MEDIA ALERT') && !el.includes('<a href'))
                ) {
                    headings += el;
                }

                if (elements_with_text.length == 1 || i == elements_with_text.length - 1) {
                    content += el;
                }
            });

            heading_container.innerHTML = headings;
            text_container.innerHTML = content;

            // Hide tables that come with MailChimp
            tables.forEach(function(el) {
                el.style.display = "none";
            });
        }

        // Add new image
        if (elements_with_images.length) {
            var href = elements_with_images[elements_with_images.length - 1].match(/href="[^"]+"/)[0];
            var link = href.replace('href=', '').replace('"', '');

            // hide default image
            document.querySelector('.imagennoticia').style.display = 'none';

            // show new image
            document.querySelector('.single-news-mail-image').style.display = 'block';
            document.querySelector('.single-news-mail-image-link').href = link;
        }
    }
})();