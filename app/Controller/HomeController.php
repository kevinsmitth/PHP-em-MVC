<?php
date_default_timezone_set("America/Sao_Paulo");

class HomeController
{
    public function index($params)
    {
        try {
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $twig->addGlobal('session', $_SESSION);
            $template = $twig->load('home.html');

            $selectPostagens = Postagem::seleciona3();
            $selectCategoria = Postagem::selecionaCategoria();
            $selectCor = Postagem::selecionaCor();

            $parametros = array();
            $parametros['postagens'] = $selectPostagens;
            $parametros['categorias'] = $selectCategoria;
            $parametros['cores'] = $selectCor;

            $conteudo = $template->render($parametros);
            echo $conteudo;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        //echo 'alou';
    }
    public function insertContato()
    {
        try {
            Postagem::insertContato($_POST);
        } catch (Exception $e) {
            echo '<script>alert("' . $e->getMessage() . '");</script>';
        }
    }
}
