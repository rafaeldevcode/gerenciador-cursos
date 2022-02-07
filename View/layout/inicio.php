<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Listar cursos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php
    if($_SERVER['PATH_INFO'] !== '/login'){ ?>
        <nav class="navbar navbar-dark bg-dark mb-2">
            <a class="navbar-brand" href="/listar-cursos">Home</a>

            <ul class="navbar-nav mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="/logout">Sair</a>
                </li>
            </ul>
        </nav>
    <?php }
?>

<div class="container">
    <div class="jumbotron">
        <h1><?= $titulo ?></h1>
    </div>

    <?php
        if(isset($_SESSION['message'])){ ?>
            <div class="alert alert-<?= $_SESSION['type_message']; ?>">
                <?= $_SESSION['message']; ?>
            </div>
        <?php }
        unset($_SESSION['message']);
        unset($_SESSION['type_message']);
    ?>