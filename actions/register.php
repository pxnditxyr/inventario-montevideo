<?php
    session_start();
    require_once '../models/Usuario.php';

    if ( !isset( $_POST[ 'apellidos' ] ) || !isset( $_POST[ 'nombres' ] ) || !isset( $_POST[ 'ci' ] ) || !isset( $_POST[ 'fecha_nac' ] ) || !isset( $_POST[ 'email' ] ) || !isset( $_POST[ 'password' ] ) || !isset( $_POST[ 'password2' ] ) ) {
        echo '<h1> Debe llenar todos los datos </h1>';
        header( 'Refresh: 5; URL=../register.php' );  
    }

    $apellidos = $_POST[ 'apellidos' ];
    $nombres = $_POST[ 'nombres' ];
    $ci = $_POST[ 'ci' ];
    $fecha_nac = $_POST[ 'fecha_nac' ];
    $email = $_POST[ 'email' ];
    $password = $_POST[ 'password' ];
    $password2 = $_POST[ 'password2' ];

    $usuario = new Usuario();

    $existeUsuario = $usuario -> existeUsuarioPorEmail( $email );
    if ( $existeUsuario ) {
        echo '<h1> El usuario con el email ' . $email . ' ya existe </h1>';
        header( 'Refresh: 5; URL=../register.php' );  
        return;
    }
    if ( strcmp( $password, $password2 ) != 0 ) {
        echo '<h1> Las contraseñas no coinciden </h1>';
        header( 'Refresh: 5; URL=../register.php' );  
        return;
    }

    
    $usuarioObtenido = $usuario -> crearUsuario( $apellidos, $nombres, $ci, $fecha_nac, $email, $password );

    if ( $usuario -> id == '' ) {
        echo '<h1> Email o Contraseña no validos </h1>';
        header( 'Refresh: 5; URL=../register.php' );  
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
