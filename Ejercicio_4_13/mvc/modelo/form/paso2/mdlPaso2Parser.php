<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php

class mdlPaso2Parser
{
    public static function loadContent($vista)
    {
        $vista = self::_pasoSiguiente($vista);
        return $vista;
    }

    private static function _pasoSiguiente($vista)
    {

        if (getGet('accion') == 'logout')
            Session::closeSession();

        $articulo = Articulo::getInstance();
        // Si se ha pulsado en los enlaces de añadir o eliminar articulo el método correspondiente
        // añadirá o eliminará el artículo del carro (que se almacena en $_SESSION)
        $articulo->addArticulo(getGet('addProd'));
        $articulo->delArticulo(getGet('delProd'));
        $articulo->delCant(getGet('delCant'));

        foreach (getTagsVista($vista) as $tag) {
            $str = '';
            switch ($tag) {
                case 'catalogo':
                    $str = "<table>
                                 <hr><thead><tr>
                                 <th>Plato</th>
                                 <th>Descripción</th>
                                 <th>Precio</th>
                                 <th>Acción</th>
                                 </tr></thead></hr>";
                    foreach ($articulo->getArticulos() as $artId => $art) {
                        $articuloSTD = arrayToObj($art);
                        $str .= "<tr>
                                     <td>
                                     <strong>$articuloSTD->nombre</strong>
                                    <td>$articuloSTD->descripcion </td>
                                    <td>$articuloSTD->precio</td>
                                     </td>
                                     <td><a href=\"index.php?addProd=$artId\">Añadir al Carro</a></td>
                                 </tr>";
                    }
                    $str .= "</table>";
                    break;
                case 'articulos':
                    $sessArticulos = $articulo->getArticulosCarro();
                    if (empty($sessArticulos)) {
                        $str = '<p>No hay articulos en el carro.</p>';
                        continue;
                    }
                    $str = "<table>
                                 <thead><tr>
                                 <th>Plato</th>
                                 <th>P.Unidad</th>
                                 <th>Acciones</th>
                                 </tr></thead>";
                    foreach ($sessArticulos as $artId => $cantidad) {
                        $articuloSTD = arrayToObj($articulo->getArticulo($artId));
                        $str .= "<tr>
                                     <td>$articuloSTD->nombre</td>
                                     <td>" . $_SESSION['carro'][$artId] . "</td>
                                     <td>$articuloSTD->precio €</td>
                                     <td>
                                     <a href=\"index.php?delProd=$artId\">Borrar plato</a><br>
                                     <a href=\"index.php?delCant=$artId\">Quitar unidad</a><br>
                                     </td>
                                     </tr>";
                    }
                    $str .= "</table>";
                    break;
                case 'total':
                    $sessArticulos = $articulo->getArticulosCarro();
                    if (is_null($sessArticulos)) continue;
                    $total = 0;
                    foreach ($sessArticulos as $artId => $cantidad)
                        $total += $articulo->getArticulo($artId)['precio'] * $_SESSION["carro"][$artId];
                    $str = "<p><strong>Total:</strong> $total €</p>";
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