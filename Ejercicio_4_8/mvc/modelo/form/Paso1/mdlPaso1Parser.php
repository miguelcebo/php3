<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php

class mdlPaso1Parser {
    public static function loadContent($vista) {
        $vista = self::_pasoSiguiente($vista);
        return $vista;
    }
    private static function _pasoSiguiente($vista) {
        foreach (getTagsVista($vista) as $tag) {
            switch ($tag) {
                case "contador":
                    $cuenta = Contador::getInstance();
                    $cuenta->contar();
                    $veces=$cuenta->getVeces();
                    $str = $veces;
                    break;
                case "session_id":
                    $str = session_id();
                    break;
                case "session_name":
                    $str = session_name();
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