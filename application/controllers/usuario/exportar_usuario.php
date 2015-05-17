<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Exportar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('monitor/monitor_model', 'modeloMonitor');
        $this->load->library('PHPExcel');
        ini_set("memory_limit", -1);
        ini_set('max_execution_time', -1);
    }

    public function exportar_detallado() {
        $phpExcel = new PHPExcel();
        $prestasi = $phpExcel->setActiveSheetIndex(0);
        //Estilo para el border
        $borders = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '7f8c8d')
                )
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
            ),
        );
        //Estilo para el titulo
        $titulo = array(
            'font' => array(
                'bold' => true,
                'size' => 28
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
            ),
        );
        //Estilo para el subtitulo
        $subtitulo = array(
            'font' => array(
                'bold' => true,
                'size' => 24
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
            ),
        );
        //Estilo para el fondo de la celda
        $backFondo = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => 'FFFFFF')
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrap' => true
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => 'DDDDDD')
                ),
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '3498db')
            ),
        );
        //fusionando titulo
        $tabTitulo = 1;
        $phpExcel->getActiveSheet()->mergeCells('A' . $tabTitulo . ':I' . $tabTitulo);
        $phpExcel->getActiveSheet()->getStyle('A' . $tabTitulo . ':I' . $tabTitulo)->applyFromArray($titulo);
        //fusionanado subtitulo
        $tabSubtitulo = 2;
        $phpExcel->getActiveSheet()->mergeCells('A' . $tabSubtitulo . ':I' . $tabSubtitulo);
        $phpExcel->getActiveSheet()->getStyle('A' . $tabSubtitulo . ':I' . $tabSubtitulo)->applyFromArray($subtitulo);
                
        //fusionando Tab2
        $tab2 = 4;
        $phpExcel->getActiveSheet()->getStyle('A' . $tab2 . ':I' . $tab2)->applyFromArray($backFondo);
        //altura en la fila
        $phpExcel->getActiveSheet()->getRowDimension($tabTitulo)->setRowHeight(46);
        $phpExcel->getActiveSheet()->getRowDimension($tabSubtitulo)->setRowHeight(33);
        $phpExcel->getActiveSheet()->getRowDimension($tab2)->setRowHeight(38);
        //Titulo de nombres pie excel
        $prestasi->setCellValue('A' . $tabTitulo, 'SISTEMA DE REGISTRO DE ASISTENCIA');
        $prestasi->setCellValue('A' . $tabSubtitulo, 'REPORTE DE ASISTENCIA DETALLADO');
        //border
        $phpExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $phpExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $phpExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $phpExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $phpExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $phpExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $phpExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $phpExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $phpExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);

        $numerNombre = 4;
        $prestasi->setCellValue('A' . $numerNombre, 'N°');
        $prestasi->setCellValue('B' . $numerNombre, 'SEDE');
        $prestasi->setCellValue('C' . $numerNombre, 'LOCAL');
        $prestasi->setCellValue('D' . $numerNombre, 'CARGO');
        $prestasi->setCellValue('E' . $numerNombre, 'DNI');
        $prestasi->setCellValue('F' . $numerNombre, 'APELLIDOS');
        $prestasi->setCellValue('G' . $numerNombre, 'NOMBRES');
        $prestasi->setCellValue('H' . $numerNombre, 'AULA');
        $prestasi->setCellValue('I' . $numerNombre, 'ASISTENCIA');

        $data = $this->modeloMonitor->getDetalleRegistro();

        $rowexcel = 4;
        $numero = 0;
        foreach ($data as $row) {
            $rowexcel++;
            $numero++;
            $prestasi->getStyle('A' . $rowexcel . ':I' . $rowexcel)->applyFromArray($borders);
            $prestasi->setCellValue('A' . $rowexcel, $numero)->getStyle('A' . $rowexcel)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $prestasi->setCellValue('B' . $rowexcel, $row['SEDE'])->getStyle('B' . $rowexcel)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $prestasi->setCellValue('C' . $rowexcel, $row['LOCAL'])->getStyle('C' . $rowexcel)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $prestasi->setCellValue('D' . $rowexcel, $row['CARGO'])->getStyle('D' . $rowexcel)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $prestasi->setCellValue('E' . $rowexcel, $row['DNI'])->setCellValueExplicit('E' . $rowexcel, $row['DNI'], PHPExcel_Cell_DataType::TYPE_STRING);
            $prestasi->setCellValue('F' . $rowexcel, $row['APELLIDOS'])->getStyle('F' . $rowexcel)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $prestasi->setCellValue('G' . $rowexcel, $row['NOMBRES'])->getStyle('G' . $rowexcel)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $prestasi->setCellValue('H' . $rowexcel, $row['AULA']);
            $prestasi->setCellValue('I' . $rowexcel, $row['ASISTENCIA']);
        }
        $prestasi->setTitle('Reporte de Asistencia');
        header("Content-Type: application/vnd.ms-excel");
        $nameFile = "reporte_de_cobertura_" . date("d-m-Y_his");
        header("Content-Disposition: attachment; filename=\"$nameFile.xls\"");
        header("Cache-Control: max-age=0");
        $objWriter = PHPExcel_IOFactory::createWriter($phpExcel, "Excel5");
        $objWriter->save("php://output");
    }

}
