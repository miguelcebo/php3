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

                case "edad":
                    $str=getPost($tag);
                    
                    break;
                case "precioMax":
                        $str=getPost($tag);
                    break;
                case "email":
                    $str=getPost($tag);
                break;
                case "telefono":
                    //$str=getPost($tag);
                    $str=filter_var(getPost($tag), FILTER_SANITIZE_NUMBER_INT);
                    //($str)?$str=implode(getPost($tag),','):$str="Ninguno";
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