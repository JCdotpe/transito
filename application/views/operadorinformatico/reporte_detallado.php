<section class="content-header">
    <h1>Lista de Asistencia</h1>
    <ol class="breadcrumb">
        <li class="">
            <a href="javascript:;" class="icon-info estiloDescargar displayNone" id="download_filtro_datos">
                <span class="fa fa-file-excel-o"></span> Descargar asistencia detallado
            </a>
        </li>
    </ol>
</section>
<section class="content">
    <div class="box noBox">
        <div class="box-header">
            <div class="col-sm-6 paddingLeftDiez">
                <div class="divDescarga">
                    <label>Descargar asistencia 
                        <select class="form-control input-sm selectDescargar" name="local" id="local">
                            <option value="">SELECCIONE</option>
                            <option value="0">TOTAL</option>
                            <option value="1">IE.MERCEDES CABELLO DE CARBONERA</option>
                            <option value="2">IE.MARIA PARADO DE BELLIDO</option>
                        </select>
                    </label>
                </div>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="tablaListado" class="table table-bordered table-striped table-hover" >
                <thead class="headTablaListado">
                    <tr class="text-uppercase">
                        <th>SEDE</th>
                        <th>LOCAL</th>
                        <th>CARGO</th>
                        <th>DNI</th>
                        <!--<th>APELLIDOS</th>-->
                        <th>NOMBRES</th>
                        <th>AULA</th>
                        <th>ASISTENCIA</th>
                    </tr>
                </thead>
                <tfoot class="footTablaListado">
                    <tr class="text-uppercase">
                        <th>SEDE</th>
                        <th>LOCAL</th>
                        <th>CARGO</th>
                        <th>DNI</th>
                        <!--<th>APELLIDOS</th>-->
                        <th>NOMBRES</th>
                        <th>AULA</th>
                        <th>ASISTENCIA</th>
                    </tr>
                </tfoot>
                <tbody class="bodyTablaListado">
                    <?php foreach ($totalDetalle as $detalle) { ?>
                        <tr>
                            <td><?php echo $detalle['SEDE'] ?></td>
                            <td><?php echo $detalle['LOCAL'] ?></td>
                            <td><?php echo $detalle['CARGO'] ?></td>
                            <td class="text-center"><?php echo $detalle['DNI'] ?></td>
                            <!--<td><?php #echo $detalle['APELLIDOS']           ?></td>-->
                            <td><?php echo $detalle['NOMBRES'] ?></td>
                            <td class="text-center"><?php echo $detalle['AULA'] ?></td>
                            <td class="text-center"><?php echo $detalle['ASISTENCIA'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script>
    $(function () {
        tablaListadoDataTable();
    });
</script>