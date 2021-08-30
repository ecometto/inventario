<?php
include 'librerias.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: url('imagenes/inventario.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            font-size: 1.5em;
        }

        .container {
            height: 100vh;
        }

        .contenedor {
            background-color: rgba(254, 254, 254, 0.8);
            width: 40%;
            height: 90%;
            position: relative;
        }

        .imgUser {
            border-radius: 40%;
            width: 100px;
            height: 100px;
        }

        .powered {
            position: absolute;
            bottom: 0px;
            right: 5px;
            font-size: 0.7em;
            margin: 0;
            padding: 0;
        }

        .error{
            color: red;
        }

        
        
        
        @media (max-width:768px) {
            .contenedor {
                background-color: rgba(254, 254, 254, 0.8);
                width: 100%;
                height: 100%;
                position: relative;
            }
        }
        
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center text-center">

        <div class="contenedor pt-3 d-flex flex-column justify-content-center align-items-center text-center">
            <div>
                <h5 class="bienvenido fs-4 animated pulse">BIENVENIDO AL SISTEMA DE INVENTARIOS</h5>
                <img class="imgUser" src="imagenes/user.webp" alt="">
            </div>
            <form id="formulario" class="w-75" action="">
                <div class="form-group mb-3 ">
                    <label for="usuario">Usuario: </label>
                    <input class="form-control" type="email" id="usuario" required placeholder="Ingrese e-mail de registro">
                </div>

                <div class="form-group mb-3">
                    <label for="clave">Clave: </label>
                    <input class="form-control" type="password" id="clave" required placeholder="Ingrese su clave">
                </div>
                <div>
                    <p class="alert " id="mensaje">Ingrese sus Datos</p>
                </div>

                <button type="submit" class="btn btn-primary my-3" id="validar">ACEPTAR</button>
            </form>
            <p class="powered">powered by <span class="fw-bold fst-italic"> CED</span></p>
        </div>



        <script src="controlador/funciones.js"></script>
        <script>
            var user = document.getElementById('usuario').focus()
        </script>

    </div>

</body>

</html>