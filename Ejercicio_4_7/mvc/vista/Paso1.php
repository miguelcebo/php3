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
        <h2>Formulario: Paso 1</h2>
        {{errores}}
        <div>
            <label class=" {{class-nombre}}" for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre"
                <?php echo $val->restoreValue('nombre'); ?> >
            <span>{{war-nombre}}</span>
        </div>
        <div>
            <label class=" {{class-apellidos}}" for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos"
                <?php echo $val->restoreValue('apellidos'); ?> >
            <span>{{war-apellidos}}</span>
        </div>
        <br>
        <div>

            <label for="menu1"> ¿Qué tipo de música te gusta escuchar?</label>
            <select name="menu1[]" size="4" multiple="multiple">
                <option value="Rock" <?php echo $val->restoreSelects('menu1', 'Rock', true); ?>>Rock</option>
                <option value="Pop" <?php echo $val->restoreSelects('menu1', 'Pop'); ?>>Pop</option>
                <option value="Regee" <?php echo $val->restoreSelects('menu1', 'Regee', true); ?>>Regee</option>
                <option value="Clásica" <?php echo $val->restoreSelects('menu1', 'Clásica'); ?>>Clásica</option>

            </select>
            <br>
        </div>
        <div>
            <label for="libros">¿Qué tipo de libros lees?</label>
            <br>
            Novela negra <input type="checkbox" name="libros[]"
                                value="Novela negra" <?php echo $val->restoreCheckboxes('libros', 'Novela negra', true); ?>><br>
            Ciencia Ficción <input type="checkbox" name="libros[]"
                                   value="Ciencia Ficción" <?php echo $val->restoreCheckboxes('libros', 'Ciencia Ficción'); ?>><br>
            Fantasia <input type="checkbox" name="libros[]"
                            value="Fantasia" <?php echo $val->restoreCheckboxes('libros', 'Fantasia', true); ?>>
        </div>
        <br>
        <input type="submit" name="paso1" value='Paso siguiente'>
        <br>
        {{welcome}}

    </form>
</div>
</body>
</html>