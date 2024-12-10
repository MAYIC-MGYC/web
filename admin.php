<?php
session_start();
include("conexion.php");

if (isset($_POST['iniciar_sesion'])) {
    $admin_usuario = $_POST['admin_usuario']; // Usuario ingresado
    $admin_clave = $_POST['admin_clave'];     // Clave ingresada

    // Consulta para verificar las credenciales en la tabla administradores
    $consulta_admin = "SELECT * FROM administradores WHERE admin_usuario = '$admin_usuario' AND admin_clave = '$admin_clave'";
    $resultado_admin = mysqli_query($conex, $consulta_admin);
    $admin = mysqli_fetch_assoc($resultado_admin);

    if ($admin) {
        // Credenciales correctas: iniciar sesión
        $_SESSION['admin_id'] = $admin['id_admin'];
        $_SESSION['admin_nombre'] = $admin['admin_nombre'];

        // Redirigir al panel general del administrador
        header("Location: administrar_citas.php"); // Redirige al panel general
        exit();
    } else {
        // Credenciales incorrectas
        echo "<script>alert('Datos incorrectos. Intenta de nuevo.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Administrador</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f4f7;
            margin: 0;
            padding: 0;
        }
        .iniciar-sesion {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 400px;
            text-align: center;
        }
        h2 {
            color: #007BFF;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            background-color: #007BFF;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 10px 15px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        p {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <section class="iniciar-sesion">
        <div class="container">
            <h2>Iniciar Sesión - Administrador</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="admin_usuario">Usuario</label>
                    <input type="text" name="admin_usuario" id="admin_usuario" required>
                </div>
                <div class="form-group">
                    <label for="admin_clave">Clave</label>
                    <input type="password" name="admin_clave" id="admin_clave" required>
                </div>
                <button type="submit" name="iniciar_sesion">Iniciar Sesión</button>
            </form>
        </div>
    </section>
</body>
</html>


