<?php
class Productos extends Singleton {

// Lista de articulos
private $_productos = array(

    1 => array(
    'nombre' => 'Samosas de verduras',
    'descripcion'=>'Deliciosas empanadillas crujientes rellenas de patata y verdura.',
    'precio' => 8),
    2 => array(
    'nombre' => 'Croquetas de espinacas',
    'descripcion'=>'Crujientes croquetas de espinacas con cilantro',
    'precio' => 9),
    3 => array(
    'nombre' => 'Pakora',
    'descripcion'=>'Verduras variadas rebozadas en harina de garbanzo',
    'precio' => 9),
    4 => array(
    'nombre' => 'Rollitos de Queso',
    'descripcion'=>'rollitos de queso fresco con cebolla y especias',
    'precio' => 10),
    5 => array(
        'nombre' => 'Kemma samosa',
        'descripcion'=>'Deliciosas empanadillas crujientes rellenas de carne picada condimentada con especias recién molidas.',
        'precio' => 11)

);


public function getProducto() {

        
    return $this->_productos;
    }


    public function addProductos($id) {
    if (!self::_existeProductos($id))
    return;
    $sessProductos = $this->getProductosCarro();
    if (is_null(getArray($sessProductos, $id)))
    $_SESSION['carro'][$id] = 1; // Si no existe, lo añadimos
    else
    $_SESSION['carro'][$id]+=1;

}


public function delProductos($id) {

    if (!$this->_existeProductos($id))
    return;
    $sessProductos = $this->getProductosCarro();
    if (!is_null(getArray($sessProductos, $id)))
    unset($_SESSION['carro'][$id]);
    }



    public function getProductos($id) {
    return ($this->_existeProductos($id)) ?$this->_productos[$id] : null;
    }
    private function _existeProductos($id) {
    return (array_key_exists($id,$this->_productos)) ? true : false;
    }
    public function getProductosCarro() {
    return Session::get('carro');
    
}

public function addPlato($id){
    
if (!self::_existeProductos($id)){
return;
$sessProductos = $this->getProductosCarro();
}

if (is_null(getArray($sessProductos, $id))){
$_SESSION['carro'][$id] = 1; // Si no existe, lo añadimos
}
else{
    $_SESSION['carro'][$id] += 1;
}


}

public function delCant($id){

    if (!$this->_existeProductos($id))
    return;
    $sessProductos = $this->getProductosCarro();
    if (!is_null(getArray($sessProductos, $id)))
    $cantidad=$_SESSION['carro'][$id]-1;
    if($cantidad==0)
    unset($_SESSION['carro'][$id]);
    else
        $_SESSION['carro'][$id]=$cantidad;
    }



}