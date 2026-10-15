<?php 
include("protecao.php");
include("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Operação</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<main class="container mt-4">

<?php if(isset($_GET['status'])): ?>

    <?php if($_GET['status'] == 'sucesso'): ?>
        <div class="alert alert-success">
            Cadastro realizado com sucesso!
        </div>
    <?php endif; ?>

    <?php if($_GET['status'] == 'erro'): ?>
        <div class="alert alert-danger">
            Não foi possível cadastrar os dados.
        </div>
    <?php endif; ?>

<?php endif; ?>

    <h2 class="mb-4">Cadastro de Operação</h2>

    <form action="cadastrar.php" method="post" class="row g-3">

        <!-- Dados do Navio -->
        <div class="col-md-6">
            <label class="form-label">Nome do Navio</label>
            <input type="text" name="navio" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">IMO</label>
            <input type="text" name="imo" class="form-control" required>
        </div>

        <!-- Operação -->
        <div class="col-md-4">
            <label class="form-label">Data da Operação</label>
            <input type="date" name="dataoperacao" class="form-control" required>
        </div>

        <div class="col-md-4">
            <label class="form-label">Tipo de Operação</label>
            <input type="text" name="tipooperacao" class="form-control">
        </div>

        <div class="col-md-4">
            <label class="form-label">Local</label>
            <input type="text" name="local" class="form-control">
        </div>

        <!-- Horários -->
        <div class="col-md-3">
            <label class="form-label">Atracação</label>
            <input type="time" name="atracacao" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">Início Bombeio</label>
            <input type="time" name="inicio_bombeio" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">Fim Bombeio</label>
            <input type="time" name="fim_bombeio" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">Desatracação</label>
            <input type="time" name="desatracacao" class="form-control">
        </div>

        <!-- Valores -->
        <div class="col-md-4">
            <label class="form-label">Volume</label>
            <input type="number" step="0.01" name="volume" class="form-control">
        </div>

        <div class="col-md-4">
            <label class="form-label">Porcentagem</label>
            <input type="number" step="0.01" name="porcentagem" class="form-control">
        </div>

        <!-- Agência -->
        <div class="col-md-4">
            <label class="form-label">Agência</label>
            <input type="text" name="agencia" class="form-control">
        </div>

        <!-- Textos -->
        <div class="col-md-6">
            <label class="form-label">Tripulação</label>
            <textarea name="tripulacao" class="form-control"></textarea>
        </div>

        <div class="col-md-6">
            <label class="form-label">Dados Bancários</label>
            <textarea name="dadobancario" class="form-control"></textarea>
        </div>

        <div class="col-md-6">
            <label class="form-label">Resíduo</label>
            <textarea name="residuo" class="form-control"></textarea>
        </div>

        <div class="col-md-6">
            <label class="form-label">Observações</label>
            <textarea name="obs" class="form-control"></textarea>
        </div>

        <!-- Saída e Retorno -->
        <div class="col-md-3">
            <label class="form-label">Saída do Porto</label>
            <input type="date" name="saidaporto" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">Horário Saída</label>
            <input type="time" name="horariosaida" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">Retorno ao Porto</label>
            <input type="date" name="retornoporto" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">Horário Retorno</label>
            <input type="time" name="horarioretorno" class="form-control">
        </div>

        <div class="col-12 d-flex gap-2">
            <button type="submit" class="btn btn-success">Cadastrar</button>
            
            <a href="vizualizar.php" class="btn btn-primary">
                Visualizar Registros
            </a>
        </div>

    </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>