<?php
include("includes/conexion.php");
$mensaje = "";
$tipo = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sss", $nombre, $email, $password);

    if ($stmt->execute()) {
        $mensaje = "✅ Registro exitoso. Serás redirigido...";
        $tipo = "success";
    } else {
        $mensaje = "❌ Error: " . $conexion->error;
        $tipo = "error";
    }
}

include("includes/header.php");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
.hero-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.main-box {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 30px;
    padding: 3.5rem 2.5rem;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    text-align: center;
    max-width: 500px;
    width: 90%;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.main-box h2 {
    font-size: 2rem;
    font-weight: 700;
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 1.5rem;
}

form {
    text-align: left;
}

.btn-register {
    width: 100%;
    padding: 12px;
    font-size: 1rem;
    background: linear-gradient(135deg, #11998e, #38ef7d);
    color: white;
    font-weight: bold;
    border: none;
    border-radius: 12px;
    margin-top: 1.5rem;
}
</style>

<div class="hero-section">
  <div class="main-box">
    <h2>📝 Crear Cuenta</h2>
    <form method="POST">
      <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Contraseña</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button type="submit" class="btn-register">Registrarse</button>
    </form>
  </div>
</div>

<div class="modal fade" id="modalMensaje" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header bg-<?php echo ($tipo === "success") ? "success" : "danger"; ?> text-white">
        <h5 class="modal-title">
          <?php echo ($tipo === "success") ? "¡Éxito!" : "¡Error!"; ?>
        </h5>
      </div>
      <div class="modal-body">
        <?= htmlspecialchars($mensaje) ?>
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
<?php if (!empty($mensaje)): ?>
  const modal = new bootstrap.Modal(document.getElementById('modalMensaje'));
  modal.show();

  setTimeout(() => {
    modal.hide();
    <?php if ($tipo === "success"): ?>
      window.location.href = "login.php";
    <?php endif; ?>
  }, 3000);
<?php endif; ?>
</script>

<?php include("includes/footer.php"); ?>
