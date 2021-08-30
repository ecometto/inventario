<style>
    .encabezado a {
        text-decoration: none;
        color: whitesmoke;
    }

    a:hover {
        color: gray;
        background-color: rgb(23, 23, 42);
    }
</style>

<body>
    <div class="container">
        <div class=" encabezado row bg-dark text-light ">

            <div class="col-md-3 d-flex justify-content-center text-center align-items-center">
                <img src="../imagenes/veng2.jpg" alt="VENG SA" height="70x">
            </div>

            <div class="col-md-6 d-flex justify-content-center text-center align-items-center">
                <h3>Sistema de Inventario - VENG SA</h3>
            </div>

            <div class="col-md-3 d-flex justify-content-center text-center align-items-center flex-column">
                <p class="lh-sm pt-1">Usuario: <?php echo $_SESSION['usuario']; ?></p>
                <p class="lh-sm pt-1"><a href="../cerrarSesion.php">Salir <i class="fas fa-power-off"></i></a></p>
            </div>

        </div>
<!-- 
        <div class="menu row">
            <div class="d-flex justify-content-star text-center align-items-center lh-lg bg-secondary">
                <a href="articulos.php">
                    <div class="p-2 m-1 border">ARTICULOS</div>
                </a>
                <a href="">
                    <div class="p-2 m-1 border">INGRESOS</div>
                </a>
                <a href="">
                    <div class="p-2 m-1 border">EGRESOS</div>
                </a>
                <a href="">
                    <div class="p-2 m-1 border">INFORMES</div>
                </a>
            </div>
        </div> -->


    </div>


</body>