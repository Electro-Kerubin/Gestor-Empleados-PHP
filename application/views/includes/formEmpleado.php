<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Agregar Nuevo Empleado</title>
</head>

<body>

    <?php 

        //print_r($empleado);

        if (!isset($empleado[0])) {
            
        }
    ?>

    <div class="container mt-4">
        <h1>Agregar Nuevo Empleado</h1>
        <form enctype="multipart/form-data" action="<?php echo isset($empleado) ? base_url('Inicio/guardarEmpleado/' . $empleado[0]->id) : '' ?>" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" value="<?php echo isset($empleado) ? $empleado[0]->nombre : '' ?>" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" value="<?php echo isset($empleado) ? $empleado[0]->apellidos : '' ?>" class="form-control" id="apellidos" name="apellidos" required>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" value="<?php echo isset($empleado) ? $empleado[0]->fecha_nacimiento : '' ?>" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" <?php echo isset($empleado) ? 'readonly' : ''  ?> required>
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" value="<?php echo isset($empleado) ? $empleado[0]->correo : '' ?>" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" value="<?php echo isset($empleado) ? $empleado[0]->contrasena : '' ?>" class="form-control" id="contrasena" name="contrasena" <?php echo isset($empleado) ? 'readonly' : ''  ?> required>
            </div>
            <div class="form-group">
                <label for="telefono">Número de Teléfono:</label>
                <input type="num" value="<?php echo isset($empleado) ? $empleado[0]->numero_telefono : '' ?>" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select class="form-control" id="sexo" name="sexo" <?php echo isset($empleado) ? 'disabled' : ''  ?> required>
                    <option value="">Seleccionar</option>
                    <option value="1" <?php echo (isset($empleado) && $empleado[0]->id_cargo === '1') ? 'selected' : ''; ?> >Hombre</option>
                    <option value="2" <?php echo (isset($empleado) && $empleado[0]->id_cargo === '2') ? 'selected' : ''; ?> >Mujer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cargo">Cargo:</label>
                <select class="form-control" id="cargo" name="cargo" required>
                    <option value="">Seleccionar</option>
                    <option value="1" <?php (isset($empleado) && $empleado[0]->id_cargo === '1') ? 'selected' : ''; ?>>Administrador</option>
                    <option value="2" <?php echo (isset($empleado) && $empleado[0]->id_cargo === '2') ? 'selected' : ''; ?>>Empleado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" value="<?php echo isset($empleado) ? $empleado[0]->foto : '' ?>" class="form-control-file" id="foto" name="foto" <?php echo isset($empleado) ? 'disabled' : '' ?>>
                <span id="mensaje_foto"></span>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

    <script>
        // Obtener referencia al campo de archivo
        var fileInput = document.getElementById('foto');

        // Escuchar el evento 'change' en el campo de archivo
        fileInput.addEventListener('change', function() {
            // Verificar si se ha seleccionado un archivo
            if (fileInput.files.length > 0) {
                // Actualizar el mensaje de archivo seleccionado
                document.getElementById('mensaje_foto').textContent = 'Archivo seleccionado';
            } else {
                // Borrar el mensaje si no hay archivo seleccionado
                document.getElementById('mensaje_foto').textContent = '';
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>