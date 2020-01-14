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

                case "foto":
                    $str='';
                    foreach ($_FILES as $foto=>$values) {
                        $foto=$values['name'];
                        $str .= "<p><img src='fotos/".$foto. " ' alt=' ".$foto. " ' /></p>";
                    }
                    break;
       
                case "mail":
                        $str = getpost($tag);
                    break;

                case "precio":
                     $str = getpost($tag);
                     break;
            
                case "edad":
                    $str = getpost($tag);
                    break;
                            
                case "telefono":
                        $str = filter_var($_POST["telefono"],FILTER_SANITIZE_NUMBER_INT);
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