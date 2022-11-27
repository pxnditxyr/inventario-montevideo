<?php
    session_start();
    
    require_once '../models/Usuario.php';
    if ( !isset( $_POST[ 'email' ] ) || !isset( $_POST[ 'password' ] ) ) {
        echo '<h1> Debe llenar todos los datos </h1>';
        header( 'Refresh: 5; URL=../login.php' ); 
        return;
    }
    $email = $_POST[ 'email' ];
    $password = $_POST[ 'password' ];
    $usuario = new Usuario();
    $usuarioObtenido = $usuario -> obtenerUsuarioPorEmailYPassword( $email, $password );

    if ( $usuario -> id == '' ) {
        echo '<h1> Email o Contraseña no validos </h1>';
        header( 'Refresh: 5; URL=../login.php' );  
        return;
    }

    $_SESSION[ 'id' ] = $usuario -> id;
    
    $_SESSION[ 'apellidos' ] = $usuario -> apellidos;
    $_SESSION[ 'nombres' ] = $usuario -> nombres;
    $_SESSION[ 'ci' ] = $usuario -> ci;
    $_SESSION[ 'fecha_nac' ] = $usuario -> fecha_nac;
    $_SESSION[ 'email' ] = $usuario -> email;
    $_SESSION[ 'rol' ] = $usuario -> rol;

    if ( strcmp( $usuario -> rol, 'admin' ) == 0 ) {
        header( 'Location: ../inventario/' );
        return;
    }
    header( 'Location: ../comercio/' );
?>
