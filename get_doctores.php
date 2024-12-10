<?php
// Conexión a la base de datos
include("conexion.php");

if (isset($_GET['especialidad']) && !empty($_GET['especialidad'])) {
    $especialidad = $_GET['especialidad'];

    // Consulta para obtener doctores de la especialidad seleccionada
    $query = "SELECT id_doctor, doctor_nombre FROM doctores WHERE especialidad = '$especialidad'";
    $result = mysqli_query($conex, $query);

    $doctores = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $doctores[] = $row; // Agregar cada doctor a la lista
    }

    // Devolver los doctores como JSON
    echo json_encode($doctores);
}
?>

