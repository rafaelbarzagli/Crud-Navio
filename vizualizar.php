<?php
include("protecao.php");
require_once "conexao.php";

$sql = "SELECT * FROM cadastro ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registros Cadastrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2 class="mb-4">Registros Cadastrados</h2>

    <!-- Botões de Navegação -->
    <div class="d-flex justify-content-between mb-3">
        <a href="index.php" class="btn btn-success">
            Novo Cadastro
        </a>

        <a href="visualizar.php" class="btn btn-primary">
            Atualizar Lista
        </a>
    </div>

    <!-- Mensagens -->
    <?php if(isset($_GET['status']) && $_GET['status'] == 'atualizado'): ?>
        <div class="alert alert-success">
            Registro atualizado com sucesso!
        </div>
    <?php endif; ?>

    <?php if(isset($_GET['status']) && $_GET['status'] == 'excluido'): ?>
        <div class="alert alert-danger">
            Registro excluído com sucesso!
        </div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Navio</th>
                    <th>IMO</th>
                    <th>Data</th>
                    <th>Tipo</th>
                    <th>Local</th>
                    <th>Volume</th>
                    <th>%</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

            <?php if($result && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td class="text-center"><?php echo $row['id']; ?></td>
                        <td><?php echo $row['navio']; ?></td>
                        <td><?php echo $row['imo']; ?></td>
                        <td><?php echo $row['dataoperacao']; ?></td>
                        <td><?php echo $row['tipooperacao']; ?></td>
                        <td><?php echo $row['local']; ?></td>
                        <td><?php echo $row['volume']; ?></td>
                        <td><?php echo $row['porcentagem']; ?></td>
                        <td class="text-center">

                            <a href="editar.php?id=<?php echo $row['id']; ?>" 
                               class="btn btn-warning btn-sm">
                               Editar
                            </a>

                            <a href="excluir.php?id=<?php echo $row['id']; ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Tem certeza que deseja excluir este registro?');">
                               Excluir
                            </a>

                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" class="text-center">
                        Nenhum registro encontrado.
                    </td>
                </tr>
            <?php endif; ?>

            </tbody>
        </table>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>