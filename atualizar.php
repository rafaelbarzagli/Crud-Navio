<?php
require_once "conexao.php";

$id = $_POST['id'];

$sql = "UPDATE cadastro SET
    navio = ?,
    imo = ?,
    dataoperacao = ?,
    tipooperacao = ?,
    local = ?,
    atracacao = ?,
    iniciobombeio = ?,
    fimbombeio = ?,
    desatracacao = ?,
    volume = ?,
    porcentagem = ?,
    tripulacao = ?,
    agencia = ?,
    dadobancario = ?,
    residuo = ?,
    obs = ?,
    saidaporto = ?,
    horariosaida = ?,
    retornoporto = ?,
    horarioretorno = ?
WHERE id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ssssssssddssssssssssi",
    $_POST['navio'],
    $_POST['imo'],
    $_POST['dataoperacao'],
    $_POST['tipooperacao'],
    $_POST['local'],
    $_POST['atracacao'],
    $_POST['iniciobombeio'],
    $_POST['fimbombeio'],
    $_POST['desatracacao'],
    $_POST['volume'],
    $_POST['porcentagem'],
    $_POST['tripulacao'],
    $_POST['agencia'],
    $_POST['dadobancario'],
    $_POST['residuo'],
    $_POST['obs'],
    $_POST['saidaporto'],
    $_POST['horariosaida'],
    $_POST['retornoporto'],
    $_POST['horarioretorno'],
    $id
);

if ($stmt->execute()) {
    header("Location: vizualizar.php?status=atualizado");
    exit;
} else {
    echo "Erro ao atualizar.";
}