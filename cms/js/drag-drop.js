function dragover_handler(ev) {
    ev.preventDefault();
    ev.dataTransfer.dropEffect = "move";
}

function drop_handler(ev) {
    ev.preventDefault();
    document.getElementById('draggables-container').appendChild(ev.currentTarget);
}

function setOrder(event) {
    var elements = document.querySelectorAll('.content-item');
    var dataSet = [];

    //
    elements.forEach(function(el, i) {
        dataSet.push({
            elemetId: el.dataset.id,
            position: i
        });
    });

    var query = JSON.stringify(dataSet);
    var url = 'crup/update-items-order.php?data-set=' + query;

    event.currentTarget.src = url;

}