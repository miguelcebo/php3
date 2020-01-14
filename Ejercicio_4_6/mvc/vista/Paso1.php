<?php $val = Validacion::getInstance(); ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Paso 1</title>
    <style>
        form {
            padding-top: 50px;
        }

        .has-error {
            background: red;
            color: white;
            padding: 0.2em;
        }

        .has-warning {
            background: blue;
            color: white;
            padding: 0.2em;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="index.php" method="post" enctype="multipart/form-data">
        <h2>Elige tu cochazo</h2>
        {{errores}}
        <div>
            <label class=" {{class-marca}}" for="marca">Marca:</label>
            <input type="text" id="marca" name="marca"
                <?php echo $val->restoreValue('marca'); ?> >
            <span>{{war-marca}}</span>
        </div>
        <div>
            <label class=" {{class-modelo}}" for="modelo">Modelo:</label>
            <input type="text" id="modeloapellidos" name="modelo"
                <?php echo $val->restoreValue('modelo'); ?> >
            <span>{{war-modelo}}</span>
        </div>



        <br>

        <div>
            <label class=" {{class-motor}}" for="motor">Motor:</label>
            <input type="text" id="motor" name="motor"
                <?php echo $val->restoreValue('motor'); ?> >
            <span>{{war-motor}}</span>
        </div>
        <br>

        <div>
            <label class=" {{class-cilindrada}}" for="cilindrada">Cilindrada</label>
            <input type="text" id="cilindrada" name="cilindrada"
                <?php echo $val->restoreValue('cilindrada'); ?> >
            <span>{{war-cilindrada}}</span>
        </div>

        <br>

        <br>

        <div>
            <label for="combustible">Elija el combustible:</label>
            <br>
            <input type="radio" name="combustible" value="Gasolina" <?php echo $val->restoreRadios ('combustible', 'Gasolina'); ?>>Gasolina
            <input type="radio" name="combustible" value="Diesel" <?php echo $val->restoreRadios ('combustible', 'Diesel', true); ?>>Diesel

        </div>


        <input type="submit" name="paso1" value='Paso siguiente'>

        {{welcome}}

    </form>
</div>
</body>
</html>