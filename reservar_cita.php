<?php
session_start();
include("conexion.php");
require 'vendor/autoload.php';  // Incluir PHPMailer

if (!isset($_SESSION['usuario_id'])) {
    header("Location: iniciar_sesion.php");
    exit();
}
if (isset($_POST['reservar'])) {
    $usuario_id = $_SESSION['usuario_id'];
    $especialidad = $_POST['especialidad'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $id_doctor = $_POST['doctor'];

    // Obtener los datos del usuario
    $consulta_usuario = "SELECT nombre, email FROM usuarios WHERE id_usuario = '$usuario_id'";
    $resultado_usuario = mysqli_query($conex, $consulta_usuario);

    if ($fila_usuario = mysqli_fetch_assoc($resultado_usuario)) {
        $nombre_usuario = $fila_usuario['nombre'];
        $email_usuario = $fila_usuario['email'];

        // Obtener el nombre del doctor
        $consulta_doctor = "SELECT doctor_nombre FROM doctores WHERE id_doctor = '$id_doctor'";
        $resultado_doctor = mysqli_query($conex, $consulta_doctor);
        
        if ($fila_doctor = mysqli_fetch_assoc($resultado_doctor)) {
            $nombre_doctor = $fila_doctor['doctor_nombre'];
            
            // Insertar cita con el nombre del doctor
            $consulta = "INSERT INTO citas (usuario_id, especialidad, fecha, hora, doctor_nombre) 
                         VALUES ('$usuario_id', '$especialidad', '$fecha', '$hora', '$nombre_doctor')";
            $resultado = mysqli_query($conex, $consulta);

            if ($resultado) {
                // Crear un objeto PHPMailer
                $mail = new PHPMailer\PHPMailer\PHPMailer();

                // Configuración del servidor SMTP
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Servidor SMTP de Gmail
                $mail->SMTPAuth = true;
                $mail->Username = 'mzponcemoya@gmail.com'; // Tu correo de Gmail
                $mail->Password = 'ockd fxlo tbwo ijip'; // Contraseña o contraseña de aplicación
                $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587; // Puerto de Gmail

                // Remitente y destinatario
                $mail->setFrom('mzponcemoya@gmail.com', 'Medical Center');
                $mail->addAddress($email_usuario, $nombre_usuario);

                // Asunto y cuerpo del correo
                $mail->Subject = 'Confirmacion de Reserva de Cita';
                $mail->Body = "Hola $nombre_usuario,\n\nTu cita para la especialidad de $especialidad ha sido reservada con éxito.\nDetalles de la cita:\nDoctor: $nombre_doctor\nFecha: $fecha\nHora: $hora\n\nGracias por confiar en Medical Center.";

                // Enviar el correo
                if ($mail->send()) {
                    echo "<script>
                            alert('Cita reservada exitosamente.');
                            setTimeout(function() {
                                window.location.href = 'index.php';
                            }, 2000);
                          </script>";
                } else {
                    echo "<script>alert('Cita reservada, pero no se pudo enviar el correo.');</script>";
                }
            } else {
                echo "<script>alert('Error al reservar la cita.');</script>";
            }
        } else {
            echo "<script>alert('No se encontró el doctor.');</script>";
        }
    } else {
        echo "<script>alert('Error al obtener los datos del usuario.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar Cita - Clínica Esperanza</title>
    <style>
        /* Estilos básicos */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .hidden {
            display: none;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select,
        input[type="date"],
        input[type="time"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Reservar Cita</h2>
    <form method="post" action="reservar_cita.php">
        <div class="form-group">
            <label for="especialidad">Seleccionar Especialidad:</label>
            <select id="especialidad" name="especialidad" onchange="actualizarDoctores()" required>
                <option value="">Selecciona una especialidad</option>
                <option value="Cardiología">Cardiología</option>
                <option value="Ginecología">Ginecología</option>
                <option value="Oncología">Oncología</option>
                <option value="Odontología">Odontología</option>
                <option value="Dermatología">Dermatología</option>
                <option value="Neurología">Neurología</option>
                <option value="Urología">Urología</option>
                <option value="Traumatología">Traumatología</option>
            </select>
        </div>

        <div id="doctores-container" class="hidden">
            <label for="doctor">Seleccionar Doctor:</label>
            <select id="doctores" name="doctor" onchange="actualizarHorario()" required>
                <option value="">Selecciona un doctor</option>
            </select>
        </div>

        <div id="horario-container" class="hidden">
            <div class="form-group">
                <label for="fecha">Fecha de la cita:</label>
                <input type="date" id="fecha" name="fecha" required value="2024-12-01">
            </div>
            <div class="form-group">
                <label for="hora">Hora de la cita:</label>
                <select id="hora" name="hora" required>
                    <option value="">Selecciona una hora</option>
                </select>
            </div>
        </div>

        <button type="submit" name="reservar">Reservar Cita</button>
    </form>
</div>

<script>
    // Cargar doctores dinámicamente
    function actualizarDoctores() {
        const especialidad = document.getElementById('especialidad').value;
        const doctoresSelect = document.getElementById('doctores');
        doctoresSelect.innerHTML = '<option value="">Selecciona un doctor</option>';
        document.getElementById('horario-container').classList.add('hidden');

        if (especialidad) {
            fetch(`get_doctores.php?especialidad=${especialidad}`)
                .then(response => response.json())
                .then(doctores => {
                    doctores.forEach(doctor => {
                        const option = document.createElement('option');
                        option.value = doctor.id_doctor;
                        option.textContent = doctor.doctor_nombre;
                        doctoresSelect.appendChild(option);
                    });
                    document.getElementById('doctores-container').classList.remove('hidden');
                })
                .catch(error => console.error('Error al cargar doctores:', error));
        }
    }

    // Cargar horarios dinámicamente
    function actualizarHorario() {
        const idDoctor = document.getElementById('doctores').value;
        const horarioSelect = document.getElementById('hora');
        horarioSelect.innerHTML = '<option value="">Selecciona una hora</option>';

        if (idDoctor) {
            fetch(`get_horario.php?id_doctor=${idDoctor}`)
                .then(response => response.json())
                .then(horarios => {
                    horarios.forEach(horario => {
                        const option = document.createElement('option');
                        option.value = horario;
                        option.textContent = horario;
                        horarioSelect.appendChild(option);
                    });
                    document.getElementById('horario-container').classList.remove('hidden');
                })
                .catch(error => console.error('Error al cargar horarios:', error));
        } else {
            document.getElementById('horario-container').classList.add('hidden');
        }
    }
</script>

</body>
</html>
