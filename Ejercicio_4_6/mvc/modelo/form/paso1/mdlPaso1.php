<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php

class mdlPaso1 extends Singleton
{
    public function onGestionPagina()
    {
        $paso = PASO1;
// Instanciamos la clase Validacion
        $val = Validacion::getInstance();
// Añadimos el array en la propiedad $_rules de Validacion
        $rules = array(
            'modelo' => 'required',
            'marca' => 'required',
            'motor' => 'required',
            'cilindrada' => 'required|numeric',
            'combustible' => 'required'

        );
// Añadimos el array en la propiedad $_rules de Validacion
        $val->addRules($rules);
// Cambiamos el paso si se ha pulsado el boton paso1 que envía el formulario
        if (isset($_POST['paso1']) or isset ($_COOKIE['coche'])) {
            $coche = Coche::getInstance();
            if (isset($_POST['paso1'])) {
                $toValidate = $_POST;
// Validamos
                $val->run($toValidate);
                if ($val->isValid()) {

                    $veces = (int)getCookie('welcome', 0) + 1;
                    addCookie('welcome', $veces, 1);
// Creamos las cookies y Cambiamos el paso
                    $coche->crearCookies();
                    $paso = PASO2;
                }

            } elseif (getGet('accion') == 'olvidar') {
                $coche->olvidarInfo();
            } else {
                $paso = PASO2;
            }
        }
        return $paso;
    }


    public function onCargarVista($path)
    {
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