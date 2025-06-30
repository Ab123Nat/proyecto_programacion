<?php
session_start();

// Redireccionar si ya está logueado
if (isset($_SESSION["usuario"])) {
    header("Location: bienvenida.php");
    exit();
}

include("includes/header.php");
?>

<!-- Estilos específicos de bienvenida -->
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

.hero-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="a" cx="50%" cy="50%"><stop offset="0%" stop-color="%23ffffff" stop-opacity="0.1"/><stop offset="100%" stop-color="%23ffffff" stop-opacity="0"/></radialGradient></defs><circle cx="200" cy="200" r="100" fill="url(%23a)"/><circle cx="800" cy="300" r="150" fill="url(%23a)"/><circle cx="400" cy="700" r="120" fill="url(%23a)"/></svg>') no-repeat center center;
    background-size: cover;
    opacity: 0.2;
}

.main-box {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(15px);
    border-radius: 30px;
    padding: 3rem;
    max-width: 480px;
    width: 100%;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    position: relative;
    z-index: 1;
    text-align: center;
    animation: fadeInScale 0.7s ease-out;
}

@keyframes fadeInScale {
    from {
        opacity: 0;
        transform: scale(0.9) translateY(30px);
    }
    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

.main-box h2 {
    font-size: 2.2rem;
    font-weight: 700;
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 1rem;
}

.main-box p {
    color: #555;
    font-size: 1.05rem;
    margin-bottom: 2.5rem;
}

.btn-container {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.btn-home {
    padding: 14px 20px;
    border-radius: 12px;
    font-weight: bold;
    font-size: 1.05rem;
    text-transform: uppercase;
    border: none;
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 24px rgba(102, 126, 234, 0.4);
}

.btn-success {
    background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    color: white;
}

.btn-success:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 24px rgba(17, 153, 142, 0.4);
}

.features {
    margin-top: 2rem;
    padding-top: 1.5rem;
    border-top: 1px solid #ddd;
    font-size: 0.95rem;
    color: #666;
}
.features div {
    margin-bottom: 0.4rem;
}

@media (max-width: 576px) {
    .main-box {
        padding: 2rem 1.5rem;
    }
}
</style>

<!-- Contenido principal -->
<div class="hero-section">
    <div class="main-box">
        <h2>🚀 MiProyecto</h2>
        <p>Sistema moderno de autenticación con diseño elegante y funcionalidad completa.</p>
        
        <div class="btn-container">
            <a href="login.php" class="btn-home btn-primary">Iniciar sesión</a>
            <a href="registro.php" class="btn-home btn-success">Crear cuenta</a>
        </div>
        
    </div>
</div>

<?php include("includes/footer.php"); ?>
