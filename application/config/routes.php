<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

$route['default_controller'] = "portada/portada_controlador";
$route['login'] = "acceso/login";
$route['logout'] = "acceso/logout";

//-- EMPRESA
$route['empresa'] = "empresa/empresa_controlador";

//-- CATEOGORÍA
$route['categoria'] = "categoria/categoria_controlador";

//-- UBICACIÓN
$route['ubicacion'] = "ubicacion/ubicacion_controlador";

//--USUARIOS
$route['usuarios'] = "usuario/usuario_controlador";
$route['crear-usuario'] = "usuario/usuario_controlador/crear";
$route['editar-usuario'] = "usuario/usuario_controlador/editar";
$route['verificar-usuario'] = "usuario/usuario_controlador/verificar_usuario";

//--POSTULANTES
$route['postulantes'] = "postulante/postulante_controlador";
$route['postulantes-listado-ajax'] = "postulante/postulante_controlador/listado_ajax";
$route['crear-postulante'] = "postulante/postulante_controlador/crear";
$route['editar-postulante'] = "postulante/postulante_controlador/editar";
$route['verificar-postulante'] = "";

//--LOCAL SEDE
$route['buscar-local'] = "postulante/postulante_controlador/buscar_local";

//-- LOCAL DE APLICACIÓN
$route['local-de-aplicacion'] = "local/local_controlador";
$route['local-listado-ajax'] = "local/local_controlador/listado_ajax";
$route['crear-local'] = "local/local_controlador/crear";
$route['editar-local'] = "local/local_controlador/editar";

//--CARGAR ARCHIVO
$route['cargar-archivo'] = "archivo/archivo_controlador";
$route['upload-archivo'] = "archivo/archivo_controlador/upload_archivo";

//Reporte
$route['reporte-detallado'] = "monitor/monitor/reporte_detallado";
$route['exportar-detallado'] = "monitor/exportar/exportar_detallado";

/* End of file routes.php */
/* Location: ./application/config/routes.php */