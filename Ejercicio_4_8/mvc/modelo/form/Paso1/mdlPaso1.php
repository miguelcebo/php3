<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php

class mdlPaso1 extends Singleton{
    public function onGestionPagina() {
        $paso = PASO1;
        if (getGet('accion')== 'inicializar') {


            $cont = Contador::getInstance();
            $cont -> borrarCont();

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

?>

</body>
</html>