<?php

class Articulo extends Singleton
{
// Lista de articulos
    private $_articulos = array(
        1 => array(
            'nombre' => 'Samosas de verduras',
            'descripcion' => ' Deliciosas empanadillas crujientes rellenas de patatas y verdura',
            'precio' => 8),
        2 => array(
            'nombre' => 'Croquetas de espinacas',
            'descripcion' => 'Crujientes croquetas de espinacas con cilandro ',
            'precio' => 9),
        3 => array(
            'nombre' => 'Pakora',
            'descripcion' => 'Verduras variadas rebozadas en harina de garbanzo',
            'precio' => 9),
        4 => array(
            'nombre' => 'Rollito de Queso',
            'descripcion' => 'Rollitos de queso freso con cebolla y especias',
            'precio' => 10),
        5 => array(
            'nombre' => 'Keema samosa',
            'descripcion' => 'Deliciosas empanadillas crujientes de carne picada condimentada con especias recién molidas',
            'precio' => 11)

    );

    public function getArticulos()
    {
        return $this->_articulos;
    }

    public function addArticulo($id)
    {

        if (!self::_existeArticulo($id))
            return;
        $sessArticulos = $this->getArticulosCarro();
        if (is_null(getArray($sessArticulos, $id))) {
            $_SESSION['carro'][$id] = 1; // Si no existe, lo añadimos
        } else {
            ++$_SESSION['carro'][$id];
        }

    }

    public function delArticulo($id)
    {
        if (!$this->_existeArticulo($id))

            return;
        $sessArticulos = $this->getArticulosCarro();

        if (!is_null(getArray($sessArticulos, $id)))
            unset($_SESSION['carro'][$id]);
    }

    public function delCant($id)
    {
        if (!$this->_existeArticulo($id))
            return;


        if (--$_SESSION['carro'][$id] <= 0) {
            unset($_SESSION['carro'][$id]);
        }

    }

    public function getArticulo($id)
    {
        return ($this->_existeArticulo($id)) ? $this->_articulos[$id] : null;
    }

    private function _existeArticulo($id)
    {

        return array_key_exists($id, $this->_articulos);
    }

    public function getArticulosCarro()
    {
        return Session::get('carro');
    }
}