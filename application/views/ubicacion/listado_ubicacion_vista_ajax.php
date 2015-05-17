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
        <?php foreach ($sedeLocal as $local) { ?>
            <tr>
                <td><?php echo $local['sede_operativa'] ?></td>
                <td><?php echo $local['nombreLocal'] ?></td>
                <td class="text-uppercase"><?php echo $local['direccion'] ?></td>
                <td class="text-uppercase"><?php echo $local['referencia'] ?></td>
                <td class="text-center"><?php echo $local['naula'] ?></td>
                <td class="text-center"><?php echo verificar_estado($local['estado']) ?></td>
                <td class="text-center"><a href="<?php echo base_url('editar-local') ?>?idsede=<?php echo $local['cod_sede_operativa'] ?>&idlocal=<?php echo $local['cod_local_sede'] ?>" rel='facebox_local' class="btn btn-flat btn-success"><i class="ion ion-edit"></i> EDITAR</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    $(function () {
        $('a[rel*=facebox_local]').facebox();
        $('#facebox').draggable({handle: 'div.titulo'});
    });
</script>