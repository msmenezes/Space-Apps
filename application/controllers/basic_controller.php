<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class basic_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('dailycrop_model');
        $this->load->helper('func_helper');
        $this->session->flashdata('message');
        $this->session->flashdata('error');
    }

    public function index() {
        //$data['segmentos'] = $this->dailycrop_model->getSegmento();
        $this->load->view('dailycrop/login.php');
    }

    public function login() {
        $data["name"] = $this->input->post("name");
        $data["email"] = $this->input->post("email");
        $verify = $this->dailycrop_model->verify_user($data['email']);
        if($verify > 0){
            $data['cadastro'] = $this->dailycrop_model->getCadastro($data['email']);
            //echo '<pre>'; print_r($data['cadastro'][0]['produto']); die();
            $this->load->view('dailycrop/index.php',$data);            
        }else{
            $this->dailycrop_model->insertLogin($data); 
            $data['cadastro'] = $this->dailycrop_model->getCadastro($data['email']);
            $this->load->view('dailycrop/index.php',$data);
        }
    }

    public function insertCadastro() {

            $insert["nome"] = $this->input->post("nome");
            $insert["email"] = $this->input->post("email");
            $insert["estado"] = $this->input->post("estado");
            $insert["cidade"] = $this->input->post("cidade");
            $insert["bairro"] = $this->input->post("bairro");
            $insert["rua"] = $this->input->post("rua");
            $insert["numero"] = $this->input->post("numero");
            $insert["celular"] = $this->input->post("telefone");
            $insert["produto"] = $this->input->post("produto");
            $insert["tipo"] = $this->input->post("tipo");
            $insert["descricao"] = $this->input->post("mensagem");
            $insert["data_plantio"] = $this->input->post("data_plantio");

        $id = $this->dailycrop_model->insertCadastro($insert);
        if (!is_null($id)) {
            //die();
            $layout = layoutLanding($insert);
            sendEmail("landing", $layout, $insert["email"]);

            //$this->session->set_flashdata('success', 'Colheita disponibilizada com sucesso!');
            redirect(base_url('/login.php'));
        } else if (is_null($id)) {
            //$this->session->set_flashdata('error', 'Erro ao comparilhar colheita, por favor tente novamente!');
            redirect(base_url('/login.php'));
        }
    }

}
