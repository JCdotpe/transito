<section class="content-header">
    <h1>Listado de total de ubicación</h1>
    <ol class="breadcrumb">
        <li class=""><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Portada</a></li>
        <li class="active">Ubicación</li>
    </ol>
</section>
<section class="content">
    <div class="box noBox">
<!--        <div class="box-header">
            <h3 class="box-title pull-right"><a href="<?php echo base_url('crear-local'); ?>" class="btn btn-warning btn-flat awhite" rel="facebox"><span class="fa fa-plus"></span> AGREGAR LOCAL</a></h3>
        </div>-->
<!--        <div class="box-body table-responsive" >
            <div id="resultado_filtro">
                <table id="tablaListado" class="table table-bordered table-striped table-hover" >
                    <thead class="headTablaListado">
                        <tr class="text-uppercase">
                            <th>EMPRESA</th>
                            <th>NRO RECLAMOS</th>
                            <th>ESTADO</th>
                        </tr>
                    </thead>
                    <tfoot class="footTablaListado">
                        <tr class="text-uppercase">
                            <th>EMPRESA</th>
                            <th>NRO RECLAMOS</th>
                            <th>ESTADO</th>
                        </tr>
                    </tfoot>
                    <tbody class="bodyTablaListado">

                    </tbody>
                </table>
            </div>
        </div>-->
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