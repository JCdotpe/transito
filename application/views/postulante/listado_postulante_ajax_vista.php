
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
        <?php foreach ($personaLocal as $personal) { ?>
            <tr>
                <td><?php echo $personal['sede_operativa'] ?></td>
                <td><?php echo $personal['nombreLocal'] ?></td>
                <td class="text-center"><?php echo $personal['dni'] ?></td>
                <td class="text-uppercase"><?php echo $personal['ape_nom'] ?></td>
                <td><?php echo $personal['cargo_res']?></td>
                <td class="text-center"><?php echo $personal['nro_aula'] ?></td>
                <td class="text-center"><?php echo tipo_postulante($personal['tipo']) ?></td>
                <td class="text-center"><a href="<?php echo base_url('editar-postulante'); ?>?dniPostulante=<?php echo $personal['dni'] ?>" rel='facebox_postulante' class="btn btn-flat btn-success"><i class="ion ion-edit"></i> EDITAR</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    $(function () {
        $('a[rel*=facebox_postulante]').facebox();
        $('#facebox').draggable({handle: 'div.titulo'});
    });
</script>