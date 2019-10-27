<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function separar($delimitador, $string) {
    echo explode($delimitador, $string);
}

function getDataBr($data = null) {

    $dt = $data == null ? null : $data;
    if (!is_null($dt)) {
        $all = explode(' ', $data);
        $dt = explode('-', $all[0]);
        $dt = $dt[2] . "/" . $dt[1] . "/" . $dt[0] . ' ' . $all[1];
    }
    return $dt;
}

function validDate($data = null, $edite = 0) {

    if ($data == null && $edite = 1) {
        return true;
    } else {
        //print_r($data);
        $dt = explode("/", $data);
        if ($dt[2] < 1900 || $dt[0] > 31 || $dt[1] > 12) {
            return false;
        } else {
            $value = checkdate($dt[1], $dt[0], $dt[2]);
            //checkdate(month, day, year)
            return $value;
        }
    }
}

function validaSenha($senha = null, $validaSenha = null) {

    $validaSenha = trim($senha) == trim($validaSenha) ? true : false;
    if (preg_match('/^[a-zA-Z0-9]+/', $senha) && $validaSenha) {
        $validaSenha = true;
    } else {
        $validaSenha = false;
    }
    return $validaSenha;
}

function logged() {
    $CI = get_instance();
    $logged = $CI->session->userdata('logged');
    if (!$logged)
        redirect(base_url('/'));
}

function getDocumento($email = NULL, $model = NULL) {
    $CI = get_instance();
    $fk_cadastro = $CI->$model->getIdCadastro($email);
    $data = NULL;
    if (is_null($fk_cadastro)) {
        $data['imagem'] = NULL;
    } else {
        if (isset($fk_cadastro->id)) {
            $img = $CI->$model->getImage($fk_cadastro->id);
            $data['imagem'] = !is_null($img) ? $img : null;
        }
        return $data;
    }
}

function getDoc($id_cadastro = NULL, $tipo = NULL) {

    $CI = get_instance();
    $CI->db->SELECT('count(*) as count');
    $CI->db->WHERE('tipo', $tipo);
    $CI->db->WHERE('fk_cadastro', $id_cadastro);
    $result = $CI->db->GET('documentos');
    return $result->row()->count;
}

function getImage($id_cadastro = NULL, $tipo = NULL) {

    $CI = get_instance();
    $img = getDoc($id_cadastro, $tipo);
    if (!is_null($id_cadastro) && $img > 0) {
        $CI->db->SELECT('base_64,tipo');
        $CI->db->WHERE('fk_cadastro', $id_cadastro);
        $CI->db->WHERE('tipo', $tipo);
        $query = $CI->db->get('documentos');
        return $query->row();
    } else {
        return NULL;
    }
}

function getStatus($status) {
    $CI = get_instance();
    $CI->db->SELECT('id');
    $CI->db->WHERE('descricao', $status);
    $id_status = $CI->db->GET('status');
    return $id_status->row()->id;
}

function getCidade($cod_estados = NULL, $id_cidade = NULL) {
   $CI = get_instance();
   $CI->db->SELECT('id,nome');
   if(!is_null($cod_estados)){
       $CI->db->WHERE('id_estado', $cod_estados);
   }
   if(!is_null($id_cidade)){
       $CI->db->WHERE('id', $id_cidade);
   }
   $CI->db->order_by('nome');
   $cidades = $CI->db->GET('cidades')->result_array();
   if(!is_null($id_cidade)){
       return $cidades;
   } else {
       return json_encode($cidades);
   }
}

function getTipo($param, $all = 0, $seg = null) {
    $CI = get_instance();
    $query = 'SELECT id, descricao'
            . ' FROM tipo_' . $param . ''
            . ' WHERE fk_status = ' . getStatus('ativo');

    if (!is_null($seg)) {
        $query .= ' AND descricao = "' . $seg . '"';
    }

    $results = $CI->db->QUERY($query)->result_array();

    if ($param == 'veiculo') {
        $veiculos = $results;
        for ($i = 0; $i < count($veiculos); $i++) {
            $veiculos[$i]['descricao'] = ajusteDescricao($veiculos[$i]['descricao']);
        }

        return $veiculos;
    }

    return $results;
}

function getEstado($id = null) {
    $CI = get_instance();
    if (!is_null($id)) {
        $CI->db->SELECT('id,sigla');
        $CI->db->WHERE('id', $id);
        $CI->db->order_by('sigla');
        $result = $CI->db->get('estados');
        return $result->result_array();
    } else {
        $result = $CI->db->get('estados');
        return $result->result_array();
    }
}

function sendEmail($setor = NULL, $data = NULL, $list = NULL) {

    $CI = get_instance();
    $CI->load->library('email');
    $CI->email->from("e-Logistics", "e-Logistics");
    if ($setor == "cadastro") {

        $CI->email->subject("Novo Cadastro!");
        // $CI->email->to("suporte@tnetdigital.com.br", "comercial@tnetdigital.com.br");
        $CI->email->to("victor.crepaldi@tnetdigital.com.br");
    } else if ($setor == "landing") {

        $CI->email->subject("Cotação - e-Logistics");
        $CI->email->to("nao-responder@tnetdigital.com.br");
        $CI->email->bcc($list);
    }

    $CI->email->message($data);
    $enviar = $CI->email->send();
    if (!$enviar) {
        echo "<script> alert('Erro ao enviar o e-mail, por favor, verifique se esta correto e tente novamente.');</script>";
        return false;
    } else {
        return true;
    }
}

function removeSpecialChar($string) {
    $simbolos = array("(", ")", "-", ".", "/", "_");
    return str_replace($simbolos, "", $string);
}

function insertCheckin($checkin) {
    $CI = get_instance();
    $CI->db->insert('checkin', $checkin);
}

function insertImage($id_cadastro = NULL, $image = NULL, $tipo = NULL, $veiculo = NULL, $veiculo_edit = NULL, $id_veiculo = NULL) {

    $CI = get_instance();
    $img = getDoc($id_cadastro, $tipo);
    //echo $id_veiculo; die();
    if ((!is_null($veiculo) && is_null($veiculo_edit)) || (!is_null($id_cadastro) && $img < 1)) {
        $dados = array('fk_cadastro' => $id_cadastro,
            'fk_veiculo' => $id_veiculo,
            'base_64' => $image,
            'tipo' => $tipo
        );
        $CI->db->insert('documentos', $dados);
        $result = $CI->db->insert_id();
        return $result;
    } else {
        $dados = array('base_64' => $image,
            'tipo' => $tipo);
        //echo $img; die();
        //print_r($dados); die();
        $CI->db->WHERE('fk_cadastro', $id_cadastro);
        $CI->db->WHERE('tipo', $tipo);
        $CI->db->WHERE('fk_veiculo', $id_veiculo);
        $CI->db->update('documentos', $dados);
        return true;
    }
}

function getNPedido() {
    $CI = get_instance();
    $CI->db->insert("aux_n_pedido", "");
    $n_pedido = $CI->db->insert_id();
    return str_pad($n_pedido, 7, 0, STR_PAD_LEFT);
}

function fixValor($valor) {
    $v1 = explode(".", $valor);

    if (strlen($v1[0]) == 2) {
        $v = $v1[0];
        $valorFim = $v[0] . $v[1] . "," . $v1[1];
    } else if (strlen($v1[0]) == 3) {
        $v = $v1[0];
        $valorFim = $v[0] . $v[1] . $v[2] . "," . $v1[1];
    } else if (strlen($v1[0]) == 4) {
        $v = $v1[0];
        $valorFim = $v[0] . "." . $v[1] . $v[2] . $v[3] . "," . $v1[1];
    } else if (strlen($v1[0]) == 5) {
        $v = $v1[0];
        $valorFim = $v[0] . $v[1] . "." . $v[2] . $v[3] . $v[4] . "," . $v1[1];
    } else if (strlen($v1[0]) == 6) {
        $v = $v1[0];
        $valorFim = $v[0] . $v[1] . $v[2] . "." . $v[3] . $v[4] . $v[5] . "," . $v1[1];
    }

    return $valorFim;
}

function unfixValor($valor) {
    $valor2 = str_replace(".", "", $valor);
    $valorFim = str_replace(",", ".", $valor2);

    echo $valorFim;
    die();

    return $valorFim;
}

function getPagination($tabela = NULL, $view = null) {
    $status = getStatus('ativo');
    $CI = get_instance();
    $CI->db->SELECT('count(*) as total');
    $CI->db->WHERE('id_status', $status);
    $result = $CI->db->get($tabela)->result()[0];
    $qtd_reg = $result->total;
    $qtd_por_pagina = 10; // qtd de registros por página.
    $config = array(
        "base_url" => base_url($view),
        "per_page" => $qtd_por_pagina,
        "num_links" => 3,
        "uri_segment" => 3,
        "total_rows" => $qtd_reg,
        "full_tag_open" => "<ul class='pagination' id='ajaxPagination'>",
        "full_tag_close" => "</ul>",
        "first_link" => FALSE,
        "last_link" => FALSE,
        "first_tag_open" => "<li>",
        "first_tag_close" => "</li>",
        "prev_link" => "Anterior",
        "prev_tag_open" => "<li class='prev'>",
        "prev_tag_close" => "</li>",
        "next_link" => "Próxima ",
        "next_tag_open" => "<li class='next' style='margin-left:5px;'>",
        "next_tag_close" => "</li>",
        "last_tag_open" => "<li>",
        "last_tag_close" => "</li>",
        "cur_tag_open" => "<li class='active' style='margin-left:5px; margin-right:5px; font-weight: bold;
            '>
            <a href=" . base_url($view . "/") . ">",
        "cur_tag_close" => "</a></li>",
        "num_tag_open" => "<li>",
        "num_tag_close" => "</li>"
    );
    $CI->pagination->initialize($config);
    $data['pagination'] = $CI->pagination->create_links();
    $data['per_page'] = $config['per_page'];
    $CI->load->library('pagination');
    $data['offset'] = ($CI->uri->segment(3) != NULL) ? $CI->uri->segment(3) : 0;
    return $data;
}

function layout($layout, $data = NULL) {
//            $this->load->view("Pedido/email", $data);
    $l = "<!DOCTYPE html>
                <html>
                    <head>
                        <meta charset='UTF-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1'>
                        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' integrity='sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf' crossorigin='anonymous'>
                        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' integrity='sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf' crossorigin='anonymous'>
                        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
                        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>
                    </head>

                    <body>
                        ";
                        if ($layout == "home_transportadora") {
                            $l .= "

                        <h1 style='text-align: center'>Cadastro E-Logistics</h1>
                        <h2>Dados do Cliente</h2>
                        <div style='float:left; width:100%;'>
                            <div style='float:left; width:33%;'>
                                <h3>Nome</h3>
                                <p style='font-size:16px'>" . $data['nome'] . "</p>
                            </div>

                            <div style='float:left; width:34%;'>
                                <h3>Razão Social</h3>
                                <p style='font-size:16px'>" . $data['razao_social'] . "</p>
                            </div>

                            <div style='float:left; width:33%;'>
                                <h3>CNPJ</h3>
                                <p style='font-size:16px'>" . $data['cnpj'] . "</p>
                            </div>
                        </div>

                        <hr>

                        <div style='float:left; width:100%;'>
                            <div style='float:left; width:33%;'>
                                <h3>Telefone</h3>
                                <p style='font-size:16px'>" . $data['telefone'] . "</p>
                            </div>

                            <div style='float:left; width:34%;'>
                                <h3>Celular</h3>
                                <p style='font-size:16px'>" . $data['celular'] . "</p>
                            </div>
                            <div style='float:left; width:33%;'>
                                <h3>E-mail</h3>
                                <p style='font-size:16px'>" . $data['email'] . "</p>
                            </div>
                        </div>

                        <hr>

                        <div style='float:left; width:100%;'>
                            <div style='float:left; width:33%;'>
                                <h3>Segmento</h3>
                                <p style='font-size:16px'>" . $data['segmento'][0]['nome'] . "</p>
                            </div>
                            <div style='float:left; width:34%;'>
                                <h3>Região</h3>
                                <p style='font-size:16px'>" . $data['regiao'] . "</p>
                            </div>
                        </div>


                        ";
                    }else if($layout == "contato") {
                            $l.="

                        <h1>Formulário de Contato - Transportador</h1>
                        <div style='float:left; width:100%;'>
                            <div style='float:left; width:33%;'>
                                <h3>Nome</h3>
                                <p style='font-size:16px'>" . $data['nome'] . "</p>
                            </div>
                            <div style='float:left; width:34%;'>
                                <h3>E-mail</h3>
                                <p style='font-size:16px'>" . $data['email'] . "</p>
                            </div>
                            <div style='float:left; width:33%;'>
                                <h3>Telefone</h3>
                                <p style='font-size:16px'>" . $data['telefone'] . "</p>
                            </div>
                        </div>
                        <div style='float:left; width:100%;'>
                            <div style='float:left;'>
                                <h3>Mensagem</h3>
                                <p style='font-size:16px'>" . $data['mensagem'] . "</p>
                            </div>
                        </div>
                        ";
                    }else if($layout == "cadastro_embarcador") {
                            $l.="

                        <h1>Formulário Home - Embarcador</h1>
                        <div style='float:left; width:100%;'>
                            <div style='float:left; width:25%;'>
                                <h5>Nome</h5>
                                <p style='font-size:16px'>" . $data['nome'] . "</p>
                            </div>
                            <div style='float:left; width:25%;'>
                                <h5>E-mail</h5>
                                <p style='font-size:16px'>" . $data['email'] . "</p>
                            </div>
                            <div style='float:left; width:25%;'>
                                <h5>Celular</h5>
                                <p style='font-size:16px'> " . $data['celular'] . "</p>
                            </div>
                            ";
                            if($data['segmento'][0]['nome'] != "Outro"){
                                    $l.="
                                    <div style='float:left; width:25%;'>
                                        <h5>Segmento</h5>
                                        <p style='font-size:16px'> " . $data['segmento'][0]['nome'] . "</p>
                                    </div>
                                    ";
                            }
                            $l.="
                        </div>";
                        if($data['segmento'][0]['nome'] == "Outro"){
                            $l.="
                                <hr>

                                <div style='float:left; width:100%;'>
                                    <div style='float:left; width:25%;'>
                                        <h5>Segmento</h5>
                                        <p style='font-size:16px'> " . $data['segmento'][0]['nome'] . "</p>
                                    </div>
                                    <div style='float:left; width:25%;'>
                                        <h5>Qual?</h5>
                                        <p style='font-size:16px'> " . $data['outro'] . "</p>
                                    </div>
                                </div>
                            ";
                        }

                    }

    $l .= "<div style='background-image: linear-gradient(to right, #0b3c7b , #006fff); height:20px; float:left; width:100%;'>
                        &nbsp;
                    </div>
                </body>
            </html>";
    return $l;
}

function layoutLanding($data){
    $l = "<!DOCTYPE html>
                <html>
                    <head>
                        <meta charset='UTF-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1'>
                        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' integrity='sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf' crossorigin='anonymous'>
                        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' integrity='sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf' crossorigin='anonymous'>
                        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
                        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>
                    </head>

                    <body>
                        ";

    if($data["tipo"] == "aereo"){
        $l .= "
        <h1 style='text-align: center; margin-bottom:15px;'>Cotação - Aéreo</h1>
        <div style='float:left; width:100%;'>
            <div style='float:left; width:33%;'>
                <h3>Nome da Empresa</h3>
                <p style='font-size:16px'>" . $data['nome'] . "</p>
            </div>
            <div style='float:left; width:33%;'>
                <h3>CNPJ</h3>
                <p style='font-size:16px'>" . $data['cnpj'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:33%;'>
                <h3>Origem</h3>
                <p style='font-size:16px'>" . $data['origem'] . "</p>
            </div>
            <div style='float:left; width:33%;'>
                <h3>Destino</h3>
                <p style='font-size:16px'>" . $data['destino'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:33%;'>
                <h3>Tipo de Embalagem</h3>
                <p style='font-size:16px'>" . $data['tipo_embalagem'] . "</p>
            </div>
            <div style='float:left; width:33%;'>
                <h3>Quantidade</h3>
                <p style='font-size:16px'>" . $data['qtd_volume'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:33%;'>
                <h3>Unidade de Medida da Carga</h3>
                <p style='font-size:16px'>" . $data['medida'] . "</p>
            </div>
            <div style='float:left; width:34%;'>
                <h3>Altura</h3>
                <p style='font-size:16px'>" . $data['altura'] . "</p>
            </div>
            <div style='float:left; width:33%;'>
                <h3>Largura</h3>
                <p style='font-size:16px'>" . $data['largura'] . "</p>
            </div>
        </div>

        <div style='float:left; width:100%;'>
            <div style='float:left;'>
                <h3>Descrição Geral</h3>
                <p style='font-size:16px; word-break: keep-all;'>" . $data['descricao'] . "</p>
            </div>
        </div>
        ";
    } else if($data["tipo"] == "armazenagem"){
        $l .= "
        <h1 style='text-align: center; margin-bottom:15px;'>Cotação - Armazenagem</h1>
        <div style='float:left; width:100%;'>
            <div style='float:left; width:33%;'>
                <h3>Nome da Empresa</h3>
                <p style='font-size:16px'>" . $data['nome'] . "</p>
            </div>
            <div style='float:left; width:33%;'>
                <h3>CNPJ</h3>
                <p style='font-size:16px'>" . $data['cnpj'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Valor(R$)</h3>
                <p style='font-size:16px'>" . $data['valor'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Peso(Kg)</h3>
                <p style='font-size:16px'>" . $data['peso'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Quantidade</h3>
                <p style='font-size:16px'>" . $data['qtd_volume'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>&nbsp;</h3>
                <p style='font-size:16px'>&nbsp;</p>
            </div>
        </div>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Unidade de Medida da Carga</h3>
                <p style='font-size:16px'>" . $data['medida'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Altura</h3>
                <p style='font-size:16px'>" . $data['altura'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Largura</h3>
                <p style='font-size:16px'>" . $data['largura'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Comprimento</h3>
                <p style='font-size:16px'>" . $data['comprimento'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left;'>
                <h3>Descrição Geral</h3>
                <p style='font-size:16px; word-break: keep-all;'>" . $data['descricao'] . "</p>
            </div>
        </div>
        ";
    } else if($data["tipo"] == "carga-completa"){
        $l .= "
        <h1 style='text-align: center; margin-bottom:15px;'>Cotação - Carga Completa</h1>
        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Nome da Empresa</h3>
                <p style='font-size:16px'>" . $data['nome'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>CNPJ</h3>
                <p style='font-size:16px'>" . $data['cnpj'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>E-mail</h3>
                <p style='font-size:16px'>" . $data['email'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Contato</h3>
                <p style='font-size:16px'>" . $data['telefone'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Origem</h3>
                <p style='font-size:16px'>" . $data['origem'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Destino</h3>
                <p style='font-size:16px'>" . $data['destino'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Valor(R$)</h3>
                <p style='font-size:16px'>" . $data['valor'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Peso(Kg)</h3>
                <p style='font-size:16px'>" . $data['peso'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Quantidade</h3>
                <p style='font-size:16px'>" . $data['qtd_volume'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Tipo de Caminhão</h3>
                <p style='font-size:16px'>" . $data['tipo_caminhao'] . "</p>
            </div>
        </div>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Unidade de Medida da Carga</h3>
                <p style='font-size:16px'>" . $data['medida'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Altura</h3>
                <p style='font-size:16px'>" . $data['altura'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Largura</h3>
                <p style='font-size:16px'>" . $data['largura'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left;'>
                <h3>Descrição Geral</h3>
                <p style='font-size:16px; word-break: keep-all;'>" . $data['descricao'] . "</p>
            </div>
        </div>
        ";
    } else if($data["tipo"] == "carga-fracionada"){
        $l .= "
        <h1 style='text-align: center; margin-bottom:15px;'>Cotação - Carga Fracionada</h1>
        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Nome da Empresa</h3>
                <p style='font-size:16px'>" . $data['nome'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>CNPJ</h3>
                <p style='font-size:16px'>" . $data['cnpj'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>E-mail</h3>
                <p style='font-size:16px'>" . $data['email'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Contato</h3>
                <p style='font-size:16px'>" . $data['telefone'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Origem</h3>
                <p style='font-size:16px'>" . $data['origem'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Destino</h3>
                <p style='font-size:16px'>" . $data['destino'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Valor(R$)</h3>
                <p style='font-size:16px'>" . $data['valor'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Peso(Kg)</h3>
                <p style='font-size:16px'>" . $data['peso'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Quantidade</h3>
                <p style='font-size:16px'>" . $data['qtd_volume'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Tipo de Caminhão</h3>
                <p style='font-size:16px'>" . $data['tipo_caminhao'] . "</p>
            </div>
        </div>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Unidade de Medida da Carga</h3>
                <p style='font-size:16px'>" . $data['medida'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Altura</h3>
                <p style='font-size:16px'>" . $data['altura'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Largura</h3>
                <p style='font-size:16px'>" . $data['largura'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left;'>
                <h3>Descrição Geral</h3>
                <p style='font-size:16px; word-break: keep-all;'>" . $data['descricao'] . "</p>
            </div>
        </div>
        ";
    } else if($data["tipo"] == "carga-fracionada"){
        $l .= "
        <h1 style='text-align: center; margin-bottom:15px;'>Cotação - Carga Fracionada</h1>
        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Nome da Empresa</h3>
                <p style='font-size:16px'>" . $data['nome'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>CNPJ</h3>
                <p style='font-size:16px'>" . $data['cnpj'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>E-mail</h3>
                <p style='font-size:16px'>" . $data['email'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Contato</h3>
                <p style='font-size:16px'>" . $data['telefone'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Origem</h3>
                <p style='font-size:16px'>" . $data['origem'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Destino</h3>
                <p style='font-size:16px'>" . $data['destino'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Valor(R$)</h3>
                <p style='font-size:16px'>" . $data['valor'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Peso(Kg)</h3>
                <p style='font-size:16px'>" . $data['peso'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Quantidade</h3>
                <p style='font-size:16px'>" . $data['qtd_volume'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Tipo de Caminhão</h3>
                <p style='font-size:16px'>" . $data['tipo_caminhao'] . "</p>
            </div>
        </div>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Unidade de Medida da Carga</h3>
                <p style='font-size:16px'>" . $data['medida'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Altura</h3>
                <p style='font-size:16px'>" . $data['altura'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Largura</h3>
                <p style='font-size:16px'>" . $data['largura'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left;'>
                <h3>Descrição Geral</h3>
                <p style='font-size:16px; word-break: keep-all;'>" . $data['descricao'] . "</p>
            </div>
        </div>
        ";
    } else if($data["tipo"] == "motoboy"){
        $l .= "
        <h1 style='text-align: center; margin-bottom:15px;'>Cotação - Motoboy</h1>
        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Nome da Empresa</h3>
                <p style='font-size:16px'>" . $data['nome'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>CNPJ</h3>
                <p style='font-size:16px'>" . $data['cnpj'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Origem</h3>
                <p style='font-size:16px'>" . $data['origem'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Destino</h3>
                <p style='font-size:16px'>" . $data['destino'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Valor(R$)</h3>
                <p style='font-size:16px'>" . $data['valor'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Peso(Kg)</h3>
                <p style='font-size:16px'>" . $data['peso'] . "</p>
            </div>
        </div>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Unidade de Medida da Carga</h3>
                <p style='font-size:16px'>" . $data['medida'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Altura</h3>
                <p style='font-size:16px'>" . $data['altura'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Largura</h3>
                <p style='font-size:16px'>" . $data['largura'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Comprimento</h3>
                <p style='font-size:16px'>" . $data['comprimento'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left;'>
                <h3>Descrição Geral</h3>
                <p style='font-size:16px; word-break: keep-all;'>" . $data['descricao'] . "</p>
            </div>
        </div>
        ";
    } else if($data["tipo"] == "mudanca"){
        $l .= "
        <h1 style='text-align: center; margin-bottom:15px;'>Cotação - Mudança</h1>
        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Nome da Empresa</h3>
                <p style='font-size:16px'>" . $data['nome'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>CNPJ</h3>
                <p style='font-size:16px'>" . $data['cnpj'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Origem</h3>
                <p style='font-size:16px'>" . $data['origem'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Destino</h3>
                <p style='font-size:16px'>" . $data['destino'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Tipo de Mudança</h3>
                <p style='font-size:16px'>" . $data['mudanca_tipo'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>&nbsp;</h3>
                <p style='font-size:16px'>" . $data['mudanca_tipo_2'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left;'>
                <h3>Relação de Mobília</h3>
                <p style='font-size:16px'>" . $data['mobilia'] . "</p>
            </div>
        </div>
        ";
    } else if($data["tipo"] == "quimico"){
        $l .= "
        <h1 style='text-align: center; margin-bottom:15px;'>Cotação - Químico</h1>
        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Nome da Empresa</h3>
                <p style='font-size:16px'>" . $data['nome'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>CNPJ</h3>
                <p style='font-size:16px'>" . $data['cnpj'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Origem</h3>
                <p style='font-size:16px'>" . $data['origem'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Destino</h3>
                <p style='font-size:16px'>" . $data['destino'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Valor(R$)</h3>
                <p style='font-size:16px'>" . $data['valor'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Numeração ONU</h3>
                <p style='font-size:16px'>" . $data['onu'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Motorista com MOPP?</h3>
                <p style='font-size:16px'>" . $data['mopp'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Química Classificada?</h3>
                <p style='font-size:16px'>" . $data['quimica_classificada'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left;'>
                <h3>Descrição Geral</h3>
                <p style='font-size:16px; word-break: keep-all;'>" . $data['descricao'] . "</p>
            </div>
        </div>
        ";
    } else if($data["tipo"] == "refrigerado"){
        $l .= "
        <h1 style='text-align: center; margin-bottom:15px;'>Cotação - Refrigerado</h1>
        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Nome da Empresa</h3>
                <p style='font-size:16px'>" . $data['nome'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>CNPJ</h3>
                <p style='font-size:16px'>" . $data['cnpj'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Origem</h3>
                <p style='font-size:16px'>" . $data['origem'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Destino</h3>
                <p style='font-size:16px'>" . $data['destino'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Unidade de Medida da Carga</h3>
                <p style='font-size:16px'>" . $data['medida'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Altura</h3>
                <p style='font-size:16px'>" . $data['altura'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Largura</h3>
                <p style='font-size:16px'>" . $data['largura'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Comprimento</h3>
                <p style='font-size:16px'>" . $data['comprimento'] . "</p>
            </div>
        </div>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Valor(R$)</h3>
                <p style='font-size:16px'>" . $data['valor'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Peso(kg)</h3>
                <p style='font-size:16px'>" . $data['peso'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left;'>
                <h3>Descrição Geral</h3>
                <p style='font-size:16px; word-break: keep-all;'>" . $data['descricao'] . "</p>
            </div>
        </div>
        ";
    } else if($data["tipo"] == "residuos"){
        $l .= "
        <h1 style='text-align: center; margin-bottom:15px;'>Cotação - Resíduos</h1>
        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Nome da Empresa</h3>
                <p style='font-size:16px'>" . $data['nome'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>CNPJ</h3>
                <p style='font-size:16px'>" . $data['cnpj'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Origem</h3>
                <p style='font-size:16px'>" . $data['origem'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Destino</h3>
                <p style='font-size:16px'>" . $data['destino'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Unidade de Medida da Carga</h3>
                <p style='font-size:16px'>" . $data['medida'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Altura</h3>
                <p style='font-size:16px'>" . $data['altura'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Largura</h3>
                <p style='font-size:16px'>" . $data['largura'] . "</p>
            </div>
        </div>

        <div style='float:left; width:100%;'>
            <div style='float:left; width:25%;'>
                <h3>Valor(R$)</h3>
                <p style='font-size:16px'>" . $data['valor'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Peso(kg)</h3>
                <p style='font-size:16px'>" . $data['peso'] . "</p>
            </div>
            <div style='float:left; width:25%;'>
                <h3>Segmento</h3>
                <p style='font-size:16px'>" . $data['segmento'] . "</p>
            </div>
        </div>

        <hr>

        <div style='float:left; width:100%;'>
            <div style='float:left;'>
                <h3>Descrição Geral</h3>
                <p style='font-size:16px; word-break: keep-all;'>" . $data['descricao'] . "</p>
            </div>
        </div>
        ";
    }

    $l .= "<div style='background-image: linear-gradient(to right, #0b3c7b , #006fff); height:20px; float:left; width:100%;'>
                        &nbsp;
                    </div>
                </body>
            </html>";
    return $l;
}
