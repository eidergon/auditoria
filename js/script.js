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

    $.ajax({
        url: "tabla.php",
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
                $('#nombre').val(data.nombre);
                $('#supervisor').val(data.Jefe_inmediato);
                $('#sede').val(data.ciudad);
                $('#campaña').val(data.campaña);
            }
        },
        error: function (error) {
            console.log('Error al cargar el formulario:', error);
        }
    });
});

$(document).on('click', '#limpiar', function () {
    $("#enviar")[0].reset();
});

$(document).on('submit', '#enviar', function (e) {
    e.preventDefault();

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
            } else if (response.status === "error") {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: response.message,
                });
                $("#enviar")[0].reset();
            }
        }
    })
});

$(document).on('click', '#filtro', function (e) {
    e.preventDefault();

    var fecha = $('#fecha_filtro').val();
    var url = '../php/consulta_filtro.php?fecha=' + encodeURIComponent(fecha);

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
    if(selectedValue == 'No Cumple') {
        $('#motivo_mala_prectica').show().prop('required', true);
    } else {
        $('#motivo_mala_prectica').hide().prop('required', false);
    }
})

$(document).on('change', '#validacion_id', function () {
    var selectedValue = $(this).val();
    if(selectedValue == 'No Cumple') {
        $('#motivo_validacion_id').show().prop('required', true);
    } else {
        $('#motivo_validacion_id').hide().prop('required', false);
    }
})