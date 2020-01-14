<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php

class mdlPaso2Parser
{
    public static function loadContent($vista)
    {
        $vista = self::_pasoSiguiente($vista);
        return $vista;
    }

    private static function _pasoSiguiente($vista)
    {
        $Coche=Coche::getInstance();
        $Coche->leerCookies();


        foreach (getTagsVista($vista) as $tag) {
            switch ($tag) {
                case "modelo":
                    $str = isset($_COOKIE['coche']) ? $Coche->getModelo() : $_POST[$tag];
                    break;
                case "marca":

                    $str = isset($_COOKIE['coche']) ? $Coche->getMarca() : $_POST[$tag];
                   // $str = $Coche->getMarca();
                    break;

                case "motor":
                    $str = isset($_COOKIE['coche']) ? $Coche->getMotor() : $_POST[$tag];
                   // $str = $Coche->getMotor();
                    break;

                case "cilindrada":
                    $str = isset($_COOKIE['coche']) ? $Coche->getCC() : $_POST[$tag];
                    //$str = $Coche->getCC();
                    break;

                case "combustible":
                    $str = isset($_COOKIE['coche']) ? $Coche->getCombustible() : $_POST[$tag];
                   // $str = $Coche->getCombustible();
                    break;



            }
            $vista = str_replace('{{' . $tag . '}}', $str, $vista);
        }
        return $vista;
    }
}

?>

</body>
</html>