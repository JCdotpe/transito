function validarNumero(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla === 8)
        return true;
    if (tecla === 48)
        return true;
    if (tecla === 49)
        return true;
    if (tecla === 50)
        return true;
    if (tecla === 51)
        return true;
    if (tecla === 52)
        return true;
    if (tecla === 53)
        return true;
    if (tecla === 54)
        return true;
    if (tecla === 55)
        return true;
    if (tecla === 56)
        return true;
    if (tecla === 57)
        return true;
    patron = /1/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}
function validarLetras(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla === 8)
        return true; // backspace
    if (tecla === 32)
        return true; // espacio
    if (e.ctrlKey && tecla === 86) {
        return true;
    } //Ctrl v
    if (e.ctrlKey && tecla === 67) {
        return true;
    } //Ctrl c
    if (e.ctrlKey && tecla === 88) {
        return true;
    } //Ctrl x
    patron = /[a-zA-Z]/; //patron
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

$(".onlyNumbers").keypress(function (e) {
    return validarNumero(e);
});

$(".onlyStrings").keypress(function (e) {
    return validarLetras(e);
});

$(document).on('click', '#btnLogeoIngresar', function () {
    var user = $('#userLogeo').val();
    var pass = $('#userPass').val();
    if (user.length > 0 && pass.length > 0) {
        $("#form_login_usuario").submit();
    } else {
        $(".alert-message-error").empty();
        $(".alert-message").html('<div class="alert alert-danger alert-dismissable">' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                '<h4><i class="icon fa fa-ban"></i> Atención...!</h4>' +
                '<strong>Porfavor ingrese los datos</strong>' +
                '</div> ');
    }
    return false;
});

$(document).on('change', "#opcionsede", function () {
    var opcionsede = $("#opcionsede option:selected").val();
    $('#opcionlocal').empty().append('<option value="" class="text-center">-- SELECCIONE LOCAL DE APLICACIÓN--</option>');
    $(".postulante_local_ajax .select2-chosen").text("--SELECCIONE LOCAL DE APLICACIÓN--");
    if (opcionsede !== "") {
        $.ajax({
            url: CI.base_url + 'buscar-local',
            type: "POST",
            data: {sede: opcionsede},
            dataType: "json",
            beforeSend: function () {

            },
            success: function (data) {
                $.each(data, function (i, nombre) {
                    $("#opcionlocal").append('<option value="' + nombre.cod_local_sede + '" >' + nombre.nombreLocal + '</option>');
                });
            }
        });
    }
});

$("#btn-filtrar-postulante").on('click', function () {
    var idSede = $("#opcionsede").val();
    var idLocal = $("#opcionlocal").val();
    if (idLocal === "") {
        alert("Seleccione Local de aplicación");
    } else {
        url = CI.base_url + "postulantes-listado-ajax?idSede=" + idSede + "&idLocal=" + idLocal;
        $('#resultado_filtro').slideUp('high', function () {
            $('#resultado_filtro').load(url, function () {
                tablaListadoDataTable();
                $('#resultado_filtro').slideDown('slow');
            });
        });
    }
});

$("#opcion_local_sede").on('change', function () {
    var opcion_local_sede = $("#opcion_local_sede").val();
    if (opcion_local_sede !== "") {
        $("#btnfiltrarlocal").prop('disabled', false);
    } else {
        $("#btnfiltrarlocal").prop('disabled', true);
    }
});

$("#btnfiltrarlocal").on('click', function () {
    var idSede = $("#opcion_local_sede").val();
    if (idSede === "") {
        alert("Seleccione sede");
    } else {
        url = CI.base_url + "local-listado-ajax?idSede=" + idSede;
        $('#resultado_filtro').slideUp('high', function () {
            $('#resultado_filtro').load(url, function () {
                tablaListadoDataTable();
                $('#resultado_filtro').slideDown('slow');
            });
        });
    }
});

function llamar_postulante(idSede, idLocal) {
    url = CI.base_url + "postulantes-listado-ajax?idSede=" + idSede + "&idLocal=" + idLocal;
    $('#resultado_filtro').slideUp('high', function () {
        $('#resultado_filtro').load(url, function () {
            tablaListadoDataTable();
            $('#resultado_filtro').slideDown('slow');
        });
    });
}

function llamar_local(idSede) {
    url = CI.base_url + "local-listado-ajax?idSede=" + idSede;
    $('#resultado_filtro').slideUp('high', function () {
        $('#resultado_filtro').load(url, function () {
            tablaListadoDataTable();
            $('#resultado_filtro').slideDown('slow');
        });
    });
}

function cerrar_facebox() {
    jQuery(document).trigger('close.facebox');
}

//$(document).on('click','#fechaPicker', function () {
//    var fecha = $("input[name=fechaAsistencia]").val();
//    $(".dateToday").text(fecha);
//    if (fecha === "") {
//        alert("Seleccione fecha...");
//    } else {
//        url = CI.base_url + "listado_asistencia_fecha?fecha=" + fecha;
//        $('#resultado_filtro').slideUp('high', function () {
//            $('#resultado_filtro').load(url, function () {
//                tablaListadoDataTable();
//                $('#resultado_filtro').slideDown('slow');
//            });
//        });
//    }
//});

//function colorResult(valor) {
//    var res;
//    var valorNumerico = parseInt(valor);
//    if (valorNumerico === 100) {
//        res = "verdeResult";
//    } else if (valorNumerico < 100 && valorNumerico >= 1) {
//        res = "ambarResult";
//    } else {
//        res = "rojoResult";
//    }
//    return res;
//}
//function nullCero(valor) {
//    return (valor === '') ? '0' : valor;
//}
//
//function nullCeroPorcentaje($valor) {
//    return ($valor === '') ? '0.00' : $valor;
//}
//
//function refrescarTablaHeader() {
//    $.ajax({
//        url: CI.base_url + "coberturaTotalHeaderAjax",
//        type: 'POST',
//        dataType: 'json',
//        beforeSend: function () {
//
//        },
//        success: function (data) {
//            $(".co_header_c1").text(nullCero(data.cant_personal_aula));
//            $(".co_header_c2").text(nullCeroPorcentaje(data.porc_personal_aula)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(data.porc_personal_aula));
//            $(".co_header_c3").text(nullCero(data.cant_no_personal_aula));
//            $(".co_header_c4").text(nullCeroPorcentaje(data.porc_no_personal_aula)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(data.porc_no_personal_aula));
//
//            setTimeout(function () {
//                refrescarTablaHeader();
//            }, 1500);
//        }
//    });
//}
//
//function refrescarTabla() {
//    $.ajax({
//        url: CI.base_url + "coberturaTotalAjax",
//        type: 'POST',
//        dataType: 'json',
//        beforeSend: function () {
//
//        },
//        success: function (data) {
//            $.each(data, function (i, nombre) {
//                $(".co_celda_por_c1_" + nombre.cant_personal_programado).text(nullCero(nombre.cant_personal_aula));
//                $(".co_celda_por_c2_" + nombre.cant_personal_programado).text(nullCeroPorcentaje(nombre.porc_personal_aula)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombre.porc_personal_aula));
//                $(".co_celda_por_c3_" + nombre.cant_personal_programado).text(nullCero(nombre.cant_no_personal_aula));
//                $(".co_celda_por_c4_" + nombre.cant_personal_programado).text(nullCeroPorcentaje(nombre.porc_no_personal_aula)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombre.porc_no_personal_aula));
//            });
//            setTimeout(function () {
//                refrescarTabla();
//            }, 1500);
//        }
//    });
//}
//
//

function tablaListadoDataTable() {
    $('#tablaListado').dataTable({
        "oLanguage": {
            "sSearch": "Buscar: ",
            "oPaginate": {
                "sFirst": "&lt;&lt;",
                "sLast": "&gt;&gt;",
                "sNext": "&gt;",
                "sPrevious": "&lt;"
            },
            "sInfoEmpty": "0 registros que mostrar",
            "sInfoFiltered": " ",
            "sZeroRecords": "<div class='text-center'><i class='ion ion-podium fa-5x'></i><h3>No hay registro que mostrar</h3></div>",
            "sLoadingRecords": "Por favor espere - cargando...",
            "sLengthMenu": 'Mostrando <select class="form-control input-sm">' +
                    '<option value="10">10</option>' +
                    '<option value="20">20</option>' +
                    '<option value="30">30</option>' +
                    '<option value="40">40</option>' +
                    '<option value="50">50</option>' +
                    '<option value="-1">Todos</option>' +
                    '</select> registros',
            "sInfo": " _TOTAL_ registros encontrados, mostrando _START_ de _END_ registros"
        }
    });
    var table = $("#tablaListado").DataTable();
    $('#tablaListado tfoot th').each(function () {
        var title = $('#tablaListado thead th').eq($(this).index()).text();
        $(this).html('<input type="text" placeholder="Buscar: ' + title + '" />');
    });
    table.columns().eq(0).each(function (colIdx) {
        $('input', table.column(colIdx).footer()).on('keyup change', function () {
            table
                    .column(colIdx)
                    .search(this.value)
                    .draw();
        });
    });
}
//
//$("#local").on('change', function () {
//    if ($("#local").val() !== "") {
//        var local = $("#local option:selected").val();
//        $("#download_filtro_datos").removeClass('displayNone');
//        $("#download_filtro_datos").attr('href', CI.base_url + 'exportar-detallado?local=' + local);
//    } else {
//        $("#download_filtro_datos").addClass('displayNone');
//    }
//});
//
//$("#download_filtro_datos").on('click', function () {
//    var url = $(this).attr('href');
//    setTimeout(function () {
//        $(this).click();
//    }, 1000);
//
//    $.ajax({
//        url: url,
//        type: 'GET',
//        beforeSend: function () {
//            $('#download_filtro_datos').addClass("span_a_download");
//            $('#download_filtro_datos').html('<i id="change_carga" class="fa fa-spinner fa-spin fa-2x"></i> Descargando asistencia detallado');
//        },
//        success: function (data) {
//            if (data) {
//                $('#download_filtro_datos').removeClass("span_a_download");
//                $('#download_filtro_datos').html("<span class='fa fa-file-excel-o'></span> Descargar asistencia detallado");
//            }
//        }
//    });
//});

