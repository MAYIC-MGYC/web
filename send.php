<?php
include("conexion.php");

if (isset($_POST['send'])) {
    if (
        strlen($_POST['name']) >= 1 &&
        strlen($_POST['phone']) >= 1 &&
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['message']) >= 1
    ) {
        // Limpiar los valores para evitar inyecciones SQL
        $name = mysqli_real_escape_string($conex, trim($_POST['name']));
        $phone = mysqli_real_escape_string($conex, trim($_POST['phone']));
        $email = mysqli_real_escape_string($conex, trim($_POST['email']));
        $message = mysqli_real_escape_string($conex, trim($_POST['message']));

        // Consulta SQL para insertar los datos
        $consulta = "INSERT INTO datos(nombre, telefono, email, mensaje) VALUES ('$name', '$phone', '$email', '$message')";
        $resultado = mysqli_query($conex, $consulta);

        // Mostrar un mensaje de éxito
        if ($resultado) {
            echo "<script>alert('Consulta enviada exitosamente.'); window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Error al guardar la consulta: " . mysqli_error($conex) . "'); window.location.href = 'index.php';</script>";
        }
    } else {
        echo "<script>alert('Por favor complete todos los campos.'); window.location.href = 'index.php';</script>";
    }
}
?>
