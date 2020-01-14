<?php

class Controlador {
    
    public static function init() {
       
        $paso = self::_gestionPagina();
        self::_cargarVista($paso);
    }
    
    private static function _gestionPagina() {
       
        $paso1= mdlPaso1::getInstance();
        $paso=$paso1->onGestionPagina();
        return $paso;
    }
    
    private static function _cargarVista($paso) {
       
        $path = VISTAS_PATH.$paso.'.php';
        $paso='mdl'.$paso;
        // instancia mdlPaso1 o mdlPaso2 según el valor de $paso
        $paso=$paso::getInstance();
        $paso->onCargarVista($path);
    }
}

?>