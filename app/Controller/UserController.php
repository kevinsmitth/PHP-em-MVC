<?php

class UserController
{
    /* public function index()
    {
        session_start();
        if (!isset($_SESSION['id']) && !isset($_SESSION['nome']) && !isset($_SESSION['senha'])) {
            header("location: /login");
        }

        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('admin.html');

        $objPostagens = Postagem::selecionaTodos();

        $parametros = array();
        $parametros['postagens'] = $objPostagens;

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }*/

    public function cadastrar($params)
    {
        try {


            if (!isset($_SESSION['id']) && !isset($_SESSION['nome']) && !isset($_SESSION['senha'])) {
                $loader = new \Twig\Loader\FilesystemLoader('app/View');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('cadastrar.html');

                $parametros = array();

                $conteudo = $template->render($parametros);
                echo $conteudo;
            } else {
                header('location:/');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function autenticar()
    {
        try {
            if (isset($_SESSION['id']) && isset($_SESSION['nome']) && isset($_SESSION['senha'])) {
                Usuarios::login();
                echo '<script>Swal.fire({
                    type: "success",
                    text: "Logou com Sucesso!",
                    showConfirmButton: false,
                    timer: 3000        
                  });
                  setTimeout(function () {
                    window.location.href = "/admin";
                 }, 1500);
                  </script>';
            } else {
                header("location:./");
            }
        } catch (Exception $e) {
            echo '<script>Swal.fire({
                type: "error",
                text: "Algo deu errado..",
                showConfirmButton: false,
                timer: 3000
              });
              setTimeout(function () {
                window.location.href = "/login";
             }, 1500);
              </script>';
        }
    }

    public function insereuser()
    {
        try {
            if (Usuarios::cadastrar($_POST) == true) {
                Usuarios::cadastrar($_POST);
                echo '<script>Swal.fire({
                    type: "success",
                    text: "Cadastro feito com sucesso!",
                    showConfirmButton: false,
                    timer: 3000        
                  });
                  setTimeout(function () {
                    window.location.href = "/login";
                 }, 1500);
                  </script>';
            } else {
                echo '<script>Swal.fire({
                    type: "error",
                    text: "Senha e Confirmar Senha não são iguais!",
                    showConfirmButton: false,
                    timer: 3000
                  });
                  setTimeout(function () {
                    window.location.href = "./user/cadastrar";
                 }, 1500);
                  </script>';
            }
        } catch (Exception $e) {
            echo '<script>Swal.fire({
                type: "error",
                text: "Algo deu errado..",
                showConfirmButton: false,
                timer: 3000
              });
              setTimeout(function () {
                window.location.href = "../";
             }, 1500);
              </script>';
        }
    }


    public function logout()
    {
        try {
            if (isset($_SESSION['id']) && isset($_SESSION['nome']) && isset($_SESSION['senha'])) {
                Usuarios::logout($_POST);
                echo '<script>Swal.fire({
                    text: "Volte Sempre!",
                    showConfirmButton: false,
                    imageUrl: "https://i.imgur.com/1vWMnlA.gif",
                    imageWidth: 360,
                    imageHeight: 200,
                    imageAlt: "Custom image",
                    animation: false,
                    timer: 3000
                  });
                  setTimeout(function () {
                    window.location.href = "../home";
                 }, 2500);
                  </script>';
            } else {
                header("location:/login");
            }
        } catch (Exception $e) {
            echo '<script>Swal.fire({
                type: "error",
                text: "Algo deu errado..",
                showConfirmButton: false,
                timer: 3000
              });
              setTimeout(function () {
                window.location.href = "../";
             }, 1500);
              </script>';
        }
    }
}
