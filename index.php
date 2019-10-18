<?php
date_default_timezone_set("America/Sao_Paulo");

require_once 'app/Core/Core.php';

require_once 'lib/Database/Connection.php';

require_once 'app/Controller/HomeController.php';
require_once 'app/Controller/ErroController.php';
require_once 'app/Controller/PageController.php';
require_once 'app/Controller/LoginController.php';
require_once 'app/Controller/UserController.php';
require_once 'app/Controller/AdminController.php';



require_once 'app/Model/Postagem.php';
require_once 'app/Model/Usuario.php';

require_once 'vendor/autoload.php';

session_start();
$now = time();

if (isset($_SESSION['desconecta-depois']) && $now > $_SESSION['desconecta-depois']) {
    // this session has worn out its welcome; kill it and start a brand new one
    session_unset();
    session_destroy();
    session_start();
}
// either new or old, it should live at most for another hour
$_SESSION['desconecta-depois'] = $now + 3600;

if (!isset($_SESSION['id']) && !isset($_SESSION['nome']) && !isset($_SESSION['senha'])) {

    $template = file_get_contents('app/Template/estrutura.html');

    ob_start();
    $core = new Core;
    $core->start($_GET);

    $saida = ob_get_contents();
    ob_end_clean();

    $tplPronto = str_replace('{{ area_dinamica }}', $saida, $template);
    echo $tplPronto;
}

if (isset($_SESSION['id']) && isset($_SESSION['nome']) && isset($_SESSION['senha']) && ($_SESSION['nivel']) == 10) {
    $template = file_get_contents('app/Template/administracao.html');

    ob_start();
    $core = new Core;
    $core->start($_GET);

    $saida = ob_get_contents();
    ob_end_clean();

    $tplPronto = str_replace('{{ area_admin }}', $saida, $template);
    echo $tplPronto;
}
