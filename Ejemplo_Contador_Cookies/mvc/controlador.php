<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php

class Controlador {
    public static function init() {
    //Al haber un solo paso no existe el método _gestionPagina() y el método _cargarVista() no recibe argumento
    self::_cargarVista();
    }
    private static function _cargarVista() {
    $path = VISTAS_PATH.'paso1.php';
    $paso=mdlPaso1::getInstance();
    $paso->onCargarVista($path);
    }
    }

?>

</body>