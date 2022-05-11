<?php

    class Tipos extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model("Tipo");
        }

        public function todosTipos()
        {
            $this->load->model('Produto');
            $tipos = $this->Produto->getTipos();
            $this->template->load('templates/template', 'templates/user/todostipos', [
                'tipos' => $tipos
            ]);
        }

        public function novoTipo()
        {
            $this->template->load("templates/template", "templates/tipo/novotipo");
        }

        public function salvarNovoTipo()
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules(
                'nome', 'Nome', 'required|min_length[3]|is_unique[tipo.tipo]',
                array(
                    'required' => 'Você deve preencher o %s corretamente.',
                    'min_length' => 'O nome deve ser valido minimo 3 letras',
                    'is_unique' => 'Tipo já cadastrado.'
                    )
            );

            if (($this->form_validation->run() == FALSE)) {
                $erros = validation_errors();
                $this->template->load("templates/template", "templates/tipo/novotipo",["erros" => $erros]);
                return;
            }

            $retorno = $this->Tipo->salvar($_POST["nome"]);

            if ( $retorno ) {
                $msg['sucesso'] = 'Tipo de produto Cadastrado com sucesso!';
            } else {
                $msg['erros'] = 'Falha ao cadastrar Tipo de produto!';
            }
            $this->template->load("templates/template", "templates/tipo/novotipo", $msg);

        }

        public function alterarTipo()
        {
            if (!isset($_SESSION["padoca"]) || !$_SESSION['padoca']['admin'] == 1) {
                header("location: /codeigniter/index.php/login");
            }

            $id = $_GET["id"];
            $retorno = $this->Tipo->getTipos($id);

            if (!$retorno) {
                $this->template->load("templates/template","templates/tipo/alterarTipo", ['produtoNotFound' => 'Tipod de Produto não encontrado!']);
                return;
            }

            $this->template->load("templates/template","templates/tipo/alterarTipo", [
                'tipo' => $retorno[0],
            ]);
        }

        public function salvaralteracaotipo()
        {
            if (!isset($_SESSION["padoca"]) || !$_SESSION['padoca']['admin'] == 1) {
                header("location: /codeigniter/index.php/login");
            }
            if ($tipo = $this->Tipo->buscarId($_POST['id'])[0]) {
                $this->load->library('form_validation');

                if ($_POST['nome'] != $tipo->tipo) {
                    $this->form_validation->set_rules(
                        'nome', 'Nome', 'required|min_length[3]|is_unique[tipo.tipo]',
                        array(
                            'required' => 'Você deve preencher o %s corretamente.',
                            'min_length' => 'O nome deve ser valido minimo 3 letras',
                            'is_unique' => 'Tipo já cadastrado.'
                            )
                    );

                    if (($this->form_validation->run() == FALSE)) {
                        $erros = validation_errors();
                        $this->template->load("templates/template", "templates/tipo/novotipo",["erros" => $erros]);
                        return;
                    }

                    $retorno = $this->Tipo->salvar($_POST['nome'], $_POST['id']);

                    if ( $retorno ) {
                        $msg['sucesso'] = 'Tipo de produto alterado com sucesso!';
                    } else {
                        $msg['erros'] = 'Falha ao alterar Tipo de produto!';
                    }
                    $this->template->load("templates/template", "templates/tipo/novotipo", $msg);
                } else {
                    $msg['sucesso'] = 'Tipo de produto alterado com sucesso!';
                    $this->template->load("templates/template", "templates/tipo/novotipo", $msg);
                }
            } else {
                $msg['erros'] = 'Produto não encontrado para alterar!';
                $this->template->load("templates/template", "templates/tipo/novotipo", $msg);
            }
        }

        public function excluir()
        {
            //Excluir 
            if (!isset($_SESSION["padoca"]) || !$_SESSION['padoca']['admin'] == 1) {
                header("location: /codeigniter/index.php/login");
            }

            $id = $_GET["id"];
            $this->Tipo->excluir($id);

            header("location: /codeigniter/index.php/tipos/todostipos");
        }
    }
