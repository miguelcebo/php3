<?php $val = Validacion::getInstance(); ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sistema de Conexión/Desconexión</title>
    <style>
        form {
            padding-top: 50px;
        }
        .has-error { background: red; color: white; padding: 0.2em; }
        .has-warning { background: blue; color: white; padding: 0.2em; }
        .has-login { background: green; color: white; padding: 0.2em; }
    </style>
</head>
<body>
<div>
    <form action="index.php" method="post">
        <h1>Sistema de Conexión/Desconexión</h1>
        {{errores}}
        <div>
            <label class=" {{class-nombre}}" for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre"
                <?php echo $val->restoreValue('nombre'); ?> >
            <span>{{war-nombre}}</span>
        </div>
        <div>
            <label class=" {{class-password}}" for="apellidos">Password</label>
            <input type="password" id="password" name="password">
            <span>{{war-password}}</span>
        </div>
        <button type="submit" name="paso1">Login</button>
    </form>
</div>
</body>
</html>