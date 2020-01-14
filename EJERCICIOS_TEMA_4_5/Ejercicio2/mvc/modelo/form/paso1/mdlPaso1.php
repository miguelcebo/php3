<?php

class mdlPaso1 extends Singleton {

    const PAGE = 'paso1';

public function onGestionPagina() {

    // si no es la página solicitada, no se ejecuta nada
    if (getGet('pagina') != self::PAGE) return;

    // Validamos
        $val = Validacion::getInstance();
        $toValidate = array_merge($_POST, $_FILES);

        $rules = array(
        'nombre' => 'required|alpha_space',
        'apellidos' => 'required|alpha_space',
        'email'=>'required|email',
        'foto'=>'foto'
        );

    $val->addRules($rules);

    // verificamos que se ha pulsado el botón paso1
    if (!is_null(getPost(self::PAGE))) {

        $toValidate =array_merge($_POST,$_FILES);
        $val->run($toValidate);

    if ($val->isValid()) {
    // Guardamos los datos en session

        $_SESSION[self::PAGE] = $val->getOks();

    // Cambiamos el paso

        redirectTo('index.php?pagina=paso2');

    }


    }
}

public function onCargarVista($path) {

// si no es la página solicitada, no se ejecuta nada

if (getGet('pagina') != self::PAGE) 
    return;

    ob_start();
    include $path;
    $vista = ob_get_contents();
    ob_end_clean();
    echo Paso1Parser::loadContent($vista);

}


}