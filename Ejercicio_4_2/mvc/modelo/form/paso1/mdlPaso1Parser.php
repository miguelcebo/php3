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
            
                case "mensaje":
                    $cuenta = Contador::getInstance();
                    $cuenta->contar();
                    $veces=$cuenta->getVeces();
    
                    if ($veces == 1){ // Es la primera vez
                        $str= "Bienvenido por primera vez a nuestra página";
    
                    }else{
                        $str= "Has visitado nuestra página $veces veces";
                        break;
                    }
            }
        $vista = str_replace('{{' . $tag . '}}', $str, $vista);
        }   
    return $vista;
    }
}
?>

</body>
</html>