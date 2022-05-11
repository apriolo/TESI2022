<?php

    class Produtos extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model("Produto");
        }

        public function index() {
            $textSearch = (isset($_GET['buscarProduto'])) ? $_GET['buscarProduto'] : "";
            $tipoSearch = (isset($_GET['tipo'])) ? $_GET['tipo'] : "";

            $produtos = $this->Produto->getProdutosBusca($textSearch, $tipoSearch);
		    $tipos = $this->Produto->getTipos();
           

            $this->template->load("templates/template","templates/produto/listarProdutos", [
                "produtos" => $produtos,
                "tipos" => $tipos
            ]);
        }

        public function alterar() {
            if (!isset($_SESSION["padoca"]) || !$_SESSION['padoca']['admin'] == 1) {
                header("location: /codeigniter/index.php/login");
            }

            $id = $_GET["id"];
            $retorno = $this->Produto->buscarId($id);

            if (!$retorno) {
                $this->template->load("templates/template","templates/produto/alterarProduto", ['produtoNotFound' => 'Produto não encontrado!']);
                return;
            }

            $tipos = $this->Produto->getTipos();
            $this->template->load("templates/template","templates/produto/alterarProduto", [
                'tipos' => $tipos,
                'produto' => $retorno[0]
            ]);
        }

        public function salvaralteracao() {
            if (!isset($_SESSION["padoca"]) || !$_SESSION['padoca']['admin'] == 1) {
                header("location: /codeigniter/index.php/login");
            }
            if ($produto = $this->Produto->buscarId($_POST['id'])[0]) {
                // var_dump($_POST);
                // exit;
                $this->load->library('form_validation');

                if ($_POST['nome'] != $produto->nome) {
                    $this->form_validation->set_rules(
                        'nome', 'Nome', 'required|min_length[3]|is_unique[produto.nome]',
                        array(
                            'required' => 'Você deve preencher o %s corretamente.',
                            'min_length' => 'O nome deve ser valido minimo 3 letras',
                            'is_unique' => 'Produto já cadastrado.'
                        )
                    );
                }

                $this->form_validation->set_rules(
                    'valor', 'Valor', 'required|greater_than[0]',
                    array(
                        'required' => 'Você deve preencher o %s.',
                        'greater_than' => 'O valor deve ser maior de 1'
                        )
                );

                if (($this->form_validation->run() == FALSE)) {
                    $erros = validation_errors();
                    $tipos = $this->Produto->getTipos();
                    $this->template->load("templates/template","templates/produto/alterarProduto", [
                        'tipos' => $tipos,
                        'erros' => $erros,
                        'produto' => (object)$_POST
                    ]);
                    return;
                }

                $id = $_POST["id"];
                $nome = $_POST["nome"];
                $valor = $_POST["valor"];
                $tipo = $_POST["tipo"];
                $estoque = $_POST["estoque"];
                $imagem = $_POST["imagem"];
                $perecivel = $_POST["perecivel"];

                $retorno = $this->Produto->salvaraltercao(
                    $id, $nome, $valor, $tipo, $estoque, $imagem, $perecivel
                );

                $tipos = $this->Produto->getTipos();
                if ($retorno == true) {
                    $this->template->load("templates/template","templates/produto/alterarProduto", [
                        'tipos' => $tipos,
                        'sucesso' => 'Produto alterado com sucesso!',
                        'produto' => (object)$_POST
                    ]);
                    return;
                }
                else {
                    $this->template->load("templates/template","templates/produto/alterarProduto", [
                        'tipos' => $tipos,
                        'erros' => 'Erro ao alterar produto!',
                        'produto' => (object)$_POST
                    ]);
                }
            }
        }

        public function formProduto() {

            if (!isset($_SESSION["padoca"]) || !$_SESSION['padoca']['admin'] == 1) {
                header("location: /codeigniter/index.php/login");
            }

            $tipos = $this->Produto->getTipos();

            $this->template->load("templates/template","templates/produto/cadastrarProduto", ['tipos' => $tipos]);
        }

        public function salvarnovo() {

            if (!isset($_SESSION["padoca"]) || $_SESSION['padoca']['admin'] != "1") {
                header("location: /codeigniter/index.php/login");
            }

            $this->load->library('form_validation');
            $this->form_validation->set_rules(
                'nome', 'Nome', 'required|min_length[3]|is_unique[produto.nome]',
                array(
                    'required' => 'Você deve preencher o %s corretamente.',
                    'min_length' => 'O nome deve ser valido minimo 3 letras',
                    'is_unique' => 'Produto já cadastrado.'
                    )
            );

            $this->form_validation->set_rules(
                'valor', 'Valor', 'required|greater_than[0]',
                array(
                    'required' => 'Você deve preencher o %s.',
                    'greater_than' => 'O valor deve ser maior de 1'
                    )
            );
            
            if (($this->form_validation->run() == FALSE)) {
                $erros = validation_errors();
                $tipos = $this->Produto->getTipos();
                $this->template->load("templates/template","templates/produto/cadastrarProduto", [
                    'tipos' => $tipos,
                    'erros' => $erros,
                    'produto' => (object)$_POST
                ]);
                return;
            }

            $this->load->model("Produto");

            $nome = $_POST["nome"];
            $valor = $_POST["valor"];
            $estoque = $_POST["estoque"];
            $tipo = $_POST["tipo"];
            $perecivel = $_POST["perecivel"];
            $imagem = $_POST["imagem"];
            $id = null;

            if (isset($_POST['id']) && $_POST['id']) {
                $id = $_POST['id'];
            }

            $retorno = $this->Produto->salvar(
                $nome, $valor, $estoque, $tipo, $perecivel, $imagem, $id
            );
            
            header("location: /codeigniter/index.php/produtos/todosprodutos");
        }

        public function excluir() {
            if (!isset($_SESSION["padoca"]) || !$_SESSION['padoca']['admin'] == 1) {
                header("location: /codeigniter/index.php/login");
            }

            $id = $_GET["id"];
            $this->Produto->excluir($id);

            header("location: /codeigniter/index.php/login/meuperfil");
        }

        public function todosProdutos()
        {
            if (!isset($_SESSION["padoca"]) || !$_SESSION['padoca']['admin'] == 1) {
                header("location: /codeigniter/index.php/login");
            }
            $this->load->model('Produto');
            $produtos = $this->Produto->selecionarTodos();
            $this->template->load('templates/template', 'templates/user/meuperfil', [
                'produtos' => $produtos
            ]);
        }

    }
