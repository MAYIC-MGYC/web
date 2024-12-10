<?php
session_start();

// Verificar si el usuario es un administrador
if (!isset($_SESSION['admin_id'])) {
    header("Location: iniciar_sesion_admin.php");
    exit();
}

// Incluir la conexión a la base de datos
include("conexion.php");

// Variables de filtrado
$filterQuery = "";

// Filtrar por Especialidad
if (isset($_POST['especialidad']) && $_POST['especialidad'] != "") {
    $especialidad = $_POST['especialidad'];
    $filterQuery .= " WHERE especialidad = '$especialidad'";
}

// Consulta para obtener los doctores con los filtros aplicados
$doctoresQuery = "SELECT * FROM doctores" . $filterQuery;
$doctores = mysqli_query($conex, $doctoresQuery);

// Consultas para obtener especialidades
$especialidades = mysqli_query($conex, "SELECT DISTINCT especialidad FROM doctores");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Doctores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.2/xlsx.full.min.js"></script>
    <style>
        .btn-filter {
            margin-bottom: 10px;
        }
        .filter-form {
            display: none;
        }
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

        .navbar ul li a:hover,
        .navbar ul li a.active {
            background-color: #0056b3;
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
            <!-- Botón de Cerrar sesión -->
<a href="cerrar_sesion.php" class="btn btn-danger">Cerrar sesión</a>

        </ul>
    </div>

    <div class="container mt-4">
        <!-- Sección de Doctores -->
        <div id="doctores" class="content active">
            <h2>Gestionar Doctores</h2>

            <!-- Filtro por Especialidad -->
            <form method="POST" action="">
                <div class="btn-filter">
                    <button type="button" class="btn btn-secondary" onclick="toggleFilter('especialidad')">Filtrar por Especialidad</button>
                </div>

                <div id="filter-especialidad" class="filter-form">
                    <select class="form-control mb-2" name="especialidad">
                        <option value="">Seleccione una Especialidad</option>
                        <?php while ($especialidad = mysqli_fetch_assoc($especialidades)) : ?>
                            <option value="<?php echo $especialidad['especialidad']; ?>"><?php echo $especialidad['especialidad']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Aplicar Filtro</button>
            </form>

            <!-- Tabla de Doctores -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                        <th>Horarios</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($doctor = mysqli_fetch_assoc($doctores)) : ?>
                        <tr>
                            <td><?php echo $doctor['id_doctor']; ?></td>
                            <td><?php echo $doctor['doctor_nombre']; ?></td>
                            <td><?php echo $doctor['especialidad']; ?></td>
                            <td><?php echo $doctor['horarios']; ?></td>
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
        function toggleFilter(filterId) {
            const filterElement = document.getElementById('filter-' + filterId);
            filterElement.style.display = (filterElement.style.display === 'none' || filterElement.style.display === '') ? 'block' : 'none';
        }

        function exportToExcel() {
            // Crear una hoja de Excel con los datos de los doctores
            const table = document.querySelector("table");
            const wb = XLSX.utils.table_to_book(table, {sheet:"Doctores"});
            XLSX.writeFile(wb, "doctores.xlsx");
        }
    </script>
</body>
</html>



