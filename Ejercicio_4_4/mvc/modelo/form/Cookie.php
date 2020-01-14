<?php
class Cookie extends Singleton
{
const DURACION_MIN = 1;
const DURACION_MAX = 60;
private $_mensaje='';

public function getMensaje()
 {
return $this->_mensaje;
 }
public function crearCookie() {
$duracion=getPost('duracion',0);
$duracionOK = ctype_digit($duracion) && (self::DURACION_MIN<=$duracion) &&
($duracion<= self::DURACION_MAX);
if ($duracionOK) {
setcookie('cookieTemporal', time()+$duracion, time()+$duracion);
$this->_mensaje= "<p>Se ha creado la cookie. Se destruirá en $duracion ";
if ($duracion == 1) {
$this->_mensaje.=" segundo.</p>\n";
} else{
$this->_mensaje.= "segundos.</p>\n";
}
} else {
$this->_mensaje= "<p>La duración no es correcta. No se ha creado la
cookie.</p>\n";
}
}
//AQUI HAY QUE METER EL ELIMINARCOOKIE Y EL COMPROBAR COOKIE

public function comprobarCookie(){
    if(isset($_COOKIE['cookieTemporal'])){
        $tiempoRestante = $_COOKIE['cookieTemporal'] - time();
    }
    else{
        $tiempoRestante = 0;
    }
    

    if($tiempoRestante<=0){
        $this->_mensaje="No existe la cookie";
    }
    else{
        $this->_mensaje="La cookie se destruirá en ".$tiempoRestante." segundos.";
    }
}

public function eliminarCookie(){
   
    

    if(isset($_COOKIE['cookieTemporal'])){
        setcookie('cookieTemporal',"",time()-3600);
        $this->_mensaje="Se ha destruido la cookie";
    }
    else{
        $this->_mensaje="No existe la cookie";
    }
}

}