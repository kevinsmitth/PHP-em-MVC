<?php

class Usuarios
{

    public static function logar()
    {
        if (isset($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $senha = addslashes(md5($_POST['senha']));

            if (!empty($nome) && !empty($senha)) {
                $con = Connection::getConn();
                //Verificar se o email e a senha estão cadastrados, se sim
                $sql = "SELECT * FROM administradores WHERE nome = :n AND senha = :s";
                $sql = $con->prepare($sql);
                $sql->bindValue(':n', $nome);
                $sql->bindValue(':s', $senha);
                $sql->execute();

                if ($sql->rowCount() > 0) {
                    //entrar no sistema (sessao)
                    $dado = $sql->fetch();

                    if ($dado['nivel'] == 10) {

                        session_start();
                        $_SESSION['id'] = $dado['id'];
                        $_SESSION['nome'] = $dado['nome'];
                        $_SESSION['email'] = $dado['email'];
                        $_SESSION['senha'] = $dado['senha'];
                        $_SESSION['celular'] = $dado['celular'];
                        $_SESSION['nivel'] = $dado['nivel'];
                        header('Location:/user/autenticar/' . $_POST['id'] . '');

                        return true;
                    }
                } else {
                    echo '<script>
                    Swal.fire({
                      type: "error",
                      text: "Nome ou Senha Incorretos!",
                      showConfirmButton: false,
                      timer: 2500
                    });
                  </script>';
                }
            } else {
                echo '<script>
                    Swal.fire({
                      type: "error",
                      text: "Preencha todos os campos!",
                      showConfirmButton: false,
                      timer: 2500
                    });
                  </script>';
            }
        }

        if (isset($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $senha = addslashes(md5($_POST['senha']));

            if (!empty($nome) && !empty($senha)) {
                $con = Connection::getConn();
                //Verificar se o email e a senha estão cadastrados, se sim
                $cmd = "SELECT * FROM usuarios WHERE nome = :n AND senha = :s";
                $cmd = $con->prepare($cmd);
                $cmd->bindValue(':n', $nome);
                $cmd->bindValue(':s', $senha);
                $cmd->execute();

                if ($cmd->rowCount() > 0) {
                    //entrar no sistema (sessao)
                    $dado = $cmd->fetch();
                    if ($dado['nivel'] == 0) {
                        session_start();
                        $_SESSION['id'] = $dado['id'];
                        $_SESSION['nome'] = $dado['nome'];
                        $_SESSION['sobrenome'] = $dado['sobrenome'];
                        $_SESSION['rua'] = $dado['rua'];
                        $_SESSION['numero'] = $dado['numero'];
                        $_SESSION['bairro'] = $dado['bairro'];
                        $_SESSION['estado'] = $dado['estado'];
                        $_SESSION['celular'] = $dado['celular'];
                        $_SESSION['telefone'] = $dado['telefone'];
                        $_SESSION['email'] = $dado['email'];
                        $_SESSION['senha'] = $dado['senha'];
                        $_SESSION['cupom_de_desconto'] = $dado['cupom_de_desconto'];
                        $_SESSION['avaliacao'] = $dado['avaliacao'];
                        $_SESSION['nivel_avaliacao'] = $dado['nivel_avaliacao'];
                        $_SESSION['estado_da_conta'] = $dado['estado_da_conta'];
                        $_SESSION['imagem'] = $dado['imagem'];
                        $_SESSION['nivel'] = $dado['nivel'];
                        $_SESSION['sexo'] = $dado['sexo'];

                        header('Location:/user/autenticar/' . $_POST['id'] . '');

                        return true;
                    }
                } else {
                    return false;  // nao foi possivel fazer o login..
                }
            } else {
                return false;
            }
        }
    }

    public static function logout()
    {
        session_destroy();
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
    }

    public static function cadastrar($params)
    {
        $con = Connection::getConn();
        //verificar se ja esta cadastrado.
        $sql = "SELECT id FROM usuarios WHERE email = :e";
        $sql = $con->prepare($sql);
        $sql->bindValue(":e", $params['email']);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return false; //ja esta cadastrada..
        } else {   //Caso não, cadastrar.
            $confsenha = md5($params['confsenha']);

            $sql = $con->prepare("INSERT INTO usuarios (nome,sobrenome,email,senha,sexo,celular,telefone,
                CEP,rua,numero,bairro,cidade,estado,referencia,complemento)
                VALUES (:nome,:sobrenome,:email,:senha,:sexo,:cel,:tel,:CEP,:rua,:num,:bair,:cid,:est,:ref,:comp)");

            if ($confsenha == md5($params['senha'])) {

                $sql->bindValue(":nome", $params['nome']);
                $sql->bindValue(":sobrenome", $params['sobrenome']);
                $sql->bindValue(":email", $params['email']);
                $sql->bindValue(":senha", md5($params['senha']));
                $sql->bindValue(":sexo", $params['sexo']);
                $sql->bindValue(":cel", $params['celular']);
                $sql->bindValue(":tel", $params['telefone']);
                $sql->bindValue(":CEP", $params['CEP']);
                $sql->bindValue(":rua", $params['rua']);
                $sql->bindValue(":num", $params['numero']);
                $sql->bindValue(":bair", $params['bairro']);
                $sql->bindValue(":cid", $params['cidade']);
                $sql->bindValue(":est", $params['estado']);
                $sql->bindValue(":ref", $params['referencia']);
                $sql->bindValue(":comp", $params['complemento']);
                $sql->execute();


                return true;
            }

            return false;
        }
    }
}
