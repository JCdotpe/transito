<section class="content-header">
    <h1>Reporte de Invertario de Fichas y Cuadernillos <small>- Todas las sedes</small></h1>
</section>
<section class="content">
    <div class="box noBox">
        <div class="box-body table-responsive no-padding" style="overflow-x: auto;">
            <table class="table table-bordered table-hover table-striped table_cobertura_responsive">
                <thead>
                    <tr>
                        <th colspan="2" style="background: none;"><a href="<?php echo base_url('exportarInventario') ?>" style="color: rgb(37, 134, 50);"><i class="fa fa-file-excel-o "></i> Descargar inventario</a></th>
                        <th colspan="2">MARCO</th>
                        <th colspan="4">FICHAS DE RESPUESTA</th>
                        <th colspan="4">CUADERNILLO</th>
                    </tr>
                    <tr class="fil_centrar">
                        <th>N°</th>
                        <th >Sede Operativa</th>
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
                    <tr class="text-center">
                        <td colspan="2"></td>
                        <td><span class="mo_header_c1"><?php echo nullCero($sumaInventario['Cant_aula']) ?></span></td>
                        <td><span class="mo_header_c2"><?php echo nullCero($sumaInventario['Cant_Ficha_Cuadernillo']) ?></span></td>
                        <td><span class="mo_header_c3"><?php echo nullCero($sumaInventario['Cant_Ficha_Reg']) ?></span></td>
                        <td class="<?php echo colorResult(nullCeroPorcentaje($sumaInventario['Porc_Ficha_Reg'])) ?> mo_header_c4"><?php echo nullCeroPorcentaje($sumaInventario['Porc_Ficha_Reg']) ?></td>
                        <td><span class="mo_header_c5"><?php echo nullCero($sumaInventario['Cant_Ficha_NoReg']) ?></span></td>
                        <td class="<?php echo colorResult(nullCeroPorcentaje($sumaInventario['Porc_Ficha_NoReg'])) ?> mo_header_c6"><?php echo nullCeroPorcentaje($sumaInventario['Porc_Ficha_NoReg']) ?></td>
                        <td><span class="mo_header_c7"><?php echo nullCero($sumaInventario['Cant_Cartilla_Reg']) ?></span></td>
                        <td class="<?php echo colorResult(nullCeroPorcentaje($sumaInventario['Porc_Cartilla_Reg'])) ?> mo_header_c8"><?php echo nullCeroPorcentaje($sumaInventario['Porc_Cartilla_Reg']) ?></td>
                        <td><span class="mo_header_c9"><?php echo nullCero($sumaInventario['Cant_Cartilla_NoReg']) ?></span></td>
                        <td class="<?php echo colorResult(nullCeroPorcentaje($sumaInventario['Porc_Cartilla_NoReg'])) ?> mo_header_c10"><?php echo nullCeroPorcentaje($sumaInventario['Porc_Cartilla_NoReg']) ?></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inventarioSedes as $inventario) { ?>
                        <tr class="cobertura_view">
                            <td><?php echo $inventario['cod_sede_operativa'] ?></td>
                            <td class="izquierdaImportante iconPulse"><a href="<?php echo base_url('inventariodetalle') ?>?cod_sede=<?php echo $inventario['cod_sede_operativa'] ?>"  rel="facebox"><i class="ion ion-search"></i> <?php echo $inventario['sede_operativa'] ?></a></td>
                            <td><span class="mo_celda_por_c1_<?php echo $inventario['cod_sede_operativa'] ?>"><?php echo nullCero($inventario['Cant_aula']) ?></span></td>
                            <td><span class="mo_celda_por_c2_<?php echo $inventario['cod_sede_operativa'] ?>"><?php echo nullCero($inventario['Cant_Ficha_Cuadernillo']) ?></span></td>
                            <td><span class="mo_celda_por_c3_<?php echo $inventario['cod_sede_operativa'] ?>"><?php echo nullCero($inventario['Cant_Ficha_Reg']) ?></span></td>
                            <td class="<?php echo colorResult(nullCeroPorcentaje($inventario['Porc_Ficha_Reg'])) ?> mo_celda_por_c4_<?php echo $inventario['cod_sede_operativa'] ?>"><?php echo nullCeroPorcentaje($inventario['Porc_Ficha_Reg']) ?></td>
                            <td><span class="mo_celda_por_c5_<?php echo $inventario['cod_sede_operativa'] ?>"><?php echo nullCero($inventario['Cant_Ficha_NoReg']) ?></span></td>
                            <td class="<?php echo colorResult(nullCeroPorcentaje($inventario['Porc_Ficha_NoReg'])) ?> mo_celda_por_c6_<?php echo $inventario['cod_sede_operativa'] ?>"><?php echo nullCeroPorcentaje($inventario['Porc_Ficha_NoReg']) ?></td>
                            <td><span class="mo_celda_por_c7_<?php echo $inventario['cod_sede_operativa'] ?>"><?php echo nullCero($inventario['Cant_Cartilla_Reg']) ?></span></td>
                            <td class="<?php echo colorResult(nullCeroPorcentaje($inventario['Porc_Cartilla_Reg'])) ?> mo_celda_por_c8_<?php echo $inventario['cod_sede_operativa'] ?>"><?php echo nullCeroPorcentaje($inventario['Porc_Cartilla_Reg']) ?></td>
                            <td><span class="mo_celda_por_c9_<?php echo $inventario['cod_sede_operativa'] ?>"><?php echo nullCero($inventario['Cant_Cartilla_NoReg']) ?></span></td>
                            <td class="<?php echo colorResult(nullCeroPorcentaje($inventario['Porc_Cartilla_NoReg'])) ?> mo_celda_por_c10_<?php echo $inventario['cod_sede_operativa'] ?>"><?php echo nullCeroPorcentaje($inventario['Porc_Cartilla_NoReg']) ?></td>
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
                url: CI.base_url + "inventarioTotalHeaderAjax",
                type: 'POST',
                dataType: 'json',
                beforeSend: function () {

                },
                success: function (data) {
                    $(".mo_header_c1").text(nullCero(data.Cant_aula));
                    $(".mo_header_c2").text(nullCero(data.Cant_Ficha_Cuadernillo));
                    $(".mo_header_c3").text(nullCero(data.Cant_Ficha_Reg));
                    $(".mo_header_c4").text(nullCeroPorcentaje(data.Porc_Ficha_Reg)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(data.Porc_Ficha_Reg));
                    $(".mo_header_c5").text(nullCero(data.Cant_Ficha_NoReg));
                    $(".mo_header_c6").text(nullCeroPorcentaje(data.Porc_Ficha_NoReg)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(data.Porc_Ficha_NoReg));
                    $(".mo_header_c7").text(nullCero(data.Cant_Cartilla_Reg));
                    $(".mo_header_c8").text(nullCeroPorcentaje(data.Porc_Cartilla_Reg)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(data.Porc_Cartilla_Reg));
                    $(".mo_header_c9").text(nullCero(data.Cant_Cartilla_NoReg));
                    $(".mo_header_c10").text(nullCeroPorcentaje(data.Porc_Cartilla_NoReg)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(data.Porc_Cartilla_NoReg));
                }
            });
        }

        function refrescarTabla() {
            $.ajax({
                url: CI.base_url + "inventarioTotalAjax",
                type: 'POST',
                dataType: 'json',
                beforeSend: function () {

                },
                success: function (data) {
                    $.each(data, function (i, nombre) {
                        $(".mo_celda_por_c1_" + nombre.cod_sede_operativa).text(nullCero(nombre.Cant_aula));
                        $(".mo_celda_por_c2_" + nombre.cod_sede_operativa).text(nullCero(nombre.Cant_Ficha_Cuadernillo));
                        $(".mo_celda_por_c3_" + nombre.cod_sede_operativa).text(nullCero(nombre.Cant_Ficha_Reg));
                        $(".mo_celda_por_c4_" + nombre.cod_sede_operativa).text(nullCeroPorcentaje(nombre.Porc_Ficha_Reg)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombre.Porc_Ficha_Reg));
                        $(".mo_celda_por_c5_" + nombre.cod_sede_operativa).text(nullCero(nombre.Cant_Ficha_NoReg));
                        $(".mo_celda_por_c6_" + nombre.cod_sede_operativa).text(nullCeroPorcentaje(nombre.Porc_Ficha_NoReg)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombre.Porc_Ficha_NoReg));
                        $(".mo_celda_por_c7_" + nombre.cod_sede_operativa).text(nullCero(nombre.Cant_Cartilla_Reg));
                        $(".mo_celda_por_c8_" + nombre.cod_sede_operativa).text(nullCeroPorcentaje(nombre.Porc_Cartilla_Reg)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombre.Porc_Cartilla_Reg));
                        $(".mo_celda_por_c9_" + nombre.cod_sede_operativa).text(nullCero(nombre.Cant_Cartilla_NoReg));
                        $(".mo_celda_por_c10_" + nombre.cod_sede_operativa).text(nullCeroPorcentaje(nombre.Porc_Cartilla_NoReg)).removeClass('verdeResult ambarResult rojoResult').addClass(colorResult(nombre.Porc_Cartilla_NoReg));
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