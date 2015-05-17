<div class="titulo text-center">CREAR POSTULANTE</div>
<div class="cuerpo" style="width: 600px">
    <div id="messageTipoBienOk" class="text-center gifLoadingTable"></div>
    <div id="messagePersonaOk" class="text-center "></div>
    <ul class="js-errors"></ul>
    <form id="form_crear_postulante" autocomplete="off" class="text-center padding-top-20"  >
        <div class="col-xs-12 margin-bottom-20">
            <select class="col-xs-12 sinpadding selec2 text-uppercase" name="sede_postulante" id="sede_postulante" title="Seleccione sede">
                <option value="" class="text-center">--SELECCIONE SEDE--</option>
                <?php foreach ($totalSedes as $sede) { ?>
                    <option value="<?php echo $sede['cod_sede_operativa'] ?>"><?php echo strtoupper($sede['sede_operativa']) ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-xs-12 margin-bottom-20">
            <span class="crear_postulante_local_ajax">
                <select class="col-xs-12 sinpadding selec2 text-uppercase" name="local_postulante" id="local_postulante" title="Seleccione local de aplicación">
                    <option value="" class="text-center">--SELECCIONE LOCAL DE APLICACIÓN--</option>

                </select>
            </span>
        </div>
        <div class="col-xs-12 margin-bottom-20 no-padding">
            <div class="col-xs-8">
                <input type="text" name="ape_nom_postulante" class="form-control text-center input-sm text-uppercase " id="ape_nom_postulante" placeholder="Ingrese apellidos y nombres" >
            </div>
            <div class="col-xs-4 ">
                <input type="text" name="dni_postulante" class="form-control text-center input-sm text-uppercase " maxlength="8" id="dni_postulante" placeholder="Ingrese dni" >
            </div>
        </div>
        <div class="col-xs-12 margin-bottom-20 no-padding">
            <div class="col-xs-6 ">
                <select class="col-xs-12 sinpadding selec2 text-uppercase" name="cargo_postulante" id="cargo_postulante" title="Seleccione al menos un cargo">
                    <option value="" class="text-center">--SELECCIONE CARGO--</option>
                    <?php foreach ($totalCargos as $cargo) { ?>
                        <option value="<?php echo $cargo['id_cargo'] ?>"><?php echo strtoupper($cargo['cargo']) ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-xs-4 ">
                <select class="col-xs-12 sinpadding selec2 text-uppercase" name="tipo_postulante" id="tipo_postulante">
                    <option value="T">TITULAR</option>
                    <option value="R">RESERVA</option>
                </select>
            </div>
            <div class="col-xs-2 ">
                <input type="text" name="aula_postulante" class="form-control text-center input-sm text-uppercase " maxlength="2" id="aula_postulante" placeholder="Aula" >
            </div>
        </div>
        <div class="col-xs-12 ">
            <input name="valorPostulante" type="hidden"  value="valorCrearPostulante"/>
            <button type="submit" class="btn btn-guardar btn-flat margin-rigth-10" name="crearPostulante"  id="btnCreatePostulante"><span class="ion-person-add "></span>  CREAR</button>
            <button type="button" class="btn btn-danger btn-flat margin-left-10 cerrar " id="btnCancelPostulante"><span class="fa fa-times "></span> CANCELAR</button>
        </div>
    </form>
</div>
<script>
    $(function () {
        $('.selec2').select2();
        $(document).on('change', "#sede_postulante", function () {
            var opcionsede = $("#sede_postulante option:selected").val();
            $('#local_postulante').empty().append('<option value="" class="text-center">-- SELECCIONE LOCAL DE APLICACIÓN--</option>');
            $(".crear_postulante_local_ajax .select2-chosen").text("--SELECCIONE LOCAL DE APLICACIÓN--");
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
                            $("#local_postulante").append('<option value="' + nombre.cod_local_sede + '" >' + nombre.nombreLocal + '</option>');
                        });
                    }
                });
            }
        });
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

        $("#form_crear_postulante").validate({
            rules: {
                sede_postulante: {
                    required: true
                },
                local_postulante: {
                    required: true
                },
                ape_nom_postulante: {
                    required: true,
                    lettersonly: true
                },
                dni_postulante: {
                    required: true,
                    minlength: 8,
                    digits: true
                },
                cargo_postulante: {
                    required: true
                },
                aula_postulante: {
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
                ape_nom_postulante: {
                    required: "Ingrese nombres y apellidos"
                },
                dni_postulante: {
                    required: "Ingrese dni",
                    minlength: "Dni minimo 8 caracteres",
                    digits: "Solo números"
                },
                aula_postulante: {
                    required: "Ingrese numero de aula",
                    digits: "Solo números"
                }
            },
            submitHandler: function () {
//                $("#form_crear_postulante").ajaxSubmit();
                $.ajax({
                    url: CI.base_url + "crear-postulante",
                    type: 'POST',
                    data: $("#form_crear_postulante").serializeArray(),
                    beforeSend: function () {
                        $("#btnCreatePostulante").addClass("disabled").html('<span class="fa fa-spinner fa-pulse"></span> CREANDO');
                        $("#btnCancelPostulante").addClass('disabled');
                    },
                    success: function (data) {
                        console.log(data);
                        if (data === '1') {
                            setTimeout(function () {
                                $('#form_crear_postulante').hide();
                                $("#messageTipoBienOk").html("<i class='fa fa-check-circle fa-4x text-success'></i><span class='gifMessageTable '> POSTULANTE CREADO SATISFACTORIAMENTE...</span>");
                                setTimeout(function () {
                                    cerrar_facebox();
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
        $.validator.addMethod("lettersonly", function (value, element) {
            return this.optional(element) || /^[a-zA-Zñáéíóú ]+$/i.test(value);
        }, "Solo letras porfavor");
    });
</script>