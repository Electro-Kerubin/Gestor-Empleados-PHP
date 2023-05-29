<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Panel de control</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Panel de control</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url('Inicio/perfil') ?>">Perfil</a>
                </li>

                <!-- Seccion exclusiva para administrador  -->
                <?php
                if ($_SESSION['cargo'] == 'Administrador') {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('Inicio/empleados') ?>">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo "nuevoempleado" ?>">Agregar Empleado</a>
                    </li>
                <?php
                }
                ?>
                <!-- ####################################  -->

                <li class="nav-item">
                    <a class="nav-link" href="#">Mis tareas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mensajes</a>
                </li>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn-outline" href="<?php echo "cerrarsesion" ?>">Cerrar sesión</a>
                    </li>
                </ul>
            </ul>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>