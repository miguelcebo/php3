<?php
class Contador extends Singleton
{
private $_veces;
public function getVeces()
{
return $this->_veces;
}
public function contar() {
// Creamos o actualizamos la variable 'contador' de la sesión
if (isset($_SESSION['contador']))
$_SESSION['contador']++;
else
$_SESSION['contador'] = 0;
// Asignamos a _veces el valor de la variable 'contador' de la sesión
$this->_veces = Session::get('contador');
}
}