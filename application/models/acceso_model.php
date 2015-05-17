<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Acceso_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function logearme($params) {
        $sql = "SELECT * FROM admin 
                WHERE 
                    user ='" . $params['sendUser'] . "'
                    AND pass='" . $params['sendPass'] . "'";
        $query = $this->db->query($sql);
        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
        return NULL;
    }

}
