<div class="titulo text-center">EDITAR USUARIO</div>
<div class="cuerpo" style="width: 750px">
    <div id="messageTipoBienOk" class="text-center gifLoadingTable"></div>
    <div id="messagePersonaOk" class="text-center "></div>
    <ul class="js-errors"></ul>
    <form id="form_editar_usuario" autocomplete="off" class="text-center padding-top-20" >
        <div class="col-xs-12">
            <div class="col-xs-6 margin-bottom-20">
                <input type="text" name="userEdit" readonly="readonly" class="form-control text-center text-lowercase input-sm col-md-12" value="<?php echo $usuarios['usuario'] ?>" id="userEdit" placeholder="Ingrese usuario" />
            </div>
            <div class="col-xs-6 margin-bottom-20">
                <input type="password" name="passEdit" class="form-control text-center input-sm col-md-12" id="passEdit" placeholder="Ingrese contraseña" />
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6 " >
                <select class="col-xs-12 sinpadding selec2 text-uppercase" name="rolEdit" id="rolEdit" title="Seleccione al menos un rol">
                    <option value="" class="text-center">--SELECCIONE ROL--</option>
                    <?php foreach ($totalRol as $rol) { ?>
                        <option value="<?php echo $rol['id_rol'] ?>" <?php echo ($usuarios['id_rol'] == $rol['id_rol']) ? "selected" : ""; ?>><?php echo strtoupper($rol['nombre_rol']) ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-xs-6 ">
                <input type="text" name="ape_nomEdit" value="<?php echo $usuarios['nombres_apellidos'] ?>" class="form-control text-center input-sm text-uppercase " id="ape_nomEdit" placeholder="Ingrese nombres y apellidos" />
            </div>
        </div>
        <div class="col-xs-12 " id="marcar_sedes_editar">
            <h4 class="text-center">MARQUE UNA O VARIAS SEDES</h4>
            <div class="text-left">
                <?php foreach ($totalSedes as $sede) { ?>
                    <label class="col-xs-4" for="marcacionEdit_<?php echo $sede['cod_sede_operativa'] ?>">
                        <input id="marcacionEdit_<?php echo $sede['cod_sede_operativa'] ?>" type="checkbox" name="sedesEdit[]"  class="minimal minimal_checked" value="<?php echo $sede['cod_sede_operativa'] ?>" <?php
                        foreach ($usuarios['usuario_sede'] as $item) {
                            echo ($item['cod_sede_operativa'] == $sede['cod_sede_operativa']) ? "checked='checked'" : "";
                        }
                        ?> />
                               <?php echo $sede['sede_operativa'] ?>
                    </label>
                <?php } ?>
            </div>
        </div>
        <div class="col-xs-12 margin-top-20">
            <div class="form-group">
                <label class="margin-rigth-10">
                    <input type="radio" name="estadoEdit" class="minimal" <?php echo ($usuarios['estado'] == "1") ? "checked" : ""; ?> value="1" /> Activo
                </label>
                <label class="margin-left-10">
                    <input type="radio" name="estadoEdit" class="minimal" <?php echo ($usuarios['estado'] == "0") ? "checked" : ""; ?> value="0" /> Inactivo
                </label>
            </div>
        </div>
        <div class="col-xs-12 ">
            <input name="valorUsuario" type="hidden"  value="valorEditarUsuario" />
            <input name="id_user_edit" type="hidden"  value="<?php echo $usuarios['idUsuario'] ?>" />
            <button type="submit" class="btn btn-guardar btn-flat margin-rigth-10" name="editarUsuario"  id="btnEditarUsuario"><span class="fa fa-pencil "></span> EDITAR</button>
            <button type="button" class="btn btn-danger btn-flat margin-left-10 cerrar " id="btnCancelUsuario"><span class="fa fa-times "></span> CANCELAR</button>
        </div>
    </form>
</div>
<script>
    $(function () {

        if ($("#rolEdit").val() === '1') {
            $('.icheckbox_minimal-blue').addClass('checked');
            $('.minimal_checked').prop('checked', true);
        } else {
            $('.icheckbox_minimal-blue').removeClass('checked');
//            $('.minimal_checked').prop('checked', false);
        }

        $("#rolEdit").on('change', function () {
            if ($("#rolEdit").val() === '1') {
                $('.icheckbox_minimal-blue').addClass('checked');
                $('.minimal_checked').prop('checked', true);
            } else {
                $('.icheckbox_minimal-blue').removeClass('checked');
                $('.minimal_checked').prop('checked', false);
            }
        });

        $('.selec2').select2();
        
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        $("#form_editar_usuario").validate({
            rules: {
                userEdit: {
                    required: true,
                    letrasJuntas: true
                },
                passEdit: {
                    minlength: 6
                },
                ape_nomEdit: {
                    required: true,
                    lettersonly: true
                },
                rolEdit: {
                    required: true
                },
                "sedesEdit[]": {
                    required: true

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
                userEdit: {
                    required: "Ingrese nombre usuario"
                },
                passEdit: {
                    minlength: 'Contraseña minimo 6 caracteres'
                },
                ape_nomEdit: {
                    required: "Ingrese nombres y apellidos"
                },
                "sedesEdit[]": {
                    required: "Seleccione al menos una sede"
                }
            },
            submitHandler: function () {
                $.ajax({
                    url: CI.base_url + "editar-usuario",
                    type: 'POST',
                    data: $("#form_editar_usuario").serializeArray(),
                    beforeSend: function () {
                        $("#btnEditarUsuario").addClass("disabled").html('<span class="fa fa-spinner fa-pulse"></span> EDITANDO');
                        $("#btnCancelUsuario").addClass('disabled');
                    },
                    success: function (data) {
                        if (data === '1') {
                            setTimeout(function () {
                                $('#form_editar_usuario').hide();
                                $("#messageTipoBienOk").html("<i class='fa fa-check-circle fa-4x text-success'></i><span class='gifMessageTable '>USUARIO EDITADO CORRECTAMENTE...</span>");
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