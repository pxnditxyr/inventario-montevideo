<?php
  session_start();

  if ( !isset( $_SESSION[ 'id' ] ) ) {
    echo '<h1> Debe iniciar sesion... </h1>';
    header( 'Location: ../login.php' );
    return;
  }

  if ( strcmp( $_SESSION[ 'rol' ], 'admin' ) != 0 ) {
    header( 'Location: ../comercio/' );
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
  <main class="flex flex-col h-screen w-full">
    ' . $navbar . '
    <h1> ' . $titulo . ' </h1>
    ' . $componente . '
  </main>
</body>
</html>';
  }
?>
