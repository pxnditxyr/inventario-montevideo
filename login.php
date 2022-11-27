<?php 
  require_once './layouts/layout.php';
  
  function login () {
    return '
<form action="actions/login.php" method="post">
  <div>
      <label for="email"> Email: </label>
      <input type="email" name="email" id="email" placeholder="example@example.com" value="dennis@dennis.com"/>
  </div>
  <div>
      <label for="password"> Contraseña: </label>
      <input type="password" name="password" id="password" placeholder="" value="12345" />
  </div>
  <div>
      <button> Ingresar </button>
  </div>
</form>
      ';
  }
  $login = login();
  echo layout( 'Login', $login );
?>
