<section class="content-header">
    <h1>Cobertura de Asistencia</h1>
</section>
<section class="content">
    <div class="box noBox">
        
        <div class="box-body table-responsive">
            <table id="tablaListado" class="table table-bordered table-striped table-hover" >
                <thead class="headTablaListado">
                    <tr>
                        <th>SEDE</th>
                        <th>LOCAL</th>
                        <th>CARGO</th>
                        <th>PROGRAMADOS</th>
                        <th>ASISTIERON</th>
                        <th>(%) ASISTIERON</th>
                        <th>NO ASISTIERON</th>
                        <th>(%) NO ASISTIERON</th>
                    </tr>
                </thead>
                <tbody class="bodyTablaListado">
                    <tr class="text-center">
                        <td colspan="3"></td>
                        <td><?php echo $totalSuma['cant_personal_programado'] ?></td>
                        <td><span class="co_header_c1"><?php echo nullCero($totalSuma['cant_personal_aula']) ?></span></td>
                        <td class="<?php echo colorResult(nullCeroPorcentaje($totalSuma['porc_personal_aula'])) ?> co_header_c2"><?php echo nullCeroPorcentaje($totalSuma['porc_personal_aula']) ?></td>
                        <td><span class="co_header_c3"><?php echo nullCero($totalSuma['cant_no_personal_aula']) ?></span></td>
                        <td class="<?php echo colorResult(nullCeroPorcentaje($totalSuma['porc_no_personal_aula'])) ?> co_header_c4"><?php echo nullCeroPorcentaje($totalSuma['porc_no_personal_aula']) ?></td>
                    </tr>
                    <?php foreach ($totalRegistro as $total) { ?>
                        <tr>
                            <td><?php echo $total['sede'] ?></td>
                            <td><?php echo $total['local'] ?></td>
                            <td><?php echo $total['cargo'] ?></td>
                            <td class="text-center"><?php echo $total['cant_personal_programado'] ?></td>
                            <td class="text-center"><span class="co_celda_por_c1_<?php echo $total['cant_personal_programado'] ?>"><?php echo nullCero($total['cant_personal_aula']) ?></span></td>
                            <td class="text-center <?php echo colorResult(nullCeroPorcentaje($total['porc_personal_aula'])) ?> co_celda_por_c2_<?php echo $total['cant_personal_programado'] ?>"><?php echo nullCeroPorcentaje($total['porc_personal_aula']) ?></td>
                            <td class="text-center"><span class="co_celda_por_c3_<?php echo $total['cant_personal_programado'] ?>"><?php echo nullCero($total['cant_no_personal_aula']) ?></span></td>
                            <td class="text-center <?php echo colorResult(nullCeroPorcentaje($total['porc_no_personal_aula'])) ?> co_celda_por_c4_<?php echo $total['cant_personal_programado'] ?>"><?php echo nullCeroPorcentaje($total['porc_no_personal_aula']) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function () {

//        // Radialize the colors
//        Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
//            return {
//                radialGradient: {cx: 0.5, cy: 0.3, r: 0.7},
//                stops: [
//                    [0, color],
//                    [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
//                ]
//            };
//        });
//
//        // Build the chart
//        $('#container').highcharts({
//            chart: {
//                plotBackgroundColor: null,
//                plotBorderWidth: null,
//                plotShadow: false
//            },
//            title: {
//                text: 'Reporte en pastel'
//            },
//            tooltip: {
//                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
//            },
//            plotOptions: {
//                pie: {
//                    allowPointSelect: true,
//                    cursor: 'pointer',
//                    dataLabels: {
//                        enabled: true,
//                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
//                        style: {
//                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
//                        },
//                        connectorColor: 'silver'
//                    }
//                }
//            },
//            series: [{
//                    type: 'pie',
//                    name: 'Browser share',
//                    data: [
//                        
//                        ['Firefox', 45.0],
//                        ['IE', 26.8],
//                        {
//                            name: 'Chrome',
//                            y: 12.8,
//                            sliced: true,
//                            selected: true
//                        },
//                        ['Safari', 8.5],
//                        ['Opera', 6.2],
//                        ['Others', 0.7]
//                        
//                    ]
//                }]
//        });


        refrescarTabla();
        refrescarTablaHeader();
    });
</script>