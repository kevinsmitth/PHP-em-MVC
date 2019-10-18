<?php
date_default_timezone_set('America/Sao_Paulo');

class Postagem
{
    public static function selecionaTodos()
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM postagens ORDER BY id ASC";
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();
        while ($row = $sql->fetchObject('Postagem')) {
            $resultado[] = $row;
        }

        if (!$resultado) {
            throw new Exception("Não foi encontrado nenhum registro no banco");
        }
        return $resultado;
    }
    public static function seleciona3()
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM postagens WHERE destaque = 'Sim' ORDER BY id ASC LIMIT 3";
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();
        while ($row = $sql->fetchObject('Postagem')) {
            $resultado[] = $row;
        }

        if (!$resultado) {
            throw new Exception("Não foi encontrado nenhum registro no banco");
        }
        return $resultado;
    }
    public static function selecionaPorId($idPost)
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM postagens WHERE id = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
        $sql->execute();

        $resultado = $sql->fetchObject('Postagem');

        if (!$resultado) {
            throw new Exception("Não foi encontrado nenhum registro no banco");
        } else {
            $resultado->comentarios = Comentario::selecionarComentarios($resultado->id);
        }
        return $resultado;
    }
    public static function selecionaCategoria()
    {
        $con = Connection::getConn();

        $sql = 'SELECT * FROM categorias';
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();
        while ($row = $sql->fetchObject()) {
            $resultado[] = $row;
        }
        if (!$resultado) {
            throw new Exception("Não foi encontrado nenhum registro no banco");
        }
        return $resultado;
    }
    public static function selecionaCor()
    {
        $con = Connection::getConn();

        $sql = 'SELECT * FROM cores';
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();
        while ($row = $sql->fetchObject()) {
            $resultado[] = $row;
        }
        if (!$resultado) {
            throw new Exception("Não foi encontrado nenhum registro no banco");
        }
        return $resultado;
    }
    /*
    public static function insert($dadosPost)
    {
        if (empty($dadosPost['titulo']) || empty($dadosPost['conteudo'])) {
            throw new Exception("Preencha todos os campos!");

            return false;
        }
        $con = Connection::getConn();

        $sql = 'INSERT INTO pagina_index (titulo, conteudo) VALUES (:t, :c)';
        $sql = $con->prepare($sql);
        $sql->bindValue(':t', $dadosPost['titulo']);
        $sql->bindValue(':c', $dadosPost['conteudo']);
        $res = $sql->execute();

        if ($res == 0) {
            throw new Exception("Falha ao inserir publicação.");

            return false;
        }

        return true;
    }
*/
    public static function update($params)
    {
        $con = Connection::getConn();

        $sql = "UPDATE postagens SET titulo = :t, subtitulo = :sub, descricao = :d, imglink = :img,
        categoria = :cat, facebook = :face, github = :git, linkedin = :linke, workana = :work,
        cor = :cor, destaque = :destaq WHERE id = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(":t", $params['titulo']);
        $sql->bindValue(":sub", $params['subtitulo']);
        $sql->bindValue(":d", $params['descricao']);
        $sql->bindValue(":img", $params['imglink']);
        $sql->bindValue(":cat", $params['categoria']);
        $sql->bindValue(":face", $params['facebook']);
        $sql->bindValue(":git", $params['github']);
        $sql->bindValue(":linke", $params['linkedin']);
        $sql->bindValue(":work", $params['workana']);
        $sql->bindValue(":cor", $params['cor']);
        $sql->bindValue(":destaq", $params['destaque']);
        $sql->bindValue(":id", $params['id']);
        $resultado = $sql->execute();

        if ($resultado == 0) {
            throw new Exception("Falha ao Alterar publicação.");

            return false;
        }
        return true;
    }
    public static function insertContato($dadosPost)
    {
        $con = Connection::getConn();

        $sql = 'INSERT INTO contato (nome, email, msg) VALUES (:n, :e, :msg)';
        $sql = $con->prepare($sql);
        $sql->bindValue(':n', $dadosPost['nome']);
        $sql->bindValue(':e', $dadosPost['email']);
        $sql->bindValue(':msg', $dadosPost['msg']);
        $res = $sql->execute();

        if ($res == 0) {
            throw new Exception("Falha ao inserir publicação.");

            return false;
        }

        return true;
    }
    public static function selecionaContatos()
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM contato ORDER BY id ASC";
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();
        while ($row = $sql->fetchObject('Postagem')) {
            $resultado[] = $row;
        }

        if (!$resultado) {
            throw new Exception("Não foi encontrado nenhum registro no banco");
        }
        return $resultado;
    }
    /*
    public static function pedidosPendentes()
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM pedidos WHERE status = 'pendente'";
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();
        while ($row = $sql->fetchObject('Postagem')) {
            $resultado[] = $row;
        }
        return $resultado;
    }

    public static function pedidosAceitos()
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM pedidos WHERE status = 'aceito'";
        $sql = $con->prepare($sql);
        $sql->execute();


        $resultado = array();
        while ($row = $sql->fetchObject('Postagem')) {
            $resultado[] = $row;
        }

        return $resultado;
    }

    public static function pedidosAtrasados()
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM pedidos WHERE status = 'atrasado'";
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();
        while ($row = $sql->fetchObject('Postagem')) {
            $resultado[] = $row;
        }
        return $resultado;
    }

    public static function pedidosConcluidos()
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM pedidos WHERE status = 'concluido'";
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();
        while ($row = $sql->fetchObject('Postagem')) {
            $resultado[] = $row;
        }
        return $resultado;
    }

    public static function aceitarPedidos($params)
    {
        $con = Connection::getConn();

        $sql = "UPDATE pedidos SET status = 'aceito' WHERE id = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(":id", $params['id']);
        $resultado = $sql->execute();

        if ($resultado == 0) {
            throw new Exception("Falha ao Aceitar pedido.");

            return false;
        }

        return true;
    }*/
}
