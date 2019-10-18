<?php

class LoginController
{
    public function index($idUser)
    {
        try {
            if (!isset($_SESSION['id']) && !isset($_SESSION['nome']) && !isset($_SESSION['senha'])) {

                $loader = new \Twig\Loader\FilesystemLoader('app/View');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('login.html');

                $objusuarios = Usuarios::login($idUser);

                $parametros = array();
                $parametros['usuarios'] = $objusuarios;

                $conteudo = $template->render($parametros);
                echo $conteudo;
            } else {
                header('location:../');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        //echo 'alou';
    }
}
