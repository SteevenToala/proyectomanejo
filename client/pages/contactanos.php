<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // No hay sesión activa
    header("Location: /proyectomanejo/pages/login.php");
    exit();
}
?>

<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Avifest Ambato 2025</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
    <script src="../../assets/js/color-modes.js"></script>
    <link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="apple-touch-icon" href="../../assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="../../assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="../../assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="../../assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="../../assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="../../assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">

    <style>
      /* Copia aquí todos los estilos del index, como lo hiciste antes */
      .background {
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
          url('https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDJ8fGJsdXUlMjBjb3ZlcnxlbnwwfHx8fDE2OTI5NTY1NzE&ixlib=rb-4.0.3&q=80&w=1080');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
      }
      /* Puedes agregar más estilos personalizados aquí si lo necesitas */
    </style>

    <link href="../../cover.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center background">
    

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <?php include '../includes/menu_pages.php'; ?>
    <main class="container d-flex w-100 h-100 p-3 mx-auto flex-column justify-content-center">
    <h1 class="mb-4">Contáctanos</h1>    
    <ul class="list-unstyled text-start">
      <li><strong>📧 Correo:</strong> <a href="mailto:contacto@avifest.com" class="text-white">avifestsistemas@avifest.com</a></li>
      <li><strong>📞 Teléfono:</strong> +593 99 4551218</li>
      <li><strong>📱 Instagram:</strong> <a href="https://instagram.com/avifest" class="text-white">@avifest</a></li>
    </ul>    
  </main>

      <footer class="mt-auto text-white-50">
      <p>Desarrollado por<a href="https://getbootstrap.com/" class="text-white">Avifest</a>, @Copyright<a href="https://x.com/mdo" class="text-white">@AvifestSistemas</a>.</p>
      </footer>
    </div>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
