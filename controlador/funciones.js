
$(document).ready(function () {

    $("#formulario").validate();

    // VALIDAR LOGIN
    $('#validar').click(function (e) {
        e.preventDefault()

        usuario = $('#usuario').val();
        clave = $('#clave').val();

        if (usuario == "" || clave == "") {
            alert('Debe completar todos los campos');
            $('#usuario').focus()
        } else {
            $.post("validar.php",
                {
                    accion: "validar",
                    usuario: usuario,
                    clave: clave
                },
                function (data, textStatus, jqXHR) {
                    // console.log(data);
                    if (data == "ok") {
                        window.location = "sistema/index.php?primera=si"
                    } else if (data == "vacio") {
                        $('#mensaje').text("debe completar todos los campos")
                    } else if (data == "datos") {
                        $('#mensaje').addClass('alert-danger');
                        $('#mensaje').text("Alguno de los valores ingresados es incorrecto")
                    }

                }
            );
        }


    })

    // INGRESAR NUEVO ARTICULO
    $('#cargarNuevo').click(function (e) {
        e.preventDefault()
        descripcion = $('#descripcion').val()
        rubro = $('#rubro').val()
        pc = $('#pc').val()
        pv = $('#pv').val()
        stockIni = $('#stockIni').val()
        obs = $('#obs').val()

        $.ajax({
            type: "POST",
            url: "../controlador/funciones.php",
            data: {
                'registrarNuevo': 'registrarNuevo',
                'descripcion': descripcion,
                'rubro': rubro,
                'pc': pc,
                'pv': pv,
                'stockIni': stockIni,
                'obs': obs
            },
            success: function (response) {
                alert(response)
                $('#descripcion').val("")
                $('#pc').val("")
                $('#pv').val("")
                $('#stockIni').val("")
                $('#obs').val("")

                cargar()
                $('#descripcion').focus()
            }
        });
    })

    // ACTUALIZAR ARTICULO
    $('#actualizarArticulo').click(function (e) {
        e.preventDefault()
        id = $('#id').val()
        descripcion = $('#descripcion').val()
        rubro = $('#rubro').val()
        pc = $('#pc').val()
        pv = $('#pv').val()
        obs = $('#obs').val()
        if (rubro != "") {

            $.ajax({
                type: "POST",
                url: "../controlador/funciones.php",
                data: {
                    'actualizarArticulo': 'actualizarArticulo',
                    'id': id,
                    'descripcion': descripcion,
                    'rubro': rubro,
                    'pc': pc,
                    'pv': pv,
                    'obs': obs
                },
                success: function (response) {
                    alert(response)
                    window.location = "bajaArticulos.php"
                    cargarBaja()
                }
            });
        }
    })

    //FILTRO DE BUSQUEDA
    $('#inputBuscarBaja').keyup(function () {
        cadena = $(this).val()

        $.ajax({
            type: "post",
            url: "../controlador/funciones.php",
            data:
            {
                'buscarBaja': 'buscarBaja',
                'cadena': cadena
            },
            success: function (response) {
                $('#tbody').html(response)
            }
        });
    })

    $('#inputBuscar').keyup(function () {
        cadena = $(this).val()

        $.ajax({
            type: "post",
            url: "../controlador/funciones.php",
            data:
            {
                'buscar': 'buscar',
                'cadena': cadena
            },
            success: function (response) {
                $('#tbody').html(response)
            }
        });
    })

    //TILDAR / DESTILDAR CHECKs
    $('#fechaIni').blur(function (e) {
        e.preventDefault();
        let valor = $(this).val();

        if(valor != ""){
            $('#todas').prop('checked', false)
        }
    }); //TILDAR / DESTILDAR CHECKs
    $('#fechaFin').blur(function (e) {
        e.preventDefault();
        let valor = $(this).val();
        if(valor != ""){
            $('#todas').prop('checked', false)
        }
    });//TILDAR / DESTILDAR CHECKs
    $('#todas').click(function(){
        $('#fechaIni').val("")
        $('#fechaFin').val("")
    })
    $('#articulosM').blur(function(){
        $('#todos').prop('checked', false)
    })
    $('#todos').click(function(){
        $('#articulosM').val("")
    })
    //FILTRAR MOVIMIENTO
    $('#filtrarMovimiento').click(function (e) {
        e.preventDefault()
        var idArt = $('#articulosM').val()
        var fechaIni = $('#fechaIni').val()
        var fechaFin = $('#fechaFin').val()
        var todas = $('#todas').prop('checked')
        var todos = $('#todos').prop('checked')

        $.ajax({
            type: "POST",
            url: "../controlador/funciones.php",
            data: {
                'filtrarMovimiento': 'filtrarMovimiento',
                'idArt': idArt,
                'fechaIni': fechaIni,
                'fechaFin': fechaFin
            },

            success: function (response) {
                console.log(idArt + fechaIni + fechaFin);
                $('#tbody').html(response)
            }
        });


    })


})



// CARGAR ....
function cargarSelect() {
    $.ajax({
        type: "post",
        url: "../controlador/funciones.php",
        data: { 'cargarSelect': 'cargarSelect' },
        success: function (response) {
            $('#rubro').html($('#rubro').html() + response)
        }
    });
}

function cargar() {
    $.ajax({
        type: "post",
        url: "../controlador/funciones.php",
        data: { 'cargar': 'cargar' },
        success: function (response) {
            $('#tbody').html(response)
            $('#descripcion').val("")
        }
    });
}

function cargarBaja() {
    $.ajax({
        type: "post",
        url: "../controlador/funciones.php",
        data: { 'cargarBaja': 'cargarBaja' },
        success: function (response) {
            $('#tbody').html(response)

        }
    });
}

//OCULATR Y MOSTRAR MENSAJES INDEX
function ocultarMostrar() {
    $(".bienvenida").show()
    setTimeout(() => {
        $("#bienvenida").hide();
        $(".opciones").removeClass('d-none');
    }, 3000)
}