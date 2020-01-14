<?php

class mdlPaso2 extends Singleton{

    const PAGE = 'paso2';

    public function onGestionPagina() {

        if (getGet('pagina') != self::PAGE) 
            
            return;

        // Si no ha pasado por el paso1 (si se modifica el valor de la variable en la url), se vuelve a visualizar la página inicial
        if (!isset($_SESSION['paso1'])) 
            
            redirectTo('index.php');

    }

    public function onCargarVista($path) {
        if (getGet('pagina') != self::PAGE) 

            return;

        ob_start();
        include $path;
        $vista = ob_get_contents();
        ob_end_clean();
        echo Paso2Parser::loadContent($vista);
        
    }

}