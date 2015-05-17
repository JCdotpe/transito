<div class="titulo text-center">EDITAR LOCAL DE APLICACIÓN</div>
<div class="cuerpo" style="width: 600px">
    <div id="messageTipoBienOk" class="text-center gifLoadingTable"></div>
    <div id="messagePersonaOk" class="text-center "></div>
    <ul class="js-errors"></ul>
    <form id="form_editar_local" autocomplete="off" class="text-center padding-top-20"  >
        <div class="col-xs-12 margin-bottom-20">
            <select class="col-xs-12 sinpadding selec2tjs text-uppercase" name="sede_local_editar" id="sede_local_editar" title="Seleccione sede">
                <option value="" class="text-center">--SELECCIONE SEDE--</option>
                <?php foreach ($totalSedes as $sede) { ?>
                    <option value="<?php echo $sede['cod_sede_operativa'] ?>" <?php echo ($local['cod_sede_operativa'] == $sede['cod_sede_operativa']) ? "selected" : ""; ?>><?php echo strtoupper($sede['sede_operativa']) ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-xs-12 margin-bottom-20">
            <input type="text" name="nombre_local_editar" value="<?php echo $local['nombreLocal'] ?>" class="form-control text-center input-sm text-uppercase " id="nombre_local_editar" placeholder="Ingrese nombre local" >
        </div>
        <div class="col-xs-12 margin-bottom-20">
            <input type="text" name="direccion_local_editar" value="<?php echo $local['direccion'] ?>" class="form-control text-center input-sm text-uppercase " id="direccion_local_editar" placeholder="Ingrese dirección del local" >
        </div>
        <div class="col-xs-12 margin-bottom-20 no-padding">
            <div class="col-xs-10 ">
                <input type="text" name="referencia_local_editar" value="<?php echo $local['referencia'] ?>" class="form-control text-center input-sm text-uppercase " id="referencia_local_editar" placeholder="Ingrese referencia del local" >
            </div>
            <div class="col-xs-2 no-padding-left">
                <input type="text" name="aulas_local_editar" value="<?php echo $local['naula'] ?>" class="form-control text-center input-sm text-uppercase " maxlength="2" id="aula_local_editar" placeholder="N°Aulas" >
            </div>
        </div>
        <div class="col-xs-12 ">
            <div class="form-group">
                <label class="margin-rigth-10">
                    <input type="radio" name="estado_editar" class="minimal" <?php echo ($local['estado'] == "1") ? "checked" : ""; ?> value="1" /> Activo
                </label>
                <label class="margin-left-10">
                    <input type="radio" name="estado_editar" class="minimal" <?php echo ($local['estado'] == "0") ? "checked" : ""; ?> value="0" /> Inactivo
                </label>
            </div>
        </div>
        <div class="col-xs-12 ">
            <input name="valorLocal" type="hidden"  value="valorEditarLocal"/>
            <input type="hidden" name="cod_local_editar" value="<?php echo $local['cod_local_sede'] ?>">
            <button type="submit" class="btn btn-guardar btn-flat margin-rigth-10" name="editarLocal"  id="btnCreateLocal"><i class="fa fa-pencil"></i>  EDITAR</button>
            <button type="button" class="btn btn-danger btn-flat margin-left-10 cerrar " id="btnCancelLocal"><span class="fa fa-times "></span> CANCELAR</button>
        </div>
    </form>
</div>
<script>
    $(function () {
        $('.selec2tjs').select2();

        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });

        $("#form_editar_local").validate({
            rules: {
                sede_local_editar: {
                    required: true
                },
                nombre_local_editar: {
                    required: true
                },
                direccion_local_editar: {
                    required: true
                },
                referencia_local_editar: {
                    required: true
                },
                aulas_local_editar: {
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
                nombre_local_editar: {
                    required: "Ingrese nombre de local"
                },
                direccion_local_editar: {
                    required: "Ingrese dirección del local"
                },
                referencia_local_editar: {
                    required: "Ingrese referencia del local"
                },
                aulas_local_editar: {
                    required: "Ingrese cantidad de aulas",
                    digits: "Aulas solo números"
                }
            },
            submitHandler: function () {
                var id_sede_local = $("#sede_local_editar").val();
                $("#btnCreateLocal").addClass("disabled").html('<span class="fa fa-spinner fa-pulse"></span> EDITANDO');
                $("#btnCancelLocal").addClass('disabled');
                $.ajax({
                    url: CI.base_url + "editar-local",
                    type: 'POST',
                    data: $("#form_editar_local").serializeArray(),
                    beforeSend: function () {

                    },
                    success: function (data) {
                        if (data === '1') {
                            setTimeout(function () {
                                $('#form_editar_local').hide();
                                $("#messageTipoBienOk").html("<i class='fa fa-check-circle fa-4x text-success'></i><span class='gifMessageTable '> LOCAL EDITADO SATISFACTORIAMENTE...</span>");
                                setTimeout(function () {
                                    cerrar_facebox();
                                    llamar_local(id_sede_local);
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