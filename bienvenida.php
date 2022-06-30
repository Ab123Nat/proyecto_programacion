<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
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
    padding: 2rem;
}

.main-box {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 30px;
    padding: 3rem 2.5rem;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    text-align: center;
    max-width: 500px;
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
    font-size: 2.2rem;
    font-weight: 700;
    margin-bottom: 1rem;
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.alert {
    font-size: 1.1rem;
    color: #155724;
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    padding: 1.5rem;
    border-radius: 15px;
    margin-bottom: 2rem;
}

.btn-logout {
    padding: 14px 24px;
    font-size: 1rem;
    font-weight: 600;
    background: linear-gradient(135deg, #e74c3c, #c0392b);
    color: white;
    border: none;
    border-radius: 12px;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
    margin-bottom: 1rem;
}
.btn-logout:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
}

.link-pass {
    display: block;
    margin-top: 1rem;
    font-size: 0.95rem;
    color: #555;
}
.link-pass a {
    color: #667eea;
    font-weight: 600;
    text-decoration: none;
}
.link-pass a:hover {
    color: #764ba2;
}
</style>

<div class="hero-section">
  <div class="main-box">
    <h2>Bienvenido/a 👋</h2>
    <div class="alert">
      Hola, <strong><?= htmlspecialchars($_SESSION["usuario"]) ?></strong><br>
      Has iniciado sesión exitosamente.
    </div>
    <a href="logout.php" class="btn-logout">Cerrar sesión</a>
    <div class="link-pass">
      ¿Olvidaste tu contraseña? <a href="cambiar_contraseña.php">Cambiar contraseña</a>
    </div>
  </div>
</div>

<?php include("includes/footer.php"); ?>
