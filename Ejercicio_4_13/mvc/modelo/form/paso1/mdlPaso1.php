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

// Si se ha pulsado el enlace logout, se eliminan todos los datos de la sesión
        if (getGet('accion') == 'logout')
            Session::closeSession();
        foreach (USUARIOS as $username => $contrasenia) {
// Si el usuario ya se ha logueado correctamente no se le vuelve a solicitar
            if (Session::get('nombre') == $username) {
                $paso = PASO2;

            } else {
// Instanciamos la clase Validacion
                $val = Validacion::getInstance();
                $rules = array(
                    'nombre' => 'required|alpha_space',
                    'password' => 'required|alpha_space'
                );


// Almacenamos en una array los campos que son requeridos y su tipo
                $val->addRules($rules);
// Cambiamos el paso si se ha pulsado el boton paso1 que envía el formulario
                if (isset($_POST['paso1'])) {
// Almacenamos en una variable todo el contenido de la superglobal $_POST
                    $toValidate = $_POST;
// Validamos
                    $val->run($toValidate);
                    if ($val->isValid()) {

                        if (getPost("nombre") == $username and getPost("password") == $contrasenia) {
                            $_SESSION["nombre"] = getPost("nombre");
// Cambiamos el paso
                            return PASO2;
                        } else $_SESSION["nombre"] = 'off';

                    }
                }
            }
        }
        return $paso;
    }


    public function onCargarVista($path)
    {
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