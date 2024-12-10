<?php
include("conexion.php");

if (isset($_POST['registrar'])) {
    // Obtener los datos del formulario
    $nombre = mysqli_real_escape_string($conex, $_POST['nombre']);
    $documento = mysqli_real_escape_string($conex, $_POST['documento']);
    $email = mysqli_real_escape_string($conex, $_POST['email']);
    $password = mysqli_real_escape_string($conex, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conex, $_POST['confirm_password']);

    // Verificar si las contraseñas coinciden
    if ($password !== $confirm_password) {
        echo "<script>alert('Las contraseñas no coinciden.');</script>";
    } else {
        // Verificar si el correo ya está registrado
        $consulta = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = mysqli_query($conex, $consulta);

        if (mysqli_num_rows($resultado) > 0) {
            echo "<script>alert('El correo ya está registrado.');</script>";
        } else {
            // Verificar si el documento ya está registrado
            $consulta_documento = "SELECT * FROM usuarios WHERE documento = '$documento'";
            $resultado_documento = mysqli_query($conex, $consulta_documento);

            if (mysqli_num_rows($resultado_documento) > 0) {
                echo "<script>alert('El documento ya está registrado.');</script>";
            } else {
                // Insertar el nuevo usuario en la base de datos con contraseña como número
                $consulta_insertar = "INSERT INTO usuarios (nombre, documento, email, password) 
                                      VALUES ('$nombre', '$documento', '$email', '$password')";
                if (mysqli_query($conex, $consulta_insertar)) {
                    echo "<script>alert('Usuario registrado con éxito.');</script>";
                    // Redirigir a la página de inicio de sesión después de mostrar el mensaje
                    echo "<script>setTimeout(function(){ window.location.href = 'iniciarsesion.php'; }, 2000);</script>";
                    exit();
                } else {
                    echo "<script>alert('Error al registrar el usuario: " . mysqli_error($conex) . "');</script>";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Clínica Esperanza</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f4f7; /* Color de fondo suave */
            margin: 0;
            padding: 0;
        }

        .registro {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Centra verticalmente */
        }

        .container {
            background-color: #ffffff; /* Fondo blanco para el formulario */
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Sombra sutil */
            padding: 40px;
            width: 400px; /* Ancho del formulario */
            text-align: center; /* Centrar texto */
        }

        h2 {
            color: #007BFF; /* Color azul clínico */
            margin-bottom: 20px; /* Espacio debajo del título */
        }

        .form-group {
            margin-bottom: 20px; /* Espacio entre campos */
            text-align: left; /* Alinear etiquetas a la izquierda */
        }

        label {
            display: block; /* Hacer que la etiqueta ocupe toda la línea */
            margin-bottom: 5px; /* Espacio debajo de la etiqueta */
            font-weight: bold; /* Texto en negrita */
        }

        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%; /* Ancho completo */
            padding: 10px; /* Espaciado interno */
            border: 1px solid #ced4da; /* Borde gris claro */
            border-radius: 4px; /* Bordes redondeados */
            font-size: 16px; /* Tamaño de fuente */
            box-sizing: border-box; /* Incluye padding y borde en el ancho total */
        }

        button {
            background-color: #007BFF; /* Color del botón */
            color: #ffffff; /* Color del texto del botón */
            border: none; /* Sin borde */
            border-radius: 4px; /* Bordes redondeados */
            padding: 10px 15px; /* Espaciado interno */
            font-size: 18px; /* Tamaño de fuente */
            cursor: pointer; /* Cambia el cursor al pasar el mouse */
            transition: background-color 0.3s; /* Transición suave para el color */
        }

        button:hover {
            background-color: #0056b3; /* Color al pasar el mouse */
        }
    </style>
</head>
<body>
    <section class="registro">
        <div class="container">
            <h2>Registrarse</h2>
            <form action="registrarse.php" method="post">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required placeholder="Ingresa tu nombre">
                </div>

                <div class="form-group">
                    <label for="documento">Documento:</label>
                    <input type="text" id="documento" name="documento" required placeholder="Ingresa tu documento">
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" id="email" name="email" required placeholder="Ingresa tu correo">
                </div>

                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required placeholder="Ingresa tu contraseña">
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirmar contraseña:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirma tu contraseña">
                </div>

                <button type="submit" name="registrar">Registrar</button>
            </form>
        </div>
    </section>
</body>
</html>

