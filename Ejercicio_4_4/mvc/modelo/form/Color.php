<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php
class Color extends Singleton
{

    private $_color;
    private $_estilo;

    public function getColor(){

        return $this->_color;

    }

    public function  getEstilo(){

        return $this->_estilo;

    }

    public function probarColor()
    {
        $this->_color = isset($_COOKIE['cookieColor']) ? $_COOKIE['cookieColor'] : 'ninguno';
        if ($this->_color == 'rojo') {
            $this->_estilo = "<style type=\"text/css\">body{color: red; }</style>\n";
        } elseif ($this->_color == 'azul') {
            $this->_estilo = "<style type=\"text/css\">body{color: blue; }</style>\n";
        } elseif ($this->_color == 'verde') {
            $this->_estilo = "<style type=\"text/css\">body{color: green; }</style>\n";
        }
    }

    public function ponerColor()
    {
        if (isset($_GET['color'])) {
            $this->_color = $_GET['color'];
// Si se envía un color se crea la cookie
            if (($this->_color == 'rojo') || ($this->_color == 'azul') || ($this->_color == 'verde')) {
                setcookie('cookieColor', $this->_color);
// Si se envía el color ninguno se destruye la cookie
            } else if ($this->_color == 'ninguno') {
                setcookie("cookieColor", "", time() - 3600);
            }
        }
    }
}

?>

</body>
</html>