<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php

// General
define('PASO1', 'paso1');
define('PASO2', 'paso2');

const USUARIOS = array(

    'juan' => 'secretjuan',
    'pepe' => 'secretpepe',
    'maria' => 'secretmaria');



// Directorios
define('PAGE_PATH', dirname(__FILE__)); // dirname(__FILE__) es lo mismo que __DIR__
define('LIBS_PATH', PAGE_PATH.'/libs/');
define('CONTROLLER_PATH', PAGE_PATH.'/mvc/');
define('COMMON_PATH', PAGE_PATH.'/mvc/common/');
define('MODEL_PATH', PAGE_PATH.'/mvc/modelo/form/');
define('VISTAS_PATH', PAGE_PATH.'/mvc/vista/');

?>

</body>
</html>