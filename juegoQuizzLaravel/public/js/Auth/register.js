window.onload = function () {
    var form = document.querySelector("#formRegister");

     email.onblur = function () {
         if (regexEmail.test(this.value)) {
             this.classList.remove('is-invalid');
         }
     }

    //  email.addEventListener('blur', function(){
    //     console.log('Fetch');
    //     fetch('http://localhost:8000/api/buscarEmail')
    //         .then(function(response){
    //             return response.json();
    //         })
    //         .then(function(data){
    //             console.log(data)
    //         })
    //         .catch(function(error){
    //             console.log(error)
    //         })

    //  });

    form.onsubmit = function (event) {
        event.preventDefault();
        var elementos = this.elements;
        for (elemento of elementos) {
            elemento.classList.remove('is-invalid');
            if (elemento.type == 'submit' || elemento.type == 'hidden') {
                continue;
            }
            if (elemento.type != 'file' && validarVacio(elemento)) {
                event.preventDefault();
            }
            if (elemento.name == 'email' &&  !regexEmail.test(elemento.value)) {
                pintarError(elemento, 'Email invalido');
                event.preventDefault();
            }
            if (elemento.name == 'password') {
                var confirm = document.querySelector('#password-confirm');
                if (elemento.value.length < 8) {
                    pintarError(elemento, 'El password debe tener minimo 8 caracters');
                    event.preventDefault();
                } else if (elemento.value != confirm.value) {
                    pintarError(elemento, 'Los pass no coinciden');
                    event.preventDefault();
                }
            }
        }
    }
}
