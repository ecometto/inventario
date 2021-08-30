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
        <div class=" row d-flex- justify-content-center  mx-3 ">
            <form id="formulario1" class=" formulario1 col-md-6 form my-3 py-3" action="">
                <div class="my-2 text-center">
                    <h4 class="tituloAgregarItem">DATOS DEL ARTICULO NUEVO</h4>
                </div>
                <div class="col-md-8 offset-md-2">
                    <div class="mb-2">
                        <label class="" for="descripcion">Descripcion del bien</label>
                        <input class="form-control" type="text" id="descripcion" placeholder="descripcion" required>
                    </div>
                    <div class="mb-2">
                        <label class="" for="rubro">Rubro</label>
                        <select class="form-select" name="rubro" id="rubro">
                            <option disabled selected>ingrese un rubro</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-6">
                            <label class="" for="pc">Precio de Compra</label>
                            <input class="form-control text-end" type="number" id="pc" placeholder="Precio Compra" required>
                        </div>
                        <div class="mb-2 col-6">
                            <labe class="" l for="pv">Precio de Venta</label>
                                <input class="form-control text-end" type="number" id="pv" placeholder="Precio Venta" required>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="" for="stock">Stock Inicial</label>
                        <input class="form-control text-end" type="number" id="stockIni" placeholder="Cantidad" required>
                    </div>
                    <div class="mb-2">
                        <label class="" for="obs">Observaciones</label>
                        <input class="form-control text-end" type="text" id="obs" placeholder="Detalles del articulo - observaciones Articulo" required>
                    </div>

                    <div class="text-center">
                        <input class="btn btn-success" id="cargarNuevo" type="submit" value="Agregar Articulo">
                    </div>
                </div>
            </form>
        </div>

        <hr>
        <hr>

        <div class=" justify-content-center text-center mb-5 bg-light pt-4">
            <h3>LISTADO DE ARTICULOS</h3>
            <div class="row my-3 justify-content-end text-center">
                <div class="col-md-5">
                    <div class="input-group w-75">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-search-plus"></i></span>
                            <input type="text" id="inputBuscar" class="form-control" placeholder="Articulo...">
                        </div>
                        <!-- <input id="inputBuscar" class="form-control" type="text" placeholder="&#xf00e;"> -->
                        <!-- <button id="btnBuscar" class="btn btn-info mt-2">FILTRAR</button> -->
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
        window.onload = cargarSelect()
        window.onload = cargar()
        document.getElementById('descripcion').focus();
    </script>

</body>

</html>