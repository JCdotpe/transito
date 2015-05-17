<div class="titulo text-center">Detalle de inventario a nivel de aula</div>
<div class="cuerpo">
    <p class="text-center"><span class="text-yellow">C = Contingencia </span> | <span class="text-red">D = Discapacidad </span> | <span class="text-green">N = Normal</span> | <span class="text-light-blue">A = ACOPIO</span> <a href="<?php echo base_url('exportarInventarioLocal') ?>?cod_sede=<?php echo $cod_sede ?>" style="color: rgb(37, 134, 50);" class="floatRight text-bold"><i class="fa fa-file-excel-o"></i> Inventario por local</a></p>
    <section class="table-responsive table_padding" style="overflow-x: auto;">
        <table class="table table-bordered table-hover table_cobertura_responsive">
            <tbody>
                <?php foreach ($inventarioAllSedeLocal as $allSedeLocal) { ?>
                    <tr data-toggle="collapse" data-target="#invenDetalle_<?php echo $allSedeLocal['cod_sede_operativa'] . "_" . $allSedeLocal['cod_local_sede'] ?>" class="accordion-toggle saltarin">
                        <td class="saltape izquierdaCursor" width="30"><span class="fa fa-institution"></span></td>
                        <td colspan="9" class="izquierdaCursor rowDown">  <?php echo $allSedeLocal['nombreLocal'] ?></td>
                    </tr>
                    <tr>
                        <td class="hiddenRow" colspan="10">
                            <div id="invenDetalle_<?php echo $allSedeLocal['cod_sede_operativa'] . "_" . $allSedeLocal['cod_local_sede'] ?>" class="accordian-body collapse">
                                <section class="table-responsive table_padding" style="overflow-x: auto;">
                                    <table class="table table-bordered table-hover table_cobertura_responsive" style="margin-top: 5px;">
                                        <thead>
                                            <tr>
                                                <th colspan="2" style="background: none;"><a href="<?php echo base_url('exportarInventarioAula') ?>?cod_sede=<?php echo $allSedeLocal['cod_sede_operativa'] ?>&cod_local=<?php echo $allSedeLocal['cod_local_sede'] ?>" style="color: rgb(37, 134, 50);"><i class="fa fa-file-excel-o"></i> Inventario por aula</a></th>
                                                <th colspan="2">MARCO</th>
                                                <th colspan="4">FICHAS DE RESPUESTA</th>
                                                <th colspan="4">CUADERNILLO</th>
                                            </tr>
                                            <tr class="fil_centrar">
                                                <th>Aula</th>
                                                <th>Tipo aula</th>
                                                <th>Fichas</th>
                                                <th>Cuadernillos</th>
                                                <th>Registrado en el aula</th>
                                                <th>(%)</th>
                                                <th>Registro restante</th>
                                                <th>(%)</th>
                                                <th>Registrado en el aula</th>
                                                <th>(%)</th>
                                                <th>Registro restante</th>
                                                <th>(%)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td><span class="de_header_c1_<?php echo $allSedeLocal['cod_sede_operativa'] . "_" . $allSedeLocal['cod_local_sede'] ?>"><?php echo nullCero($allSedeLocal['Cant_Ficha_Cuadernillo']) ?></span></td>
                                                <td><span class="de_header_c2_<?php echo $allSedeLocal['cod_sede_operativa'] . "_" . $allSedeLocal['cod_local_sede'] ?>"><?php echo nullCero($allSedeLocal['Cant_Ficha_Cuadernillo']) ?></span></td>
                                                <td><span class="de_header_c3_<?php echo $allSedeLocal['cod_sede_operativa'] . "_" . $allSedeLocal['cod_local_sede'] ?>"><?php echo nullCero($allSedeLocal['Cant_Ficha_Reg']) ?></span></td>
                                                <td class="<?php echo colorResult(nullCeroPorcentaje($allSedeLocal['Porc_Ficha_Reg'])) ?> de_header_c4_<?php echo $allSedeLocal['cod_sede_operativa'] . "_" . $allSedeLocal['cod_local_sede'] ?>"><?php echo nullCeroPorcentaje($allSedeLocal['Porc_Ficha_Reg']) ?></td>
                                                <td><span class="de_header_c5_<?php echo $allSedeLocal['cod_sede_operativa'] . "_" . $allSedeLocal['cod_local_sede'] ?>"><?php echo nullCero($allSedeLocal['Cant_Ficha_NoReg']) ?></span></td>
                                                <td class="<?php echo colorResult(nullCeroPorcentaje($allSedeLocal['Porc_Ficha_NoReg'])) ?> de_header_c6_<?php echo $allSedeLocal['cod_sede_operativa'] . "_" . $allSedeLocal['cod_local_sede'] ?>"><?php echo nullCeroPorcentaje($allSedeLocal['Porc_Ficha_NoReg']) ?></td>
                                                <td><span class="de_header_c7_<?php echo $allSedeLocal['cod_sede_operativa'] . "_" . $allSedeLocal['cod_local_sede'] ?>"><?php echo nullCero($allSedeLocal['Cant_Cartilla_Reg']) ?></span></td>
                                                <td class="<?php echo colorResult(nullCeroPorcentaje($allSedeLocal['Porc_Cartilla_Reg'])) ?> de_header_c8_<?php echo $allSedeLocal['cod_sede_operativa'] . "_" . $allSedeLocal['cod_local_sede'] ?>"><?php echo nullCeroPorcentaje($allSedeLocal['Porc_Cartilla_Reg']) ?></td>
                                                <td><span class="de_header_c9_<?php echo $allSedeLocal['cod_sede_operativa'] . "_" . $allSedeLocal['cod_local_sede'] ?>"><?php echo nullCero($allSedeLocal['Cant_Cartilla_NoReg']) ?></span></td>
                                                <td class="<?php echo colorResult(nullCeroPorcentaje($allSedeLocal['Porc_Cartilla_NoReg'])) ?> de_header_c10_<?php echo $allSedeLocal['cod_sede_operativa'] . "_" . $allSedeLocal['cod_local_sede'] ?>"><?php echo nullCeroPorcentaje($allSedeLocal['Porc_Cartilla_NoReg']) ?></td>
                                            </tr>
                                            <?php foreach ($allSedeLocal['inventarioAllSedeLocalChildren'] as $children) { ?>
                                                <tr>
                                                    <td class="hiddenRow"><?php echo $children['Aula'] ?></td>
                                                    <td class="hiddenRow <?php echo colorTipoAula($children['tipo']) ?>"><?php echo $children['tipo'] ?></td>
                                                    <td class="hiddenRow"><span class="de_celda_c1_<?php echo $children['cod_sede_operativa'] . "_" . $children['cod_local_sede'] . "_" . $children['nro_aula'] ?>"><?php echo nullCero($children['c_ficha_aula']) ?></span></td>
                                                    <td class="hiddenRow"><span class="de_celda_c2_<?php echo $children['cod_sede_operativa'] . "_" . $children['cod_local_sede'] . "_" . $children['nro_aula'] ?>"><?php echo nullCero($children['c_cartilla_aula']) ?></span></td>
                                                    <td class="hiddenRow"><span class="de_celda_c3_<?php echo $children['cod_sede_operativa'] . "_" . $children['cod_local_sede'] . "_" . $children['nro_aula'] ?>"><?php echo nullCero($children['cant_f_inv_aula']) ?></span></td>
                                                    <td class="hiddenRow <?php echo colorResult(nullCeroPorcentaje($children['Porc_Ficha_Reg'])) ?> de_celda_c4_<?php echo $children['cod_sede_operativa'] . "_" . $children['cod_local_sede'] . "_" . $children['nro_aula'] ?>"><?php echo nullCeroPorcentaje($children['Porc_Ficha_Reg']) ?></td>
                                                    <td class="hiddenRow"><span class="de_celda_c5_<?php echo $children['cod_sede_operativa'] . "_" . $children['cod_local_sede'] . "_" . $children['nro_aula'] ?>"><?php echo nullCero($children['cant_f_noInv_aula']) ?></span></td>
                                                    <td class="hiddenRow <?php echo colorResult(nullCeroPorcentaje($children['Porc_Ficha_NoReg'])) ?> de_celda_c6_<?php echo $children['cod_sede_operativa'] . "_" . $children['cod_local_sede'] . "_" . $children['nro_aula'] ?>"><?php echo nullCeroPorcentaje($children['Porc_Ficha_NoReg']) ?></td>
                                                    <td class="hiddenRow"><span class="de_celda_c7_<?php echo $children['cod_sede_operativa'] . "_" . $children['cod_local_sede'] . "_" . $children['nro_aula'] ?>"><?php echo nullCero($children['cant_c_inv_aula']) ?></span></td>
                                                    <td class="hiddenRow <?php echo colorResult(nullCeroPorcentaje($children['Porc_Cartilla_Reg'])) ?> de_celda_c8_<?php echo $children['cod_sede_operativa'] . "_" . $children['cod_local_sede'] . "_" . $children['nro_aula'] ?>"><?php echo nullCeroPorcentaje($children['Porc_Cartilla_Reg']) ?></td>
                                                    <td class="hiddenRow"><span class="de_celda_c9_<?php echo $children['cod_sede_operativa'] . "_" . $children['cod_local_sede'] . "_" . $children['nro_aula'] ?>"><?php echo nullCero($children['cant_c_noInv_aula']) ?></span></td>
                                                    <td class="hiddenRow <?php echo colorResult(nullCeroPorcentaje($children['Porc_Cartilla_NoReg'])) ?> de_celda_c10_<?php echo $children['cod_sede_operativa'] . "_" . $children['cod_local_sede'] . "_" . $children['nro_aula'] ?>"><?php echo nullCeroPorcentaje($children['Porc_Cartilla_NoReg']) ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="displayNone" id="codeSedeId"><?php echo $cod_sede ?></div>
    </section>
</div>
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

        function refrescarTabla() {
            $.ajax({
                url: CI.base_url + "inventarioDetailsAjax",
                type: 'POST',
                data: {cod_sede: $("#codeSedeId").text()},
                dataType: 'json',
                beforeSend: function () {

                },
                success: function (data) {
//                    console.log(data);
                    $.each(data, function (i, nombre) {
                        //cabecera
                        $(".de_header_c1_" + nombre.cod_sede_operativa + "_" + nombre.cod_local_sede).text(nullCero(nombre.Cant_Ficha_Cuadernillo));
                        $(".de_header_c2_" + nombre.cod_sede_operativa + "_" + nombre.cod_local_sede).text(nullCero(nombre.Cant_Ficha_Cuadernillo));
                        $(".de_header_c3_" + nombre.cod_sede_operativa + "_" + nombre.cod_local_sede).text(nullCero(nombre.Cant_Ficha_Reg));
                        $(".de_header_c4_" + nombre.cod_sede_operativa + "_" + nombre.cod_local_sede).text(nullCeroPorcentaje(nombre.Porc_Ficha_Reg)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombre.Porc_Ficha_Reg));
                        $(".de_header_c5_" + nombre.cod_sede_operativa + "_" + nombre.cod_local_sede).text(nullCero(nombre.Cant_Ficha_NoReg));
                        $(".de_header_c6_" + nombre.cod_sede_operativa + "_" + nombre.cod_local_sede).text(nullCeroPorcentaje(nombre.Porc_Ficha_NoReg)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombre.Porc_Ficha_NoReg));
                        $(".de_header_c7_" + nombre.cod_sede_operativa + "_" + nombre.cod_local_sede).text(nullCero(nombre.Cant_Cartilla_Reg));
                        $(".de_header_c8_" + nombre.cod_sede_operativa + "_" + nombre.cod_local_sede).text(nullCeroPorcentaje(nombre.Porc_Cartilla_Reg)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombre.Porc_Cartilla_Reg));
                        $(".de_header_c9_" + nombre.cod_sede_operativa + "_" + nombre.cod_local_sede).text(nullCero(nombre.Cant_Cartilla_NoReg));
                        $(".de_header_c10_" + nombre.cod_sede_operativa + "_" + nombre.cod_local_sede).text(nullCeroPorcentaje(nombre.Porc_Cartilla_NoReg)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombre.Porc_Cartilla_NoReg));
                        //fin cabecera
                        $.each(data[i].inventarioAllSedeLocalChildren, function (i, nombres) {
//                            //Cuerpo
                            $(".de_celda_c1_" + nombres.cod_sede_operativa + "_" + nombres.cod_local_sede + "_" + nombres.nro_aula).text(nullCero(nombres.c_ficha_aula));
                            $(".de_celda_c2_" + nombres.cod_sede_operativa + "_" + nombres.cod_local_sede + "_" + nombres.nro_aula).text(nullCero(nombres.c_cartilla_aula));
                            $(".de_celda_c3_" + nombres.cod_sede_operativa + "_" + nombres.cod_local_sede + "_" + nombres.nro_aula).text(nullCero(nombres.cant_f_inv_aula));
                            $(".de_celda_c4_" + nombres.cod_sede_operativa + "_" + nombres.cod_local_sede + "_" + nombres.nro_aula).text(nullCeroPorcentaje(nombres.Porc_Ficha_Reg)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombres.Porc_Ficha_Reg));
                            $(".de_celda_c5_" + nombres.cod_sede_operativa + "_" + nombres.cod_local_sede + "_" + nombres.nro_aula).text(nullCero(nombres.cant_f_noInv_aula));
                            $(".de_celda_c6_" + nombres.cod_sede_operativa + "_" + nombres.cod_local_sede + "_" + nombres.nro_aula).text(nullCeroPorcentaje(nombres.Porc_Ficha_NoReg)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombres.Porc_Ficha_NoReg));
                            $(".de_celda_c7_" + nombres.cod_sede_operativa + "_" + nombres.cod_local_sede + "_" + nombres.nro_aula).text(nullCero(nombres.cant_c_inv_aula));
                            $(".de_celda_c8_" + nombres.cod_sede_operativa + "_" + nombres.cod_local_sede + "_" + nombres.nro_aula).text(nullCeroPorcentaje(nombres.Porc_Cartilla_Reg)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombres.Porc_Cartilla_Reg));
                            $(".de_celda_c9_" + nombres.cod_sede_operativa + "_" + nombres.cod_local_sede + "_" + nombres.nro_aula).text(nullCero(nombres.cant_c_noInv_aula));
                            $(".de_celda_c10_" + nombres.cod_sede_operativa + "_" + nombres.cod_local_sede + "_" + nombres.nro_aula).text(nullCeroPorcentaje(nombres.Porc_Cartilla_NoReg)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombres.Porc_Cartilla_NoReg));
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