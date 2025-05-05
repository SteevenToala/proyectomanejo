<?php
session_start();
require_once '../utils/conexion.php';
require_once '../utils/functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $confirmar_contrasena = $_POST['confirmar_contrasena'];
    
    // Validaciones básicas
    if ($contrasena !== $confirmar_contrasena) {
        $error = "Las contraseñas no coinciden";
    } else {
        // Verificar si el correo ya existe
        $check_sql = "SELECT id FROM usuarios WHERE correo = ?";
        $check_stmt = $conexion->prepare($check_sql);
        $check_stmt->bind_param("s", $correo);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();
        
        if ($check_result->num_rows > 0) {
            $error = "Este correo electrónico ya está registrado";
        } else {
            // Hash de la contraseña
            $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);
            
            // Insertar nuevo usuario
            $sql = "INSERT INTO usuarios (nombre, correo, contrasena, rol) VALUES (?, ?, ?, 'cliente')";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("sss", $nombre, $correo, $hashed_password);
            
            if ($stmt->execute()) {
                $_SESSION['registro_exitoso'] = true;
                header("Location: login.php");
                exit();
            } else {
                $error = "Error al registrar el usuario";
            }
        }
    }
}
?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="styles/login.css" >
<link href="../cover.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
    <script src="../assets/js/color-modes.js"></script>
    
<style>
    nav {
  position: relative;
  z-index: 2;
}
.mb-auto2 .log{
        text-decoration: none;
        color: white ;
    }


    .mb-auto2 {
        width: 60%;
        height: 30px;
        display: flex;
        margin: 0;     
        margin-bottom: 30px; z-index: 3;       
    }
    .mb-auto2 .log{
        text-decoration: none;
        color: white;
    }
    .mb-auto2 div{
        width: 100%;
        height: 100%;        
        display: flex;
        justify-content: space-around;
        align-items: center;

    }
    .fw-bold{
        font-weight: 700;
    }
    body{
        display: flex;
        flex-direction: column;
        margin: 0;
        color:#ffffff;    
        justify-content: start;    
    }
    .float-md-start{
        color: white !important;   
        font-size: calc(1.3rem + .6vw) !important; 
    }    
</style>
<body>
<header class="mb-auto2">
    <div>
    <h3 class="log float-md-start mb-0 "><a style="text-decoration: none; color: white ;" href="../index.php">AVIFEST</a></h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">        
        <a class="nav-link fw-bold py-1 px-0" href="detalles.php">Detalles</a>        
        <a class="nav-link fw-bold py-1 px-0" href="contactanos.php">Contactanos</a>        
        <a class="nav-link fw-bold py-1 px-0" href="login.php">Iniciar Sesion</a>   
        <a class="nav-link fw-bold py-1 px-0" href="register.php">Registrarse</a>   
      </nav>
    </div>
</header>  
<div class="wrapper bg-white">
    <div class="h2 text-center">AviFest</div>
    <div class="h4 text-muted text-center pt-2">Registro de Usuario</div>
    <form class="pt-3" method="POST" action="">
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <div class="form-group py-2">
            <div class="input-field">
                <span class="far fa-user p-2"></span>
                <input type="text" name="nombre" placeholder="Nombre completo" required class="">
            </div>
        </div>
        <div class="form-group py-2">
            <div class="input-field">
                <span class="far fa-envelope p-2"></span>
                <input type="email" name="correo" placeholder="Correo Electrónico" required class="">
            </div>
        </div>
        <div class="form-group py-1 pb-2">
            <div class="input-field">
                <span class="fas fa-lock p-2"></span>
                <input type="password" name="contrasena" placeholder="Contraseña" required class="">
                <span class="fas fa-eye p-2" onclick="togglePassword('contrasena')" style="cursor: pointer;"></span>
            </div>
        </div>
        <div class="form-group py-1 pb-2">
            <div class="input-field">
                <span class="fas fa-lock p-2"></span>
                <input type="password" name="confirmar_contrasena" placeholder="Confirmar Contraseña" required class="">
                <span class="fas fa-eye p-2" onclick="togglePassword('confirmar_contrasena')" style="cursor: pointer;"></span>
            </div>
        </div>
        <button type="submit" class="btn btn-block text-center my-3">Registrarse</button>
        <div class="text-center pt-3 text-muted">¿Ya tienes una cuenta? <a href="login.php">Inicia Sesión</a></div>
    </form>
</div>

<script>
function togglePassword(fieldId) {
    const field = document.querySelector(`input[name="${fieldId}"]`);
    if (field.type === "password") {
        field.type = "text";
    } else {
        field.type = "password";
    }
}
</script>
</body>