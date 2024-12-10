<?php
session_start();

// Verificar si el usuario es un administrador
if (!isset($_SESSION['admin_id'])) {
    header("Location: iniciar_sesion_admin.php");
    exit();
}

// Incluir la conexión a la base de datos
include("conexion.php");

// Consulta para obtener los usuarios
$searchId = isset($_GET['search_id']) ? $_GET['search_id'] : '';
$usuariosQuery = "SELECT * FROM usuarios WHERE id_usuario LIKE '%$searchId%'";
$usuarios = mysqli_query($conex, $usuariosQuery);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.2/xlsx.full.min.js"></script>
    <style>
        /* Barra de navegación */
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

    <!-- Barra de navegación -->
    <div class="navbar">
        <ul>
            <li><a href="admin_citas.php">Administrar Citas</a></li>
            <li><a href="admin_doctores.php">Administrar Doctores</a></li>
            <li><a href="admin_usuarios.php">Administrar Pacientes</a></li>
            <li><a href="admin_mensajes.php">Administrar Mensajes</a></li>
            <a href="cerrar_sesion.php" class="btn btn-danger">Cerrar sesión</a>
        </ul>
    </div>

    <div class="container mt-4">
        <!-- Sección de Usuarios -->
        <div id="usuarios" class="content active">
            <h2>Gestionar Usuarios</h2>

            <!-- Filtro de búsqueda por ID -->
            <form class="form-search" method="get" action="">
                <div class="input-group">
                    <input type="text" class="form-control" name="search_id" placeholder="Buscar por ID" value="<?php echo htmlspecialchars($searchId); ?>">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </form>

            <!-- Tabla de Usuarios -->
            <table class="table table-striped" id="usuariosTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Email</th>
                        <th>Fecha de Registro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($usuario = mysqli_fetch_assoc($usuarios)) : ?>
                        <tr>
                            <td><?php echo $usuario['id_usuario']; ?></td>
                            <td><?php echo $usuario['nombre']; ?></td>
                            <td><?php echo $usuario['documento']; ?></td>
                            <td><?php echo $usuario['email']; ?></td>
                            <td><?php echo $usuario['fecha_registro']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <!-- Botón de Exportación a Excel -->
            <button class="btn btn-success mt-3" onclick="exportToExcel()">Exportar a Excel</button>

        </div>

    </div>

    <script>
        function exportToExcel() {
            const table = document.getElementById('usuariosTable');
            const workbook = XLSX.utils.table_to_book(table, { sheet: "Usuarios" });
            XLSX.writeFile(workbook, 'usuarios.xlsx');
        }
    </script>

</body>
</html>

