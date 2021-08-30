<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: ../index.php');
}

include '../librerias.php';
include '../conexion.php';

if (isset($_GET['editar'])) {
    $id = $_GET['editar'];
    $idRubro = $_GET['idRubro'];

    $sql = "select * from articulos where id = '$id'";
    $consulta = mysqli_query($conexion, $sql);

    $num = mysqli_num_rows($consulta);
    $filasArt = mysqli_fetch_array($consulta);

    $sqlOption = "select * from rubros order by descripcion";
    $consulta2 = mysqli_query($conexion, $sqlOption);

    if ($consulta2) {
        $selectHTML = "";
        while ($filas = mysqli_fetch_array($consulta2)) {
            if ($idRubro != $filas[0]) {
                $selectHTML .= "<option value='$filas[0]' >$filas[1]</option>";
            } else {
                $selectHTML .= "<option value='$filas[0]' selected='selected'>$filas[1]</option>";
            }
        }
    }
}
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

    <div class="container ">
        <a href="../sistema/index.php"><button class="volver btn btn-danger my-2">VOLVER</button></a>
        <div class=" row d-flex- justify-content-center  mx-3 ">
            <form id="formulario1" class=" formulario1 col-md-6 form my-3 py-3" action="">
                <div class="my-2 text-center">
                    <h4 class="tituloAgregarItem">EDITAR ARTICULOO</h4>
                </div>
                <div class="col-md-8 offset-md-2">
                    <div class="mb-2 d-none">
                        <label class="" for="id">ID</label>
                        <input class="form-control" type="text" id="id" value="<?php echo $filasArt[0]; ?>" required>
                    </div>
                    <div class="mb-2">
                        <label class="" for="descripcion">Descripcion</label>
                        <input class="form-control" type="text" id="descripcion" value="<?php echo $filasArt[1]; ?>" required>
                    </div>
                    <div class="mb-2">
                        <label class="" for="rubro">Rubro</label>
                        <select class="form-select" name="rubro" id="rubro">
                            <option disabled selected>ingrese un rubro</option>
                            <?php echo $selectHTML; ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-6">
                            <label class="" for="pc">Precio de Compra</label>
                            <input class="form-control text-end" type="number" id="pc" value="<?php echo $filasArt[3]; ?>">
                        </div>
                        <div class="mb-2 col-6">
                            <labe class="" l for="pv">Precio de Venta</label>
                                <input class="form-control text-end" type="number" id="pv" value="<?php echo $filasArt[4]; ?>">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="" for="obs">Observaciones</label>
                        <input class="form-control text-end" type="text" id="obs" value="<?php echo $filasArt[6]; ?>">
                    </div>

                    <div class="text-center">
                        <input class="btn btn-success" id="actualizarArticulo" type="submit" value="Actualizar Articulo">
                    </div>
                </div>
            </form>
        </div>

        <script src="../controlador/funciones.js"></script>
</body>