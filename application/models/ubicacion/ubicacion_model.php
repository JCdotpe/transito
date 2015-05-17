<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ubicacion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getUbicacion() {
        return $this->db->get('reclamo')->result_array();
        
    }

    
}
