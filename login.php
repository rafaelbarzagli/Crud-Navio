<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">

<div class="card p-4 shadow" style="min-width: 320px;">
    <h4 class="mb-3 text-center">Acesso ao Sistema</h4>

    <?php if (isset($_GET['erro'])): ?>
        <div class="alert alert-danger py-2">
            <?php if ($_GET['erro'] == 'senha'): ?>
                Senha incorreta.
            <?php else: ?>
                Usuário não encontrado.
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="verifica_login.php">
        <div class="mb-3">
            <label class="form-label">Usuário</label>
            <input type="text" name="usuario" class="form-control" required autofocus>
        </div>
        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" name="senha" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>