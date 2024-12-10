<?php
session_start();
include("conexion.php");

if (isset($_POST['iniciar_sesion'])) {
    $documento = $_POST['documento']; // Suponiendo que el campo es documento
    $password = $_POST['password'];

    // Verificar si el documento y la contraseña coinciden con los de la base de datos
    $consulta = "SELECT * FROM usuarios WHERE documento = '$documento' AND password = '$password'";
    $resultado = mysqli_query($conex, $consulta);
    $usuario = mysqli_fetch_assoc($resultado);

    if ($usuario) {
        // Iniciar la sesión del usuario
        $_SESSION['usuario_id'] = $usuario['id_usuario'];
        $_SESSION['usuario_nombre'] = $usuario['nombre'];

        // Redirigir a la página de reservar cita
        header("Location: reservar_cita.php");
        exit();
    } else {
        echo "<script>alert('Datos incorrectos. Intenta de nuevo.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Medical Center</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f4f7; /* Color de fondo suave */
            margin: 0;
            padding: 0;
        }

        .iniciar-sesion {
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

        input[type="text"], input[type="password"] {
            width: 100%; /* Ancho completo */
            padding: 10px; /* Espaciado interno */
            border: 1px solid #ced4da; /* Borde gris claro */
            border-radius: 4px; /* Bordes redondeados */
            font-size: 16px; /* Tamaño de fuente */
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

        p {
            margin-top: 15px; /* Espacio superior */
        }

        a {
            color: #007BFF; /* Color del enlace */
            text-decoration: none; /* Sin subrayado */
        }

        a:hover {
            text-decoration: underline; /* Subrayar al pasar el mouse */
        }
    </style>
</head>
<body>
    <section class="iniciar-sesion">
        <div class="container">
            <h2>Iniciar Sesión</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="documento">Documento de Identidad</label>
                    <input type="text" name="documento" id="documento" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <button type="submit" name="iniciar_sesion">Iniciar Sesión</button>
                <p>Aún no tienes cuenta? <a href="registrarse.php">Regístrate aquí</a></p>
            </form>
        </div>
    </section>
</body>
</html>


