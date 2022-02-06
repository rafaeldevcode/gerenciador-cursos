<?php include __DIR__ . '/../View/layout/inicio.php'; ?>

    <form action="/salvar-curso<?= isset($curso) ? '?id=' . $curso->getId() : '';?> " method="POST" class="form-group">
        <div>
            <label class="form-label" for="descricao">Descrição</label>
            <input class="form-control" name="descricao" type="text" id="descricao" value="<?= isset($curso) ? $curso->getDescricao() : ''; ?>">
        </div>

        <button type="submit" title="Salvar" class="btn btn-primary mt-2">
            Salvar
        </button>
    </form>

<?php include __DIR__ . '/../View/layout/fim.php'; ?>