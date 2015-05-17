<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Empresa_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getDataEmpresa() {
        $sql= "SELECT id_reclamo,empresa, count(id_empresa) AS veces_empresa FROM reclamo group by id_empresa";
        $query = $this->db->query($sql);
//        if($query->num_rows()){
//            return $query->result_array();
//        }
        return $query->result_array();
    }

}
