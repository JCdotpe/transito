<section class="content-header">
    <h1>Listado de total de personal por sede y local de aplicación</h1>
    <ol class="breadcrumb">
        <li class=""><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Portada</a></li>
        <li class="active">Postulantes</li>
    </ol>
</section>
<section class="content">
    <div class="box noBox">
        <div class="box-header">
            <h3 class="box-title pull-right"><a href="<?php echo base_url('crear-postulante'); ?>" class="btn btn-warning btn-flat awhite" rel="facebox"><span class="ion ion-person-add"></span> AGREGAR POSTULANTE</a></h3>
        </div>
        <div class="box-body table-responsive" >
            <div class="postulante-opciones margin-bottom-20 col-md-12 sinpadding">
                <div class="col-md-4 col-sm-4 col-xs-12 sinpadding separar_margen">
                    <select class="col-xs-12 sinpadding selec2t text-uppercase" name="postulante_sede" id="opcionsede" title="Seleccione sede">
                        <option value="" class="text-center">--SELECCIONE SEDE--</option>
                        <?php foreach ($totalSedes as $sede) { ?>
                            <option value="<?php echo $sede['cod_sede_operativa'] ?>"><?php echo strtoupper($sede['sede_operativa']) ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 separar_margen">
                    <span class="postulante_local_ajax">
                        <select class="col-xs-12 sinpadding selec2t text-uppercase" name="postulante_local" id="opcionlocal" title="Seleccione local de aplicación">
                            <option value="" class="text-center">--SELECCIONE LOCAL DE APLICACIÓN--</option>
                        </select>
                    </span>
                </div>
                <div class="col-md-4 col-sm-2 col-xs-12 text-center sinpadding separar_margen">
                    <button class="btn btn-flat btn-bitbucket btn-sm" id="btn-filtrar-postulante"><span class="fa fa-filter"></span> FILTRAR</button>
                </div>
            </div>
            <div id="resultado_filtro">
                <table id="tablaListado" class="table table-bordered table-striped table-hover" >
                    <thead class="headTablaListado">
                        <tr class="text-uppercase">
                            <th>SEDE</th>
                            <th>LOCAL APLICACIÓN</th>
                            <th>DNI</th>
                            <th>NOMBRES Y APELLIDOS</th>
                            <th>CARGO</th>
                            <th>N° AULA</th>
                            <th>TIPO</th>
                            <th>EDITAR</th>
                        </tr>
                    </thead>
                    <tfoot class="footTablaListado">
                        <tr class="text-uppercase">
                            <th>SEDE</th>
                            <th>LOCAL APLICACIÓN</th>
                            <th>DNI</th>
                            <th>NOMBRES Y APELLIDOS</th>
                            <th>CARGO</th>
                            <th>N° AULA</th>
                            <th>TIPO</th>
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
        $('.selec2t').select2();
        $('a[rel*=facebox]').facebox();
        $('#facebox').draggable({handle: 'div.titulo'});
        tablaListadoDataTable();
    });
</script>