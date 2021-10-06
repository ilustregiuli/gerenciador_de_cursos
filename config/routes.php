<?php

// esse arquivo irá devolver um array com as rotas para quem o chamar através do "return"
// Um arquivo em PHP pode possuir um retorno

use Alura\Cursos\Controller\{Exclusao,
    FormularioInsercao,
    ListarCursos,
    Persistencia,
    FormularioEdicao,
    FormularioLogin,
    RealizarLogin,
    Deslogar};

return [
    '/listar-cursos' => ListarCursos::class, // 'chave' => 'valor' - recebe o nome da classe
    '/novo-curso' => FormularioInsercao::class,
    '/salvar-curso' => Persistencia::class,
    '/excluir-curso' => Exclusao::class,
    '/alterar-curso' => FormularioEdicao::class,
    '/login' => FormularioLogin::class,
    '/realiza-login' => RealizarLogin::class,
    '/logout' => Deslogar::class,
];

