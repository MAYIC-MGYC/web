<?php
// Conexión a la base de datos
include("conexion.php");

if (isset($_GET['id_doctor']) && !empty($_GET['id_doctor'])) {
    $id_doctor = $_GET['id_doctor'];

    // Consulta para obtener los horarios del doctor seleccionado
    $query = "SELECT horario FROM horarios WHERE id_doctor = $id_doctor";
    $result = mysqli_query($conex, $query);

    $horarios = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $horarios[] = $row['horario']; // Agregar cada horario a la lista
    }

    // Devolver los horarios como JSON
    echo json_encode($horarios);
}
?>
