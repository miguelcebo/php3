<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php

function __autoload( $clase )
{
$paths = array(
CONTROLLER_PATH,
MODEL_PATH,
MODEL_PATH."/".substr($clase,3,5),
LIBS_PATH
);
// Buscamos en cada ruta los archivos
foreach ($paths as $path) {
    if (file_exists("$path/$clase.php"))
        require_once("$path/$clase.php");
}
}
/*
/**
 * LIBRERIA DE FUNCIONES QUE FACILITA LA PROGRAMACIÓN DEL PROGRAMADOR ;)
 */
/**
 * getTagsVista: Obtiene todos los campos {{CAMPO}} de una vista
 */
function getTagsVista($vista)
{
    preg_match_all('/\{{(.*?)\}}/', $vista, $tags);
    return $tags[1];
}

/**
 * getPost: Devuelve el post o en su defecto el valor que quiera el usuario si no existe
 */
function getPost($name, $else = null)
{
    return (isset($_POST[$name])) ? $_POST[$name] : $else;
}





/**
 * getArray: Devuelve el valor del índice $index del array o en su defecto el valor que quiera el usuario si no existe
 * @param $arr
 * @param $index
 * @param null $else
 * @return null
 */

function getArray($arr, $index, $else = null)
{
    return (isset($arr[$index])) ? $arr[$index] : $else;
}

?>

</body>
</html>