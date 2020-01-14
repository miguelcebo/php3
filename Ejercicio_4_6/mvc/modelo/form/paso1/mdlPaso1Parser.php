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
        if (!isset($_POST['paso1']))
            $vista = self::_inicio($vista);
        else
            $vista = self::_pasoSiguiente($vista);
        return $vista;
    }

    private static function _inicio($vista)
    {
        $str = '';
        foreach (getTagsVista($vista) as $tag) {

            switch ($tag) {
                case "welcome":
                    $veces = (int)getCookie('welcome', 0);
                    if ($veces == 0)
                        $str = "<b>Bienvenido por primera vez a nuestra página</b>";
                    else
                        $str = "<b>Has visitado nuestra página $veces veces</b>";
                    break;
                default:
                    $str = '';
            }

            $vista = str_replace('{{' . $tag . '}}', $str, $vista);
        }
        return $vista;
    }

    private static function _pasoSiguiente($vista)
    {
        $validate = Validacion::getInstance();
        $str = '';
        $required_fields = '';
        $warning_fields = '';
        foreach ($validate->getErrors() as $field => $error) {
            $rule = $error['rule'];
            switch ($rule) {
                case 'ok':
                    $vista = str_replace('{{class-' . $field . '}}', $str, $vista);
                    break;
                case 'required':
                    $required_fields .= "<strong>$field</strong>, ";
                    $vista = str_replace('{{class-' . $field . '}}', 'has-error', $vista);
                    break;
                case 'alpha_space':
                    $warning_fields .= "<strong>$field</strong>, ";
                    $vista = str_replace('{{class-' . $field . '}}', 'has-warning', $vista);
                    $vista = str_replace('{{war-' . $field . '}}', $validate->getStrRule($rule), $vista);
                    break;

                case 'numeric':
                    $warning_fields .= "<strong>$field</strong>, ";
                    $vista = str_replace('{{class-' . $field . '}}', 'has-warning', $vista);
                    $vista = str_replace('{{war-' . $field . '}}', $validate->getStrRule($rule), $vista);
                    break;

                case 'edad':
                    $warning_fields .= "<strong>$field</strong>, ";
                    $vista = str_replace('{{class-' . $field . '}}', 'has-warning', $vista);
                    $vista = str_replace('{{war-' . $field . '}}', $validate->getStrRule($rule), $vista);
                    break;

                case 'email':
                    $warning_fields .= "<strong>$field</strong>, ";
                    $vista = str_replace('{{class-' . $field . '}}', 'has-warning', $vista);
                    $vista = str_replace('{{war-' . $field . '}}', $validate->getStrRule($rule), $vista);
                    break;

                case 'foto':
                    $warning_fields .= "<strong>$field</strong>, ";
                    $vista = str_replace('{{class-' . $field . '}}', 'has-warning', $vista);
                    $vista = str_replace('{{war-' . $field . '}}', $validate->getStrRule($rule)[$field], $vista);
                    break;
            }
        }
// Sustituimos la etiqueta de {{errores}} por el error si procede o por un espacio en blanco si no hay errores
        foreach (getTagsVista($vista) as $tag) {
            $str = '';
            switch ($tag) {
                case "errores":
                    if (strlen($required_fields) > 0) {
                        $required_fields = substr($required_fields, 0, -2); //quitamos la coma y el espacio final
                        $str .= "<p class='has-error'>El/Los campo(s) $required_fields son obligatorios</p>";
                    }
                    if (strlen($warning_fields) > 0) {
                        $warning_fields = substr($warning_fields, 0, -2);
                        $str .= "<p class='has-warning'>El/Los campo(s) $warning_fields tienen errores de formato.</p>";
                    }
                    break;

                case "welcome":
                    $veces = (int)getCookie('welcome', 0);
                    if ($veces == 0)
                        $str = "<b>Bienvenido por primera vez a nuestra página</b>";
                    else
                        $str = "<b>Has visitado nuestra página $veces veces</b>";
                    break;
                default:
                    $str = '';
            }
            $vista = str_replace('{{' . $tag . '}}', $str, $vista);
        }
        return $vista;
    }
}

?>

</body>
</html>