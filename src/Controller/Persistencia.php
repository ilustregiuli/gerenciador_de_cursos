<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class Persistencia implements IControladorRequisicao
{
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    // construtor de uma classe
    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())
            ->getEntityManager();
    }

    public function processaRequisicao(): void
    {
        // função filter_input pega os dados da requisição para filtrar
        $descricao = filter_input(  
            INPUT_POST,     // dados que estão vindo, de que método HTTP
            'descricao',    // "name" usado no formulário, campo
            FILTER_SANITIZE_STRING // função que transforma a string em somente caracteres seguros
        );

        $curso = new Curso();
        $curso->setDescricao($descricao);

        // pega o ID, no caso de uma alteração
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (!is_null($id) && $id !== false) { // se o ID existir, é uma alteração, é feita a atualização
            $curso->setId($id);
            $this->entityManager->merge($curso);
            $_SESSION['mensagem'] = 'Curso atualizado com sucesso';
        } else {
            $this->entityManager->persist($curso); // caso não tenha ID válido, é salvo como um novo item
            $_SESSION['mensagem'] = 'Curso inserido com sucesso';
        }
        $_SESSION['tipo_mensagem'] = 'success';
        $this->entityManager->flush();

        // após ser salvo, a função header redireciona o navegador, usando o cabeçalho "Location"
        header('Location: /listar-cursos', true, 302);
    }
}