<div class="titulo text-center">Detalle de cobertura a nivel de aula</div>
<div class="cuerpo" >
    <p class="text-center"><span class="text-yellow">C = Contingencia </span> | <span class="text-red">D = Discapacidad </span> | <span class="text-green">N = Normal</span> <a href="<?php echo base_url('exportarCoberturaLocal') ?>?cod_sede=<?php echo $cod_sede ?>" style="color: rgb(37, 134, 50);" class="floatRight text-bold"><i class="fa fa-file-excel-o "></i> Descargar cobertura por local</a></p>
    <section class="table-responsive table_padding" style="overflow-x: auto;">
        <table class="table table-bordered table-hover table_cobertura_responsive">
            <tbody>
                <?php foreach ($coberturaAllSedeLocal as $allSedeLocal) { ?>
                    <tr data-toggle="collapse" data-target="#coberDetalle_<?php echo $allSedeLocal['cod_local_sede'] . "_" . $allSedeLocal['cod_sede_operativa'] ?>" class="accordion-toggle saltarin">
                        <td class="saltape izquierdaCursor" width="30"><span class="fa fa-institution"></span></td>
                        <td colspan="9" class="izquierdaCursor rowDown">  <?php echo $allSedeLocal['nombreLocal'] ?></td>
                    </tr>
                    <tr>
                        <td class="hiddenRow" colspan="10">
                            <div id="coberDetalle_<?php echo $allSedeLocal['cod_local_sede'] . "_" . $allSedeLocal['cod_sede_operativa'] ?>" class="accordian-body collapse">
                                <section class="table-responsive table_padding" style="overflow-x: auto;">
                                    <table class="table table-bordered table-hover table_cobertura_responsive" style="margin-top: 5px;">
                                        <thead>
                                            <tr>
                                                <th colspan="3" style="background: none;" ><a href="<?php echo base_url('exportarCoberturaAula') ?>?cod_sede=<?php echo $allSedeLocal['cod_sede_operativa'] ?>&cod_local=<?php echo $allSedeLocal['cod_local_sede'] ?>" style="color: rgb(37, 134, 50);"><i class="fa fa-file-excel-o text-danger "></i> Descargar cobertura por aula</a></th>
                                                <th colspan="4">Cobertura asistencia en el local</th>
                                                <th colspan="5">Cobertura asistencia en el aula</th>
                                            </tr>
                                            <tr class="fil_centrar">
                                                <th>Aula</th>
                                                <th>Tipo aula</th>
                                                <th>Total docentes programados</th>
                                                <th>Asistieron</th>
                                                <th>(%)</th>
                                                <th>No Asistieron</th>
                                                <th>(%)</th>
                                                <th>Asistieron</th>
                                                <th>Reubicados Contingencia</th>
                                                <th>(%)</th>
                                                <th>No Asistieron</th>
                                                <th>(%)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td><?php echo $allSedeLocal['Cant_docente_Programado'] ?></td>
                                                <td><span class="code_header_c1_<?php echo $allSedeLocal['cod_sede_operativa'] . "_" . $allSedeLocal['cod_local_sede'] ?>"><?php echo nullCero($allSedeLocal['Cant_asist_local']) ?></span></td>
                                                <td class="<?php echo colorResult(nullCeroPorcentaje($allSedeLocal['Porc_Asist_Local'])) ?> code_header_c2_<?php echo $allSedeLocal['cod_sede_operativa'] . "_" . $allSedeLocal['cod_local_sede'] ?>"><?php echo nullCeroPorcentaje($allSedeLocal['Porc_Asist_Local']) ?></td>
                                                <td><span class="code_header_c3_<?php echo $allSedeLocal['cod_sede_operativa'] . "_" . $allSedeLocal['cod_local_sede'] ?>"><?php echo nullCero($allSedeLocal['Cant_NoAsist_Local']) ?></span></td>
                                                <td class="<?php echo colorResult(nullCeroPorcentaje($allSedeLocal['Porc_NoAsist_Local'])) ?> code_header_c4_<?php echo $allSedeLocal['cod_sede_operativa'] . "_" . $allSedeLocal['cod_local_sede'] ?>"><?php echo nullCeroPorcentaje($allSedeLocal['Porc_NoAsist_Local']) ?></td>
                                                <td><span class="code_header_c5_<?php echo $allSedeLocal['cod_sede_operativa'] . "_" . $allSedeLocal['cod_local_sede'] ?>"><?php echo nullCero($allSedeLocal['Cant_asist_Aula']) ?></span></td>
                                                <td></td>
                                                <td class="<?php echo colorResult(nullCeroPorcentaje($allSedeLocal['Porc_Asist_Aula'])) ?> code_header_c7_<?php echo $allSedeLocal['cod_sede_operativa'] . "_" . $allSedeLocal['cod_local_sede'] ?>"><?php echo nullCeroPorcentaje($allSedeLocal['Porc_Asist_Aula']) ?></td>
                                                <td><span class="code_header_c8_<?php echo $allSedeLocal['cod_sede_operativa'] . "_" . $allSedeLocal['cod_local_sede'] ?>"><?php echo nullCero($allSedeLocal['Cant_NoAsist_Aula']) ?></span></td>
                                                <td class="<?php echo colorResult(nullCeroPorcentaje($allSedeLocal['Porc_NoAsist_Aula'])) ?> code_header_c9_<?php echo $allSedeLocal['cod_sede_operativa'] . "_" . $allSedeLocal['cod_local_sede'] ?>"><?php echo nullCeroPorcentaje($allSedeLocal['Porc_NoAsist_Aula']) ?></td>
                                            </tr>
                                            <?php foreach ($allSedeLocal['coberturaAllSedeLocalChildren'] as $children) { ?>
                                                <tr>
                                                    <td class="hiddenRow"><?php echo $children['nro_aula'] ?></td>
                                                    <td class="hiddenRow <?php echo colorTipoAula($children['tipo']) ?>"><?php echo $children['tipo'] ?></td>
                                                    <td class="hiddenRow"><?php echo $children['Cant_Docente_Programado'] ?></td>
                                                    <td class="hiddenRow"><span class="code_celda_c1_<?php echo $children['cod_sede_operativa'] . "_" . $children['cod_local_sede'] . "_" . $children['nro_aula'] ?>"><?php echo nullCero($children['Cant_asist_local']) ?></span></td>
                                                    <td class="hiddenRow <?php echo colorResult(nullCeroPorcentaje($children['Porc_asist_Local'])) ?> code_celda_c2_<?php echo $children['cod_sede_operativa'] . "_" . $children['cod_local_sede'] . "_" . $children['nro_aula'] ?>"><?php echo nullCeroPorcentaje($children['Porc_asist_Local']) ?></td>
                                                    <td class="hiddenRow"><span class="code_celda_c3_<?php echo $children['cod_sede_operativa'] . "_" . $children['cod_local_sede'] . "_" . $children['nro_aula'] ?>"><?php echo nullCero($children['Cant_NoAsist_Local']) ?></span></td>
                                                    <td class="hiddenRow <?php echo colorResult(nullCeroPorcentaje($children['Porc_NoAsist_Local'])) ?> code_celda_c4_<?php echo $children['cod_sede_operativa'] . "_" . $children['cod_local_sede'] . "_" . $children['nro_aula'] ?>"><?php echo nullCeroPorcentaje($children['Porc_NoAsist_Local']) ?></td>
                                                    <td class="hiddenRow"><span class="code_celda_c5_<?php echo $children['cod_sede_operativa'] . "_" . $children['cod_local_sede'] . "_" . $children['nro_aula'] ?>"><?php echo nullCero($children['Cant_Asist_AulaProgram']) ?></span></td>
                                                    <td class="hiddenRow"><span class="code_celda_c6_<?php echo $children['cod_sede_operativa'] . "_" . $children['cod_local_sede'] . "_" . $children['nro_aula'] ?>"><?php echo nullCero($children['Cant_Asist_Reubicados_Continge']) ?></span></td>
                                                    <td class="hiddenRow <?php echo colorResult(nullCeroPorcentaje($children['Porc_Asist_AulaTotal'])) ?> code_celda_c7_<?php echo $children['cod_sede_operativa'] . "_" . $children['cod_local_sede'] . "_" . $children['nro_aula'] ?>"><?php echo nullCeroPorcentaje($children['Porc_Asist_AulaTotal']) ?></td>
                                                    <td class="hiddenRow"><span class="code_celda_c8_<?php echo $children['cod_sede_operativa'] . "_" . $children['cod_local_sede'] . "_" . $children['nro_aula'] ?>"><?php echo nullCero($children['Cant_NoAsist_Aula']) ?></span></td>
                                                    <td class="hiddenRow <?php echo colorResult(nullCeroPorcentaje($children['Porc_NoAsist_AulaTotal'])) ?> code_celda_c9_<?php echo $children['cod_sede_operativa'] . "_" . $children['cod_local_sede'] . "_" . $children['nro_aula'] ?>"><?php echo nullCeroPorcentaje($children['Porc_NoAsist_AulaTotal']) ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <div class="displayNone" id="codeSedeIdCobertura"><?php echo $cod_sede ?></div>
    </section>
</div>
<script type="text/javascript">
    $(function () {
        function colorResult(valor) {
            var res;
            var valorNumerico = parseInt(valor);
            if (valorNumerico === 100) {
                res = "verdeResult";
            } else if (valorNumerico <= 100 && valorNumerico >= 1) {
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

        function refrescarTabla() {
            $.ajax({
                url: CI.base_url + "coberturaDetailsAjax",
                type: 'POST',
                data: {cod_sede: $("#codeSedeIdCobertura").text()},
                dataType: 'json',
                beforeSend: function () {

                },
                success: function (data) {
                    $.each(data, function (i, nombre) {
                        //cabecera
                        $(".code_header_c1_" + nombre.cod_sede_operativa + "_" + nombre.cod_local_sede).text(nullCero(nombre.Cant_asist_local));
                        $(".code_header_c2_" + nombre.cod_sede_operativa + "_" + nombre.cod_local_sede).text(nullCeroPorcentaje(nombre.Porc_Asist_Local)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombre.Porc_Asist_Local));
                        $(".code_header_c3_" + nombre.cod_sede_operativa + "_" + nombre.cod_local_sede).text(nullCero(nombre.Cant_NoAsist_Local));
                        $(".code_header_c4_" + nombre.cod_sede_operativa + "_" + nombre.cod_local_sede).text(nullCeroPorcentaje(nombre.Porc_NoAsist_Local)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombre.Porc_NoAsist_Local));
                        $(".code_header_c5_" + nombre.cod_sede_operativa + "_" + nombre.cod_local_sede).text(nullCero(nombre.Cant_asist_Aula));
//                        $(".code_header_c6_" + nombre.cod_sede_operativa + "_" + nombre.cod_local_sede).text(nullCero(nombre.Cant_Cartilla_Reg));
                        $(".code_header_c7_" + nombre.cod_sede_operativa + "_" + nombre.cod_local_sede).text(nullCeroPorcentaje(nombre.Porc_Asist_Aula)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombre.Porc_Asist_Aula));
                        $(".code_header_c8_" + nombre.cod_sede_operativa + "_" + nombre.cod_local_sede).text(nullCero(nombre.Cant_NoAsist_Aula));
                        $(".code_header_c9_" + nombre.cod_sede_operativa + "_" + nombre.cod_local_sede).text(nullCeroPorcentaje(nombre.Porc_NoAsist_Aula)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombre.Porc_NoAsist_Aula));
                        //fin cabecera
                        $.each(data[i].coberturaAllSedeLocalChildren, function (i, nombres) {
//                            //Cuerpo
                            $(".code_celda_c1_" + nombres.cod_sede_operativa + "_" + nombres.cod_local_sede + "_" + nombres.nro_aula).text(nullCero(nombres.Cant_asist_local));
                            $(".code_celda_c2_" + nombres.cod_sede_operativa + "_" + nombres.cod_local_sede + "_" + nombres.nro_aula).text(nullCeroPorcentaje(nombres.Porc_asist_Local)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombres.Porc_asist_Local));
                            $(".code_celda_c3_" + nombres.cod_sede_operativa + "_" + nombres.cod_local_sede + "_" + nombres.nro_aula).text(nullCero(nombres.Cant_NoAsist_Local));
                            $(".code_celda_c4_" + nombres.cod_sede_operativa + "_" + nombres.cod_local_sede + "_" + nombres.nro_aula).text(nullCeroPorcentaje(nombres.Porc_NoAsist_Local)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombres.Porc_NoAsist_Local));
                            $(".code_celda_c5_" + nombres.cod_sede_operativa + "_" + nombres.cod_local_sede + "_" + nombres.nro_aula).text(nullCero(nombres.Cant_Asist_AulaProgram));
                            $(".code_celda_c6_" + nombres.cod_sede_operativa + "_" + nombres.cod_local_sede + "_" + nombres.nro_aula).text(nullCero(nombres.Cant_Asist_Reubicados_Continge));
                            $(".code_celda_c7_" + nombres.cod_sede_operativa + "_" + nombres.cod_local_sede + "_" + nombres.nro_aula).text(nullCeroPorcentaje(nombres.Porc_Asist_AulaTotal)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombres.Porc_Asist_AulaTotal));
                            $(".code_celda_c8_" + nombres.cod_sede_operativa + "_" + nombres.cod_local_sede + "_" + nombres.nro_aula).text(nullCero(nombres.Cant_NoAsist_Aula));
                            $(".code_celda_c9_" + nombres.cod_sede_operativa + "_" + nombres.cod_local_sede + "_" + nombres.nro_aula).text(nullCeroPorcentaje(nombres.Porc_NoAsist_AulaTotal)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombres.Porc_NoAsist_AulaTotal));
//                            //fin Cuerpo
                        });
                    });
                }
            });
        }

        setInterval(function () {
            refrescarTabla();
        }, 5000);
    });
</script>
