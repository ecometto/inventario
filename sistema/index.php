<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: ../index.php');
}


include '../librerias.php';



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css.css">
    <title>SISTEMA DE INVENTARIO</title>
    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <?php include '../vistas/header.php'; ?>

        <div class="pantallaPrincipal d-flex justify-content-center align-items-center ">

            <div id="bienvenida" style="display: none;">
                <div class="otro text-light fs-4 fw-4 d-flex justify-content-center align-items-center flex-column">
                    <p>BIENVENIDO <?php echo $_SESSION['usuario']; ?></p> <br>
                    <p>ELIJA LA OPCION DESEADA DESDE EL SIGUIENTE MENU...</p>

                </div>
            </div>

            <div class=" opciones row text-light">
                <div class="abm col-md-3 text-center ">
                    <div class="titulo-opciones">
                        <p>ALTA - BAJA - MODIFICACION</p>
                    </div>
                    <div class="contenido-opciones">
                        <a href="altaArticulos.php">
                            <p class="item-opciones">ALTA</p>
                        </a>
                        <a href="bajaArticulos.php ">
                            <p class="item-opciones">EDITAR - <br> ELIMINAR</p>
                           
                        </a>

                    </div>
                </div>

                <div class=" movimientos col-md-3 text-center ">
                    <div class="titulo-opciones">
                        MOVIMIENTOS
                    </div>
                    <div class="contenido-opciones">
                        <a href="movIngreso.php">
                            <p class="item-opciones">INGRESO</p>
                        </a>
                        <a href="movEgreso.php">
                            <p class="item-opciones">EGRESO</p>
                        </a>
                        <a href="enConstruccion.php">
                            <p class="item-opciones">TRASNFERENCIAS</p>
                        </a>
                        <a href="enConstruccion.php">
                            <p class="item-opciones">AJUSTES</p>
                        </a>
                    </div>
                </div>
                <div class="informes col-md-3 text-center ">
                    <div class="titulo-opciones">
                        INFORMES
                    </div>
                    <div class="contenido-opciones">
                        <a href="">
                            <p class="item-opciones">INFORMES DE STOCK</p>
                        </a>
                        <a href="informeMovimientos.php">
                            <p class="item-opciones">INFORME DE MOVIMIENTOS</p>
                        </a>
                        <a href="listadoStock.php">
                            <p class="item-opciones">LISTADO STOCK</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>



        <?php include '../vistas/footer.php'; ?>


        <script src="../controlador/funciones.js"></script>

        <?php
        if (isset($_GET['primera'])) {
            echo "    <script>
            let bienvenida = document.getElementById('bienvenida').style.display = 'flex';
            let opciones = document.querySelector('.opciones').style.display = 'none';
            setTimeout(function(){
                let bienvenida = document.getElementById('bienvenida').style.display = 'none';
            let opciones = document.querySelector('.opciones').style.display = 'flex';
            },3000)
    </script>";
        }
        ?>

    </div>





</body>

</html>