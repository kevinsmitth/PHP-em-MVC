<?php

class AdminController
{
    public function index()
    {
        if (($_SESSION['nivel']) == 10) {
            include_once 'app/Components/DashboardPainel/index.html';
            $loader = new \Twig\Loader\FilesystemLoader('app/View/Dashboard');
            $twig = new \Twig\Environment($loader);
            $Template = $twig->load('index.html');

            $selectContatos = Postagem::selecionaContatos();

            $parametros = array();
            $parametros['contatos'] = $selectContatos;
            $parametros['nomeuser'] = $_SESSION['nome'];
            $parametros['nivel'] = $_SESSION['nivel'];

            $conteudo = $Template->render($parametros);
            echo $conteudo;
        } else {
            header("location: ../login");
        }
        /*
        if ($_SESSION['id'] <= 0) {
            $_SESSION['session_alert']['msg'];
        }
        $_SESSION['session_alert']['msg'] = 'Login realizado com sucesso, aguarde o carregamento.';
        function session_alert()
        {
            if (isset($_SESSION['session_alert'])) { ?>
                <div class="alert alert-success" role="alert">
                    <strong><?php echo $_SESSION['session_alert']['msg']; ?></strong>
                </div>
            <?php }
            unset($_SESSION['session_alert']);
        }*/
    }

    public function paineladmin()
    {
        if (($_SESSION['nivel']) == 10) {
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $adminTemplate = $twig->load('paineladmin.html');

            $objPostagens = Postagem::selecionaTodos();

            $parametros = array();
            $parametros['postagens'] = $objPostagens;
            $parametros['nomeuser'] = $_SESSION['nome'];
            $parametros['nivel'] = $_SESSION['nivel'];

            $conteudo = $adminTemplate->render($parametros);
            echo $conteudo;
        } else {
            header("location: /user/logar");
        }
    }
    public function controle()
    {
        if (($_SESSION['nivel']) == 10) {
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $adminTemplate = $twig->load('controle.html');

            $pedidosPendentes = Postagem::pedidosPendentes();
            $pedidosAceitos = Postagem::pedidosAceitos();
            $pedidosAtrasados = Postagem::pedidosAtrasados();
            $pedidosConcluidos = Postagem::pedidosConcluidos();

            $parametros = array();
            $parametros['pendentes'] = $pedidosPendentes;
            $parametros['aceitos'] = $pedidosAceitos;
            $parametros['atrasados'] = $pedidosAtrasados;
            $parametros['concluidos'] = $pedidosConcluidos;


            $conteudo = $adminTemplate->render($parametros);
            echo $conteudo;
        } else {
            header("location: /user/logar");
        }
    }

    public function aceitarPedidos($params)
    {
        try {
            if (($_SESSION['nivel']) == 10) {
                Postagem::aceitarPedidos($_POST);
                echo '<script>alert("Pedido aceito com sucesso!");</script>';
                echo '<script>location.href="/admin/controle";</script>';
            } else {
                header("location: /user/logar");
            }
        } catch (Exception $e) {
            echo '<script>alert("' . $e->getMessage() . '");</script>';
            echo '<script>location.href="/admin/controle"</script>';
        }
    }

    public function create()
    {
        if (($_SESSION['nivel']) == 10) {
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('create.html');

            $parametros = array();

            $conteudo = $template->render($parametros);
            echo $conteudo;
        } else {
            header("location: /user/logar");
        }
    }

    public function insert()
    {
        try {
            if (($_SESSION['nivel']) == 10) {
                Postagem::insert($_POST);

                echo '<script>alert("Publicação inserida com sucesso!");</script>';
                echo '<script>location.href="/admin/index";</script>';
            } else {
                header("location: /user/logar");
            }
        } catch (Exception $e) {
            echo '<script>alert("' . $e->getMessage() . '");</script>';
            echo '<script>location.href="/admin/create";</script>';
        }
    }

    public function change($paramId)
    {
        if (($_SESSION['nivel']) == 10) {
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('update.html');

            $post = Postagem::selecionaPorId($paramId);

            $parametros = array();
            $parametros['id'] = $post->id;
            $parametros['titulo'] = $post->titulo;
            $parametros['conteudo'] = $post->conteudo;

            $conteudo = $template->render($parametros);
            echo $conteudo;
        } else {
            header("location: /login");
        }
    }

    public function update()
    {
        try {
            if (($_SESSION['nivel']) == 10) {
                Postagem::update($_POST);
                echo '<script>Swal.fire({
                    type: "success",
                    text: "Alteração Realizada com Sucesso!",
                    showConfirmButton: false,
                    timer: 3000        
                  });
                  setTimeout(function () {
                    window.location.href = "../";
                 }, 1500);
                  </script>';
            } else {
                header("location: /login");
            }
        } catch (Exception $e) {
            echo '<script>alert("' . $e->getMessage() . '");</script>';
            echo '<script>location.href="/admin/change/' . $_POST['id'] . '"</script>';
        }
    }
}
