var regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

window.onload = function () {
    var form = document.querySelector('form');

    var email = document.querySelector('#email');
    var password = document.querySelector('#password');

    email.onblur = function () {
        if (regexEmail.test(this.value)) {
            this.classList.remove('is-invalid');
        }
    }

    form.onsubmit = function (event) {
        //event.preventDefault();
        if (!regexEmail.test(email.value)) {
            email.classList.add('is-invalid');
            var error = document.createElement('span');
            error.setAttribute('class','invalid-feedback');
            error.innerText = 'Email invalido';
            var div = email.parentElement;
            if (div.children[2]) {
                div.removeChild(div.children[2]);
            }
            div.append(error);
           event.preventDefault();
        }

        if (password.value == '') {
            password.classList.add('is-invalid');
            var error = document.createElement('span');
            error.setAttribute('class','invalid-feedback');
            error.innerText = 'Debe de estar lleno';
            var div = password.parentElement;
            if (div.children[2]) {
                div.removeChild(div.children[2]);
            }
            div.append(error);
            event.preventDefault();
        }




        console.log('se esta enviando');

    }
}
