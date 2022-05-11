<?php

    class Tipo extends CI_Model {

        public function salvar($nome, $id = null) {
            if ($id) {
                $sql = "UPDATE tipo 
                    SET
                        tipo = '" . $nome . "'
                        WHERE id= " . $id . "
                ";
            } else {
                $sql = "INSERT INTO tipo 
                    (tipo)
                    VALUES
                    ('" .$nome. "')
                    ";
            }

            $this->db->query( $sql );
            return true;
        }

        public function excluir($id) {
            $sql="DELETE FROM produto WHERE id=" . $id;
            $this->db->query( $sql );
            return true;
        }

        public function getTipos($id = null)
        {
            $sql = "SELECT id, tipo FROM tipo";

            if ($id) {
                $sql = $sql. " WHERE id = " . $id;
            }

            $retorno = $this->db->query( $sql )->result();
            
            return $retorno;
        }
        public function buscarId( $id ) {
            $retorno = $this->db->query("
                                    SELECT *
                                       FROM tipo
                                    WHERE id = ". $id);
            return $retorno->result();
        }
    }
