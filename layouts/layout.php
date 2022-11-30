<?php
  session_start();
  if ( isset( $_SESSION[ 'id' ] ) ) {
    header( 'Location: inventario/' );
    return;
  }
  include_once './views/navbar.php';

  function layout ( $titulo, $componente ) {
    $navbar = navbar();
    return '
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> ' . $titulo . ' </title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <main class="flex flex-col items-center min-h-screen bg-slate-900">
    ' . $navbar . '
    <h1
      class="text-5xl font-bold text-slate-100"
    > ' . $titulo . ' </h1>
    ' . $componente . '
  </main>
</body>
</html>';
  }
?>
