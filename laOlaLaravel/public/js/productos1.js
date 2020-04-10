
var regexName = /^[a-z A-Z]{3,30}$/;
var regexDescription = /^[a-z A-Z 0-9,.!?´]*$/;
var regexPrice = /^[0-9]*$/;
var regexAvatar = /.[jpeg|jpg|png]$/;


function validarVacio(input) {
    if (input.value == '') {
        pintarError(input, 'Debe de estar lleno');
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

window.onload = function () {

    var name = document.querySelector('#name');
    name.onblur = function () {
        if (regexName.test(this.value)) {
            this.classList.remove('is-invalid');
        }
    }

    var description = document.querySelector('#description');
    description.onblur = function () {
        if (regexDescription.test(this.value)) {
            this.classList.remove('is-invalid');
        }
    }

    var price = document.querySelector('#price');

    price.onblur = function () {
        if (regexPrice.test(this.value)) {
            this.classList.remove('is-invalid');
        }
    }



    var avatar = document.querySelector('#avatar');

    avatar.onblur = function () {
        if (regexAvatar.test(this.value)) {
            this.classList.remove('is-invalid');
        }
    }
    //
    // var avatar1 = document.querySelector('#avatar1');
    //
    // avatar1.onblur = function () {
    //     if (regexAvatar.test(this.value) {
    //         this.classList.remove('is-invalid');
    //     }
    // }
    //
    // var avatar2 = document.querySelector('#avatar2');
    //
    // avatar2.onblur = function () {
    //     if (regexAvatar.test(this.value)) {
    //         this.classList.remove('is-invalid');
    //     }
    // }
    //
    // var avatar3 = document.querySelector('#avatar3');
    //
    // avatar3.onblur = function () {
    //     if (regexAvatar.test(this.value)) {
    //         this.classList.remove('is-invalid');
    //     }
    // }
    //
    // var avatar4 = document.querySelector('#avatar4');
    //
    // avatar4.onblur = function () {
    //     if (regexAvatar.test(this.value) {
    //         this.classList.remove('is-invalid');
    //     }
    // }
    var form = document.querySelector('#form-create');

    form.onblur = function () {
        if (regexName.test(this.value)) {
            this.classList.remove('is-invalid');
        }
    }

    form.onsubmit = function (event) {
        var elementos = this.elements;
        for (elemento of elementos) {
            if (elemento.type == 'submit' || elemento.type == 'hidden') {
                continue;

            }

            if (elemento.name == 'name' &&  !regexName.test(elemento.value)) {
                pintarError(elemento, 'Nombre invalido');
                event.preventDefault();
            }
            if (elemento.name == 'description' &&  !regexDescription.test(elemento.value)) {
                pintarError(elemento, 'Descripción invalida');
                event.preventDefault();
            }
            if (elemento.name == 'price' &&  !regexPrice.test(elemento.value)) {
                pintarError(elemento, 'Imagen invalida');
                event.preventDefault();
            }
            if (elemento.type != 'file' && validarVacio(elemento)) {
                event.preventDefault();
            }
            if (elemento.type == 'file' &&  !regexAvatar.test(elemento.value)) {
                pintarError(elemento, 'La extension de la imagen tiene que ser .JPG,.JPEG,.PNG.');
                event.preventDefault();
            }
            // if (elemento.name == 'avatar1' &&  !regexAvatar.test(elemento.value)) {
            //     pintarError(elemento, 'Imagen invalida');
            //     event.preventDefault();
            // }
            // if (elemento.name == 'avatar2' &&  !regexAvatar.test(elemento.value)) {
            //     pintarError(elemento, 'Imagen invalida');
            //     event.preventDefault();
            // }
            // if (elemento.name == 'avatar3' &&  !regexAvatar.test(elemento.value)) {
            //     pintarError(elemento, 'Imagen invalida');
            //     event.preventDefault();
            // }
            // if (elemento.name == 'avatar4' &&  !regexAvatar.test(elemento.value) {
            //     pintarError(elemento, 'Imagen invalida');
            //     event.preventDefault();
            // }

        }
    }
}
