<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php

class Articulo extends Singleton {
// Lista de articulos
    private $_articulos = array(
        1 => array(
            'nombre' => 'Samosas de verdura',
            'descripcion' => 'Deliciosas empanadillas crujientes rellenas de patata y verdura',
            'precio' => 8),
        2 => array(
            'nombre' => 'Croquetas de espinacas',
            'descripcion' => 'Crujientes croquetas de espinacas con cilantro',
            'precio' => 9),
        3 => array(
            'nombre' => 'Pakora',
            'descripcion' => 'Verdura variadas rebozadas en harina de garbanzo',
            'precio' => 9),
        4 => array(
            'nombre' => 'Rollitos de Queso',
            'descripcion' => 'Rollitos de queso fresco con cebolla y especias',
            'precio' => 10),
        5 => array(
            'nombre' => 'Keema samosa',
            'descripcion' => 'Deliciosas empanadillas crujientes rellenas de carne picada',
            'precio' => 11)
    );
    public function getArticulos() {
        return $this->_articulos;
    }
    public function addArticulo($id) {
        if (!self::_existeArticulo($id))
            return;
        $sessArticulos = $this->getArticulosCarro();
        if (is_null(getArray($sessArticulos, $id)))
            $_SESSION['carro'][$id] = 1; // Si no existe, lo añadimos
    }
    public function delArticulo($id) {
        if (!$this->_existeArticulo($id))
            return;
        $sessArticulos = $this->getArticulosCarro();
        if (!is_null(getArray($sessArticulos, $id)))
            unset($_SESSION['carro'][$id]);
    }
    public function getArticulo($id) {
        return ($this->_existeArticulo($id)) ?$this->_articulos[$id] : null;
    }
    private function _existeArticulo($id) {
        return (array_key_exists($id,$this->_articulos)) ? true : false;
    }
    public function getArticulosCarro() {
        return Session::get('carro');
    }
}

?>

</body>
</html>