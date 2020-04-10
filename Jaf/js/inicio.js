window.onload = function () {

  // var titulo = document.querySelector('.title');
  // titulo.style.color = 'white';
  // titulo.style.textAling = 'left';
  // console.log('titulo');


// var logo = document.getElementById('logo');
// logo.style.width = '100 px';
// logo.style.height = '100 px';
// console.log('logo');
function tengoClases(dia){
  var dia = 'lunes';
  switch (dia) {
    case 'lunes':console.log('hay clases');
    case 'martes':console.log('hay clases');
    case 'miercoles':console.log('hay clases');

      break;
    default:console.log('no tengo clases');

  }
}
console.log(tengoClases());
}
