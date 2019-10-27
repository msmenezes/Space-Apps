<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class dailycrop_model extends CI_Model {

    public function insertCadastro($insert) {
        $this->db->INSERT("cadastro", $insert);
        return $this->db->insert_id();
    }

    public function insertLogin($insert) {
        $this->db->INSERT("login", $insert);
        return $this->db->insert_id();
    }

    public function verify_user($email) {
	    $this->db->SELECT('count(*) as count');
    	$this->db->WHERE('email',$email);
	    $result = $this->db->GET('login');
    	return $result->row()->count;
    }

    public function getCadastro($email){
    	$this->db->SELECT('*');
    	$this->db->WHERE('email',$email);
	    $result = $this->db->GET('cadastro');
    	return $result->result_array();
    }

    public function getDadosImagem($especie){
    	$this->db->SELECT('semana,imagem');
    	$this->db->WHERE('especie',$especie);
	    $result = $this->db->GET('ciclo');
    	return $result->result_array();
    }
}
