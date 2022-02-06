<?php include __DIR__ . '/../View/layout/inicio.php'; ?>

    <a href="/novo-curso" class="btn btn-primary mb-2">
        Novo Curso
    </a>

    <ul class="list-group">
        <?php foreach ($cursos as $curso): ?>
            <li class="list-group-item d-flex justify-content-between">
                <?= $curso->getDescricao(); ?>

                <span>
                    <a href="/editar-curso?id=<?= $curso->getId(); ?>" class="btn btn-primary sm">
                        Editar
                    </a>

                    <a href="/remover-curso?id=<?= $curso->getId(); ?>" class="btn btn-danger sm">
                        Excluir
                    </a>
                </span>
            </li>
        <?php endforeach; ?>
    </ul>

<?php include __DIR__ . '/../View/layout/fim.php'; ?>