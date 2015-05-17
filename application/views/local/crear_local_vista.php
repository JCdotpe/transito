<div class="titulo text-center">CREAR LOCAL DE APLICACIÓN</div>
<div class="cuerpo" style="width: 600px">
    <div id="messageTipoBienOk" class="text-center gifLoadingTable"></div>
    <div id="messagePersonaOk" class="text-center "></div>
    <ul class="js-errors"></ul>
    <form id="form_crear_local" autocomplete="off" class="text-center padding-top-20"  >
        <div class="col-xs-12 margin-bottom-20">
            <select class="col-xs-12 sinpadding selec2tjs text-uppercase" name="sede_local" id="sede_local" title="Seleccione sede">
                <option value="" class="text-center">--SELECCIONE SEDE--</option>
                <?php foreach ($totalSedes as $sede) { ?>
                    <option value="<?php echo $sede['cod_sede_operativa'] ?>"><?php echo strtoupper($sede['sede_operativa']) ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-xs-12 margin-bottom-20">
            <input type="text" name="nombre_local" class="form-control text-center input-sm text-uppercase " id="nombre_local" placeholder="Ingrese nombre local" >
        </div>
        <div class="col-xs-12 margin-bottom-20">
            <input type="text" name="direccion_local" class="form-control text-center input-sm text-uppercase " id="direccion_local" placeholder="Ingrese dirección del local" >
        </div>
        <div class="col-xs-12 margin-bottom-20 no-padding">
            <div class="col-xs-10 ">
                <input type="text" name="referencia_local" class="form-control text-center input-sm text-uppercase " id="referencia_local" placeholder="Ingrese referencia del local" >
            </div>
            <div class="col-xs-2 no-padding-left">
                <input type="text" name="aulas_local" class="form-control text-center input-sm text-uppercase " maxlength="2" id="aulas_local" placeholder="N°Aulas" >
            </div>
        </div>
        <div class="col-xs-12 ">
            <input name="valorLocal" type="hidden"  value="valorCrearLocal"/>
            <button type="submit" class="btn btn-guardar btn-flat margin-rigth-10" name="crearLocal"  id="btnCreateLocal"><i class="fa fa-building"></i>  CREAR</button>
            <button type="button" class="btn btn-danger btn-flat margin-left-10 cerrar " id="btnCancelLocal"><span class="fa fa-times "></span> CANCELAR</button>
        </div>
    </form>
</div>
<script>
    $(function () {
        $('.selec2tjs').select2();
//        $(document).on('change', "#sede_postulante", function () {
//            var opcionsede = $("#sede_postulante option:selected").val();
//            $('#local_postulante').empty().append('<option value="" class="text-center">-- SELECCIONE LOCAL DE APLICACIÓN--</option>');
//            $(".crear_postulante_local_ajax .select2-chosen").text("--SELECCIONE LOCAL DE APLICACIÓN--");
//            if (opcionsede !== "") {
//                $.ajax({
//                    url: CI.base_url + 'buscar-local',
//                    type: "POST",
//                    data: {sede: opcionsede},
//                    dataType: "json",
//                    beforeSend: function () {
//
//                    },
//                    success: function (data) {
//                        $.each(data, function (i, nombre) {
//                            $("#local_postulante").append('<option value="' + nombre.cod_local_sede + '" >' + nombre.nombreLocal + '</option>');
//                        });
//                    }
//                });
//            }
//        });
//        $("input[name=user]").on('change', function () {
//            var nameuser = $("input[name=user]").val();
//            var dataSearch = {
//                'user': nameuser
//            };
//            $.ajax({
//                url: CI.base_url + 'verificar-usuario',
//                type: "POST",
//                data: dataSearch,
//                dataType: "json",
//                beforeSend: function () {
//                    $("#btnCreateUsuario,#btnCancelUsuario").addClass('disabled');
//                },
//                success: function (data) {
//                    if (data === 1) {
//                        $("#messagePersonaOk").empty();
//                        $("#messagePersonaOk").html('<div class="callout callout-warning animated shake">' +
//                                '<h4 class="text-uppercase"><span class="fa fa-exclamation-triangle"></span> Mensaje del sistema.!</h4>' +
//                                '<p>Este usuario ya existe...</p> ' +
//                                '</div>');
//                    } else {
//                        $("#messagePersonaOk").empty();
//                        $("#btnCreateUsuario,#btnCancelUsuario").removeClass('disabled');
//                    }
//                },
//                error: function (error) {
//                    console.log(error);
//                }
//            });
//        });

        $("#form_crear_local").validate({
            rules: {
                sede_local: {
                    required: true
                },
                nombre_local: {
                    required: true
                },
                direccion_local: {
                    required: true
                },
                referencia_local: {
                    required: true
                },
                aulas_local: {
                    required: true,
                    digits: true
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass(errorClass).removeClass(validClass);
                $(element).closest('ul').addClass(errorClass);
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass(errorClass).addClass(validClass);
                $(element).closest('ul').removeClass(errorClass);
            },
            errorLabelContainer: ".js-errors",
            errorElement: "li",
            messages: {
                nombre_local: {
                    required: "Ingrese nombre de local"
                },
                direccion_local: {
                    required: "Ingrese dirección del local"
                },
                referencia_local: {
                    required: "Ingrese referencia del local"
                },
                aulas_local: {
                    required: "Ingrese cantidad de aulas",
                    digits: "Solo números"
                }
            },
            submitHandler: function () {
                $.ajax({
                    url: CI.base_url + "crear-local",
                    type: 'POST',
                    data: $("#form_crear_local").serializeArray(),
                    beforeSend: function () {
                        $("#btnCreateLocal").addClass("disabled").html('<span class="fa fa-spinner fa-pulse"></span> CREANDO');
                        $("#btnCancelLocal").addClass('disabled');
                    },
                    success: function (data) {
                        if (data === '1') {
                            setTimeout(function () {
                                $('#form_crear_local').hide();
                                $("#messageTipoBienOk").html("<i class='fa fa-check-circle fa-4x text-success'></i><span class='gifMessageTable '> LOCAL CREADO SATISFACTORIAMENTE...</span>");
                                setTimeout(function () {
                                    cerrar_facebox();
//                                    llamar_local(id_sede_local);
//                                    window.location.reload();
                                }, 700);
                            }, 500);
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }
        });
    });
</script>