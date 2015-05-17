<div class="titulo text-center">CREAR USUARIO</div>
<div class="cuerpo" style="width: 750px">
    <div id="messageTipoBienOk" class="text-center gifLoadingTable"></div>
    <div id="messagePersonaOk" class="text-center "></div>
    <ul class="js-errors"></ul>
    <form id="form_crear_usuario" autocomplete="off" class="text-center padding-top-20"  >
        <div class="col-xs-12">
            <div class="col-xs-6 margin-bottom-20">
                <input type="text" name="user" class="form-control text-center text-lowercase input-sm col-md-12" id="user" placeholder="Ingrese usuario" >
            </div>
            <div class="col-xs-6 margin-bottom-20">
                <input type="password" name="pass" class="form-control text-center input-sm col-md-12" id="pass" placeholder="Ingrese contraseña" >
            </div>
        </div>
        <div class="col-xs-12 margin-bottom-20">
            <div class="col-xs-6 ">
                <select class="col-xs-12 sinpadding selec2 text-uppercase" name="rol" id="rol" title="Seleccione al menos un rol">
                    <option value="" class="text-center">--SELECCIONE ROL--</option>
                    <?php foreach ($totalRol as $rol) { ?>
                        <option value="<?php echo $rol['id_rol'] ?>"><?php echo strtoupper($rol['nombre_rol']) ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-xs-6 ">
                <input type="text" name="ape_nom" class="form-control text-center input-sm text-uppercase " id="ape_nom" placeholder="Ingrese nombres y apellidos" >
            </div>
        </div>
        <div class="col-xs-12 margin-bottom-20" id="marcar_sedes_crear">
            <h4 class="text-center">MARQUE UNA O VARIAS SEDES</h4>
            <div class="text-left">
                <?php foreach ($totalSedes as $sede) { ?>
                    <label class="col-xs-4" for="marcacion_<?php echo $sede['cod_sede_operativa'] ?>">
                        <input id="marcacion_<?php echo $sede['cod_sede_operativa'] ?>" type="checkbox" name="sedes[]"  class="minimal minimal_checked" value="<?php echo $sede['cod_sede_operativa'] ?>"/>
                        <?php echo $sede['sede_operativa'] ?>
                    </label>
                <?php } ?>
            </div>
        </div>
        <div class="col-xs-12 ">
            <input name="valorUsuario" type="hidden"  value="valorCrearUsuario"/>
            <button type="submit" class="btn btn-guardar btn-flat margin-rigth-10" name="crearUsuario"  id="btnCreateUsuario"><span class="ion-person-add "></span>  CREAR</button>
            <button type="button" class="btn btn-danger btn-flat margin-left-10 cerrar " id="btnCancelUsuario"><span class="fa fa-times "></span> CANCELAR</button>
        </div>
    </form>
</div>
<script>
    $(function () {
        $("#rol").on('change', function () {
            if ($("#rol").val() === '1') {
                $('.icheckbox_minimal-blue').addClass('checked');
                $('.minimal_checked').prop('checked', true);
            } else {
                $('.icheckbox_minimal-blue').removeClass('checked');
                $('.minimal_checked').prop('checked', false);
            }
        });

        $('.selec2').select2();

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        $("input[name=user]").on('change', function () {
            var nameuser = $("input[name=user]").val();
            var dataSearch = {
                'user': nameuser
            };
            $.ajax({
                url: CI.base_url + 'verificar-usuario',
                type: "POST",
                data: dataSearch,
                dataType: "json",
                beforeSend: function () {
                    $("#btnCreateUsuario,#btnCancelUsuario").addClass('disabled');
                },
                success: function (data) {
                    if (data === 1) {
                        $("#messagePersonaOk").empty();
                        $("#messagePersonaOk").html('<div class="callout callout-warning animated shake">' +
                                '<h4 class="text-uppercase"><span class="fa fa-exclamation-triangle"></span> Mensaje del sistema.!</h4>' +
                                '<p>Este usuario ya existe...</p> ' +
                                '</div>');
                    } else {
                        $("#messagePersonaOk").empty();
                        $("#btnCreateUsuario,#btnCancelUsuario").removeClass('disabled');
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
//            }
        });

        $("#form_crear_usuario").validate({
            rules: {
                user: {
                    required: true,
                    letrasJuntas: true
                },
                pass: {
                    required: true,
                    minlength: 6
                },
                ape_nom: {
                    required: true,
                    lettersonly: true
                },
                rol: {
                    required: true
                },
                "sedes[]": {
                    required: {
                        depends: function (element) {
                            if ($("#rol").val() !== "1") {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    }
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
                user: {
                    required: "Ingrese nombre usuario"
                },
                pass: {
                    required: "Ingrese contraseña",
                    minlength: 'Contraseña minimo 6 caracteres'
                },
                ape_nom: {
                    required: "Ingrese nombres y apellidos"
                },
                'sedes[]': "Seleccione al menos una sede"
            },
            submitHandler: function () {
                $.ajax({
                    url: CI.base_url + "crear-usuario",
                    type: 'POST',
                    data: $("#form_crear_usuario").serializeArray(),
                    beforeSend: function () {
                        $("#btnCreateUsuario").addClass("disabled").html('<span class="fa fa-spinner fa-pulse"></span> CREANDO');
                        $("#btnCancelUsuario").addClass('disabled');
                    },
                    success: function (data) {
                        console.log(data);
                        if (data === '1') {
                            setTimeout(function () {
                                $('#form_crear_usuario').hide();
                                $("#messageTipoBienOk").html("<i class='fa fa-check-circle fa-4x text-success'></i><span class='gifMessageTable '> USUARIO CREADO SATISFACTORIAMENTE...</span>");
                                setTimeout(function () {
                                    window.location.reload();
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

        $.validator.addMethod("letrasJuntas", function (value, element) {
            return this.optional(element) || /^[a-zA-Zñáéíóú0-9]+$/i.test(value);
        }, "Nombre usuario sin espacio, solo letras y/o numeros");
    });
</script>