<section class="content-header">
    <h1>Listado de total de usuarios</h1>
    <ol class="breadcrumb">
        <li class=""><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Portada</a></li>
        <li class="active">Usuarios</li>
    </ol>
</section>
<section class="content">
    <div class="box noBox">
        <div class="box-header">
            <h3 class="box-title pull-right"><a href="<?php echo base_url('crear-usuario'); ?>" class="btn btn-warning btn-flat awhite" rel="facebox"><span class="ion ion-person-add"></span> AGREGAR USUARIO</a></h3>
        </div>
        <div class="box-body table-responsive">
            <table id="tablaListado" class="table table-bordered table-striped table-hover" >
                <thead class="headTablaListado">
                    <tr class="text-uppercase">
                        <th>USUARIO</th>
                        <th>NOMBRES Y APELLIDOS</th>
                        <th>ROL</th>
                        <th>ESTADO</th>
                        <th>ACTUALIZADO</th>
                        <th>EDITAR</th>
                    </tr>
                </thead>
                <tfoot class="footTablaListado">
                    <tr class="text-uppercase">
                        <th>USUARIO</th>
                        <th>NOMBRES Y APELLIDOS</th>
                        <th>ROL</th>
                        <th>ESTADO</th>
                        <th>ACTUALIZADO</th>
                        <th>EDITAR</th>
                    </tr>
                </tfoot>
                <tbody class="bodyTablaListado">
                    <?php foreach ($totalUsuarios as $usuario) { ?>
                        <tr>
                            <td class="text-center"><?php echo $usuario['usuario'] ?></td>
                            <td><?php echo $usuario['nombres_apellidos'] ?></td>
                            <td class="text-center"><?php echo $usuario['nombre_rol'] ?></td>
                            <td class="text-center"><?php echo verificar_estado($usuario['estado']) ?></td>
                            <td class="text-center">
                                <?php ($usuario['modif_usu'] == '' && $usuario['modif_f'] == null) ? $actTexto = convertirFecha($usuario['crea_f']) . " por " . $usuario['crea_usu'] : $actTexto = convertirFecha($usuario['modif_f']) . " por " . $usuario['modif_usu']; ?>
                                <?php echo $actTexto ?>
                            </td>
                            <td class="text-center"><a href="<?php echo base_url('editar-usuario'); ?>?idUser=<?php echo $usuario['idUsuario'] ?>" rel='facebox' class="btn btn-flat btn-success"><i class="ion ion-edit"></i> Editar</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script>
    $(function () {
        $('a[rel*=facebox]').facebox();
        $('#facebox').draggable({handle: 'div.titulo'});
        tablaListadoDataTable();
    });
</script>