const cloud = $("#cloud");
const barraLateral = $(".barra-lateral");
const spans = $("span");
const palanca = $(".switch");
const circulo = $(".circulo");
const menu = $(".menu");
const main = $("main");
const a = $("a");
const btn = $("button");

menu.on("click", function () {
    barraLateral.toggleClass("max-barra-lateral");
    if (barraLateral.hasClass("max-barra-lateral")) {
        menu.children().eq(0).hide();
        menu.children().eq(1).show();
    } else {
        menu.children().eq(0).show();
        menu.children().eq(1).hide();
    }
    if ($(window).width() <= 320) {
        barraLateral.addClass("mini-barra-lateral");
        main.addClass("min-main");
        spans.each(function () {
            $(this).addClass("oculto");
        });
    }
});

palanca.on("click", function () {
    let body = $("body");
    body.toggleClass("dark-mode");
    body.toggleClass("");
    circulo.toggleClass("prendido");
});

cloud.on("click", function () {
    barraLateral.toggleClass("mini-barra-lateral");
    main.toggleClass("min-main");
    spans.each(function () {
        $(this).toggleClass("oculto");
    });
});

a.on("click", function (e) {
    e.preventDefault();

    a.removeClass("inbox");
    $(this).addClass("inbox");
    var page = $(this).data('page');

    $.ajax({
        url: page + '.php',
        type: "GET",
        success: function (response) {
            $("#main").html(response);
        },
        error: function (error) {
            console.log("Error al cargar el formulario:", error);
        },
    });
});

btn.on("click", function () {
    $.ajax({
        url: "form.php",
        type: "GET",
        success: function (response) {
            $("#main").html(response);
            $('#motivo_mala_prectica, #motivo_validacion_id').hide();
        },
        error: function (error) {
            console.log("Error al cargar el formulario:", error);
        },
    });
});

$('#contraseña').click(() => {
    Swal.fire({
        icon: "info",
        title: "",
        text: "Comunícate con el área de desarrollo"
    });
})

$(document).on('click', '#buscar', function () {
    var documento = $('#documento').val();
    var url = '../php/consulta_datos.php?documento=' + encodeURIComponent(documento);

    $.ajax({
        url: url,
        type: 'GET',
        success: function (response) {
            var data = JSON.parse(response);
            if (data == null) {
                Swal.fire({
                    icon: "info",
                    title: "",
                    text: "Coloca un Documento de Identidad."
                });
            } else {
                $('#nombre').val(data.nombre).prop('readonly', true);
                $('#supervisor').val(data.Jefe_inmediato).prop('readonly', true);
                $('#sede').val(data.ciudad).prop('readonly', true);
                $('#campaña').val(data.campaña).prop('readonly', true);
            }
        },
        error: function (error) {
            console.log('Error al cargar el formulario:', error);
        }
    });
});

$(document).on('click', '#limpiar', function () {
    $("#enviar")[0].reset();
    $('#motivo_mala_prectica, #motivo_validacion_id').hide();
    $('#nombre').prop('readonly', false);
    $('#supervisor').prop('readonly', false);
    $('#sede').prop('readonly', false);
});

$(document).on('submit', '#enviar', function (e) {
    e.preventDefault();
    var seleccionados = $('#motivo_mala_prectica input[type="checkbox"]:checked').map(function () {
        return this.value;
    }).get();

    var seleccionados2 = $('#motivo_validacion_id input[type="checkbox"]:checked').map(function () {
        return this.value;
    }).get();

    $('#motivosSeleccionados').val(seleccionados.join(', '))
    $('#motivosSeleccionados2').val(seleccionados2.join(', '))
    var formData = new FormData(this);

    $.ajax({
        url: '../php/guardar_auditoria.php',
        type: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.status === "success") {
                Swal.fire({
                    icon: "success",
                    title: "",
                    text: response.message,
                });
                $("#enviar")[0].reset();
                $('#motivo_mala_prectica, #motivo_validacion_id').hide();
                $('#nombre').prop('readonly', false);
                $('#supervisor').prop('readonly', false);
                $('#sede').prop('readonly', false);
            } else if (response.status === "error") {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: response.message,
                });
                $("#enviar")[0].reset();
                $('#motivo_mala_prectica, #motivo_validacion_id').hide();
                $('#nombre').prop('readonly', false);
                $('#supervisor').prop('readonly', false);
                $('#sede').prop('readonly', false);
            }
        }
    })
});

$(document).on('click', '#filtro', function (e) {
    e.preventDefault();

    var fecha = $('#fecha_filtro').val();
    var fecha2 = $('#fecha_filtro2').val();
    var url = '../php/consulta_filtro.php?fecha=' + encodeURIComponent(fecha) + '&fecha2=' + encodeURIComponent(fecha2);

    $.ajax({
        url: url,
        type: 'GET',
        success: function (response) {
            $('#table').html(response);
        },
        error: function (error) {
            console.log('Error en la búsqueda:', error);
        }
    });
});

$(document).on('change', '#malas_preacticas', function () {
    var selectedValue = $(this).val();
    if (selectedValue == 'No Cumple') {
        $('#motivo_mala_prectica').show();

        $.ajax({
            url: "../php/malas_practicas.php",
            type: "GET",
            success: function (response) {
                $("#motivo_mala_prectica").html(response);
            },
        });
    } else {
        $('#motivo_mala_prectica').hide();
        $('#motivo_mala_prectica input[type="checkbox"]').prop('checked', false);
    }
})

$(document).on('change', '#validacion_id', function () {
    var selectedValue = $(this).val();
    if (selectedValue == 'No Cumple') {
        $('#motivo_validacion_id').show();

        $.ajax({
            url: "../php/validacion_id.php",
            type: "GET",
            success: function (response) {
                $("#motivo_validacion_id").html(response);
            },
        });
    } else {
        $('#motivo_validacion_id').hide();
        $('#motivo_validacion_id input[type="checkbox"]').prop('checked', false);
    }
})

$(document).on('submit', '#nuevo_motivo', function (e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: '../php/guardar_motivo.php',
        type: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.status === "success") {
                Swal.fire({
                    icon: "success",
                    title: "",
                    text: response.message,
                });
                $("#nuevo_motivo")[0].reset();
            } else if (response.status === "error") {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: response.message,
                });
                $("#nuevo_motivo")[0].reset();
            }
        }
    })
});

$(document).on('click', '#filtro_tabla', function (e) {
    e.preventDefault();

    var tipo_motivo = $('#tipo_motivo').val();
    var url = '../php/consulta_filtro_tabla.php?tipo_motivo=' + encodeURIComponent(tipo_motivo);

    $.ajax({
        url: url,
        type: 'GET',
        success: function (response) {
            $('#table').html(response);
        },
        error: function (error) {
            console.log('Error en la búsqueda:', error);
        }
    });
});

$(document).on('click', '.eliminar', function () {
    var idValue = $(this).data('id');
    var tipo_motivo = $('#tipo_motivo').val();
    var formUrl = '../php/eliminar.php?id=' + encodeURIComponent(idValue) + '&tipo_motivo=' + encodeURIComponent(tipo_motivo);

    $.ajax({
        url: formUrl,
        type: 'POST',
        success: function (response) {
            if (response.status === "success") {
                Swal.fire({
                    icon: "success",
                    title: "",
                    text: response.message,
                });
            } else if (response.status === "error") {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: response.message,
                });
            }
        }
    });
});