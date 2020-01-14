<?php
class Encuesta extends Singleton
{
private $_tiempoTranscurrido = "";
public function getTiempoTranscurrido()
 {
return $this->_tiempoTranscurrido;
 }
public function calcTiempoTranscurrido(){
if ( isset( $_COOKIE["primeraVisita"] ) ) {
$inicio = "@".$_COOKIE["primeraVisita"];
$fin = "@".time();
$tiempoTranscurrido = $this->_tiempo($inicio, $fin);
$this->_tiempoTranscurrido= "<b>Visitaste esta página por primera vez hace
$tiempoTranscurrido</b>";
}
}
private function _tiempo($fechaInicio,$fechaFin) {
 $fecha1 = new DateTime($fechaInicio);
 $fecha2 = new DateTime($fechaFin);
 //el método diff() devuelve la diferencia entre dos objetos DateTime
 $fecha = $fecha1->diff($fecha2);
 $tiempo = "";

 //años
 if($fecha->y > 0)
 {
 $tiempo .= $fecha->y;

 if($fecha->y == 1)
 $tiempo .= " año ";
 else
 $tiempo .= " años ";
 }

 //meses
 if($fecha->m > 0)
 {
 $tiempo .= $fecha->m;

 if($fecha->m == 1)
 $tiempo .= " mes ";
 else
 $tiempo .= " meses ";
 }

 //dias
 if($fecha->d > 0)
 {
 $tiempo .= $fecha->d;

 if($fecha->d == 1)
 $tiempo .= " día ";
 else
 $tiempo .= " días ";
 }

 //horas
 if($fecha->h > 0)
 {
 $tiempo .= $fecha->h;

 if($fecha->h == 1)
 $tiempo .= " hora ";
 else
 $tiempo .= " horas ";
 }

 //minutos
 if($fecha->i > 0)
 {
 $tiempo .= $fecha->i;

 if($fecha->i == 1)
 $tiempo .= " minuto ";
 else
 $tiempo .= " minutos ";
 }
 if($fecha->s > 0)
 {
 $tiempo .= $fecha->s;

 if($fecha->s == 1)
 $tiempo .= " segundo";
 else
 $tiempo .= " segundos";
 }
 return $tiempo;
}
}
