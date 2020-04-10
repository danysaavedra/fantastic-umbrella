window.onload = () => {
    var formsProducts = document.querySelectorAll('form.modal-eliminar');
    for (form of formsProducts)
    {
        form.onsubmit = function(event) {
            event.preventDefault();

            //aqui hago la llamada fetch para que guarde en ruta de laravel
                //, esta vez no va a ser a una api sino a una ruta en web.php
            var token = this.querySelector('input[name="_token"]').value;

            var campos = { 'id' : this.querySelector('input[name="id"]').value };

            var opciones = {
                method: 'POST',
                body: JSON.stringify(campos),
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token
                }
            };
            fetch(this.action, opciones)
            .then(function(response){
                return response.json();
            })
            .then(function(datos){


                var productCard = document.querySelector('#div-papi');
                var hiji = document.querySelector('#div-producto'+ campos.id);
                //var hijis = productCard.children;

                productCard.removeChild(hiji);


                // alert('PUDIMOS ELIMINAR EL PRODUCTO DE MIERDA');
                $('#producto'+campos.id).modal('hide');
            })
            .catch(function(error){
                console.log(error);
            })
        }
    }

    var formsCarritos = document.querySelectorAll('form.agregar-cart');
    for (form of formsCarritos)
    {
        form.onsubmit = function(event) {
            event.preventDefault();

            //aqui hago la llamada fetch para que guarde en ruta de laravel
                //, esta vez no va a ser a una api sino a una ruta en web.php
            var token = this.querySelector('input[name="_token"]').value;

            var campos = {
              'product_id' : this.querySelector('[name="product_id"]').value
             };

            var opciones = {
                method: 'POST',
                body: JSON.stringify(campos),
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token
                }
            };
            fetch(this.action, opciones)
            .then(function(response){
                return response.json();
            })
            .then(function(datos){
                console.log(datos);
                alert('Se agrego un item al carrito');
                var cantidadCart = document.querySelector('#cantCar');
                var laCantidad = cantidadCart.innerText;
                var entero = parseInt(laCantidad);
                var sumCant = entero + 1;
                cantidadCart.innerText = sumCant;


            })
            .catch(function(error){
                console.log(error);
            })
        }
    }

}
