<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php


class mdlPaso1Parser
{
    public static function loadContent($vista)
    {
        $vista = self::_pasoSiguiente($vista);
        return $vista;
    }

    private static function _pasoSiguiente($vista)
    {



        foreach (getTagsVista($vista) as $tag) {
            switch ($tag) {
                case "mensaje":
                    $cookie = Cookie::getInstance();
                    foreach ($_POST as $key => $value) {
                        switch ($value) {
                            case "Crear":
                                $cookie->crearCookie();
                                break;
                            case "Comprobar":
                                $cookie->comprobarCookie();
                                break;
                            case "Destruir":
                                $cookie->eliminarCookie();
                                break;
                        }
                    }

                    $str = $cookie->getMensaje();
                    $vista = str_replace('{{' . $tag . '}}', $str, $vista);
                    break;
            }
        }
        return $vista;

    }
}


?>

</body>
</html>