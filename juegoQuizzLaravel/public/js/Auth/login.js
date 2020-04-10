var regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

window.onload = function () {
    var form = document.querySelector("#formLogin");

    var email = document.querySelector('#email');
    var password = document.querySelector('#password');

    email.onblur = function () {
        if (regexEmail.test(this.value)) {
            this.classList.remove('is-invalid');
            // var div = email.parentElement;
            // if (div.children[1]) {
            //     div.removeChild(div.children[1]);
            // }
        }
    }
    
    form.onsubmit = function (event) {
        event.preventDefault();
        if (!regexEmail.test(email.value)) {
            email.classList.add('is-invalid');
            var error = document.createElement('span');
            error.innerText = 'Email invalido';
            var div = email.parentElement;
            if (div.children[1]) {
                div.removeChild(div.children[1]);
            }
            div.append(error);
            event.preventDefault();
        }

        if (password.value.trim() == '') {
            password.classList.add('is-invalid');
            var error = document.createElement('span');
            error.innerText = 'Debe de estar lleno';
            var div = password.parentElement;
            if (div.children[1]) {
                div.removeChild(div.children[1]);
            }
            div.append(error);
            event.preventDefault();
            password.value = '';
        }

    }
}
