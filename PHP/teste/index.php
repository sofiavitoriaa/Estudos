<?php 
    //Arquivo index responsável pela inicialização do sistema

    require_once 'sistema/configuracao.php';
    include_once 'helpers.php';

    $texto = 'texto para resumir vindo de uma variável';
    $string = "texto";
    $int = 10;
    $float = 9.99;
    $bool = false;
    $nulo = null;

    echo saudacao();
    echo '<hr>';
    echo resumirTexto($texto, 50);

?>