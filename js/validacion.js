function validarFormulario() {
  const password = document.getElementById("password");
  if (password && password.value.length < 6) {
    alert("La contraseña debe tener al menos 6 caracteres.");
    return false;
  }
  return true;
}
