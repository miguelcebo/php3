<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php

class mdlPaso1 extends Singleton{
    //Al haber un solo paso no existe el método onGestionPagina
    public function onCargarVista($path) {
        ob_start();
        include $path;
        $vista = ob_get_contents();
        ob_end_clean();
        echo mdlPaso1Parser::loadContent($vista);
    }
}


?>

</body>
</html>