<?php
include("conexion.php");

if (isset($_POST['registrar'])) {
    $nombre = $_POST['nombre'];
    $documento = $_POST['documento'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encriptar la contraseña

    // Verificar si el DNI ya está registrado
    $consulta = "SELECT * FROM usuarios WHERE documento = '$documento'";
    $resultado = mysqli_query($conex, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<script>alert('Este DNI ya está registrado.'); window.location.href='reservar_cita.php';</script>";
    } else {
        // Insertar nuevo usuario
        $consulta = "INSERT INTO usuarios (nombre, documento, email, password) 
                     VALUES ('$nombre', '$documento', '$email', '$password')";
        
        $resultado = mysqli_query($conex, $consulta);

        if ($resultado) {
            echo "<script>alert('Cuenta creada exitosamente. Ahora puedes reservar tu cita.'); window.location.href='reservar_cita.php';</script>";
        } else {
            echo "<script>alert('Error al crear la cuenta.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta - Clínica Esperanza</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="crear-cuenta">
        <h2>Crea tu Cuenta</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="nombre">Nombre Completo</label>
                <input type="text" name="nombre" id="nombre" required placeholder="Ingresa tu nombre completo">
            </div>

            <div class="form-group">
                <label for="documento">Número de Documento</label>
                <input type="text" name="documento" id="documento" required placeholder="Ingresa tu número de documento">
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" id="email" required placeholder="Ingresa tu correo electrónico">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" required placeholder="Ingresa tu contraseña">
            </div>

            <button type="submit" name="registrar">Crear Cuenta</button>
        </form>
    </section>
</body>
</html>
