window.onload = function() {
    var form = document.querySelector("#formLogin");
    var formElements = Array.from(form.elements);
    // var csfr = formElements.shift();
    // var button = formElements.pop();
    // var remember = formElements.pop();
    var regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    var regexPass = /^[a-zA-Z0-9]{8,30}$/;

    var mailInput = document.querySelector('input[id="email"]');
    var passwordInput = document.querySelector('input[type="password"]');
    var isEmpty = function(element, parent, childrens) {
        var span = document.createElement("span");
        span.classList.add("text-danger");

        if (element.value == "") {
            // button.disabled=true;
            element.classList.add("is-invalid");

            span.innerHTML = "Campo vacío";

            if (childrens.length == 1) {
                parent.appendChild(span);
            }
        } else {
            element.classList.remove("is-invalid");
            if (childrens.length == 2) {
                parent.removeChild(parent.children[1]);
            }
        }
    };

    var isMail = function(mailInput, event) {
        var test = regexEmail.test(mailInput.value);
        if (!test) {
            event.preventDefault();
            mailInput.classList.add("is-invalid");
            alert("Formato de E-mail inválido");
        }
    };
    var isPassword = function(passwordInput, event) {
        var test = regexPass.test(passwordInput.value);
        if (!test) {
            event.preventDefault();
            passwordInput.classList.add("is-invalid");
            alert("Formato de contraseña inválido");
        }
    };

    formElements.forEach(function(element) {
        element.addEventListener("blur", function() {
            var parent = element.parentElement;
            var childrens = Array.from(parent.children);

            isEmpty(this, parent, childrens);
        });
    });

    form.onsubmit = function(event) {
        isMail(mailInput, event);
        isPassword(passwordInput, event);
    };
};
