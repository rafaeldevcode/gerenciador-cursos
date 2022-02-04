<?php include __DIR__ . '/../View/layout/inicio.php'; ?>

    <a href="/novo-curso" class="btn btn-primary mb-2">
        Novo Curso
    </a>

    <ul class="list-group">
        <?php foreach ($cursos as $curso): ?>
            <li class="list-group-item">
                <?= $curso->getDescricao(); ?>
            </li>
        <?php endforeach; ?>
    </ul>

<?php include __DIR__ . '/../View/layout/fim.php'; ?>