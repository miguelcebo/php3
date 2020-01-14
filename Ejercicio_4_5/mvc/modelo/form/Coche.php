<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php

class Coche extends Singleton
{
    private $_modelo = "";
    private $_marca = "";
    private $_motor = "";
    private $_cc = 0;
    private $_combustible = "";

    public function getModelo()
    {
        return $this->_modelo;
    }

    public function getMarca()
    {
        return $this->_marca;
    }

    public function getMotor()
    {
        return $this->_motor;
    }

    public function getCC()
    {
        return $this->_cc;
    }

    public function getCombustible()
    {
        return $this->_combustible;
    }

    public function crearCookies()
    {
        setcookie("coche[modelo]", $_POST["modelo"]);
        setcookie("coche[marca]", $_POST["marca"]);
        setcookie("coche[motor]", $_POST["motor"]);
        setcookie("coche[cc]", $_POST["cilindrada"]);
        setcookie("coche[combustible]", $_POST["combustible"]);
    }

    public function olvidarInfo()
    {


        foreach ($_COOKIE["coche"] as $key => $valor) {

            setcookie("coche[$key]", "", time() - 3600);


        }


    }

    public function leerCookies()
    {
        if (isset($_COOKIE["coche"]["modelo"]))
            $this->_modelo = $_COOKIE["coche"]["modelo"];
        if (isset($_COOKIE["coche"]["marca"]))
            $this->_marca = $_COOKIE["coche"]["marca"];
        if (isset($_COOKIE["coche"]["motor"]))
            $this->_motor = $_COOKIE["coche"]["motor"];
        if (isset($_COOKIE["coche"]["cc"]))
            $this->_cc = $_COOKIE["coche"]['cc'];
        if (isset($_COOKIE["coche"]["combustible"]))
            $this->_combustible = $_COOKIE["coche"]['combustible'];
    }
}

?>

</body>
</html>