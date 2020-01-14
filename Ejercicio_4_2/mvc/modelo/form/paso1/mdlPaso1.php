<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php

class mdlPaso1 extends Singleton{
   
    public function onGestionPagina() {
       
        $paso=PASO1;
        
        if (getGet('accion')== 'eliminar') {
        
            $cuenta = Contador::getInstance();
            $cuenta->eliminarCookie();
            $paso=PASO2;
        }
        return $paso;
    }

    public function onCargarVista($path){
// Activamos el almacenamiento del buffer de salida
        ob_start();
// se incluye la vista y se interpreta, si hubiera, el código php (en la vista paso1.php se instancia la clase validación)
        include $path;
// Guardamos el búffer de salida en la variable $vista
        $vista = ob_get_contents();
// Limpiamos (eliminamos) el búffer de salida y deshabilitamos el almacenamiento en el mismo
        ob_end_clean();
// Visualizamos la vista con las modificaciones realizadas por mdlPaso1Parser
        echo mdlPaso1Parser::loadContent($vista);
    }
}
?>

</body>
</html>