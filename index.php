<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Clínica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    

    <link rel="stylesheet" href="style.css">

    <style>
        /* Estilo básico para los modales */
        .modal {
            display: none; /* Oculto por defecto */
            position: fixed; /* Fijo al viewport */
            z-index: 1000; /* Se muestra sobre otros elementos */
            left: 0;
            top: 0;
            width: 100%; /* Ocupa toda la pantalla */
            height: 100%; /* Ocupa toda la pantalla */
            overflow: auto; /* Agrega scroll si es necesario */
            background-color: rgba(0, 0, 0, 0.5); /* Fondo oscuro con opacidad */
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto; /* 15% desde el top y centrado */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Ancho del modal */
            max-width: 600px; /* Máximo ancho del modal */
        }

        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-btn:hover,
        .close-btn:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }


        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

      

        h2 {
            text-align: center;
            color: #333;
        }

       

    </style>
</head>
<body>
<header class="header" id="header-section">
    <div class="menu container">
        <!-- Logo -->
        <a href="#" class="logo">
            <img src="images/clinica5.png" alt="Logo principal">
        </a>

        <!-- Menú Hamburguesa -->
        <input type="checkbox" id="menu" class="menu-checkbox" />
        <label for="menu" class="menu-icon">
            <img src="images/menu.png" alt="Menú">
        </label>

        <!-- Navegación -->
        <nav class="navbar">
            <ul class="nav-links">
                <li><a href="#">Inicio</a></li>
                <li><a href="#nosotros">Conócenos</a></li>
                <li><a href="#especialidades">Especialidades</a></li>
                <li><a href="#sttafmedico">Staff Médico</a></li>
                <li><a href="#promociones">Promociones</a></li>
                <li><a href="#contacto">Contacto</a></li>
                <li class="btn-reserva">
                    <a href="iniciarsesion.php" class="btn">Reserva tu cita</a>
                </li>
                <li class="btn-admin">
                    <a href="admin.php" class="btn">Panel administrador</a>
                </li>
            </ul>
        </nav>
    </div>
</header>

   
    



    <!-- Sección Inicio -->
<section class="inicio"> 
    <div class="slider">
        <img src="images/inicio11.png" alt="Imagen 1">
       
    </div>
</section>



<section class="nosotros container" id="nosotros">
    <h3>Conócenos</h3>
  
    
    <div class="nosotros-images">
        <img src="images/conono.jpg" alt="Equipo Médico">
    </div>

    <div class="nosotros-content">
        <div class="cuadro historia">
            <h4>Breve Historia</h4>
            <p>Fundada en 2005, Medical Center ha evolucionado con el tiempo, incorporando tecnología de vanguardia y un equipo de profesionales comprometidos con la salud de la comunidad. Nos enorgullece ofrecer atención médica accesible y de calidad.</p>
        </div>
        <div class="cuadro vision">
            <h4>Visión</h4>
            <p>Ser un referente en el ámbito de la salud, reconocido por la excelencia en la atención médica y la promoción de la salud comunitaria. Nos esforzamos por educar y empoderar a nuestros pacientes para que tomen decisiones informadas sobre su bienestar.</p>
        </div>
        <div class="cuadro mision">
            <h4>Misión</h4>
            <p>Nuestra misión es garantizar el bienestar de nuestros pacientes a través de un enfoque innovador y efectivo en la atención médica, proporcionando soluciones personalizadas que promuevan su salud y calidad de vida.</p>
        </div>
    </div>
</section>




   <!-- Especialidades -->
<section class="especialidades container" id="especialidades">
    <h2>Especialidades Médicas</h2>
    <div class="especialidades-cards">
        <!-- Cardiología -->
        <div class="especialidad-card">
            <img src="images/cardiologia.jpg" alt="Cardiología" class="especialidad-img" onclick="openModal('modal-cardiologia')">
            <div class="especialidad-info">
                <h3>Cardiología</h3>
                <p>Diagnóstico y tratamiento de enfermedades del corazón y sistema circulatorio.</p>
            </div>
        </div>

        <!-- Ginecología -->
        <div class="especialidad-card">
            <img src="images/ginecologia.jpg" alt="Ginecología" class="especialidad-img" onclick="openModal('modal-ginecologia')">
            <div class="especialidad-info">
                <h3>Ginecología</h3>
                <p>Atención integral de la salud femenina en todas las etapas.</p>
            </div>
        </div>

        <!-- Oncología -->
        <div class="especialidad-card">
            <img src="images/oncologia.jpg" alt="Oncología" class="especialidad-img" onclick="openModal('modal-oncologia')">
            <div class="especialidad-info">
                <h3>Oncología</h3>
                <p>Tratamiento especializado para diversos tipos de cáncer.</p>
            </div>
        </div>

        <!-- Odontología -->
        <div class="especialidad-card">
            <img src="images/odontologia.jpg" alt="Odontología" class="especialidad-img" onclick="openModal('modal-odontologia')">
            <div class="especialidad-info">
                <h3>Odontología</h3>
                <p>Cuidado dental preventivo y tratamientos estéticos.</p>
            </div>
        </div>

        <!-- Dermatología -->
        <div class="especialidad-card">
            <img src="images/dermatologia.jpg" alt="Dermatología" class="especialidad-img" onclick="openModal('modal-dermatologia')">
            <div class="especialidad-info">
                <h3>Dermatología</h3>
                <p>Diagnóstico y tratamiento de enfermedades de la piel.</p>
            </div>
        </div>

        <!-- Neurología -->
        <div class="especialidad-card">
            <img src="images/neurologia.jpg" alt="Neurología" class="especialidad-img" onclick="openModal('modal-neurologia')">
            <div class="especialidad-info">
                <h3>Neurología</h3>
                <p>Atención para trastornos del sistema nervioso.</p>
            </div>
        </div>

        <!-- Urología -->
        <div class="especialidad-card">
            <img src="images/urologia.jpg" alt="Urología" class="especialidad-img" onclick="openModal('modal-urologia')">
            <div class="especialidad-info">
                <h3>Urología</h3>
                <p>Diagnóstico y tratamiento de enfermedades del sistema urinario.</p>
            </div>
        </div>

        <!-- Traumatología -->
        <div class="especialidad-card">
            <img src="images/traumatologia.jpg" alt="Traumatología" class="especialidad-img" onclick="openModal('modal-traumatologia')">
            <div class="especialidad-info">
                <h3>Traumatología</h3>
                <p>Tratamiento de lesiones del aparato locomotor.</p>
            </div>
        </div>
    </div>
</section>

<!-- Modales -->
<!-- Modales -->
     <!-- Modal Cardiologia -->
     <div id="modal-cardiologia" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('cardiologia')"></span>
        <h2>Cardiología</h2>
    
        <div class="doctores-container">
            <div class="doctor">
                <img src="images/juan-perez.jpg" alt="Dr. Juan Pérez" class="doctor-img">
                <h3>Dr. Juan Pérez</h3>
                <p><strong>Horarios Disponibles:</strong> Lunes a Viernes: 8:00 AM - 4:00 PM</p>
            </div>
            <div class="doctor">
                <img src="images/ana-gomez.jpg" alt="Dra. Ana Gómez" class="doctor-img">
                <h3>Dra. Ana Gómez</h3>
                <p><strong>Horarios Disponibles:</strong> Martes, Jueves: 9:00 AM - 3:00 PM</p>
            </div>
        </div>
        <br>
        <p><strong>Promoción:</strong> 20% de descuento en consultas iniciales</p>
    </div>
</div>
    <!-- Modal Ginecología -->

    <div id="modal-ginecologia" class="modal">
    <div class="modal-content">
        <span  onclick="closeModal('ginecologia')"></span>
        <h2>Ginecología</h2>

        <div class="doctores-container">
            <div class="doctor">
                <img src="images/isabel-rodriguez,jpg.jpg" alt="Dra. Isabel Rodríguez" class="doctor-img">
                <h3>Dra. Isabel Rodríguez</h3>
                <p><strong>Horarios Disponibles:</strong> Lunes, Miércoles: 10:00 AM - 2:00 PM</p>
            </div>
            <div class="doctor">
                <img src="images/felipe-sanchez.jpg" alt="Dr. Felipe Sánchez" class="doctor-img">
                <h3>Dr. Felipe Sánchez</h3>
                <p><strong>Horarios Disponibles:</strong> Martes, Jueves: 11:00 AM - 1:00 PM</p>
            </div>
        </div>
        <br>
        <p><strong>Promoción:</strong> Consulta gratuita en tu primer chequeo anual</p>
    </div>
</div>


    <!-- Modal Oncología -->
    <div id="modal-oncologia" class="modal">
    <div class="modal-content">
        <span  onclick="closeModal('oncologia')"></span>
        <h2>Oncología</h2>

        <div class="doctores-container">
            <div class="doctor">
                <img src="images/carlos-ramirez.jpg" alt="Dr. Carlos Ramírez" class="doctor-img">
                <h3>Dr. Carlos Ramírez</h3>
                <p><strong>Horarios Disponibles:</strong> Lunes a Viernes: 9:00 AM - 5:00 PM</p>
            </div>
            <div class="doctor">
                <img src="images/veronica-castillo.jpg" alt="Dra. Verónica Castillo" class="doctor-img">
                <h3>Dra. Verónica Castillo</h3>
                <p><strong>Horarios Disponibles:</strong> Martes, Jueves: 2:00 PM - 6:00 PM</p>
            </div>
        </div>
        <br>
        <p><strong>Promoción:</strong> 15% de descuento en consultas de diagnóstico</p>
    </div>
</div>


<div id="modal-odontologia" class="modal">
    <div class="modal-content">
        <span onclick="closeModal('odontologia')"></span>
        <h2>Odontología</h2>

        <div class="doctores-container">
            <div class="doctor">
                <img src="images/laura-mendoza.jpg" alt="Dra. Laura Mendoza" class="doctor-img">
                <h3>Dra. Laura Mendoza</h3>
                <p><strong>Horarios Disponibles:</strong> Lunes, Miércoles: 1:00 PM - 5:00 PM</p>
            </div>
            <div class="doctor">
                <img src="images/felipe-martinez.jpg" alt="Dr. Felipe Martínez" class="doctor-img">
                <h3>Dr. Felipe Martínez</h3>
                <p><strong>Horarios Disponibles:</strong> Martes, Viernes: 9:00 AM - 3:00 PM</p>
            </div>
        </div>
        <br>
        <p><strong>Promoción:</strong> 30% de descuento en limpieza dental</p>
    </div>
</div>


    <!-- Modal Dermatología -->

    <div id="modal-dermatologia" class="modal">
    <div class="modal-content">
        <span  onclick="closeModal('dermatologia')"></span>
        <h2>Dermatología</h2>

        <div class="doctores-container">
            <div class="doctor">
                <img src="images/carmen-lopez.jpg" alt="Dra. Carmen López" class="doctor-img">
                <h3>Dra. Carmen López</h3>
                <p><strong>Horarios Disponibles:</strong> Martes, Jueves: 10:00 AM - 4:00 PM</p>
            </div>
            <div class="doctor">
                <img src="images/luis-garcia.jpg" alt="Dr. Luis García" class="doctor-img">
                <h3>Dr. Luis García</h3>
                <p><strong>Horarios Disponibles:</strong> Lunes, Viernes: 11:00 AM - 3:00 PM</p>
            </div>
        </div>
        <br>
        <p><strong>Promoción:</strong> 10% de descuento en tratamientos para acné</p>
    </div>
</div>


    <!-- Modal Neurología -->
    <div id="modal-neurologia" class="modal">
    <div class="modal-content">
        <span onclick="closeModal('neurologia')"></span>
        <h2>Neurología</h2>

        <div class="doctores-container">
            <div class="doctor">
                <img src="images/sofia-gutierrez.jpg" alt="Dra. Sofía Gutiérrez" class="doctor-img">
                <h3>Dra. Sofía Gutiérrez</h3>
                <p><strong>Horarios Disponibles:</strong> Lunes, Jueves: 9:00 AM - 2:00 PM</p>
            </div>
            <div class="doctor">
                <img src="images/roberto-pineda.jpg" alt="Dr. Roberto Pineda" class="doctor-img">
                <h3>Dr. Roberto Pineda</h3>
                <p><strong>Horarios Disponibles:</strong> Martes, Viernes: 10:00 AM - 3:00 PM</p>
            </div>
        </div>
        <br>
        <p><strong>Promoción:</strong> 15% de descuento en consultas neurológicas iniciales</p>
    </div>
</div>

    <!-- Modal Urología -->
  
    <div id="modal-urologia" class="modal">
    <div class="modal-content">
        <span onclick="closeModal('urologia')"></span>
        <h2>Urología</h2>

        <div class="doctores-container">
            <div class="doctor">
                <img src="images/juan-romero.jpg" alt="Dr. Juan Romero" class="doctor-img">
                <h3>Dr. Juan Romero</h3>
                <p><strong>Horarios Disponibles:</strong> Lunes, Miércoles: 8:00 AM - 12:00 PM</p>
            </div>
            <div class="doctor">
                <img src="images/maria-sanchez.jpg" alt="Dra. María Sánchez" class="doctor-img">
                <h3>Dra. María Sánchez</h3>
                <p><strong>Horarios Disponibles:</strong> Jueves, Viernes: 9:00 AM - 1:00 PM</p>
            </div>
        </div>
        <br>
        <p><strong>Promoción:</strong> Consulta gratuita en diagnóstico de cálculos renales</p>
    </div>
</div>


    <!-- Modal Traumatología -->
  

    <div id="modal-traumatologia" class="modal">
    <div class="modal-content">
        <span onclick="closeModal('traumatologia')"></span>
        <h2>Traumatología</h2>

        <div class="doctores-container">
            <div class="doctor">
                <img src="images/jorge-perez.jpg" alt="Dr. Jorge Pérez" class="doctor-img">
                <h3>Dr. Jorge Pérez</h3>
                <p><strong>Horarios Disponibles:</strong> Lunes, Viernes: 10:00 AM - 3:00 PM</p>
            </div>
            <div class="doctor">
                <img src="images/catalina-hernandez.jpg" alt="Dra. Catalina Hernández" class="doctor-img">
                <h3>Dra. Catalina Hernández</h3>
                <p><strong>Horarios Disponibles:</strong> Martes, Jueves: 1:00 PM - 5:00 PM</p>
            </div>
        </div>
        <br>
        <p><strong>Promoción:</strong> 10% de descuento en tratamientos de fracturas</p>
    </div>
</div>

    <script>
// Función para abrir un modal
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = "block";  // Mostrar el modal
    }
}

// Función para cerrar un modal
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = "none";  // Ocultar el modal
    }
}

// Cerrar modales al hacer clic fuera del contenido
window.onclick = function(event) {
    const modals = document.getElementsByClassName("modal");
    for (let i = 0; i < modals.length; i++) {
        // Si se hace clic fuera del contenido del modal, lo cierra
        if (event.target == modals[i]) {
            modals[i].style.display = "none";
        }
    }
};
</script>
    <!-- Sttaf Medico -->
    <div class="staff-medico"  id="sttafmedico">
    <h2>Staff Médico</h2>
    <div class="medicos-container">
        <div class="medico">
            <img src="images/juan-perez.jpg" alt="Dr. Juan Pérez" class="medico-img">
            <h3>Dr. Juan Pérez</h3>
            <p>Cardiología</p>
        </div>
        <div class="medico">
            <img src="images/ana-gomez.jpg" alt="Dra. Ana Gómez" class="medico-img">
            <h3>Dra. Ana Gómez</h3>
            <p>Cardiología</p>
        </div>
        <div class="medico">
            <img src="images/isabel-rodriguez,jpg.jpg" alt="Dra. Isabel Rodríguez" class="medico-img">
            <h3>Dra. Isabel Rodríguez</h3>
            <p>Ginecología</p>
        </div>
        <div class="medico">
            <img src="images/felipe-sanchez.jpg" alt="Dr. Felipe Sánchez" class="medico-img">
            <h3>Dr. Felipe Sánchez</h3>
            <p>Ginecología</p>
        </div>
        <div class="medico">
            <img src="images/carlos-ramirez.jpg" alt="Dr. Carlos Ramírez" class="medico-img">
            <h3>Dr. Carlos Ramírez</h3>
            <p>Oncología</p>
        </div>
        <div class="medico">
            <img src="images/veronica-castillo.jpg" alt="Dra. Verónica Castillo" class="medico-img">
            <h3>Dra. Verónica Castillo</h3>
            <p>Oncología</p>
        </div>
        <div class="medico">
            <img src="images/laura-mendoza.jpg" alt="Dra. Laura Mendoza" class="medico-img">
            <h3>Dra. Laura Mendoza</h3>
            <p>Odontología</p>
        </div>
        <div class="medico">
            <img src="images/felipe-martinez.jpg" alt="Dr. Felipe Martínez" class="medico-img">
            <h3>Dr. Felipe Martínez</h3>
            <p>Odontología</p>
        </div>
        <div class="medico">
            <img src="images/carmen-lopez.jpg" alt="Dra. Carmen López" class="medico-img">
            <h3>Dra. Carmen López</h3>
            <p>Dermatología</p>
        </div>
        <div class="medico">
            <img src="images/luis-garcia.jpg" alt="Dr. Luis García" class="medico-img">
            <h3>Dr. Luis García</h3>
            <p>Dermatología</p>
        </div>
        <div class="medico">
            <img src="images/sofia-gutierrez.jpg" alt="Dra. Ana Belén García" class="medico-img">
            <h3>Dra. Sofia Gutierrez</h3>
            <p>Neurología</p>
        </div>
        <div class="medico">
            <img src="images/roberto-pineda.jpg" alt="Dr. Mario Fernández" class="medico-img">
            <h3>Dr. Roberto Pineda</h3>
            <p>Neurología</p>
        </div>
        <div class="medico">
            <img src="images/juan-romero.jpg" alt="Dr. Juan Romero" class="medico-img">
            <h3>Dr. Juan Romero</h3>
            <p>Urología</p>
        </div>
        <div class="medico">
            <img src="images/maria-sanchez.jpg" alt="Dra. María Sánchez" class="medico-img">
            <h3>Dra. María Sánchez</h3>
            <p>Urología</p>
        </div>
        <div class="medico">
            <img src="images/jorge-perez.jpg" alt="Dr. Jorge Pérez" class="medico-img">
            <h3>Dr. Jorge Pérez</h3>
            <p>Traumatología</p>
        </div>
        <div class="medico">
            <img src="images/catalina-hernandez.jpg" alt="Dra. Catalina Hernández" class="medico-img">
            <h3>Dra. Catalina Hernández</h3>
            <p>Traumatología</p>
        </div>
    </div>
</div>

<!-- Promociones -->
<section class="promociones container" id="promociones">
    <h2>Promociones Especiales</h2>
    <div class="promociones-cards">
        <!-- Chequeo Preventivo -->
        <div class="promocion-card">
            <img src="images/promocion1.jpg" alt="Promoción Chequeo Preventivo">
            <div class="promocion-info">
                <h3>Chequeo Preventivo</h3>
                <p>Obtén un 20% de descuento en tu chequeo preventivo.</p>
                <button class="btn" onclick="openModal('modal-chequeo')">Ver más</button>
            </div>
        </div>

        <!-- Fisioterapia -->
        <div class="promocion-card">
            <img src="images/promocion2.jpg" alt="Promoción Fisioterapia">
            <div class="promocion-info">
                <h3>Fisioterapia</h3>
                <p>Disfruta de un 40% de descuento en nuestras sesiones de fisioterapia.</p>
                <button class="btn" onclick="openModal('modal-fisioterapia')">Ver más</button>
            </div>
        </div>

        <!-- Exámenes de Laboratorio -->
        <div class="promocion-card">
            <img src="images/promocion3.jpg" alt="Promoción Exámenes de Laboratorio">
            <div class="promocion-info">
                <h3>Exámenes de Laboratorio</h3>
                <p>Realiza tus exámenes con un 30% de descuento y resultados confiables.</p>
                <button class="btn" onclick="openModal('modal-examenes')">Ver más</button>
            </div>
        </div>
    </div>
</section>

<!-- Modales -->
<div id="modal-chequeo" class="modal" aria-hidden="true" role="dialog">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('modal-chequeo')">&times;</span>
        <h2>Chequeo Preventivo</h2>
        <br>
        <p><strong>¡20% de descuento en chequeos preventivos completos!</strong></p>
        <br>
        <p>Incluye:</p>
        <br>
        <ul>
            <li>Análisis generales realizados por expertos en salud.</li>
            <br>
            <li>Consultas con especialistas de primer nivel.</li>
            <br>
        </ul>
        <p>Cuida tu bienestar con acceso fácil y precios preferenciales!</p>
    </div>
</div>

<!-- Modal: Fisioterapia -->
<div id="modal-fisioterapia" class="modal" aria-hidden="true" role="dialog">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('modal-fisioterapia')">&times;</span>
        <h2>Fisioterapia</h2>
        <br>
        <p><strong>¡40% de descuento en sesiones personalizadas!</strong></p>
        <br>
        <p>Beneficios:</p>
        <br>
        <ul>
            <li>Rehabilitación especializada para lesiones y dolores musculares.</li>
            <br>
            <li>Programas diseñados para mejorar movilidad y calidad de vida.</li>
        </ul>
        <br>
        <p>¡Aprovecha esta oportunidad para sentirte mejor y alcanzar tu máximo bienestar!</p>
    </div>
</div>

<!-- Modal: Exámenes de Laboratorio -->
<div id="modal-examenes" class="modal" aria-hidden="true" role="dialog">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('modal-examenes')">&times;</span>
        <h2>Exámenes de Laboratorio</h2>
        <br>
        <p><strong>¡30% de descuento en servicios de laboratorio!</strong></p>
        <br>
        <p>Incluye:</p>
        <br>
        <ul>
            <li>Resultados confiables y precisos en tiempo récord.</li>
            <br>
            <li>Procesos realizados por personal altamente capacitado.</li>
        </ul>
        <br>
        <p>Cuidar tu salud nunca había sido tan fácil y accesible!</p>
    </div>
</div>

<!-- JavaScript -->
<script>
// Función para abrir un modal
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = "block";  // Mostrar el modal
    }
}

// Función para cerrar un modal
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = "none";  // Ocultar el modal
    }
}

// Cerrar modales al hacer clic fuera del contenido
window.onclick = function(event) {
    const modals = document.getElementsByClassName("modal");
    for (let i = 0; i < modals.length; i++) {
        // Si se hace clic fuera del contenido del modal, lo cierra
        if (event.target == modals[i]) {
            modals[i].style.display = "none";
        }
    }
};

</script>


    <!-- Sección de Contacto -->
    <section class="contacto container" id="contacto">
        <h2>Contáctanos</h2>
        <p>Si tienes alguna consulta, por favor contáctanos a través del siguiente formulario:</p>
        <form action="send.php" method="post">
            <input type="text" name="name" placeholder="Tu Nombre" required>
            <input type="tel" name="phone" placeholder="Tu Teléfono" required>
            <input type="email" name="email" placeholder="Tu Correo" required>
            <textarea name="message" placeholder="Tu Mensaje" required></textarea>
            <button type="submit" name="send" class="btn">Enviar</button>
        </form>
    </section>

   
<!-- Footer -->
<footer class="footer">
    <div class="footer-container">
        <!-- Logo -->
        <div class="footer-logo">
            <a href="/" class="logo">
                <img src="images/clinica5.png" alt="Logo" class="logo-img">
            </a>
        </div>
        <!-- Enlaces y redes sociales -->
        <div class="footer-content">
            <div class="footer-links">
                <a href="#nosotros">Conócenos</a>
                <a href="#especialidades">Especialidades</a>
                <a href="#sttafmedico">Staff Médico</a>
                <a href="#promociones">Promociones</a>
                <a href="#contacto">Contacto</a>
            </div>
            <div class="footer-socials">
                <a href="https://web.facebook.com/ClinicaInternacionalOfic" target="_blank" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/clinica_internacional/?hl=es" target="_blank" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.tiktok.com/@clinica_internacional" target="_blank" aria-label="TikTok">
                    <i class="fab fa-tiktok"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="footer-copy">
        <p>&copy; 2024 Medical Center. Todos los derechos reservados.</p>
    </div>
</footer>
</body>
</html>

