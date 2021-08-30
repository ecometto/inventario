<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: ../index.php');
}

include '../librerias.php';
include '../conexion.php';

function llenarCombo()
{
    include '../conexion.php';
    $sql = "select * from articulos";
    $consulta = mysqli_query($conexion, $sql);
    if ($consulta) {
        while ($r = mysqli_fetch_array($consulta)) {
            echo "<option value='$r[0]'> $r[1] - $r[0]</option>";
        }
    }
}

// GRABAR ITEM EN TABLA PROVISORIA
if (isset($_POST['ingresar'])) {
    include '../conexion.php';

    $cant = $_POST['cant'];
    $art = $_POST['articulo'];
    $obs = $_POST['obs'];
    $user = $_SESSION['usuario'];

    $sql = "insert into provisoriamovimientos values(null, $cant, $art, '$obs', CURRENT_DATE(), '$user')";
    $consulta = mysqli_query($conexion, $sql);
}

// ELIMINAR ITEM
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $sql = "delete from provisoriamovimientos where id = '$id'";
    $consulta = mysqli_query($conexion, $sql);
}

//CONFIRMA EL MOVIMIENTO
if (isset($_GET['confirmar'])) {
    $user = $_SESSION['usuario'];
    
    //COPIA LOS VALORES DE LA PROVISORIA
    $sql = "insert into movimientos 
    select null,cantidad, idArt, observaciones, CURRENT_DATE(), '$user' from provisoriamovimientos ";
    $consulta = mysqli_query($conexion, $sql);

    // BORRA LOS VALORES DE LA PROVISORIA
    $sql1 = "delete from provisoriamovimientos";
    $consulta1 = mysqli_query($conexion, $sql1);
    echo "<script>
    window.location = 'movingreso.php'
    alert('REGISTRO INGRESADO CORRECTAMENTE')
    </script>";
    // header('Location: movingreso.php');
    
}

//PINTAR TABLA PROVISORIA
function llenarTabla()
{
    include '../conexion.php';
    $sql = "select p.cantidad, a.descripcion, p.observaciones, p.id from provisoriamovimientos as p join articulos as a on p.IDaRT = a.id";
    $consulta = mysqli_query($conexion, $sql);
    if ($consulta) {
        while ($row = mysqli_fetch_array($consulta)) {
            echo "
                <tr>
                    <td>$row[0]</td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td> <a class='eliminar' id='$row[3]'href='?eliminar=$row[3]'>Eliminar</a> </td>
                </tr>
                ";
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
    <title>Movimientos - Ingresos</title>
    <link rel="stylesheet" href="../css.css">
</head>
<style>
    .wrapper {
        height: 1000px;
    }
</style>

<body>
    <div class="wrapper container bg-light">
        <?php include '../vistas/header.php'; ?>
        <a href="../sistema/index.php"><button class="volver btn btn-danger my-2">VOLVER</button></a>
        <div class="d-flex flex-column justify-content-center align-items-center">

            <h3 class="my-4">MOVIMIENTO DE INGRESO DE MATERIALES</h3>

            <div class="formulario border py-2 justify-content-center align-items-center text-center">

                <form class="row px-2" action="" method="POST">
                    <div class="col-md-2">
                        <label for="cant">Cantidad</label>
                        <input class="form-control" type="text" name="cant" id="cant">
                    </div>
                    <div class="col-md-5">
                        <label for="articulo">Descripcion Articulo</label>
                        <select class="form-select" name="articulo" id="articulo">
                            <option disabled selected>Selecciones un articulo</option>
                            <?php
                            llenarCombo()
                            ?>

                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="obs">Observaciones</label>
                        <input class="form-control" type="text" name="obs" id="obs">
                    </div>
                    <div class="col-md-2">
                        <label class="d-block" for="ingresar">Click </label>
                        <input type="submit" class="col-12 btn btn-success" id="ingresar" name="ingresar" value="Enviar">
                    </div>
                </form>
            </div>

            <!-- ------------------------------------------ -->
            <div class="row m-4 container-fluid text-center justify-content-center align-items-center">
                <div class="col-8">
                    <h3 class="my-4">DETALLE DEL INGRESO</h3>
                </div>
                <div class="col-4">
                    <a href="?confirmar=true" class="btn btn-success col-12"> CONFIRMAR REGISTRO</a>
                </div>
            </div>

            <table class="table text-center ">
                <thead>
                    <th>CANTIDAD</th>
                    <th>DESCRIPCION</th>
                    <th>OBSERVACIONES</th>
                    <th>ACCIONES</th>
                </thead>
                <tbody id="tbody">
                    <?php
                    llenarTabla();
                    ?>

                </tbody>
            </table>




        </div>

        <?php include '../vistas/footer.php';  ?>
    </div>

    <script src="../controlador/funciones.js"></script>
    <script>
        document.getElementById('cant').focus()
        document.getElementById('articulo').addEventListener('click', function(){
            
        })
    </script>

</body>

</html>