<section class="content-header">
    <h1>Listado de total de locales de aplicación por sede</h1>
    <ol class="breadcrumb">
        <li class=""><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Portada</a></li>
        <li class="active">Local de aplicación</li>
    </ol>
</section>
<section class="content">
    <div class="box noBox">
        <div class="box-header">
            <h3 class="box-title pull-right"><a href="<?php echo base_url('crear-local'); ?>" class="btn btn-warning btn-flat awhite" rel="facebox"><span class="fa fa-plus"></span> AGREGAR LOCAL</a></h3>
        </div>
        <div class="box-body table-responsive" >
            <div class="local-opciones margin-bottom-20 col-md-12 sinpadding">
                <div class="col-md-8 col-sm-8 col-xs-12 sinpadding separar_margen">
                    <select class="col-xs-12 sinpadding selec2 text-uppercase" name="local_sede" id="opcion_local_sede" >
                        <option value="" class="text-center">--SELECCIONE SEDE--</option>
                        <?php foreach ($totalSedes as $sede) { ?>
                            <option value="<?php echo $sede['cod_sede_operativa'] ?>"><?php echo strtoupper($sede['sede_operativa']) ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 text-center sinpadding separar_margen">
                    <button class="btn btn-flat btn-bitbucket btn-sm" id="btnfiltrarlocal"><span class="fa fa-filter"></span> FILTRAR</button>
                </div>
            </div>
            <div id="resultado_filtro">
                <table id="tablaListado" class="table table-bordered table-striped table-hover" >
                    <thead class="headTablaListado">
                        <tr class="text-uppercase">
                            <th>SEDE</th>
                            <th>LOCAL DE APLICACIÓN</th>
                            <th>DIRECCIÓN</th>
                            <th>REFERENCIA</th>
                            <th>CANT. AULA</th>
                            <th>ESTADO</th>
                            <th>EDITAR</th>
                        </tr>
                    </thead>
                    <tfoot class="footTablaListado">
                        <tr class="text-uppercase">
                            <th>SEDE</th>
                            <th>LOCAL DE APLICACIÓN</th>
                            <th>DIRECCIÓN</th>
                            <th>REFERENCIA</th>
                            <th>CANT. AULA</th>
                            <th>ESTADO</th>
                            <th>EDITAR</th>
                        </tr>
                    </tfoot>
                    <tbody class="bodyTablaListado">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script>
    $(function () {
        $('.selec2').select2();
        $("#btnfiltrarlocal").prop('disabled',true);
        $('a[rel*=facebox]').facebox();
        $('#facebox').draggable({handle: 'div.titulo'});
        tablaListadoDataTable();
    });
</script>