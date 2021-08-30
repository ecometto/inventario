<?php

include 'conexion.php';
if (isset($_POST['accion'])) {
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);

    if (empty($usuario) || empty($clave)) {
        echo "vacio";
    } else {
        $sql = "select * from usuarios where email ='$usuario' and clave = '$clave'";
        $consulta = mysqli_query($conexion, $sql);
        $cantFilas = mysqli_num_rows($consulta);
        
        if ($cantFilas == 1) {
            while ($filas = mysqli_fetch_array($consulta)) {
                
                session_start();
                $_SESSION['usuarioId'] = $filas[0];
                $_SESSION['usuario'] = $filas[1];
                $_SESSION['tipoUsuario'] = $filas[3];
                $_SESSION['estado'] = "1";
                echo "ok";
            }
        } else{
            echo "datos";
            session_start();
            session_destroy();

        }
    }
}
