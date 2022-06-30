<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

include("includes/conexion.php");
$mensaje = "";
$tipo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $nueva_password = $_POST["nueva_password"];
    $confirmar_password = $_POST["confirmar_password"];

    if ($nueva_password !== $confirmar_password) {
        $mensaje = "Las contraseñas no coinciden.";
        $tipo = "error";
    } else {
        $password_hash = password_hash($nueva_password, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET password=? WHERE email=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $password_hash, $email);

        if ($stmt->execute()) {
            $mensaje = "Contraseña actualizada correctamente.";
            $tipo = "success";
        } else {
            $mensaje = "Error al actualizar: " . $conexion->error;
            $tipo = "error";
        }
    }
}

include("includes/header.php");
?>

<!-- DISEÑO -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="hero-section">
  <div class="main-box">
    <h2>🔐 Cambiar Contraseña</h2>
    <form method="POST">
      <div class="mb-3">
        <label>Email registrado</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Nueva contraseña</label>
        <input type="password" name="nueva_password" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Confirmar contraseña</label>
        <input type="password" name="confirmar_password" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Actualizar</button>
    </form>
  </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="modalMensaje" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header bg-<?php echo ($tipo === "success") ? "success" : "danger"; ?> text-white">
        <h5 class="modal-title"><?php echo ($tipo === "success") ? "¡Éxito!" : "¡Error!"; ?></h5>
      </div>
      <div class="modal-body">
        <?= htmlspecialchars($mensaje) ?>
      </div>
    </div>
  </div>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
<?php if (!empty($mensaje)): ?>
  const modal = new bootstrap.Modal(document.getElementById('modalMensaje'));
  modal.show();

  <?php if ($tipo === "success"): ?>
  setTimeout(() => {
    window.location.href = "login.php";
  }, 3000);
  <?php endif; ?>
<?php endif; ?>
</script>

<?php include("includes/footer.php"); ?>
