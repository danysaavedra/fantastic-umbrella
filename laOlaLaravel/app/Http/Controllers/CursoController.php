<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
  public function getCursosDH()
  {
    $url = 'http://digitalhouse.com/api/getCursos';
    $cursosJson = file_get_contents($url);
    $arrayCursos =
    json_decode($cursosJson,true);
//  dd($arrayCursos['data']);
foreach ($arrayCursos['data'] as $value) {
  echo  '<li>'. $value['curso'].'</li><br>
  <a href=/api/comisiones/'. $value['id'].'>.Ver Sede y Horarios.</a><li>'. $value['descripcion'].'</li><br>';
}

}
public function getComisionesDH($id)
{
  $url = 'http://digitalhouse.com/api/getComisiones';
  $comisionesJson = file_get_contents($url);
  $arraycomisiones =

  json_decode($comisionesJson,true);

  foreach ($arraycomisiones['data'] as $comision) {

  if($comision['id']== $id){

      echo $comision['sede'] . $comision['horarios'] ;
  }
  }
}

}
