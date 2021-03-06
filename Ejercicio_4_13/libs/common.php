<?php /*LIBRERIA DE FUNCIONES QUE FACILITA LA PROGRAMACIÓN DEL PROGRAMADOR ;)  */

/* getTagsVista: Obtiene todos los campos {{CAMPO}} de una vista  */
function getTagsVista($vista)
{
    preg_match_all('/\{{(.*?)\}}/', $vista, $tags);
    return $tags[1];
}

/*getPost: Devuelve el post o en su defecto el valor que quiera el usuario si no existe  */
function getPost($name, $else = null)
{
    return (isset($_POST[$name])) ? $_POST[$name] : $else;
}

function getGet($name, $else = null)
{
    return (isset($_GET[$name])) ? $_GET[$name] : $else;
}

function getCookie($name, $else = null)
{
    return (isset($_COOKIE[$name])) ? $_COOKIE[$name] : $else;
}

function addCookie($nombre, $valor, $tiempoDias)
{
    return setcookie($nombre, $valor, time() + ($tiempoDias * 24 * 60 * 60));
}

function __autoload($clase)
{
    $paths = array(CONTROLLER_PATH, MODEL_PATH . "/" . substr($clase, 3, 5), LIBS_PATH, MODEL_PATH, MODEL_COMMON_PATH);

    // Buscamos en cada ruta los archivos
    foreach ($paths as $path) {
        if (file_exists("$path/$clase.php")) require_once("$path/$clase.php");
    }
}

/* getArray: Devuelve el valor del índice $index del array o en su defecto el valor que quiera el usuario si no existe    * @param $arr * @param $index  * @param null $else  * @return null */
function getArray($arr, $index, $else = null)
{
    return (isset($arr[$index])) ? $arr[$index] : $else;
}

function arrayToObj($array) {
// La clase StdClass es una clase predefinida en PHP vacía
    $object = new stdClass();
    foreach ($array as $key => $value) {
// Si $value es un array estamos creando un objeto que contiene un array de objetos
        if (is_array($value))
            $value = arrayToObj($value);
        $object->$key = $value;
    }
    return $object;
}

?>