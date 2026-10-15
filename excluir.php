<?php
require_once "conexao.php";

if (!isset($_GET['id'])) {
    header("Location: visualizar.php");
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM cadastro WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: vizualizar.php?status=atualizado");
    exit;
} else {
    echo "Erro ao excluir registro.";
}
?>