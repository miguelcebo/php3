<?php

class mdlPaso2Parser {
    
    public static function loadContent($vista)
    {
        $vista = self::_pasoSiguiente($vista);
        return $vista;
    }

    private static function _pasoSiguiente($vista) {

        $str = "";

        $color=Color::getInstance();
        $color->probarColor();


        foreach (getTagsVista($vista) as $tag) {
            
            switch ($tag) {
                case "":
                    $str = $color->getColor();
                    break;
                case "estilo":
                    $str = $color->getEstilo();
                    break;


            }



            $vista = str_replace('{{' . $tag . '}}', $str, $vista);
        }

        return $vista;
    }
}

?>
