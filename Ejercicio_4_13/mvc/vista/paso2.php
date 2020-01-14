<html>
<head>
    <meta charset="UTF-8">
    <title>Carrito de la compra</title>
    <style>
        th {
            font-size: 14px;
        }

        td {
            font-size: 14px;
        }
    </style>
</head>
<body>
<h1>Carro de la compra usando sesiones</h1>
<h1><i>Lista de precios</i></h1>
{{catalogo}}
<h2> Tu carro de la compra</h2>
<p>{{articulos}}</p>
<p>{{total}}</p>
<a href="index.php?accion=logout">Logout</a>
</body>

</html>