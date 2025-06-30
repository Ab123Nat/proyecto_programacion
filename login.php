<?php
ob_start();
session_start();
include("includes/conexion.php");
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuarios WHERE email=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($password, $usuario["password"])) {
            $_SESSION["usuario"] = $usuario["nombre"];
            header("Location: bienvenida.php");
            exit();
        } else {
            $mensaje = "Contraseña incorrecta.";
        }
    } else {
        $mensaje = "Usuario no encontrado.";
    }
}

include("includes/header.php");
?>

<style>
.hero-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}
.main-box {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 30px;
    padding: 3rem 2.5rem;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    text-align: center;
    max-width: 480px;
    width: 100%;
    border: 1px solid rgba(255, 255, 255, 0.2);
    animation: fadeInScale 0.8s ease-out;
}
@keyframes fadeInScale {
    from {
        opacity: 0;
        transform: scale(0.95) translateY(20px);
    }
    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}
.main-box h2 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 1rem;
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.form-group {
    margin-bottom: 1.5rem;
    text-align: left;
}
label {
    font-weight: 500;
    display: block;
    margin-bottom: 0.5rem;
    color: #2c3e50;
}
input {
    width: 100%;
    padding: 12px 15px;
    border-radius: 12px;
    border: 2px solid #e0e0e0;
    font-size: 1rem;
    background-color: #f8f9fa;
    transition: 0.3s;
}
input:focus {
    outline: none;
    border-color: #667eea;
    background-color: #fff;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}
button {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    color: white;
    transition: all 0.3s ease;
}
button:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(17, 153, 142, 0.3);
}
.alert {
    color: #dc3545;
    font-weight: 500;
    margin-top: 1rem;
}
</style>

<div class="hero-section">
  <div class="main-box">
    <h2>Iniciar Sesión</h2>
    <form method="POST">
      <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input type="email" name="email" id="email" required placeholder="ejemplo@correo.com">
      </div>
      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required placeholder="••••••••">
      </div>
      <button type="submit">Ingresar</button>
      <?php if (!empty($mensaje)) : ?>
        <div class="alert"><?= $mensaje ?></div>
      <?php endif; ?>
    </form>
  </div>
</div>

<?php include("includes/footer.php"); ?>
