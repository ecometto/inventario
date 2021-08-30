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
    <title>Informe de Movimientos</title>
    <link rel="stylesheet" href="../css.css">
</head>

<body>
    <div class="container bg-light">
        <?php include '../vistas/header.php'; ?>

        <a href="../sistema/index.php"><button class="volver btn btn-danger my-2">VOLVER</button></a>

        <div class="formularioFiltro row mt-4">
            <!-- FILTRO POR FECHAS -->
            <div class=" col-md-4  p-3 filtroFechas border">
                <h4 class="text-end">FILTRO POR FECHAS</h4>
                <input class="form-control" type="date" name="fechaIni" id="fechaIni" placeholder="Desde Fecha">
                <input class="form-control" type="date" name="fechaFin" id="fechaFin" placeholder="Hasta Fecha">
                <label for="todas" chequed>Todas las Fechas</label>
                <input type="checkbox" name="todas" id="todas" checked>
            </div>
            <!-- FILTRO POR ARTICULOS -->
            <div class=" col-md-6 p-3 filtroArticulos border">
                <h4>FILTRO POR ARTICULOS</h4>
                <select class="form-select" name="articulosM" id="articulosM">
                    <option value="" selected desabled>Ingrese un Articulo</option>
                    <?php
                    $sql2 = "select * from articulos order by descripcion";
                    $consulta2 = mysqli_query($conexion, $sql2);
                    if ($consulta2) {
                        while ($filas2 = mysqli_fetch_array($consulta2)) {
                            echo "<option value='$filas2[0]'>$filas2[1] - Cod: $filas2[0]</option>";
                        }
                    }
                    ?>
                </select>
                <label for="todos">Todos los articulos</label>
                <input type="checkbox" name="todos" id="todos" checked>
            </div>
            <!-- BOTON FILTRAR -->
            <div class="col-md-2 p-3 centrar border">
                <div class="d-grid col-12">
                    <a id="filtrarMovimiento" class="centrar flex-column text-decoration-none" href="">
                        <i class="fa fa-search-plus fs-1 my-1"></i>
                        <button type="submit"  class="btn btn-secondary">BUSCAR</button>
                    </a>
                </div>
            </div>
        </div>

        <div class=" mt-2 lineaGruesa">

        </div>
        <div class="listado centrar flex-column my-5">
            <h3 class="text-decoration-underline">LISTADO DE MOVIMIENTOS</h3>
            <div>
                <table class="table">
                    <thead>
                        <th>Articulo</th>
                        <th>Cantidad</th>
                        <th>observaciones</th>
                        <th>fecha</th>
                        <th>usuario</th>
                    </thead>
                    <tbody id="tbody">
                     <?php
                     include '../controlador/funciones.php';
                     listarTodosMovimientos();
                     ?>

                    </tbody>
                </table>
            </div>


        </div>

        <?php include '../vistas/footer.php'; ?>

    </div>

    <script src="../controlador/funciones.js"></script>
</body>

</html>