<?php
    class Usuarios extends CI_Controller {

        public function __construct() {
            parent::__construct();

            $this->load->model("Usuario");
            $this->load->model("Tipo");
        }

        public function SalvarRegistro() {
            if (!isset($_SESSION["padoca"]) || !$_SESSION['padoca']['admin'] == 1) {
                header("location: /codeigniter/index.php/login");
            }
            
            $this->load->library('form_validation');

            $this->form_validation->set_rules(
                'nome', 'Nome', 'required|min_length[3]',
                array(
                    'required' => 'Você deve preencher o %s corretamente.',
                    'min_length' => 'O nome deve ser valido minimo 3 letras'
                    )
            );

            $this->form_validation->set_rules(
                'email', 'Email', 'required|valid_email|is_unique[usuario.email]',
                array(
                    'required' => 'Você deve preencher o %s corretamente.',
                    'valid_email' => 'O %s deve ser valido',
                    'is_unique' => 'Email já cadastrado.'
                    )
            );

            $this->form_validation->set_rules(
                'senha', 'Senha', 'required',
                array(
                    'required' => 'Você deve preencher a %s corretamente.',
                )
            );
            $this->form_validation->set_rules(
                'confirm_senha', 'Confirmacao de senha', 'required|matches[senha]',
                array(
                    'required' => 'Você deve preencher a %s corretamente.',
                    'matches' => '%s nao confere',
                )
            );
            
            if (($this->form_validation->run() == FALSE)) {
                $erros = validation_errors();
                $this->template->load("templates/template", "templates/user/registro",["erros" => $erros]);
                return;
            }

            $data = array(
                "email" => $_POST["email"],
                "nome" => $_POST["nome"],
                "senha" => $_POST["senha"],
                "admin" => 0,
                "ativo" => 1
            );
            //$this->load->model("LoginModel");
            $retorno = $this->Usuario->registrar( $data );

            if ( $retorno ) {
                $msg['sucesso'] = 'Usuario Cadastrado com sucesso!';
            } else {
                $msg['erros'] = 'Falha ao cadastrar usuario!';
            }
            $this->template->load("templates/template", "templates/user/registro", $msg);
        }

        //Apenas chama o formulario
        public function Registro() {
            if (!isset($_SESSION["padoca"]) || !$_SESSION['padoca']['admin'] == 1) {
                header("location: /codeigniter/index.php/login");
            }
            $this->template->load("templates/template", "templates/user/registro");
        }

        public function todosUsuarios()
        {
            if (!isset($_SESSION["padoca"]) || !$_SESSION['padoca']['admin'] == 1) {
                header("location: /codeigniter/index.php/login");
            }
            $usuarios = $this->Usuario->getTodos();
            $this->template->load('templates/template', 'templates/user/todosusuarios', [
                'usuarios' => $usuarios
            ]);
        }

        public function alterarUsuario()
        {
            if (!isset($_SESSION["padoca"]) || !$_SESSION['padoca']['admin'] == 1) {
                header("location: /codeigniter/index.php/login");
            }

            $id = $_GET["id"];
            $retorno = $this->Usuario->getUsuario($id);

            if (!$retorno) {
                $this->template->load("templates/template","templates/user/alterarusuario", ['userNotFound' => 'Usuario não encontrado!']);
                return;
            }

            $this->template->load("templates/template","templates/user/alterarusuario", [
                'usuario' => (object)$retorno[0],
            ]);
        }

        public function salvaralteracao() {
            if (!isset($_SESSION["padoca"]) || !$_SESSION['padoca']['admin'] == 1) {
                header("location: /codeigniter/index.php/login");
            }
            if ($usuario = $this->Usuario->getUsuario($_POST['id'])[0]) {
                $this->load->library('form_validation');

                $hasChanges = false;

                if ($_POST['nome'] != $usuario->nome) {
                    $this->form_validation->set_rules(
                        'nome', 'Nome', 'required|min_length[3]',
                        array(
                            'required' => 'Você deve preencher o %s corretamente.',
                            'min_length' => 'O nome deve ser valido minimo 3 letras'
                        )
                    );
                    $hasChanges = true;
                }

                if ($_POST['email'] != $usuario->email) {
                    $this->form_validation->set_rules(
                        'email', 'Email', 'required|valid_email|is_unique[usuario.email]',
                        array(
                            'required' => 'Você deve preencher o %s corretamente.',
                            'valid_email' => 'O %s deve ser valido',
                            'is_unique' => 'Email já cadastrado.'
                            )
                    );
                    $hasChanges = true;
                }

                if (isset($_POST['senha']) && $_POST['senha'] != '') {
                    $this->form_validation->set_rules(
                        'senha', 'Senha', 'required',
                        array(
                            'required' => 'Você deve preencher a %s corretamente.',
                        )
                    );
                    $this->form_validation->set_rules(
                        'confirm_senha', 'Confirmacao de senha', 'required|matches[senha]',
                        array(
                            'required' => 'Você deve preencher a %s corretamente.',
                            'matches' => '%s nao confere',
                        )
                    );
                    $hasChanges = true;
                } else {
                    $_POST['senha'] = $usuario->senha;
                }

                if ($hasChanges) {
                    if (($this->form_validation->run() == FALSE)) {
                        $erros = validation_errors();
                        $this->template->load("templates/template", "templates/user/alterarUsuario",[
                            "erros" => $erros,
                            "usuario" => $_POST
                        ]);
                        return;
                    }

                    $data = array(
                        "email" => $_POST["email"],
                        "nome" => $_POST["nome"],
                        "senha" => $_POST["senha"],
                        "admin" => 1,
                        "ativo" => 1,
                        "id" => $_POST["id"]
                    );
                    $retorno = $this->Usuario->alterarUsuario($data);
        
                    if ( $retorno ) {
                        $msg['sucesso'] = 'Usuario Alterado com sucesso!';
                    } else {
                        $msg['erros'] = 'Falha ao alterar usuario!';
                    }
                    $this->template->load("templates/template", "templates/user/registro", $msg);
                    
                }
            }
        }

        public function excluir()
        {
            //Excluir 
            if (!isset($_SESSION["padoca"]) || !$_SESSION['padoca']['admin'] == 1) {
                header("location: /codeigniter/index.php/login");
            }

            $id = $_GET["id"];
            $this->Usuario->excluir($id);

            header("location: /codeigniter/index.php/usuarios/todosusuarios");
        }
    }
?>