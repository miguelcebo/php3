<?php $val = Validacion::getInstance(); ?>


<html>

        <head>
                <meta charset="UTF-8">
                <title>Paso 1</title>
                <style>
                form {
                padding-top: 50px;
                }
                .has-error {background: red; color: white; padding: 0.2em;}
                .has-warning {background: blue; color: white; padding: 0.2em;}
                </style>


        </head>

        <body>

                <div class="container">

                        <form action="index.php?pagina=paso1" method="post" enctype="multipart/form-data">

                                <h2>Formulario: Paso 1</h2>
                                {{errores}}
                                
                                <div>
                                        <label class=" {{class-nombre}}" for="nombre">Nombre</label>
                                        <input type="text" id="nombre" name="nombre" value="<?php echo $val->restoreValue('nombre'); ?>">
                                        <span>{{war-nombre}}</span>
                                </div>

                                <div>
                                        <label class=" {{class-apellidos}}" for="apellidos">Apellidos</label>
                                        <input type="text" id="apellidos" name="apellidos" value="<?php echo $val->restoreValue('apellidos'); ?>">
                                        <span>{{war-apellidos}}</span>
                                </div>

                                <div>
                                        <label class=" {{class-email}}" for="email">Email</label>
                                        <input type="email" id="email" name="email" value="<?php echo $val->restoreValue('email'); ?>">
                                        <span>{{war-nombre}}</span>
                                </div>
                                
                                <div>
                                        <label class=" {{class-foto}}" for="foto">Foto</label>
                                        <input type="file" id="foto" name="foto" value="<?php echo $val->restoreValue('foto'); ?>">
                                        <span>{{war-foto}}</span>
                                </div>
                                <br>

                                <button type="submit" name="paso1">Paso siguiente </button>

                        </form>

                </div>
        </body>

</html>