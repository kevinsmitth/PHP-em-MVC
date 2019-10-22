<?php
date_default_timezone_set("America/Sao_Paulo");

class HomeController
{
    public function index($params)
    {

        try {
            if (($_SESSION['nivel']) == 10) {
                include_once 'app/Components/DashboardPainel/index.html';
            } else {
                include_once 'app/Components/Header/index.html';
            }
            $loader = new \Twig\Loader\FilesystemLoader('app/View/Home');
            $twig = new \Twig\Environment($loader);
            $twig->addGlobal('session', $_SESSION);
            $template = $twig->load('index.html');

            $selectPostagens = Postagem::seleciona3();
            $selectCategoria = Postagem::selecionaCategoria();
            $selectCor = Postagem::selecionaCor();

            $parametros = array();
            $parametros['postagens'] = $selectPostagens;
            $parametros['categorias'] = $selectCategoria;
            $parametros['cores'] = $selectCor;

            $conteudo = $template->render($parametros);
            echo $conteudo;
            include_once 'app/Components/Footer/index.html';
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
