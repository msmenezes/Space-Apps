<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class dailycrop_model extends CI_Model {

    public function insertCadastro($insert) {
        $this->db->INSERT("cadastro", $insert);
        return $this->db->insert_id();
    }

}
