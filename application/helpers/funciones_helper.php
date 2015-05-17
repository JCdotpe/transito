<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');




if (!function_exists('tipo_postulante')) {

    function tipo_postulante($tipo) {
        if ($tipo == 'T') {
            $res = "TITULAR";
        } else {
            $res = "RESERVA";
        }
        return $res;
    }

}

if (!function_exists('verificar_estado')) {

    function verificar_estado($estado) {
        if ($estado == 1) {
            $res = "<i class='ion-record text-success'></i> ACTIVO ";
        } else {
            $res = "<i class='ion-record text-danger'></i> INACTIVO ";
        }
        return $res;
    }

}

if (!function_exists('notildes')) {

    function notildes($nombre) {
        $find = array('Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ', 'á', 'é', 'í', 'ó', 'ú', 'ñ');
        $repl = array('A', 'E', 'I', 'O', 'U', 'N', 'a', 'e', 'i', 'o', 'u', 'n');
        $nombreLimpio = str_replace($find, $repl, $nombre);
        return $nombreLimpio;
    }

}

if (!function_exists('tildesMayuscula')) {

    function tildesMayuscula($nombre) {
        $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
        $repl = array('Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ');
        $nombreLimpio = str_replace($find, $repl, $nombre);
        return $nombreLimpio;
    }

}


if (!function_exists('cerosIzquierda')) {

    function cerosIzquierda($valor, $longitud) {
        $res = str_pad($valor, $longitud, '0', STR_PAD_LEFT);
        return $res;
    }

}

if (!function_exists('nullCero')) {

    function nullCero($valor) {
        $res = ($valor == NULL) ? 0 : $valor;
        return $res;
    }

}

if (!function_exists('nullCeroPorcentaje')) {

    function nullCeroPorcentaje($valor) {
        $res = ($valor == NULL) ? number_format(0.00, 2) : $valor;
        return $res;
    }

}

if (!function_exists('colorResult')) {

    function colorResult($valor) {
        switch ($valor) {
            case 100:
                $res = "verdeResult";
                break;
            case $valor < 100 && $valor >= 1:
                $res = "ambarResult";
                break;
            case $valor < 1:
                $res = "rojoResult";
                break;
        }
        return $res;
    }

}

if (!function_exists('colorTipoAula')) {

    function colorTipoAula($tipo) {
        switch ($tipo) {
            case 'C':
                $colorTipo = "text-yellow";
                break;
            case 'D':
                $colorTipo = "text-red";
                break;
            case 'N':
                $colorTipo = "text-green";
                break;
            default :
                $colorTipo = "text-light-blue";
                break;
        }
        return $colorTipo;
    }

}

if (!function_exists('jsonRemoveUnicodeSequences')) {

    function jsonRemoveUnicodeSequences($struct) {
        return preg_replace("/\\\\u([a-f0-9]{4})/e", "iconv('UCS-4LE','UTF-8',pack('V', hexdec('U$1')))", json_encode($struct));
    }

}

if (!function_exists('mostrarTildesJson')) {

    function mostrarTildesJson($struct) {
        $rep = preg_replace("/\\\\u([a-f0-9]{4})/e", "iconv('UCS-4LE','UTF-8',pack('V', hexdec('U$1')))", json_encode($struct));
        return stripslashes($rep);
    }

}


if (!function_exists('convertirFecha')) {

    function convertirFecha($varFecha, $format = null) {
        if (!is_null($format)) {
            return date($format, strtotime($varFecha));
        }
        return date("d-m-Y H:i:s", strtotime($varFecha));
    }

}

//if (!function_exists('dateUnix')) {
//
//    function dateUnix($date, $format) {
//        $ex = explode(' ', $date); //2015-02-02 18:02:02
//
//        $fecha = explode('-', $ex[0]); //2015-02-02
//        if (isset($ex[1])) {
//            $fechaNUeva = $fecha[1] . '-' . $fecha[2] . '-' . $fecha[0] . ' ' . $ex[1]; //02-02-2015 18:02:02
//            return date($format, strtotime($fechaNUeva));
//        } else {
//            $fechaNUeva = $fecha[1] . '-' . $fecha[2] . '-' . $fecha[0]; //02-02-2015 
//            return date($format, strtotime($fechaNUeva));
//        }
//    }
//
//}

if (!function_exists('dateUnix')) {

    function dateUnix($varFecha = '', $format) {
        $old_date_timestamp = strtotime(substr($varFecha, 0, -4));
        return date($format, $old_date_timestamp);
    }

}

//Añade dinamicamente archivos personalizados js en el pie de la pagina
if (!function_exists('add_js')) {

    function add_js($file = '') {
        $str = '';
        $ci = &get_instance();
        $header_js = $ci->config->item('header_js');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file AS $item) {
                $header_js[] = $item;
            }
            $ci->config->set_item('header_js', $header_js);
        } else {
            $str = $file;
            $header_js[] = $str;
            $ci->config->set_item('header_js', $header_js);
        }
    }

}

//Añade dinamicamente archivos personalizados css en el header de la pagina
if (!function_exists('add_css')) {

    function add_css($file = '') {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file AS $item) {
                $header_css[] = $item;
            }
            $ci->config->set_item('header_css', $header_css);
        } else {
            $str = $file;
            $header_css[] = $str;
            $ci->config->set_item('header_css', $header_css);
        }
    }

}

//Añade dinamicamente archivos css en el header de la pagina
if (!function_exists('put_headersCss')) {

    function put_headersCss() {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');

        foreach ($header_css AS $item) {
            $str .= '<link rel="stylesheet" href="' . base_url() . 'assets/css/' . $item . '.css"  />' . "\n";
        }

        return $str;
    }

}

//Añade dinamicamente archivos js en el pie de la pagina
if (!function_exists('put_headersJs')) {

    function put_headersJs() {
        $str = '';
        $ci = &get_instance();
        $header_js = $ci->config->item('header_js');

        foreach ($header_js AS $item) {
            $str .= '<script src="' . base_url() . 'assets/js/' . $item . '.js"></script>' . "\n";
        }

        return $str;
    }

}