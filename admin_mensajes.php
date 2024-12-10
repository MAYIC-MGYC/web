<?php
session_start();

// Verificar si el usuario es un administrador
if (!isset($_SESSION['admin_id'])) {
    header("Location: iniciar_sesion_admin.php");
    exit();
}

// Incluir la conexión a la base de datos
include("conexion.php");

// Consulta para obtener los mensajes desde la tabla "datos"
$datosQuery = "SELECT * FROM datos";
$datos = mysqli_query($conex, $datosQuery);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Mensajes</title>
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
            display: none;
        }

        .content.active {
            display: block;
        }

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

        /* Tabla de Mensajes */
        table.table-striped {
            width: 100%;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
        }

        .export-buttons {
            margin-top: 20px;
        }

        .export-buttons button {
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <!-- Barra de navegación -->
    <div class="navbar">
        <ul>
            <li><a href="admin_citas.php" onclick="setActive(this)">Administrar Citas</a></li>
            <li><a href="admin_doctores.php" onclick="setActive(this)">Administrar Doctores</a></li>
            <li><a href="admin_usuarios.php" onclick="setActive(this)">Administrar Pacientes</a></li>
            <li><a href="admin_mensajes.php" onclick="setActive(this)">Administrar Mensajes</a></li>
            <!-- Botón de Cerrar sesión -->
<a href="cerrar_sesion.php" class="btn btn-danger">Cerrar sesión</a>

        </ul>
    </div>

    <div class="container mt-4">
        <!-- Sección de Mensajes -->
        <div id="mensajes" class="content active">
            <h2>Gestionar Mensajes</h2>

            <!-- Tabla de Mensajes -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Mensaje</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($dato = mysqli_fetch_assoc($datos)) : ?>
                        <tr>
                            <td><?php echo $dato['id']; ?></td>
                            <td><?php echo $dato['nombre']; ?></td>
                            <td><?php echo $dato['telefono']; ?></td>
                            <td><?php echo $dato['email']; ?></td>
                            <td><?php echo $dato['mensaje']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <!-- Opciones de Exportación -->
            <div class="export-buttons mt-3">
          
                <button class="btn btn-success" onclick="exportToExcel()">Exportar a Excel</button>
            </div>

        </div>

    </div>

    <script>
        // Función para cambiar la clase 'active' en los enlaces del menú
        function setActive(element) {
            const links = document.querySelectorAll('.navbar ul li a');
            links.forEach(link => link.classList.remove('active'));
            element.classList.add('active');
        }

        function exportToPDF() {
            // Implementar lógica para exportar mensajes a PDF
            alert('Exportar a PDF');
        }

        function exportToExcel() {
            // Crear una hoja de Excel con los datos de los mensajes
            const table = document.querySelector("table");
            const wb = XLSX.utils.table_to_book(table, {sheet:"Mensajes"});
            XLSX.writeFile(wb, "mensajes.xlsx");
        }
    </script>
</body>
</html>


