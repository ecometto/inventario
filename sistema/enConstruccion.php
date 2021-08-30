<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: ../index.php');
}

include '../librerias.php';
include '../conexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>en construccion</title>
    <style>
        .construccion {
            height: 600px;
        }
        .parrafo{
            animation: girar 4s infinite;
        }

        @keyframes girar{
            0%{transform: rotate(0deg);}
            50%{transform: rotate(180deg);}
            100%{transform: rotate(360deg);}
        }
    </style>
</head>

<body>
    <div class="container ">
       <a href="index.php"> <button >Volver al Inicio</button> </a>
        <div class=" construccion border d-flex justify-content-center align-items-center text-center">
            <p class="parrafo">
                SITIO EN CONSTRUCCION
            </p>
        </div>
    </div>

</body>



</html>