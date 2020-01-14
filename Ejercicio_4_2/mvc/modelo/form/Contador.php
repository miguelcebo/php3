<?php
class Contador extends Singleton{
    
    private $_veces;
    
    public function getVeces(){

        return $this->_veces;
    }

    public function contar() {
    // Generamos los valores que se van a especificar para la cookie
    $nombre = 'Contador';
    // Obtenemos el valor del contador (evitando warnings no deseados...)

    if (!isset($_COOKIE[$nombre]))

    $this->_veces = 1;

    else

    $this->_veces = $_COOKIE[$nombre] + 1;

    // Expira el 01/01/2019 a las 00:00:00

    $fecha_expiracion = mktime(0, 0, 0, 1, 1, 2020);

    // Ahora enviamos la cookie y después generamos el documento

    setcookie($nombre, $this->_veces, $fecha_expiracion);
    }

    public function eliminarCookie(){

        setcookie('Contador',$this->_veces,time()-3600);
    }
}