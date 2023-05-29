<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin: 0 auto;
            display: block;
        }
    </style>
    <title>Perfil de Usuario</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <img 
                src="<?php echo isset($_SESSION['foto'])
                ?
                $_SESSION['foto']
                :
                base_url()."application/assets/img/foto_perfil_1.png" ?>"
                alt="Foto de perfil" class="profile-img img-fluid">

            </div>
            <div class="col-md-8">
                <h1>

                    <?php
                    if (isset($_SESSION['nombre']) && isset($_SESSION['apellidos'])) {
                        echo ucwords($_SESSION['nombre'] . ' ' . $_SESSION['apellidos']);
                    }
                    ?>
                </h1>
                <p>Cargo:
                    <?php
                    if (isset($_SESSION['cargo'])) {
                        echo ucwords($_SESSION['cargo']);
                    }
                    ?>
                </p>
                <p>Correo:
                    <?php
                    if (isset($_SESSION['correo'])) {
                        echo ucwords($_SESSION['correo']);
                    }
                    ?>
                </p>
                <p>Teléfono:
                    <?php
                    if (isset($_SESSION['numeroTelefono'])) {
                        echo ucwords($_SESSION['numeroTelefono']);
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>