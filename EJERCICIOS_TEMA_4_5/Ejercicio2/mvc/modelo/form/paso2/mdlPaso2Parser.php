<?php
class Paso2Parser {

 public static function loadContent($vista) {

    $vista = self::_pasoSiguiente($vista);
    return $vista;

 }

 private static function _pasoSiguiente($vista) {

$body = "Nombre: " . $_SESSION['paso1']['nombre'] . "<br>";
$body .= "Apellidos: " . $_SESSION['paso1']['apellidos'] . "<br>"; 
$body .= "Email: " . $_SESSION['paso1']['email'] . "<br>";
$datos['cuerpo'] = $body;
$datos['foto'] = $_SESSION['paso1']['foto']['name'];
$mail = Correo::sendMail($datos);
 foreach (getTagsVista($vista) as $tag) {

    $str = '';
    
    switch ($tag) {

        case "nombre":
        $str .= $_SESSION['paso1']['nombre'];
        break;

        case "apellidos":
        $str .= $_SESSION['paso1']['apellidos'];
        break;

        case "foto":
        $str = "<img src='fotos/".$_SESSION['paso1']['foto']['name']."'>";
        break;
        
        case "email":
        $str = $_SESSION['paso1']['email'];
        break;

 }

 $vista = str_replace('{{' . $tag . '}}', $str, $vista);

 }
 return $vista;

 }
}