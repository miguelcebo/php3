<html>
<head>
    <meta charset="UTF-8">
    <title>PHP: Contador de accesos (cookies)</title>
    <style>
        dl {
            padding-top: 50px;
        }
    </style>
</head>
<body>

<form action="index.php" method="post">
    {{mensaje}}
<p>Elija una opción</p>
    <br>
<ul>

    <li>Crear una cookie con una duración de <input type="text" name="duracion" value="10"> segundos (entre 1 y 60) <input type="submit" name="Crear" value="Crear"></li>
    <li>Comprobar la cookie <input type="submit" name="Comprobar" value="Comprobar"></li>
    <li>Destruir la cookie <input type="submit" name="Destruir" value="Destruir"></li>

</ul>
</form>
</body>
</html>
