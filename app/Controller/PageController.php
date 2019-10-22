<?php

class PagesController
{
    public function index($params)
    {
        try {
            if (($_SESSION['nivel']) == 10) {
                include_once 'app/Components/DashboardPainel/index.html';
            } else {
                include_once 'app/Components/Header/index.html';
            }
            $loader = new \Twig\Loader\FilesystemLoader('app/View/Projetos');
            $twig = new \Twig\Environment($loader);
            $twig->addGlobal('session', $_SESSION);
            $template = $twig->load('index.html');

            $postagem = Postagem::selecionaTodos();
            $selectCategoria = Postagem::selecionaCategoria();
            $selectCor = Postagem::selecionaCor();

            $parametros = array();
            $parametros['postagens'] = $postagem;
            $parametros['categorias'] = $selectCategoria;
            $parametros['cores'] = $selectCor;

            $conteudo = $template->render($parametros);
            echo $conteudo;
            include_once 'app/Components/Footer/index.html';
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        // echo 'alou';

    }
}
