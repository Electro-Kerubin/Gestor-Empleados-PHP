<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Lista de Empleados</title>
</head>

<body>

    <div class="container mt-4">
        <h1>Lista de Empleados</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Cargo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($empleados as $empleado) {
                ?>

                    <tr>
                        <td><?= $empleado->id ?></td>
                        <td><?= $empleado->nombre ?> <?= $empleado->apellidos ?></td>
                        <td><?= $empleado->correo ?></td>
                        <td><?= $empleado->numero_telefono ?></td>
                        <?php if ($empleado->id_cargo === '2') { ?>
                            <td>Empleado</td>
                        <?php } ?>
                        <td>
                            <a href="<?php echo base_url()."Inicio/editarEmpleado/".$empleado->id ?>" class="btn btn-primary">Editar</a>
                            <a href="<?php echo base_url()."Inicio/eliminarEmpleado/".$empleado->id ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>

                <?php
                }
                ?>

            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>