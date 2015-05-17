<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categoria_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getDataCategoria() {
        $sql= "SELECT rec.id_empresa,cat.nombre,count(rec.id_categoria) AS veces_categoria FROM reclamo AS rec LEFT JOIN categoria AS cat ON rec.id_categoria=cat.id group by rec.id_categoria";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
}
