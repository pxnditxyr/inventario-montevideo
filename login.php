<?php 
  require_once './layouts/layout.php';
  
  function login () {
    return '
    <div style="background-image: ( assets/images/auth-image-1.jpg )" class="flex flex-col items-center justify-center h-full w-full bg-cover bg-center">
      <form action="actions/login.php" method="post" class="flex flex-col items-center justify-center w-1/2">
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
    </div>
      ';
  }
  $login = login();
  echo layout( 'Login', $login );
?>
