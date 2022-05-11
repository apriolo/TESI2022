<?php

    class Usuario extends CI_Model {

        public function Registrar($data) {

            try {
                if ( $this->ValidaEmail( $data["email"] ) )  {
                    $this->db->insert('usuario', $data);

                    return true;
                }
                else
                    return false;
            }
            catch (Exception $ex) {
                return false;
            }
        }

        public function alterarUsuario($data)
        {
            $sql = "UPDATE usuario 
                    SET
                        nome = '" . $data["nome"] . "',
                        email = '" . $data["email"]. "',
                        senha = '" . $data["senha"] . "',
                        admin = " . $data["admin"] . ",
                        ativo = " . $data["ativo"] . "
                    WHERE id= " . $data["id"] . "
                ";
            $this->db->query( $sql );

            return true;
        }

        public function ValidaEmail( $email ) {
            $sql = "SELECT count(1) as total 
                    FROM usuario
                    WHERE email='" . $email ."' ";
            $retorno = $this->db->query($sql)->result();

            //var_dump( $retorno );

            if ($retorno[0]->total == 0)
                return true;

            return false;
        }

        public function ValidaLogin( $email, $senha ) {
            $sql= "SELECT email, ativo, admin, id FROM usuario 
                    WHERE email='" . $email . "' 
                        AND senha='" . $senha . "'";

            $retorno = $this->db->query($sql)->result();

            if ($retorno) { //Não encontrou
                return $retorno[0];
            }

            return false;
        }

        public function getTodos()
        {
            $retorno = $this->db->query("SELECT * FROM Usuario");
                                    
            return $retorno->result();
        }

        public function getUsuario($id)
        {
            $retorno = $this->db->query("SELECT * FROM Usuario WHERE id = ".$id);
                                    
            return $retorno->result();
        }

        public function excluir($id) {
            $sql="DELETE FROM usuario WHERE id=" . $id;
            $this->db->query( $sql );
            return true;
        }
    }
