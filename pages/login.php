<?php
session_start();
require_once '../utils/conexion.php';
require_once '../utils/functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    
    $sql = "SELECT id, nombre, correo, contrasena, rol FROM usuarios WHERE correo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();
        if (password_verify($contrasena, $usuario['contrasena'])) {
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['rol'] = $usuario['rol'];
            
            if ($usuario['rol'] === 'admin') {
                header("Location: ../admin/index.php");
            } else {
                header("Location: ../client/index.php");
            }
            exit();
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "Usuario no encontrado";
    }
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="styles/login.css" >

<div class="wrapper bg-white">
    <div class="h2 text-center">AviFest</div>
    <div class="h4 text-muted text-center pt-2">Ingresa tus datos de acceso</div>
    <form class="pt-3" method="POST" action="">
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <div class="form-group py-2">
            <div class="input-field">
                <span class="far fa-user p-2"></span>
                <input type="email" name="correo" placeholder="Correo Electrónico" required class="">
            </div>
        </div>
        <div class="form-group py-1 pb-2">
            <div class="input-field">
                <span class="fas fa-lock p-2"></span>
                <input type="password" name="contrasena" placeholder="Ingresa tu Contraseña" required class="">
                <button type="button" class="btn bg-white text-muted toggle-password">
                    <span class="far fa-eye-slash"></span>
                </button>
            </div>
        </div>
        <div class="d-flex align-items-start">
            <div class="ml-auto"> <a href="#" id="forgot">¿Olvidaste tu contraseña?</a> </div>
        </div> <button class="btn btn-block text-center my-3">Iniciar Sesión</button>
        <div class="text-center pt-3 text-muted">¿No eres miembro? <a href="register.php">Regístrate</a></div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const togglePassword = document.querySelector('.toggle-password');
    const passwordInput = document.querySelector('input[name="contrasena"]');
    
    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        const icon = this.querySelector('span');
        icon.classList.toggle('fa-eye-slash');
        icon.classList.toggle('fa-eye');
    });
});
</script>