<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php

class Cookie extends Singleton
{
    const DURACION_MIN = 1;
    const DURACION_MAX = 60;
    private $_mensaje = '';

    public function getMensaje()
    {
        return $this->_mensaje;
    }

    public function crearCookie()
    {
        $duracion = getPost('duracion', 0);
        $duracionOK = ctype_digit($duracion) && (self::DURACION_MIN <= $duracion) && ($duracion <= self::DURACION_MAX);
        if ($duracionOK) {
            setcookie('cookieTemporal', time() + $duracion, time() + $duracion);
            $this->_mensaje = "<p>Se ha creado la cookie. Se destruirá en $duracion ";
            if ($duracion == 1) {
                $this->_mensaje .= " segundo.</p>\n";
            } else {
                $this->_mensaje .= "segundos.</p>\n";
            }
        } else {
            $this->_mensaje = "<p>La duración no es correcta. No se ha creado la cookie.</p>\n";
        }
    }

    public function eliminarCookie()
    {
        if (isset($_COOKIE['cookieTemporal'])){

            setcookie('cookieTemporal', "",time() - 3600);
            $this->_mensaje="<p>Se ha destruido la cookie</p>";

        } else{

            $this->_mensaje = "<p>No existe la coockie</p>";


        }



    }

    public function comprobarCookie(){




        if (isset($_COOKIE['cookieTemporal'])){

            $tiempoRestante = $_COOKIE['cookieTemporal'] - time();
            $this->_mensaje = "<p>La cookie se destruirá en $tiempoRestante segundos</p>";



        }else{

            $this->_mensaje = "<p>No existe la coockie</p>";

        }



    }
}

?>

</body>
</html>