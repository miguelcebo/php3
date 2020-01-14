<?php
class mdlPaso1 extends Singleton{

    public function onGestionPagina() {
        
        $paso = PASO1;
        // Instanciamos la clase Validacion
        $color = Color::getInstance();
        $color -> ponerColor();
        if (getGet('accion')== 'probarColor') {
            $paso=PASO2;
            }
            return $paso;
    }

    public function onCargarVista($path) {
        
        ob_start();
        include $path;
        $vista = ob_get_contents();
        ob_end_clean();
        echo mdlPaso1Parser::loadContent($vista);
    }
}

