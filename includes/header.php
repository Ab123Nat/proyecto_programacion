<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>MiProyecto</title>
  <link rel="stylesheet" href="css/estilos.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    header {
      background-color: #1e1e2f;
      color: white;
      padding: 1.2rem 0;
      text-align: center;
      font-size: 1.5rem;
      font-weight: bold;
      letter-spacing: 1px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .main-box {
      max-width: 500px;
      background: #fff;
      padding: 2.5rem;
      border-radius: 20px;
      margin: 5rem auto 7rem;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      text-align: center;
      animation: fadeInUp 0.5s ease-in-out;
    }

    .main-box h2 {
      font-weight: bold;
      color: #2c3e50;
      margin-bottom: 1rem;
    }

    .main-box p {
      color: #6c757d;
      margin-bottom: 2rem;
    }

    .main-box a.btn {
      margin: 0.5rem 0;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>
  <header>MiProyecto</header>
