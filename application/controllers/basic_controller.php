<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class basic_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('dailycrop_model');
        //$this->load->helper('func_helper');
        $this->session->flashdata('message');
        $this->session->flashdata('error');
    }

    public function index() {
        //$data['segmentos'] = $this->dailycrop_model->getSegmento();
        $this->load->view('dailycrop/index.php');
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
        $id = $this->dailycrop_model->insertCadastro($insert);
        if (!is_null($id)) {
            //die();
            //$layout = layoutLanding($insert);
            //sendEmail("landing", $layout, $emailList);

            //$this->session->set_flashdata('success', 'Colheita disponibilizada com sucesso!');
            redirect(base_url('/'));
        } else if (is_null($id)) {
            //$this->session->set_flashdata('error', 'Erro ao comparilhar colheita, por favor tente novamente!');
            redirect(base_url('/'));
        }
    }

    public function Contato() {

        $insert["nome"] = $this->input->post("nome");
        $insert["email"] = $this->input->post("email");
        $insert["telefone"] = $this->input->post("telefone");
        $insert["mensagem"] = $this->input->post("mensagem");
        $insert['segmento'] = "contato";
        $layout = layout("contato", $insert);
        sendEmail("cadastro", $layout);
        $this->session->set_flashdata('success', "Mensagem Enviada! Em breve um de nossos especialistas entrará em contato!");
        redirect(base_url("/"));

    }

}
