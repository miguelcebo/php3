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
        $str = '';
        $paso = PASO1;
// Instanciamos la clase Validacion
        $val = Validacion::getInstance();
// Añadimos el array en la propiedad $_rules de Validacion
        $rules = array(
            'nombre' => 'required|alpha_space',
            'apellidos' => 'required|alpha_space',
            'menu1' => '',
            'libros' => ''
        );
// Añadimos el array en la propiedad $_rules de Validacion
        $val->addRules($rules);
        /*MODIFICACION PARA HACER EL EJERCICIO*/
        if (!isset($_COOKIE["primeraVisita"])) {

            addCookie("primeraVisita", time(), 1);
        }

// Cambiamos el paso si se ha pulsado el boton paso1 que envía el formulario
        if (isset($_POST['paso1'])) {
// Almacenamos en una variable todo el contenido de la superglobal $_POST
            $toValidate = $_POST;
// Validamos
            $val->run($toValidate);
            if ($val->isValid()) {


                /*MODIFICACION PARA HACER EL EJERCICIO*/

                if (isset($_POST['libros'])) {
                    foreach (getPost('libros') as $tipo)
                        $str[] = $tipo;
                    ($str) ? $str = implode(',', $str) : $str = 'Ninguno';
                    addCookie("oldTipoLibros", $str, 1);

                    $str = '';

                }

                if (isset($_POST['menu1'])) {

                    foreach (getPost('menu1') as $tipo)
                        $str[] = $tipo;
                    ($str) ? $str = implode(',', $str) : $str = 'Ninguno';
                    addCookie("oldTipoMusica", $str, 1);

                } else {

                    addCookie('oldTipoMusica', $str = 'Ninguno', 1);

                }


                $veces = (int)getCookie('welcome', 0) + 1;
                addCookie('welcome', $veces, 1);


                // Cambiamos el paso
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