<?php
    class Login extends CI_Controller {

        public function __construct() {
            parent::__construct();

            $this->load->model("Usuario");
            $this->load->model("Tipo");
        }

        //Tela de login
        public function Index() {
            $this->template->load("templates/template","templates/user/login");
        }

        public function ValidaLogin() {
            $email = $_POST["email"];
            $senha = $_POST["senha"];

            $senha = $senha;

            //$this->load->model("LoginModel");

            $retorno = $this->Usuario->ValidaLogin($email, $senha);

            if ( $retorno ) {
                $_SESSION["padoca"] = array(
                    "email" => $retorno->email,
                    "admin" => $retorno->admin,
                    "id"    => $retorno->id
                );

                header("location: /codeigniter/index.php/");
            }
            else {
                $this->template->load("templates/template","templates/user/login", ['erros' => 'Usuario ou senha não encontrado!']);
            }

        }

        public function Deslogar() {
            unset($_SESSION['padoca']);
            header("location: /codeigniter/index.php/login");
        }
    }
?>