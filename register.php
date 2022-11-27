<?php 
  require_once './layouts/layout.php';
  
  function register () {
    return '
<form action="actions/register.php" method="post">
  <div>
    <label for="apellidos"> Apellidos: </label>
    <input type="text" name="apellidos" id="apellidos" placeholder="Lima" value="Lima"/>
  </div>
  <div>
    <label for="nombres"> Nombres: </label>
    <input type="text" name="nombres" id="nombres" placeholder="Dennis" value="Dennis"/>
  </div>
  <div>
    <label for="ci"> C.I.: </label>
    <input type="number" name="ci" id="ci" placeholder="12345678" value="12345678"/>
  </div>
  <div>
    <label for="fecha_nac"> Fecha de nacimiento: </label>
    <input type="date" name="fecha_nac" id="fecha_nac" value="' . date( 'Y-m-d' ) . '"/>
  </div>
  <div>
    <label for="email"> Email: </label>
    <input type="email" name="email" id="email" placeholder="example@example.com" value="dennis@dennis.com"/>
  </div>
  <div>
    <label for="password"> Contraseña: </label>
    <input type="password" name="password" id="password" placeholder="" value="12345" />
  </div>
  <div>
    <label for="password2"> Confirmar Contraseña: </label>
    <input type="password" name="password2" id="password2" placeholder="" value="12345" />
  </div>
  <div>
    <button> Ingresar </button>
  </div>
</form>';
  }
  $register = register();
  echo layout( 'Registro', $register );
?>
