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
            $value = $error['value'];
            $rule = $error['rule'];
            switch ($rule) {
                case 'ok':
                    $vista = str_replace('{{class-' . $field . '}}', $str, $vista);
                    break;
                case 'required':
                    $required_fields .= "<strong>$field</strong>, ";
                    $vista = str_replace('{{class-' . $field . '}}', 'has-error', $vista);
                    break;
                case 'alphanum_simple':
                    $warning_fields .= "<strong>$field</strong>, ";
                    $vista = str_replace('{{class-' . $field . '}}', 'has-warning', $vista);
                    $vista = str_replace('{{war-' . $field . '}}', $validate->getStrRule($rule), $vista);
                    break;
            }
        }
// Sustituimos la etiqueta de {{errores}} por el error si procede o por un espacio en blanco si no hay errores y la etiqueta {{
        foreach (getTagsVista($vista) as $tag) {
            $str = '';
            switch ($tag) {
                case "errores":
                    if (strlen($required_fields) > 0) {
                        $required_fields = substr($required_fields, 0, -2);
                        $str .= "<p class='has-error'>El/Los campo(s) $required_fields son obligatorios</p>";
                    }
                    if (strlen($warning_fields) > 0) {
                        $warning_fields = substr($warning_fields, 0, -2);
                        $str .= "<p class='has-warning'>El/Los campo(s) $warning_fields tienen errores de formato.</p>";
                    }
                    if (Session::get('nombre') == 'off') {
                        $str .= "<p class='has-login'>El usuario/password no existe.</p>";
// eliminamos la variable nombre de la sesión para que no vuelva a salir este mensaje cuando se introducen mal los datos en el formulario
                        Session::del('nombre');
                    }
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