<?php

class PagesController
{
    public function index($params)
    {
        try {
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $twig->addGlobal('session', $_SESSION);
            $template = $twig->load('pages.html');

            $postagem = Postagem::selecionaTodos();
            $selectCategoria = Postagem::selecionaCategoria();
            $selectCor = Postagem::selecionaCor();

            $parametros = array();
            $parametros['postagens'] = $postagem;
            $parametros['categorias'] = $selectCategoria;
            $parametros['cores'] = $selectCor;

            $conteudo = $template->render($parametros);
            echo $conteudo;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        // echo 'alou';

    }
}
