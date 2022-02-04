<?php include __DIR__ . '/../View/layout/inicio.php'; ?>

    <form action="/salvar-curso" method="POST" class="form-group">
        <div>
            <label class="form-label" for="descricao">Descrição</label>
            <input class="form-control" name="descricao" type="text" id="descricao">
        </div>

        <button type="submit" title="Salvar" class="btn btn-primary mt-2">
            Salvar
        </button>
    </form>

<?php include __DIR__ . '/../View/layout/fim.php'; ?>