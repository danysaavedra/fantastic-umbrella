var regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

function validarVacio(input) {
    if (input.value.trim() == '') {
        pintarError(input, 'Debe de estar lleno');
        input.value = '';
        return true;
    }
    return false
}

function pintarError(input, mensaje) {
    input.classList.add('is-invalid');
    var error = document.createElement('span');
    error.setAttribute('class','invalid-feedback');
    var strong = document.createElement('strong');
    strong.innerText = mensaje;
    var div = elemento.parentElement;
    if (div.children[2]) {
        div.removeChild(div.children[2]);
    }
    error.append(strong);
    div.append(error);
}
