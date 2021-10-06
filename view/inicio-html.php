<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php if (isset($_SESSION['logado'])): ?>
<nav class="navbar navbar-dark bg-dark mb-2">
    <a class="navbar-brand" href="/listar-cursos">Home</a>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/logout">Sair</a>
        </li>
    </ul>
</nav>
<?php endif; ?>
<div class="container">
    <div class="jumbotron">
        <h1><?= $titulo; ?></h1>
    </div>   
    
    <?php if (isset($_SESSION['mensagem'])): ?>
    <div class="alert alert-<?= $_SESSION['tipo_mensagem']; ?>">
        <?= $_SESSION['mensagem']; ?>
    </div>
    <?php
        unset($_SESSION['mensagem']);
        unset($_SESSION['tipo_mensagem']);
    endif;
    ?>
