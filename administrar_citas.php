<?php
session_start();

// Verificar si el usuario es un administrador
if (!isset($_SESSION['admin_id'])) {
    header("Location: iniciar_sesion_admin.php");
    exit();
}

// Incluir la conexión a la base de datos
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración - Clínica Esperanza</title>
    <style>
        /* Estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f6f9;
            color: #333;
            font-size: 16px;
            line-height: 1.5;
        }

        .navbar {
            background-color: #007bff;
            padding: 15px 0;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navbar ul li {
            margin: 0 20px;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .navbar ul li a:hover {
            background-color: #0056b3;
        }

        .navbar ul li a.active {
            background-color: #0056b3; /* Color de fondo cuando está activo */
        }

        /* Contenido principal */
        .content {
            margin: 50px auto;
            padding: 20px;
            width: 80%;
            max-width: 900px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .content h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 18px;
            color: #555;
        }

        /* Tabla de Usuarios */
        table.table-striped {
            width: 100%;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
        }

        .form-search {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="admin_citas.php">Administrar Citas</a></li>
            <li><a href="admin_doctores.php">Administrar Doctores</a></li>
            <li><a href="admin_usuarios.php">Administrar Pacientes</a></li>
            <li><a href="admin_mensajes.php" >Administrar Mensajes</a></li>
            <a href="cerrar_sesion.php" class="btn btn-danger">Cerrar sesión</a>
        </ul>
    </div>

    <div class="content">
        <h2>Bienvenido a la Administración de Medical Center</h2>
        <p>Seleccione una opción del menú para gestionar el sistema.</p>
    </div>
</body>
</html>


