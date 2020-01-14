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
        foreach (getTagsVista($vista) as $tag) {
            switch ($tag) {
                case "nombre":
                    $str = $_POST['nombre'];
                    break;
                case "apellidos":
                    $str = $_POST['apellidos'];
                    break;

                case "menu1":

                    $str = getPost($tag);
                    ($str) ? $str = implode(getPost($tag), ", ") : $str = 'Ninguno';

                    break;
                case "libros":
                    $str = getPost($tag);
                    ($str) ? $str = implode(getPost($tag), ", ") : $str = 'Ninguno';
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