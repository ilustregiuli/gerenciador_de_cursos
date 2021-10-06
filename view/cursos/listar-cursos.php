<?php
require __DIR__ . '/../inicio-html.php'; ?>
    <a href="/novo-curso" class="btn btn-primary mb-2">
        Novo curso
    </a>
    <ul class="list-group">
        <?php foreach ($cursos as $curso): // faz um "for" pelos cursos... ?>
            <li class="list-group-item d-flex justify-content-between"> 
                <?= $curso->getDescricao(); // quando passa por cada curso, pega a descrição ?> 
    <span>            
    <a href="/excluir-curso?id=<?= $curso->getId(); // coloca o id na URL?>" class="btn btn-danger btn-sm">
                    Excluir
                </a>
    <a href="/alterar-curso?id=<?= $curso->getId(); // coloca o id na URL?>" class="btn btn-info btn-sm">
                    Alterar
                </a>
    </span>            
            </li>
        <?php endforeach; ?>    
    </ul>
<?php
require __DIR__ . '/../fim-html.php';    