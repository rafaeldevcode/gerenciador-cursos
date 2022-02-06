<?php include __DIR__ . '/../../View/layout/inicio.php'; ?>

    <form action="/realizar-login" method="POST">
        <div class="form-group">
            <label for="email">E-Mail:</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="senha">E-Mail:</label>
            <input type="password" name="senha" id="senha" class="form-control">
        </div>

        <button class="btn btn-primary">
            Entrar
        </button>
    </form>

<?php include __DIR__ . '/../../View/layout/fim.php'; ?>