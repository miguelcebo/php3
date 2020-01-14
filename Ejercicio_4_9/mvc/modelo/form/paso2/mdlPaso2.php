<?php
class mdlPaso2 extends Singleton{
public function onCargarVista($path) {
ob_start();
include $path;
$vista = ob_get_contents();
ob_end_clean();
echo mdlPaso2Parser::loadContent($vista);
}
}