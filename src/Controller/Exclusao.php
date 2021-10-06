<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

// Implementando as interfaces recomendadas pela PSR
class Exclusao implements RequestHandlerInterface
{      
    // esse controller terá um atributo "entityManager" que irá receber no construtor 
    // um objeto para setar esse atributo
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    // injeção de dependência... construtor recebendo um objeto
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    // método que trata a requisição e devolve uma resposta
    // nesse caso, vai receber um "id" de curso e excluir esse curso
    // do Banco da Dados
    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $queryString = $request->getQueryParams(); // onde é implementado???
        $idEntidade = $queryString ['id'];
        $entidade = $this->entityManager
            ->getReference(Curso::class,$idEntidade);
        $this->entityManager->remove($entidade);
        $this->entityManager->flush();

        return new Response(302,['Location' => '/listar-cursos']);

        /* ---- Código anterior (para comparação)

        $id = filter_input(INPUT_GET, 
        'id', 
        FILTER_VALIDATE_INT);


        if (is_null($id) || $id === false) {
            header('Location: /listar-cursos');
            return; // sai do método caso não encontre o um id válido
        }

        $curso = $this->entityManager->getReference(Curso::class, $id);
        $this->entityManager->remove($curso);
        $this->entityManager->flush();
        header('Location: /listar-cursos');

        */
    }
}