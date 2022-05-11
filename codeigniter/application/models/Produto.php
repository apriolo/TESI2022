<?php

    class Produto extends CI_Model {

        public function selecionarTodos() {
            $retorno = $this->db->query("
                                    SELECT
                                        P.*,
                                        T.tipo AS tipo_produto
                                    FROM produto AS P
                                    INNER JOIN tipo AS T
                                        ON T.id = P.tipo_produto            
                                    ");
                                    
            return $retorno->result();
        }

        public function buscarId( $id ) {
            $retorno = $this->db->query("
                                    SELECT
                                        P.*,
                                        T.tipo AS tipo_produto,
                                        T.id as tipo
                                    FROM produto AS P
                                    INNER JOIN tipo AS T
                                    ON T.id = P.tipo_produto 
                                    WHERE P.id = ". $id);
            return $retorno->result();
        }

        public function buscarProduto($produto) {
            $sql = "SELECT * FROM produto WHERE nome='" . $produto . "'";

            $retorno = $this->db->query( $sql )->result();

            return $retorno;
        }

        //Salvar alterações no veiculo
        public function salvaraltercao( $id, $nome, $valor, $tipo, $estoque, $imagem, $perecivel ) {
            $sql = "UPDATE produto 
                    SET
                        nome = '" . $nome . "',
                        valor = " . $valor. ",
                        tipo_produto = " . $tipo . ",
                        estoque = '" . $estoque . "',
                        imagem = '" . $imagem . "',
                        perecivel = '" . $perecivel. "'
                    WHERE id= " . $id . "
                ";
            $this->db->query( $sql );

            return true;
        }

        public function salvar($nome, $valor, $estoque, $tipo, $perecivel, $imagem, $id = null) {
            if ($id) {
                $sql = "UPDATE produto 
                    SET
                        nome = '" . $nome . "',
                        valor = " . $valor. ",
                        estoque = " . $estoque . ",
                        tipo = " . $tipo . ",
                        perecivel = '" . $perecivel . "',
                        imagem = '" . $imagem. "'
                    WHERE id= " . $id . "
                ";
            } else {
                $sql = "INSERT INTO produto 
                    (nome, valor, estoque, tipo_produto, perecivel, imagem)
                    VALUES
                    ('" .$nome. "', " . $valor .", " . $estoque . ", '" . $tipo . "', '" . $perecivel . "', '". $imagem ."')
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
                $sql += " WHERE id = " . $id;
            }

            $retorno = $this->db->query( $sql )->result();
            
            return $retorno;
        }

        public function getProdutosPrincipais()
        {
            $sql = "SELECT p.*,t.tipo as tipo 
                FROM produto AS p 
                INNER JOIN tipo as t
                ON p.tipo_produto = t.id";

            $retorno = $this->db->query( $sql )->result();

            return $retorno;
        }

        public function getProdutosBusca($text, $tipo)
        {
            $sql = "
            SELECT
                P.*,
                T.tipo AS tipo_produto,
                T.id as tipo_id
            FROM produto AS P
            INNER JOIN tipo AS T
                ON T.id = P.tipo_produto            
            ";

            if ($text || $tipo) {
                $flag = 0;
                if ($text) {
                    $sql = $sql." WHERE P.nome like '%". $text ."%'";
                    $flag = $flag + 1;
                }

                if ($tipo) {
                    if ($flag == 1) {
                        $sql = $sql . " AND T.id = ". $tipo;
                    } else {
                        $sql = $sql . " WHERE T.id = ". $tipo;
                    }
                }
            }

            $retorno = $this->db->query($sql);
                                    
            return $retorno->result();
        }
    }
