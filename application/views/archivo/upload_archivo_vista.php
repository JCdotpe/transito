<section class="content-header">
    <h1>Listado de total de locales de aplicación por sede</h1>
    <ol class="breadcrumb">
        <li class=""><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Portada</a></li>
        <li class="active">Cargar archivo</li>
    </ol>
</section>
<section class="content">
    <div class="box noBox">
        <div class="box-header">
            <h3 class="box-title ">CARGAR ARCHIVO POR SEDE Y LOCAL DE APLICACIÓN - FORMATO DE ARCHIVO VALIDO .csv</h3>
        </div>
        <div class="box-body table-responsive" >
            <div id="messageTipoBienOk" class="text-center gifLoadingTable"></div>
            <div id="messagePersonaOk" class="text-center "></div>
            <ul class="js-errors"></ul>
            <form id="form_upload_archivo" autocomplete="off" class="text-center padding-top-20" action="<?php echo base_url('upload-archivo'); ?>" method="post" enctype="multipart/form-data" >
                <div class="postulante-opciones margin-bottom-20 col-md-12 sinpadding">
                    <div class="col-md-2 col-sm-6 col-xs-12 sinpadding separar_margen">
                        <select class="col-xs-12 sinpadding selec2t text-uppercase" name="archivo_sede" id="opcionsede" title="SELECCIONE UNA SEDE">
                            <option value="" class="text-center">--SELECCIONE SEDE--</option>
                            <?php foreach ($totalSedes as $sede) { ?>
                                <option value="<?php echo $sede['cod_sede_operativa'] ?>"><?php echo strtoupper($sede['sede_operativa']) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 separar_margen">
                        <span class="postulante_local_ajax">
                            <select class="col-xs-12 sinpadding selec2t text-uppercase" name="archivo_local" id="opcionlocal" title="SELECCIONE UN LOCAL DE APLICACIÓN">
                                <option value="" class="text-center">--SELECCIONE LOCAL DE APLICACIÓN--</option>
                            </select>
                        </span>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 sinpadding separar_margen">
                        <div class="col-md-12 sinpadding">
                            <input type="file" id="archivo_carga" name="userfile" class="filestyle" data-size="sm" data-buttonName="btn-primary" data-buttonText="BUSCAR" data-iconName="glyphicon-search" />
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12 text-center sinpadding separar_margen">
                        <button type="submit" class="btn btn-flat btn-bitbucket btn-sm" id="btn-cargar-archivo"><span class="fa fa-cloud-upload"></span> UPLOAD</button>
                    </div>
                </div>
            </form>
            <div id="uploadBox"></div>
        </div>
    </div>
</section>
<script>
    $(function () {
        $('.selec2t').select2();

        $("#form_upload_archivo").validate({
            rules: {
                archivo_sede: {
                    required: true
                },
                archivo_local: {
                    required: true
                },
                userfile: {
                    required: true,
                    extension: "csv"
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
                userfile: {
                    required: "SELECCIONE ARCHIVO FORMATO .csv",
                    extension: "FORMATO DE ARCHIVO INVALIDO, SOLO SE PERMITE FORMATO .csv"
                }
            },
            submitHandler: function () {
                $("#form_upload_archivo").ajaxSubmit();

//                $('#form_upload_archivo').ajaxForm({
//                    beforeSend: function () {
//                        $("#opcionsede,#opcionlocal,#archivo_carga").prop('disabled', true);
//                        $("#btn-cargar-archivo").addClass('disabled');
//                        $("#uploadBox").html('<div class="progress progress-striped active" style="height:30px"><div class="progress-bar" id="progressBar" style="width: 0%"><span class="sr-only">0%</span></div></div>');
//                    },
//                    uploadProgress: function (event, position, total, percentComplete) {
//                        if (percentComplete === 100) {
//                            $("#progressBar").css('width', percentComplete + '%').html('<span class="text_progress"><i class="fa fa-spinner fa-pulse"></i> CARGANDO...</span>');
//                        } else {
//                            $("#progressBar").css('width', percentComplete + '%').html(percentComplete + '%');
//                        }
//                    },
//                    success: function () {
//                        $('.progress').removeClass('active');
//                        $("#progressBar").css('width', '100%').html('<span class="text_progress"><i class="fa fa-check"></i> CARGAR COMPLETA...</span>');
//                    },
//                    complete: function () {
//                        $("#opcionsede,#opcionlocal,#archivo_carga").prop('disabled', false);
//                        $("#btn-cargar-archivo").removeClass("disabled");
//                    }
//                });

//                $.ajax({
//                    url: CI.base_url + "crear-postulante",
//                    type: 'POST',
//                    data: $("#form_crear_postulante").serializeArray(),
//                    beforeSend: function () {
//                        $("#btnCreatePostulante").addClass("disabled").html('<span class="fa fa-spinner fa-pulse"></span> CREANDO');
//                        $("#btnCancelPostulante").addClass('disabled');
//                    },
//                    success: function (data) {
//                        console.log(data);
//                        if (data === '1') {
//                            setTimeout(function () {
//                                $('#form_crear_postulante').hide();
//                                $("#messageTipoBienOk").html("<i class='fa fa-check-circle fa-4x text-success'></i><span class='gifMessageTable '> POSTULANTE CREADO SATISFACTORIAMENTE...</span>");
//                                setTimeout(function () {
//                                    cerrar_facebox();
////                                    window.location.reload();
//                                }, 700);
//                            }, 500);
//                        }
//                    },
//                    error: function (error) {
//                        console.log(error);
//                    }
//                });
            }
        });
    });
</script>