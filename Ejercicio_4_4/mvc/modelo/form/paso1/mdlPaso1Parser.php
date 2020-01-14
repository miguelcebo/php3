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
                case "color":
                    $color=Color::getInstance();

                    if(getGet('color') == null)

                       // Es la primera vez
                        $str = "ninguno";

                    else
                       $str = $color->getColor();
                    break;
            }
            $vista = str_replace('{{' . $tag . '}}', $str, $vista);
        }
        return $vista;
    }
}
