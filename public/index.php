<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Cursos\Controller\IControladorRequisicao;

// recebe o caminho solicitado no navegador
$caminho = $_SERVER['PATH_INFO']; 

 // recebe o retorno do arquivo "routes", ou seja, um array com as rotas
$rotas = require __DIR__ . '/../config/routes.php';
  
// verifica se NÃO existe  uma chave "caminho" dentro do array de "rotas"
// se não existir, vai mostrar um erro de "não encontrado" (404)
if(!array_key_exists($caminho,$rotas)){
    http_response_code(404);
    exit();
}

//iniciando uma session
session_start();

//guarda uma variável com a posição da palavra "login" dentro um caminho,
// se não existir, será "false"
$ehUmaRotaDeLogin = stripos($caminho,'login');

// verifica se está NÃO está logado e se rota NÃO tem a palavra login
// se não estiver logodo ou não for uma rota de login, encaminha então para o "/login"
if(!isset($_SESSION['logado']) && $ehUmaRotaDeLogin === false){
    header('Location: /login');
    exit();
}



// se o caminho existe...
// variavel "classeControladora" recebe o array que está em "rotas" acessado pela chave "caminho"
// e retorna o nome de uma classe (referente ao caminho solicitado na URL)
$classeControladora = $rotas[$caminho];

// o nome de uma classe em uma variavel pode ser usada para instanciar um objeto
/** @var IControladorRequisicao $controlador */
$controlador  = new $classeControladora();
$controlador->processaRequisicao(); // -> acesso oos métodos do objeto
?>