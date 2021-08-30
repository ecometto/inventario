<?php

if (isset($_POST['cargar'])) {
    cargarLista();
}

if (isset($_POST['cargarSelect'])) {
    cargarSelect();
}

if (isset($_POST['registrarNuevo'])) {
    registrarNuevo();
}

if (isset($_POST['cargarBaja'])) {
    listarTodosBaja();
}

if (isset($_POST['buscarBaja'])) {
    listarparcialBaja();
}

if (isset($_POST['buscar'])) {
    listarParcial();
}

if (isset($_POST['actualizarArticulo'])) {
    actualizarArticulo();
}

if (isset($_GET['eliminar'])) {
    eliminarArticulo();
}

if (isset($_POST['filtrarMovimiento'])) {
    $idArt = $_POST['idArt'];
    $fi = $_POST['fechaIni'];
    $ff = $_POST['fechaFin'];

    listarMovimientosFiltrados($idArt, $fi, $ff);
}


//FUNCIONES..

function cargarSelect()
{
    include '../conexion.php';

    $sql = "select * from rubros order by descripcion";
    $consulta = mysqli_query($conexion, $sql);
    if ($consulta) {

        while ($filas = mysqli_fetch_array($consulta)) {
            echo "<option value='$filas[0]'>$filas[1]</option>";
        }
    }
}


// --CRUD--
function registrarNuevo()
{
    include '../conexion.php';
    $descripcion = $_POST['descripcion'];
    $rubro = $_POST['rubro'];
    $pc = $_POST['pc'];
    $pv = $_POST['pv'];
    $stockIni = $_POST['stockIni'];
    $obs = $_POST['obs'];

    $sql = "insert into articulos values (null, '$descripcion', '$rubro', $pc,$pv,$stockIni, '$obs', now())";
    $consulta = mysqli_query($conexion, $sql);
    if ($consulta) {
        echo "Nuevo articulo registrado correctamente";
    } else {
        echo "HUBO UN ERROR DURANTE LA CARGA";
    }
}

function actualizarArticulo()
{
    include '../conexion.php';
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $rubro = $_POST['rubro'];
    $pc = $_POST['pc'];
    $pv = $_POST['pv'];
    $obs = $_POST['obs'];

    $sql = "update articulos set descripcion = '$descripcion', rubro= '$rubro', pc =$pc, pv=$pv, observaciones = '$obs' where id = '$id'";
    $consulta = mysqli_query($conexion, $sql);
    if ($consulta) {
        echo "Articulo modificado correctamente";
    } else {
        echo "HUBO UN ERROR DURANTE LA CARGA";
    }
}

function eliminarArticulo()
{
    $id = $_GET['eliminar'];

    include '../conexion.php';

    $sql = "delete from articulos where id = $id";
    $consulta = mysqli_query($conexion, $sql);

    if ($consulta) {
        echo "<script> 
        alert('Articulo eliminado correctamente');
        window.location= '../sistema/bajaArticulos.php';
        </script>";
    }
}

function cargarLista()
{
    include '../conexion.php';
    $sql = "select a.id, a.descripcion, r.descripcion, a.stock, a.observaciones from articulos as a join rubros as r on a.rubro = r.id";
    $consulta = mysqli_query($conexion, $sql);
    if (!$consulta) {
        echo 'error al conectar con la base de datos';
    } else {
        while ($filas = mysqli_fetch_array($consulta)) {
            echo "
        <tr>
            <td>$filas[0]</td>
            <td>$filas[1]</td>
            <td>$filas[2]</td>
            <td>$filas[3]</td>
            <td>$filas[4]</td>
        </tr>
        ";
        }
    }
}

function listarParcial()
{
    include '../conexion.php';
    $cadena = $_POST['cadena'];

    $sql = "select a.id, a.descripcion, r.descripcion, a.stock, a.observaciones from articulos as a join rubros as r on a.rubro = r.id where a.descripcion like '%$cadena%' or r.descripcion like '%$cadena%'";
    $consulta = mysqli_query($conexion, $sql);
    if (!$consulta) {
        echo 'error al conectar con la base de datos';
    } else {
        while ($filas = mysqli_fetch_array($consulta)) {
            echo "
        <tr>
            <td>$filas[0]</td>
            <td>$filas[1]</td>
            <td>$filas[2]</td>
            <td>$filas[3]</td>
            <td>$filas[4]</td>
            
        </tr>
        ";
        }
    }
}

function listarTodosBaja()
{
    include '../conexion.php';
    $sql = "select a.id, a.descripcion, r.descripcion, a.stock, a.observaciones, a.rubro from articulos as a left join rubros as r on a.rubro = r.id";
    $consulta = mysqli_query($conexion, $sql);
    if (!$consulta) {
        echo 'error al conectar con la base de datos';
    } else {
        while ($filas = mysqli_fetch_array($consulta)) {
            echo "
        <tr>
            <td>$filas[0]</td>
            <td>$filas[1]</td>
            <td>$filas[2]</td>
            <td >$filas[3]</td>
            <td >$filas[4]</td>
            <td> <div class= 'd-flex'>
            <a class='editar mr-1' id='$filas[0]' href='editarArticulo.php?editar=$filas[0]&idRubro=$filas[5]'>Editar</a> -
            <a class='eliminar' id='$filas[0]'href='../controlador/funciones.php?eliminar=$filas[0]'>Eliminar</a>
            </div></td>
        </tr>
        ";
        }
    }
}

function listarParcialBaja()
{
    include '../conexion.php';
    $cadena = $_POST['cadena'];

    $sql = "select a.id, a.descripcion, r.descripcion, a.stock, a.observaciones, a.rubro from articulos as a left join rubros as r on a.rubro = r.id where a.descripcion like '%$cadena%' or r.descripcion like '%$cadena%'";
    $consulta = mysqli_query($conexion, $sql);
    if (!$consulta) {
        echo 'error al conectar con la base de datos';
    } else {
        while ($filas = mysqli_fetch_array($consulta)) {
            echo "
        <tr>
        <td>$filas[0]</td>
        <td>$filas[1]</td>
        <td>$filas[2]</td>
        <td >$filas[3]</td>
        <td >$filas[4]</td>
            <td> <div class= 'd-flex'>
            <a class='editar mr-1' id='$filas[0]' href='editarArticulo.php?editar=$filas[0]&idRubro=$filas[2]'>Editar</a> -
            <a class='eliminar' id='$filas[0]'href='../controlador/funciones.php?eliminar=$filas[0]'>Eliminar</a>
            </div></td>
        </tr>
        ";
        }
    }
}


function listarTodosMovimientos()
{
    include '../conexion.php';
    $sql = "select a.descripcion, m.cant, m.observaciones, m.fecha, m.usuario from movimientos as m join articulos as a on m.idArt = a.id";

    $consulta = mysqli_query($conexion, $sql);
    if ($consulta) {
        while ($r = mysqli_fetch_array($consulta)) {
            echo "
        <tr>
            <td>$r[0]</td>
            <td>$r[1]</td>
            <td>$r[2]</td>
            <td>$r[3]</td>
            <td>$r[4]</td>
         </tr>
        ";
        }
    }
}

function listarMovimientosFiltrados($idArt, $fechaIni, $fechaFin)
{
    include '../conexion.php';

    if($fechaIni == ""){
        $fechaIni = '0001-01-01';
    }
    if($fechaFin == ""){
        $fechaFin = '2099-12-31';
    }
 
    if ($idArt != "") {
        $sql = "select a.descripcion, m.cant, m.observaciones, m.fecha, m.usuario from movimientos as m join articulos as a on m.idArt = a.id where m.fecha BETWEEN '$fechaIni' and '$fechaFin' and m.idArt= $idArt ";} else{
            $sql = "select a.descripcion, m.cant, m.observaciones, m.fecha, m.usuario from movimientos as m join articulos as a on m.idArt = a.id where m.fecha BETWEEN '$fechaIni' and '$fechaFin'";
        }

        $consulta = mysqli_query($conexion, $sql);
        // $cant = mysqli_num_rows($consulta);
        if ($consulta) {
            while ($r = mysqli_fetch_array($consulta)) {
                echo "
        <tr>
            <td>$r[0]</td>
            <td>$r[1]</td>
            <td>$r[2]</td>
            <td>$r[3]</td>
            <td>$r[4]</td>
         </tr>
        ";
            }
        } else {
            echo "ERROR EN LA CONEXION CON LA BASE DE DATOS";
        }
    
}
