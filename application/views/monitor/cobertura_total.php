<section class="content-header">
    <h1>Reporte de Cobertura <small>- Todas las sedes</small></h1>
</section>
<section class="content">
    <div class="box noBox">
        <div class="box-body table-responsive no-padding" style="overflow-x: auto;">
            <table class="table table-bordered table-hover table-striped table_cobertura_responsive">
                <thead>
                    <tr>
                        <th colspan="4" style="background: none;"><a href="<?php echo base_url('exportarCobertura') ?>" style="color: rgb(37, 134, 50);"><i class="fa fa-file-excel-o "></i> Descargar cobertura</a></th>
                        <th colspan="4">Cobertura asistencia en el local</th>
                        <th colspan="4">Cobertura asistencia en el aula</th>
                    </tr>
                    <tr class="fil_centrar">
                        <th>N°</th>
                        <th >Sede Operativa</th>
                        <th>Total aulas</th>
                        <th>Total docentes programados</th>
                        <th>Asistieron</th>
                        <th>(%)</th>
                        <th>No Asistieron</th>
                        <th>(%)</th>
                        <th>Asistieron</th>
                        <th>(%)</th>
                        <th>No Asistieron</th>
                        <th>(%)</th>
                    </tr>
                    <tr class="text-center">
                        <td colspan="2"></td>
                        <td><?php echo $sumaCobertura['Cant_aula'] ?></td>
                        <td><?php echo $sumaCobertura['Cant_docente_programado'] ?></td>
                        <td><span class="co_header_c1"><?php echo nullCero($sumaCobertura['Cant_asist_local']) ?></span></td>
                        <td class="<?php echo colorResult(nullCeroPorcentaje($sumaCobertura['Porc_Asist_Local'])) ?> co_header_c2"><?php echo nullCeroPorcentaje($sumaCobertura['Porc_Asist_Local']) ?></td>
                        <td><span class="co_header_c3"><?php echo nullCero($sumaCobertura['Cant_NoAsist_Local']) ?></span></td>
                        <td class="<?php echo colorResult(nullCeroPorcentaje($sumaCobertura['Porc_NoAsist_Local'])) ?> co_header_c4"><?php echo nullCeroPorcentaje($sumaCobertura['Porc_NoAsist_Local']) ?></td>
                        <td><span class="co_header_c5"><?php echo nullCero($sumaCobertura['Cant_asist_Aula']) ?></span></td>
                        <td class="<?php echo colorResult(nullCeroPorcentaje($sumaCobertura['Porc_Asist_Aula'])) ?> co_header_c6"><?php echo nullCeroPorcentaje($sumaCobertura['Porc_Asist_Aula']) ?></td>
                        <td><span class="co_header_c7"><?php echo nullCero($sumaCobertura['Cant_NoAsist_Aula']) ?></span></td>
                        <td class="<?php echo colorResult(nullCeroPorcentaje($sumaCobertura['Porc_NoAsist_Aula'])) ?> co_header_c8"><?php echo nullCeroPorcentaje($sumaCobertura['Porc_NoAsist_Aula']) ?></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($coberturaAllSede as $allCobertura) { ?>
                        <tr class="cobertura_view ">
                            <td><?php echo $allCobertura['cod_sede_operativa'] ?></td>
                            <td class="izquierdaImportante iconPulse"><a href="<?php echo base_url('coberturadetalle') ?>?cod_sede=<?php echo $allCobertura['cod_sede_operativa'] ?>" class="displayBlock" rel="facebox"><i class="ion ion-search"></i> <?php echo $allCobertura['sede_operativa'] ?></a></td>
                            <td><?php echo $allCobertura['cant_aula'] ?></td>
                            <td><?php echo $allCobertura['Cant_docente_Programado'] ?></td>
                            <td><span class="co_celda_por_c1_<?php echo $allCobertura['cod_sede_operativa'] ?>"><?php echo $allCobertura['Cant_asist_local'] ?></span></td>
                            <td class="<?php echo colorResult(nullCeroPorcentaje($allCobertura['Porc_Asist_Local'])) ?> co_celda_por_c2_<?php echo $allCobertura['cod_sede_operativa'] ?>"><?php echo $allCobertura['Porc_Asist_Local'] ?></td>
                            <td><span class="co_celda_por_c3_<?php echo $allCobertura['cod_sede_operativa'] ?>"><?php echo $allCobertura['Cant_NoAsist_Local'] ?></span></td>
                            <td class="<?php echo colorResult(nullCeroPorcentaje($allCobertura['Porc_NoAsist_Local'])) ?> co_celda_por_c4_<?php echo $allCobertura['cod_sede_operativa'] ?>"><?php echo $allCobertura['Porc_NoAsist_Local'] ?></td>
                            <td><span class="co_celda_por_c5_<?php echo $allCobertura['cod_sede_operativa'] ?>"><?php echo $allCobertura['Cant_asist_Aula'] ?></span></td>
                            <td class="<?php echo colorResult(nullCeroPorcentaje($allCobertura['Porc_Asist_Aula'])) ?> co_celda_por_c6_<?php echo $allCobertura['cod_sede_operativa'] ?>"><?php echo $allCobertura['Porc_Asist_Aula'] ?></td>
                            <td><span class="co_celda_por_c7_<?php echo $allCobertura['cod_sede_operativa'] ?>"><?php echo $allCobertura['Cant_NoAsist_Aula'] ?></span></td>
                            <td class="<?php echo colorResult(nullCeroPorcentaje($allCobertura['Porc_NoAsist_Aula'])) ?> co_celda_por_c8_<?php echo $allCobertura['cod_sede_operativa'] ?>"><?php echo $allCobertura['Porc_NoAsist_Aula'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function () {
        function colorResult(valor) {
            var res;
            var valorNumerico = parseInt(valor);
            if (valorNumerico === 100) {
                res = "verdeResult";
            } else if (valorNumerico < 100 && valorNumerico >= 1) {
                res = "ambarResult";
            } else {
                res = "rojoResult";
            }
            return res;
        }
        function nullCero(valor) {
            return (valor === '') ? '0' : valor;
        }

        function nullCeroPorcentaje($valor) {
            return ($valor === '') ? '0.00' : $valor;
        }

        function refrescarTablaHeader() {
            $.ajax({
                url: CI.base_url + "coberturaTotalHeaderAjax",
                type: 'POST',
                dataType: 'json',
                beforeSend: function () {

                },
                success: function (data) {
                    $(".co_header_c1").text(nullCero(data.Cant_asist_local));
                    $(".co_header_c2").text(nullCeroPorcentaje(data.Porc_Asist_Local)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(data.Porc_Asist_Local));
                    $(".co_header_c3").text(nullCero(data.Cant_NoAsist_Local));
                    $(".co_header_c4").text(nullCeroPorcentaje(data.Porc_NoAsist_Local)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(data.Porc_NoAsist_Local));
                    $(".co_header_c5").text(nullCero(data.Cant_asist_Aula));
                    $(".co_header_c6").text(nullCeroPorcentaje(data.Porc_Asist_Aula)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(data.Porc_Asist_Aula));
                    $(".co_header_c7").text(nullCero(data.Cant_NoAsist_Aula));
                    $(".co_header_c8").text(nullCeroPorcentaje(data.Porc_NoAsist_Aula)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(data.Porc_NoAsist_Aula));
                }
            });
        }

        function refrescarTabla() {
            $.ajax({
                url: CI.base_url + "coberturaTotalAjax",
                type: 'POST',
                dataType: 'json',
                beforeSend: function () {

                },
                success: function (data) {
                    $.each(data, function (i, nombre) {
                        $(".co_celda_por_c1_" + nombre.cod_sede_operativa).text(nullCero(nombre.Cant_asist_local));
                        $(".co_celda_por_c2_" + nombre.cod_sede_operativa).text(nullCeroPorcentaje(nombre.Porc_Asist_Local)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombre.Porc_Asist_Local));
                        $(".co_celda_por_c3_" + nombre.cod_sede_operativa).text(nullCero(nombre.Cant_NoAsist_Local));
                        $(".co_celda_por_c4_" + nombre.cod_sede_operativa).text(nullCeroPorcentaje(nombre.Porc_NoAsist_Local)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombre.Porc_NoAsist_Local));
                        $(".co_celda_por_c5_" + nombre.cod_sede_operativa).text(nullCero(nombre.Cant_asist_Aula));
                        $(".co_celda_por_c6_" + nombre.cod_sede_operativa).text(nullCeroPorcentaje(nombre.Porc_Asist_Aula)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombre.Porc_Asist_Aula));
                        $(".co_celda_por_c7_" + nombre.cod_sede_operativa).text(nullCero(nombre.Cant_NoAsist_Aula));
                        $(".co_celda_por_c8_" + nombre.cod_sede_operativa).text(nullCeroPorcentaje(nombre.Porc_NoAsist_Aula)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombre.Porc_NoAsist_Aula));
                    });
                }
            });
        }

        setInterval(function () {
            refrescarTabla();
            refrescarTablaHeader();
        }, 5000);
    });
</script>