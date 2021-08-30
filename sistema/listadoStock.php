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
    <title>articulos</title>
</head>


<body>
    <?php include '../vistas/header.php';  ?>

    <div class="container bg-light">
        <a href="../sistema/index.php"><button class="volver btn btn-danger my-2">VOLVER</button></a>


        <div class=" justify-content-center text-center mb-5 bg-light pt-4">
            <h3>LISTADO DE STOCK</h3>
            <div class="row my-3 justify-content-end text-center">
                <div class="col-md-5">
                    <div class="input-group w-75">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-search-plus"></i></span>
                            <input type="text" id="inputBuscar" class="form-control" placeholder="Articulo...">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-3">
                <div class="col-md-8 offset-md-2">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>DESCRIPCION</th>
                            <th>RUBRO</th>
                            <th>STOCK</th>
                            <th>OBSERVACIONES</th>
                        </thead>

                        <tbody id="tbody">
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>



    <?php include '../vistas/footer.php' ?>

    <script src="../controlador/funciones.js"></script>
    <script>
        window.onload = cargar()
    </script>

</body>

</html>